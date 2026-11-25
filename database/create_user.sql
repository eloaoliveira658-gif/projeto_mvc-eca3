-- Execute com uma conta administrativa, apenas na configuração inicial.
CREATE USER 'projeto_eca'@'localhost'
  IDENTIFIED BY 'senha_segura';
GRANT SELECT, INSERT, UPDATE, DELETE ON projeto_eca.*
  TO 'projeto_eca'@'localhost';
