<?php

namespace Source\App\Api;

use Source\Models\User;

class Users extends Api
{
    public function __construct()
    {
        parent::__construct();
    }

    public function read (array $data) : void
    {
        $response = [
            "code" => 200,
            "type" => "success",
            "message" => "Dados do usuário"
        ];
        http_response_code(200);
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function create (array $data) : void
    {
       if(!empty($data)){
            $user = new User($data["name"],$data["email"],$data["password"]);
            if(!$user->insert()){
                $response["error"] = [
                    "code" => 400,
                    "type" => "invalid_data",
                    "message" => $user->getMessage()
                ];
                http_response_code(400);
                echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                return;
            }

            $response["success"] = [
                "code" => 200,
                "type" => "success",
                "message" => $user->getMessage(),
                "user" => [
                    "name" => $user->getName(),
                    "email" => $user->getEmail(),
                ]
            ];

            http_response_code(200);
            echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
    }

    public function login (array $data) : void
    {

        $user = new User();

        if(!$user->auth($data["email"],$data["password"])){
            $response = [
                "code" => 401,
                "type" => "error",
                "message" => "E-mail ou senha inválidos..."
            ];
            echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        $response = [
            "code" => 200,
            "type" => "success",
            "message" => "Usuário autenticado corretamente..."
        ];
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
}