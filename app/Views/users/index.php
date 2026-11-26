<a href="<?= e(url('perfil')) ?>">perfil</a>

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


