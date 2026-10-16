-- Modelo de banco para Arranjo de Oradores
-- Importante: este arquivo NÃO contém dados reais (apenas exemplo)
-- Senha exemplo: "mudar123" (hash abaixo para referência)

CREATE DATABASE IF NOT EXISTS arranjo_oradores CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE arranjo_oradores;

CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  login VARCHAR(50) NOT NULL UNIQUE,
  senha VARCHAR(255) NOT NULL,
  precisa_alterar TINYINT(1) DEFAULT 1
) ENGINE=InnoDB;

-- Exemplo de usuário admin (senha: mudar123 — hash gerado com password_hash)
INSERT INTO usuarios (login, senha, precisa_alterar) VALUES (
  'admin',
  '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoSqxUtl3F7iXy1D0QZ3qX7iB9yKk0Zl2zXvL',
  1
);

CREATE TABLE oradores_enviaremos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  congregacao VARCHAR(100),
  orador VARCHAR(100),
  tema VARCHAR(255),
  data DATE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE oradores_receberemos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  congregacao VARCHAR(100),
  orador VARCHAR(100),
  tema VARCHAR(255),
  data DATE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;
