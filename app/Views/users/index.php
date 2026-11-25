<a href="<?= e(url('user')) ?>">Voltar</a>

<h1><?= e($title) ?></h1>

<ul class="lista">

<?php foreach ($users as $u): ?>

    <li>

        <a href="<?= e(url('user/show/' . (int) $u['id'])) ?>">
            <?= e($u['name']) ?>
        </a>

        (<?= e($u['email']) ?>)

        <!-- Botão editar -->
        <a
            href="<?= e(url('user/edit/' . (int) $u['id'])) ?>"
            class="botao"
        >
            Editar
        </a>

        <!-- Formulário excluir -->
        <form
            method="POST"
            action="<?= e(url('user/destroy/' . (int) $u['id'])) ?>"
            style="display:inline"
            onsubmit="return confirm('Deseja realmente excluir este usuário?');"
        >

            <input
                type="hidden"
                name="csrf"
                value="<?= e($csrf) ?>"
            >

            <button
                type="submit"
                class="botao-secundario"
            >
                Excluir
            </button>

        </form>

    </li>

<?php endforeach; ?>

</ul>

<section class="banner">
    <div class="banner-texto">
        <h1>Seus direitos também existem no mundo digital!</h1>

        <p>
            Conheça seus direitos, descubra como se proteger
            e entenda a importância de uma internet mais segura
            para crianças e adolescentes.
        </p>

        <a href="<?= e(url('eca/index')) ?>" class="botao">
            Explore o site <i class="fa-solid fa-arrow-right"></i>
        </a>
    </div>

    <div class="banner-imagem">
        <img src="<?= e(asset('img/jovens.png')) ?>" alt="Jovens utilizando a internet">
    </div>
</section>

<section class="explorar">
    <h2>Explore nosso site:</h2>

    <div class="cards">
        <a href="<?= e(url('eca/index')) ?>" class="card">
            <i class="fa-solid fa-book-open"></i>
            <div>
                <h3>Conheça o ECA</h3>
                <p>Entenda a lei e seus direitos.</p>
            </div>
        </a>

        <a href="<?= e(url('seguranca/index')) ?>" class="card">
            <i class="fa-solid fa-shield-halved"></i>
            <div>
                <h3>Segurança Digital</h3>
                <p>Aprenda a navegar com segurança.</p>
            </div>
        </a>

        <a href="<?= e(url('responsaveis/index')) ?>" class="card">
            <i class="fa-solid fa-people-group"></i>
            <div>
                <h3>Para Responsáveis</h3>
                <p>Orientações para as famílias.</p>
            </div>
        </a>

        <a href="<?= e(url('ajuda/index')) ?>" class="card">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <div>
                <h3>Ajuda e Denúncias</h3>
                <p>Saiba onde buscar ajuda.</p>
            </div>
        </a>
    </div>
</section>

<section class="informacoes">
    <div class="protecao">
        <h2>Por que precisamos de proteção digital?</h2>

        <p>
            A internet oferece oportunidades, mas também apresenta riscos.
            Crianças e adolescentes precisam ter seus direitos respeitados
            também no ambiente virtual.
        </p>

        <a href="<?= e(url('seguranca/index')) ?>" class="botao">
            Saiba mais <i class="fa-solid fa-arrow-right"></i>
        </a>
    </div>

    <div class="login">
        <h2><i class="fa-solid fa-database"></i> Acesse nosso site</h2>

        <p>Faça login para consultar nossos conteúdos.</p>

        <form action="<?= e(url('user/login')) ?>" method="POST">
            <input type="text" name="usuario" placeholder="Usuário" required>
            <input type="password" name="senha" placeholder="Senha" required>

            <button type="submit" class="botao">Entrar</button>
            <a href="<?= e(url('user/create')) ?>" class="botao-secundario">Cadastrar-se</a>
        </form>

        <div class="visitante">
            <h3>Ou navegue sem login!</h3>
            <p>Explore o site e descubra mais sobre o ECA Digital.</p>
            <a href="<?= e(url('eca/index')) ?>" class="botao">Acessar como visitante</a>
        </div>
    </div>
</section>
