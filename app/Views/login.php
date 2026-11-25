<?php
use App\Models\User;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    require_once __DIR__ . '/../Views/login.php';
    return;
}

$usuario = $_POST['login'] ?? $_POST['usuario'] ?? '';
$senha = $_POST['senha'] ?? '';

$user = User::findByLogin($usuario);

if ($user && password_verify($senha, $user['senha'])) {
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }

    $_SESSION['usuario'] = $user;

    header('Location: ' . url('user/index'));
    exit;
}

$erro = "Usuário ou senha incorretos.";

require_once __DIR__ . '/../Views/users/login.php';
?>
<h1>Entrar na sua conta</h1>

<p>Informe seus dados para acessar o sistema.</p>

<?php if (!empty($erro)): ?>
    <p class="erro"><?= htmlspecialchars($erro) ?></p>
<?php endif; ?>

<form method="POST" action="<?= htmlspecialchars(url('user/login')) ?>">
    <label for="login">Nome de usuário</label>
    <input
        id="login"
        type="text"
        name="login"
        placeholder="Digite seu usuário"
        required
    >

    <label for="senha">Senha</label>
    <input
        id="senha"
        type="password"
        name="senha"
        placeholder="Digite sua senha"
        required
    >

    <button type="submit" class="botao">Entrar</button>
</form>

<p>
    Ainda não tem conta?
    <a href="<?= htmlspecialchars(url('user/create')) ?>">Cadastre-se</a>
</p>