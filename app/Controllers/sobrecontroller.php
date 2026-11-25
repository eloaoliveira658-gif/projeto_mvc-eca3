<?php
namespace App\Controllers;

class SobreController extends PageController
{
    public function index(): void
    {
        $this->render(
            'sobre/index',
            'Sobre Nós'
        );
    }
}