<?php
namespace App\Controllers;

class PageController
{
    protected function render(string $view, string $title): void
    {
        $arquivo = __DIR__. '/../Views/' . $view . '.php';

        if (!file_exists($arquivo)) {
            http_response_code(404);
            exit('Página não encontrada.');
        }

        ob_start();
        require $arquivo;
        $content = ob_get_clean();

        require __DIR__ . '/../Views/layouts/main.php';
    }
}