<?php

namespace Source\Models;

use Source\Core\Connect;

class Category
{

    public function selectAll()
    {
        $query = "SELECT * FROM categories";
        $stmt = Connect::getInstance()->query($query);
        return $stmt->fetchAll();
    }

}