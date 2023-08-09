<?php

namespace Source\App\Api;

class Api
{
    /** @var \Source\Models\User|null */
    protected $user;
    protected $headers;

    public function __construct()
    {
        header('Content-Type: application/json; charset=UTF-8');
        $this->headers = getallheaders();
    }

}