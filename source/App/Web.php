<?php

namespace Source\App;

use League\Plates\Engine;
use Source\App\Api\Faqs;
use Source\Models\Faq\Question;

class Web
{
    private $view;

    public function __construct()
    {
        $this->view = new Engine(__DIR__ . "/../../themes/web","php");
    }

    public function home ()
    {
        echo $this->view->render("_theme",[]);
    }

    /*public function error (array $data)
    {
        var_dump($data);
    }*/

}