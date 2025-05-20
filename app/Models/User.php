<?php

class User {
    private $users = [
        'admin' => 'wachtwoord123',
    ];

    public function authenticate($username, $password): bool {
        return isset($this->users[$username]) && $this->users[$username] === $password;
    }
}
