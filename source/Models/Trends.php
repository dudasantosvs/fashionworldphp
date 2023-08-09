<?php

namespace Source\Models;

use Source\Core\Connect;

class Trends
{

    public function selectAll ()
    {
        $query = "SELECT * FROM trends";
        $stmt = Connect::getInstance()->query($query);
        return $stmt->fetchAll();
    }

    public function selectByCategory(string $categoryName)
    {
        $query = "SELECT trends.* 
                  FROM trends 
                  JOIN categories ON categories.id = trends.category_id 
                  WHERE categories.name LIKE '{$categoryName}'";
        $stmt = Connect::getInstance()->query($query);
        return $stmt->fetchAll();
    }

}