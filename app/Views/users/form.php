<a href="<?= e(url('user/login')) ?>">Já tenho uma conta. Entrar</a>

<h1><?= e($title) ?></h1>

<form method="POST" action="<?= e(url('user/store')) ?>">

    <input type="hidden" name="csrf"
           value="<?= e($csrf) ?>">

    <label>Nome completo</label>
    <input
        type="text"
        name="name"
        maxlength="100"
        required
        value="<?= e($old['name'] ?? '') ?>"
    >

    <?php if (isset($errors['name'])): ?>
        <p class="erro"><?= e($errors['name']) ?></p>
    <?php endif; ?>


    <label>E-mail</label>
    <input
        type="email"
        name="email"
        maxlength="150"
        required
        value="<?= e($old['email'] ?? '') ?>"
    >

    <?php if (isset($errors['email'])): ?>
        <p class="erro"><?= e($errors['email']) ?></p>
    <?php endif; ?>


    <label>Nome de usuário</label>
    <input
        type="text"
        name="login"
        minlength="4"
        maxlength="50"
        required
        value="<?= e($old['login'] ?? '') ?>"
    >

    <?php if (isset($errors['login'])): ?>
        <p class="erro"><?= e($errors['login']) ?></p>
    <?php endif; ?>


    <label>Senha</label>
    <input
        type="password"
        name="password"
        minlength="8"
        required
    >

    <?php if (isset($errors['password'])): ?>
        <p class="erro"><?= e($errors['password']) ?></p>
    <?php endif; ?>


    <button type="submit" class="botao">
        Cadastrar
    </button>

</form>