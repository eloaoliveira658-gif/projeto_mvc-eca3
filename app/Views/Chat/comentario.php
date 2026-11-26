<div class="chat-container">

    <a href="<?= e(url('chat/index')) ?>">
        ← Voltar ao Chat
    </a>

    <div class="post-card">

        <h2><?= htmlspecialchars($post['titulo']) ?></h2>

        <p>
            <?= nl2br(htmlspecialchars($post['conteudo'])) ?>
        </p>

    </div>

    <h2>Comentários</h2>

    <?php foreach ($comentarios as $c): ?>

        <div class="comentario-card">

            <strong>
                <?= htmlspecialchars($c['nome']) ?>
            </strong>

            <p>
                <?= nl2br(htmlspecialchars($c['conteudo'])) ?>
            </p>

            <?php if (
                !empty($_SESSION['usuario_id']) &&
                $_SESSION['usuario_id'] == $c['usuario_id']
            ): ?>

                <form action="<?= e(url('chat/excluirComentario')) ?>"
                      method="POST">

                    <input type="hidden"
                           name="id"
                           value="<?= (int)$c['id'] ?>">

                    <input type="hidden"
                           name="post_id"
                           value="<?= (int)$post['id'] ?>">

                    <button type="submit">Excluir comentário</button>

                </form>

            <?php endif; ?>

        </div>

    <?php endforeach; ?>

    <?php if (!empty($_SESSION['usuario_id'])): ?>

        <form action="<?= e(url('chat/comentar')) ?>"
              method="POST"
              class="form-publicacao">

            <input type="hidden"
                   name="post_id"
                   value="<?= (int)$post['id'] ?>">

            <textarea
                name="conteudo"
                placeholder="Escreva seu comentário..."
                required
            ></textarea>

            <button type="submit">Enviar comentário</button>

        </form>

    <?php else: ?>

        <p>Faça login para comentar.</p>

    <?php endif; ?>

</div>