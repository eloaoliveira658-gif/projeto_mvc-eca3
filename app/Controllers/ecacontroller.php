<?php
namespace App\Controllers;

class EcaController extends PageController
{
    public function index(): void
    {
        $this->render('eca/index', 'Conheça o ECA');
    }
}