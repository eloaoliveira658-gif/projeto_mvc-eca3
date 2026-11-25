<?php
namespace App\Controllers;

class DireitosController extends PageController
{
    public function index(): void
    {
        $this->render('direitos/index', 'Direitos Digitais');
    }
}