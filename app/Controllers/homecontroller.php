<?php
namespace App\Controllers;

class homecontroller extends PageController
{
    public function index(): void
    {
        $this->render('home/index', 'inicio');
    }
}