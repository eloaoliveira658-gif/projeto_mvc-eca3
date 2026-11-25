<?php
namespace App\Controllers;

class AjudaController extends PageController
{
    public function index(): void
    {
        $this->render(
            'ajuda/index',
            'Central de Ajuda'
        );
    }
}