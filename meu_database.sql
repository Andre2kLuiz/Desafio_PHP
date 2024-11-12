CREATE TABLE associado (
    id INT AUTO_INCREMENT PRIMARY KEY,       -- Identificador único do associado
    nome VARCHAR(100) NOT NULL,               -- Nome do associado (da classe Pessoa)
    email VARCHAR(100) NOT NULL UNIQUE,       -- E-mail do associado (da classe Pessoa)
    data_filiacao DATE NOT NULL              -- Data de filiação do associado (da classe Associado)
);

CREATE TABLE anuidade (
    id INT AUTO_INCREMENT PRIMARY KEY,       -- Identificador único da anuidade
    ano INT NOT NULL,                        -- Ano da anuidade
    valor DECIMAL(10, 2) NOT NULL,           -- Valor da anuidade
    vencimento DATE NOT NULL,               -- Data de vencimento da anuidade
    associado_id INT NOT NULL,              -- ID do associado (chave estrangeira)
    FOREIGN KEY (associado_id) REFERENCES associado(id) ON DELETE CASCADE
);

CREATE TABLE pagamento (
    id INT AUTO_INCREMENT PRIMARY KEY,       -- Identificador único do pagamento
    associado_id INT NOT NULL,               -- ID do associado (chave estrangeira)
    anuidade_id INT NOT NULL,                -- ID da anuidade (chave estrangeira)
    pago BOOLEAN NOT NULL,                   -- Status do pagamento (TRUE ou FALSE)
    data_pagamento DATE,           -- Data do pagamento
    FOREIGN KEY (associado_id) REFERENCES associado(id) ON DELETE CASCADE,
    FOREIGN KEY (anuidade_id) REFERENCES anuidade(id) ON DELETE CASCADE
);
