<?php

namespace Source\Models;

use Source\Core\Connect;

class Faq
{
    private $id;
    private $question;
    private $answer;

    public function selectAll ()
    {
        $query = "SELECT * FROM faqs";
        $stmt = Connect::getInstance()->query($query);
        return $stmt->fetchAll();
    }


}