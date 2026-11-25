<?php
namespace App\Controllers;

class SegurancaController extends PageController
{
    public function index(): void
    {
        $this->render('seguranca/index', 'Segurança Digital');
    }
}