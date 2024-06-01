<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-01 13:18:07
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-01 14:01:01
 * @ Description:
 */

namespace App\Infrastructure\Presenter;

use App\Domain\Entity\User;
use App\Infrastructure\Mapper\UserMapper;
use App\Infrastructure\Response\MetaResponse;
use App\Infrastructure\Response\StatusResponse;

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
        if (is_array($data) && !empty($data)) {
            $className = (new \ReflectionClass($data[0]))->getShortName();
            $mapper = $this->getMapper($className);
            $data = $mapper::toList($data);
        }

        if (is_object($data)) {
            $className = (new \ReflectionClass($data))->getShortName();
            $mapper = $this->getMapper($className);
            $data = $mapper::fromModel($data);
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