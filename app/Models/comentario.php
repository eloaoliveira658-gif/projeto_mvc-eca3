<?php

class Comentario
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function listarPorPost($postId)
    {
        $sql = "SELECT comentario.*, usuario.nome
                FROM comentario
                INNER JOIN usuario
                ON comentario.usuario_id = usuario.id
                WHERE comentario.post_id = ?
                ORDER BY comentario.data_criacao ASC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$postId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cadastrar($post, $usuario, $conteudo)
    {
        $sql = "INSERT INTO comentario
                (post_id, usuario_id, conteudo)
                VALUES (?, ?, ?)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $post,
            $usuario,
            $conteudo
        ]);
    }

    public function editar($id, $conteudo, $usuario)
    {
        $sql = "UPDATE comentario
                SET conteudo = ?
                WHERE id = ? AND usuario_id = ?";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $conteudo,
            $id,
            $usuario
        ]);
    }

    public function excluir($id, $usuario)
    {
        $sql = "DELETE FROM comentario
                WHERE id = ? AND usuario_id = ?";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([$id, $usuario]);
    }
}