<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-01 13:18:07
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-01 23:24:40
 * @ Description:
 */

namespace App\Infrastructure\Presenter;

use App\Domain\Entity\User;
use App\Infrastructure\Mapper\UserMapper;
use App\Infrastructure\Response\HttpStatus;
use App\Infrastructure\Response\MetaResponse;
use App\Infrastructure\Response\StatusResponse;
use App\Infrastructure\Validator\FieldError;

class BasePresenter
{
    public $status;

    public $data;

    public $meta;

    public function __construct($data = null, $status = new StatusResponse(), $meta = new MetaResponse()) {
        $this->status = $status;
        $this->meta = $meta;
        $this->data = $this->transform($data);
    }

    public function __toString() {
        return json_encode([
            "status"=> $this->status,
            "data"=> $this->data,
            "meta"=> $this->meta
        ], JSON_PRETTY_PRINT);
    }

    private function transform($data) {
        if ($data instanceof \PDOException) {
            $this->status = new StatusResponse(
                HttpStatus::BAD_REQUEST['code'], 
                HttpStatus::BAD_REQUEST['message'],
            );
            return $data->getMessage();
        }

        if ($data instanceof FieldError) {
            return $data->getError();
        }

        if (is_array($data) && !empty($data)) {
            $className = (new \ReflectionClass($data[0]))->getShortName();
            $mapper = $this->getMapper($className);
            return $mapper::toList($data);
        }

        if (is_object($data)) {
            $className = (new \ReflectionClass($data))->getShortName();
            $mapper = $this->getMapper($className);
            return $mapper::fromModel($data);
        }

        return $data;
    }

    private function getMapper(string $className) {
        $mapper = "App\\Infrastructure\\Mapper\\" . $className . "Mapper";
        if (!class_exists($mapper)) {
            throw new \Exception("Class Mapper not found.");
        }

        return $mapper;
    }
}