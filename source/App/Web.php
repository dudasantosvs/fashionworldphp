<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\Category;
use Source\Models\Trends;
use Source\Models\Faq;

class Web
{
    private $view;
    private $categories;

    public function __construct ()
    {
        $this->view = new Engine(__DIR__ . "/../../themes/web","php");
        $category = new Category();
        $this->categories = $category->selectAll();
    }

    public function home()
    {
        //echo "Olá, Mundo! Home";

        echo $this->view->render("home");
    }
    public function login (array $data) : void
    {
        echo $this->view->render("user-auth", []);
    }

    public function register (array $data) : void
    {
        if(!empty($data)){
            $response = json_decode($data);
            echo $response;
            return;
        }
        echo $this->view->render("register", [
            "categories" => $this->categories
        ]);
    }

    public function about()
    {
        echo $this->view->render("about");
    }

  // public function trends()
        
//*
    public function blog ()
    {
        echo $this->view->render("blog");
    }

    public function contact ()
    {
        echo $this->view->render("contact");
        }

    public function notices ()
        {
            echo $this->view->render("notices");
            }

    public function profile ()
    {
        echo "Esse é o meu perfil legal!";
    }
    public function faq ()
    {
        $faqs = new Faq();
        //var_dump($faqs->selectAll());

        echo $this->view->render("faq",[
            "faqs" => $faqs->selectAll(),
            "name" => "Fábio"
        ]);
    }

    public function trends (array $data) : void
    {

        $trends = new Trends();

        if(!empty($data["categoryName"])){
            echo $this->view->render("trends",[
                "trends" => $trends->selectByCategory($data["categoryName"]),
                "categories" => $this->categories
            ]);
            return;
        }

        echo $this->view->render("trends",[
            "trends" => $trends->selectAll(),
            "categories" => $this->categories
        ]);
    }

}


