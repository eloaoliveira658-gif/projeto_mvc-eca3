<?php
namespace App\Controllers;

use App\Database;
use App\Models\Comentario;
use App\Models\Post ;
use App\Controllers\PageController;

require_once __DIR__ . '/Models/pageController.php';
require_once __DIR__ . '/../Models/Post.php';
require_once __DIR__ . '/../Models/Comentario.php';

class ChatController extends PageController {
    private $post;
    private $comentario;

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Adapte esta conexão ao seu projeto.
        require_once __DIR__ . '/../Database.php';

        $db = Database::getConnection();

        $this->post = new Post($db);
        $this->comentario = new Comentario($db);
    }

    public function index():void
    {
        $posts = $this->post->listar();

        $this->render('chat/index', 'Chat', [
            'posts' => $posts
        ]);
    }

    public function publicar():void
    {
        $this->verificarLogin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = trim($_POST['titulo'] ?? '');
            $conteudo = trim($_POST['conteudo'] ?? '');

            if ($titulo !== '' && $conteudo !== '') {
                $this->post->cadastrar(
                    $_SESSION['usuario_id'],
                    $titulo,
                    $conteudo
                );
            }
        }

        header('Location: ' . url('chat/index'));
        exit;
    }

    public function comentar()
    {
        $this->verificarLogin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $postId = (int)($_POST['post_id'] ?? 0);
            $conteudo = trim($_POST['conteudo'] ?? '');

            if ($postId > 0 && $conteudo !== '') {
                $this->comentario->cadastrar(
                    $postId,
                    $_SESSION['usuario_id'],
                    $conteudo
                );
            }

            header('Location: ' . url('chat/comentarios?id=' . $postId));
            exit;
        }
    }

    public function comentarios()
    {
        $id = (int)($_GET['id'] ?? 0);

        $post = $this->post->buscar($id);

        if (!$post) {
            header('Location: ' . url('chat/index'));
            exit;
        }

        $comentarios = $this->comentario->listarPorPost($id);

        $this->render('chat/comentarios', 'Comentários', [
            'post' => $post,
            'comentarios' => $comentarios
        ]);
    }

    public function excluirPost()
    {
        $this->verificarLogin();

        $id = (int)($_POST['id'] ?? 0);
        $post = $this->post->buscar($id);

        if ($post && $post['usuario_id'] == $_SESSION['usuario_id']) {
            $this->post->excluir($id);
        }

        header('Location: ' . url('chat/index'));
        exit;
    }

    private function verificarLogin()
    {
        if (empty($_SESSION['usuario_id'])) {
            header('Location: ' . url('login/index'));
            exit;
        }
    }
    public function excluirComentario()
{
    $this->verificarLogin();

    $id = (int)($_POST['id'] ?? 0);
    $postId = (int)($_POST['post_id'] ?? 0);

    $this->comentario->excluir(
        $id,
        $_SESSION['usuario_id']
    );

    header('Location: ' . url('chat/comentarios?id=' . $postId));
    exit;
}
}
