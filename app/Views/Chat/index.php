<div class="chat-container">

    <div class="chat-cabecalho">
        <h1>Chat ECA Digital</h1>
        <p>Compartilhe ideias, dúvidas e informações.</p>
    </div>

    <?php if (!empty($_SESSION['usuario_id'])): ?>

        <form action="<?= e(url('chat/publicar')) ?>"
              method="POST"
              class="form-publicacao">

            <h2>Criar publicação</h2>

            <input
                type="text"
                name="titulo"
                placeholder="Título da publicação"
                maxlength="150"
                required
            >

            <textarea
                name="conteudo"
                placeholder="O que você gostaria de compartilhar?"
                required
            ></textarea>

            <button type="submit">Publicar</button>

        </form>

    <?php else: ?>

        <p>Faça login para publicar e comentar.</p>

    <?php endif; ?>

    <h2>Publicações recentes</h2>

    <?php if (!empty($posts)): ?>

        <?php foreach ($posts as $p): ?>

            <div class="post-card">

                <h3>
                    <?= htmlspecialchars($p['titulo']) ?>
                </h3>

                <p>
                    <?= nl2br(htmlspecialchars($p['conteudo'])) ?>
                </p>

                <small>
                    Publicado por:
                    <?= htmlspecialchars($p['nome']) ?>
                </small>

                <div class="post-acoes">

                    <a href="<?= e(url('chat/comentarios?id=' . $p['id'])) ?>">
                        Ver comentários
                    </a>

                    <?php if (
                        !empty($_SESSION['usuario_id']) &&
                        $_SESSION['usuario_id'] == $p['usuario_id']
                    ): ?>

                        <form action="<?= e(url('chat/excluirPost')) ?>"
                              method="POST"
                              onsubmit="return confirm('Deseja excluir esta publicação?')">

                            <input type="hidden"
                                   name="id"
                                   value="<?= (int)$p['id'] ?>">

                            <button type="submit">Excluir</button>

                        </form>

                    <?php endif; ?>

                </div>

            </div>

        <?php endforeach; ?>

    <?php else: ?>

        <p>Ainda não existem publicações.</p>

    <?php endif; ?>

</div>