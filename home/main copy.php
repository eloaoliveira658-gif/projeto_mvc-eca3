<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" 
content="width=device-width, 
initial-scale=1">
    <title><?= e($title ?? 'ECA Digital') ?></title>

    <!-- Imagem opcional: adicione public/img/logo.png antes de usar. -->
    <link rel="stylesheet" href="<?= e(asset('css/estilo.css')) ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<body>

<header class="topo">
    <div class="logo">
        <i class="fa-solid fa-shield-halved"></i>
        <div>
            <h1>ECA DIGITAL</h1>
            <span>Informação • Proteção • Segurança</span>
        </div>
    </div>

    <nav>
        <a href="<?= e(url('home/index')) ?>">Início</a>
        <a href="<?= e(url('eca/index')) ?>">Conheça o ECA</a>
        <a href="<?= e(url('direitos/index')) ?>">Direitos Digitais</a>
        <a href="<?= e(url('segurança/index')) ?>">Segurança</a>
        <a href="<?= e(url('responsaveis/index')) ?>">Responsáveis</a>
        <a href="<?= e(url('ajuda/index')) ?>">Ajuda</a>
        <a href="<?= e(url('sobre/index')) ?>">Sobre Nós</a>
    </nav>

    <div class="acoes">
        <input type="search" placeholder="Buscar...">
        <button id="tema"><i class="fa-solid fa-moon"></i></button>
    </div>
</header>

<main>
    <?= $content ?? '' ?>
</main>

<footer class="rodape">
    <div>
        <h2>ECA DIGITAL</h2>
        <p>Informação • Proteção • Segurança</p>
    </div>

    <div>
        <p>Um projeto educativo para informar, proteger e promover os direitos de crianças e adolescentes no ambiente digital.</p>
    </div>

    <div>
        <h3>Links rápidos</h3>
        <p>Início | Conheça o ECA | Direitos Digitais</p>
        <p>Segurança | Responsáveis | Ajuda</p>
    </div>

    <div>
        <h3>Fontes e Referências</h3>
        <p>ECA - Lei nº 8.069/1990</p>
        <p>Brasil (gov.br)</p>
    </div>

    <div>
        <h3>Desenvolvido por:</h3>
        <p>Projeto ECA Digital ♥️</p>
    </div>
</footer>

<script src="<?= e(asset('js/app.js')) ?>"></script>

</body>
</html>
