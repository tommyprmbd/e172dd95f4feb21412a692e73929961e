<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-02 02:03:01
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-02 02:43:28
 * @ Description:
 */

namespace App\Domain\Entity;

use DateTime;

class EmailQueue extends BaseEntity 
{
    private string $email;

    private string $subject;

    private string $message;

    private ?DateTime $processedAt;

    private string $status;

    private string $additionalInfo;

    private int $createdBy;

    private ?DateTime $updatedAt;

    private int $updatedBy;

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email) {
        $this->email = $email;
    }

    public function getSubject(): string {
        return $this->subject;
    }

    public function setSubject(string $subject) {
        $this->subject = $subject;
    }

    public function getMessage(): string {
        return $this->message;
    }

    public function setMessage(string $message) {
        $this->message = $message;
    }

    public function getProcessedAt(): DateTime {
        return $this->processedAt;
    }

    public function setProcessedAt(DateTime $processedAt) {
        $this->processedAt = $processedAt;
    }

    public function getStatus(): string {
        return $this->status;
    }

    public function setStatus(string $status) {
        $this->status = $status;
    }

    public function getAdditionalInfo(): string {
        return $this->additionalInfo;
    }

    public function setAdditionalInfo(string $additionalInfo) {
        $this->additionalInfo = $additionalInfo;
    }

    public function getUpdatedBy(): int {
        return $this->updatedBy;
    }

    public function setUpdatedBy(int $updatedBy) {
        $this->updatedBy = $updatedBy;
    }

    public function getUpdatedAt(): DateTime {
        return $this->updatedAt;
    }

    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;
    }

    public function getCreatedBy(): int {
        return $this->createdBy;
    }

    public function setCreatedBy(int $createdBy) {
        $this->createdBy = $createdBy;
    }

    public function toArray(): array {
        return [
            "id"=> $this->getId(),
            "email"=> $this->getEmail(),
            "subject"=> $this->getSubject(),
            "message"=> $this->getMessage(),
            "processedAt"=> $this->getProcessedAt(),
            "status"=> $this->getStatus(),
            "additionalInfo"=> $this->getAdditionalInfo(),
            "updatedBy"=> $this->getUpdatedBy(),
            "updatedAt"=> $this->getUpdatedAt(),
            "createdBy"=> $this->getCreatedBy(),
            "createdAt"=> $this->getCreatedAt(),
        ];
    }
}