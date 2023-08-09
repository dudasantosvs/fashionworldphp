<?php

namespace Source\Models;

use Source\Core\Connect;
use PDO;
use PDOException;

class User {
    private $name;
    private $email;
    private $password;
    private $message;
 

    public function __construct (
        $name = null,
        $email = null,
        $password = null,
      
    ){
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
     
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getPassword(): mixed
    {
        return $this->password;
    }

    public function setPassword(mixed $password): void
    {
        $this->password = $password;
    }
    public function getMessage(): string
    {
        return $this->message;
    }

    public function insert(): bool
    {
        $queryCheck = "SELECT COUNT(*) as count FROM users WHERE email = :email";
        $stmtCheck = Connect::getInstance()->prepare($queryCheck);
        $stmtCheck->bindParam(":email", $this->email);
        $stmtCheck->execute();
    
        $result = $stmtCheck->fetch();
    
        if ($result->count > 0) {
            $this->message = "Erro: O email já está cadastrado no banco de dados.";
            return false;
        }
    
        $queryInsert = "INSERT INTO users VALUES (NULL,:name,:email,:password)";
        $stmtInsert = Connect::getInstance()->prepare($queryInsert);
        $stmtInsert->bindParam(":name", $this->name);
        $stmtInsert->bindParam(":email", $this->email);
        $stmtInsert->bindParam(":password", $this->password);
    
        try {
            $stmtInsert->execute();
    
            if ($stmtInsert->rowCount()) {
                $this->message = "Usuário inserido com sucesso!";
                return true;
            }
    
            $this->message = "Erro ao inserir usuário, verifique os dados!";
            return false;
        } catch (PDOException $e) {
            $this->message = "Erro: {$e->getMessage()}";
            return false;
        }
    }
    
        public function auth (string $email, string $password) : bool
        {
            $query = "SELECT * 
                      FROM users 
                      WHERE email LIKE :email AND password LIKE :password";
    
            $stmt = Connect::getInstance()->prepare($query);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $password);
            $stmt->execute();
            if($stmt->rowCount() == 0) {
                return false;
            }
            return true;
        }
    
    }

