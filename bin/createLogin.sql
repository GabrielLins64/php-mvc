-- Create Login table
USE php_mvc;

CREATE TABLE contas
(
  id INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  senha VARCHAR(100) NOT NULL,
  nivel INT NOT NULL DEFAULT 0,
  PRIMARY KEY (id)
);

INSERT INTO contas (nome, email, senha) VALUES
(
  "Gabriel",
  "gabrielinsmelo@gmail.com",
  "$2y$10$aL8uFj9Kq456Mx0JgQir5.V/dtdZUtDy260XG9yWSIcQgEaJY0ciS",
  1
);
