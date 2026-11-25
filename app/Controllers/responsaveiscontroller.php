<?php
namespace App\Controllers;

class ResponsaveisController extends PageController
{
    public function index(): void
    {
        $this->render(
            'responsaveis/index',
            'Orientações para Responsáveis'
        );
    }
}