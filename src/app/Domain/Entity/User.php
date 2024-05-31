<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-05-31 01:44:58
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-05-31 21:53:58
 * @ Description:
 */

namespace App\Domain\Entity;

class User extends BaseEntity
{
    private string $first_name;

    private string $last_name;

    private string $email;

    private string $password;

    public function getFirstName(): string {
        return $this->first_name;
    }

    public function setFirstName(string $name) {
        $this->first_name = $name;
    }

    public function getLastName(): string {
        return $this->last_name;
    }

    public function setLastName(string $name) {
        $this->last_name = $name;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email) {
        $this->email = $email;  
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function setPassword(string $password) {
        $this->password = $password;
    }
}