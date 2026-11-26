<?php

class Post
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function listar()
    {
        $sql = "SELECT post.*, usuario.nome
                FROM post
                INNER JOIN usuario
                ON post.usuario_id = usuario.id
                ORDER BY post.data_criacao DESC";

        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscar($id)
    {
        $sql = "SELECT * FROM post WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function cadastrar($usuario, $titulo, $conteudo)
    {
        $sql = "INSERT INTO post
                (usuario_id, titulo, conteudo)
                VALUES (?, ?, ?)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $usuario,
            $titulo,
            $conteudo
        ]);
    }

    public function editar($id, $titulo, $conteudo)
    {
        $sql = "UPDATE post
                SET titulo = ?, conteudo = ?
                WHERE id = ?";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $titulo,
            $conteudo,
            $id
        ]);
    }

    public function excluir($id)
    {
        $sql = "DELETE FROM post WHERE id = ?";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([$id]);
    }
}