<?php
namespace App\Models;

class User
{
    public static function all(): array
    {
        $sql = 'SELECT u.id_usuario AS id,
                       p.nome AS name,
                       p.email AS email
                FROM usuario u
                INNER JOIN pessoa p
                ON p.id_pessoa = u.id_pessoa
                ORDER BY p.nome';

        return Database::connect()->query($sql)->fetchAll();
    }

    public static function find(int $id): ?array
    {
        $stmt = Database::connect()->prepare(
            'SELECT u.id_usuario AS id,
                    p.nome AS name,
                    p.email AS email
             FROM usuario u
             INNER JOIN pessoa p
             ON p.id_pessoa = u.id_pessoa
             WHERE u.id_usuario = ?'
        );

        $stmt->execute([$id]);

        return $stmt->fetch() ?: null;
    }

    public static function emailExists(string $email): bool
    {
        $stmt = Database::connect()->prepare(
            'SELECT 1 FROM pessoa WHERE email = ?'
        );

        $stmt->execute([$email]);

        return (bool) $stmt->fetchColumn();
    }

    public static function loginExists(string $login): bool
    {
        $stmt = Database::connect()->prepare(
            'SELECT 1 FROM usuario WHERE login = ?'
        );

        $stmt->execute([$login]);

        return (bool) $stmt->fetchColumn();
    }

    public static function create(
        string $name,
        string $email,
        string $login,
        string $password
    ): int {
        $pdo = Database::connect();

        $pdo->beginTransaction();

        try {
            // Primeiro salva os dados pessoais
            $stmt = $pdo->prepare(
                'INSERT INTO pessoa (nome, email)
                 VALUES (?, ?)'
            );

            $stmt->execute([$name, $email]);

            $idPessoa = (int) $pdo->lastInsertId();

            // Depois salva o usuário vinculado à pessoa
            $stmt = $pdo->prepare(
                'INSERT INTO usuario (id_pessoa, login, senha)
                 VALUES (?, ?, ?)'
            );

            $senhaCriptografada = password_hash(
                $password,
                PASSWORD_DEFAULT
            );

            $stmt->execute([
                $idPessoa,
                $login,
                $senhaCriptografada
            ]);

            $idUsuario = (int) $pdo->lastInsertId();

            $pdo->commit();

            return $idUsuario;

        } catch (\Throwable $e) {
            if ($pdo->inTransaction()) {
                $pdo->rollBack();
            }

            throw $e;
        }
    }

    // Procura o usuário pelo login
    public static function findByLogin(string $login): ?array
    {
        $stmt = Database::connect()->prepare(
            'SELECT u.id_usuario AS id,
                    u.login,
                    u.senha,
                    p.nome AS name,
                    p.email AS email
             FROM usuario u
             INNER JOIN pessoa p
             ON p.id_pessoa = u.id_pessoa
             WHERE u.login = ?
             LIMIT 1'
        );

        $stmt->execute([$login]);

        return $stmt->fetch() ?: null;
    }
}