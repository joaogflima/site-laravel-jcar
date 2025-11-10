/* =========================================================
   SEED INICIAL – Projeto Laravel Veículos
   Tabelas: cores, marcas, modelos, veiculos, users (Laravel)
   Observações:
   - Execute com o banco de dados "jcar" criado
   ========================================================= */

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;


SET FOREIGN_KEY_CHECKS = 1;

START TRANSACTION;


INSERT INTO cores (nome) VALUES
('Preto'),
('Branco'),
('Prata'),
('Vermelho'),
('Azul'),
('Cinza'),
('Verde');


INSERT INTO marcas (nome) VALUES
('Volkswagen'),
('Peugeot'),
('Honda'),
('Toyota'),
('Chevrolet'),
('Fiat'),
('Ford');


INSERT INTO modelos (nome, marca_id) VALUES
-- Volkswagen
('Golf GTI',   (SELECT id FROM marcas WHERE nome = 'Volkswagen')),
('Polo',       (SELECT id FROM marcas WHERE nome = 'Volkswagen')),

-- Peugeot
('2008',       (SELECT id FROM marcas WHERE nome = 'Peugeot')),
('208',        (SELECT id FROM marcas WHERE nome = 'Peugeot')),

-- Honda
('Civic',      (SELECT id FROM marcas WHERE nome = 'Honda')),
('HR-V',       (SELECT id FROM marcas WHERE nome = 'Honda')),

-- Toyota
('Corolla',    (SELECT id FROM marcas WHERE nome = 'Toyota')),
('Yaris',      (SELECT id FROM marcas WHERE nome = 'Toyota')),

-- Chevrolet
('Onix',       (SELECT id FROM marcas WHERE nome = 'Chevrolet')),
('Tracker',    (SELECT id FROM marcas WHERE nome = 'Chevrolet')),

-- Fiat
('Argo',       (SELECT id FROM marcas WHERE nome = 'Fiat')),
('Pulse',      (SELECT id FROM marcas WHERE nome = 'Fiat')),

-- Ford
('Ranger',     (SELECT id FROM marcas WHERE nome = 'Ford')),
('Ka',         (SELECT id FROM marcas WHERE nome = 'Ford'));


INSERT INTO veiculos
(modelo_id, cor_id, ano, quilometragem, valor, detalhes, imagem1, imagem2, imagem3)
VALUES
(
  (SELECT m.id FROM modelos m JOIN marcas ma ON ma.id = m.marca_id
   WHERE m.nome='Golf GTI' AND ma.nome='Volkswagen'),
  (SELECT id FROM cores WHERE nome='Cinza'),
  2021, 35000, 189900.00,
  'Volkswagen Golf GTI 2.0 TSI, pacote esportivo, manutenção em dia.',
  'https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202507/20250725/volkswagen-golf-2-0-350-tsi-gasolina-gti-dsg-wmimagem18452050438.webp?s=fill&w=1920&h=1440&q=75',
  'https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202507/20250725/volkswagen-golf-2-0-350-tsi-gasolina-gti-dsg-wmimagem18452072964.webp?s=fill&w=1920&h=1440&q=75',
  'https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202507/20250725/volkswagen-golf-2-0-350-tsi-gasolina-gti-dsg-wmimagem18452086817.webp?s=fill&w=1920&h=1440&q=75'
),

(
  (SELECT m.id FROM modelos m JOIN marcas ma ON ma.id = m.marca_id
   WHERE m.nome='2008' AND ma.nome='Peugeot'),
  (SELECT id FROM cores WHERE nome='Prata'),
  2022, 22000, 114900.00,
  'Peugeot 2008 1.6, multimídia, câmera de ré, IPVA pago.',
  'https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202511/20251108/peugeot-2008-1-6-16v-flex-allure-business-4p-automatico-wmimagem23020453435.webp?s=fill&w=1920&h=1440&q=75',
  'https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202511/20251108/peugeot-2008-1-6-16v-flex-allure-business-4p-automatico-wmimagem23020478927.webp?s=fill&w=1920&h=1440&q=75',
  'https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202511/20251108/peugeot-2008-1-6-16v-flex-allure-business-4p-automatico-wmimagem23020495039.webp?s=fill&w=1920&h=1440&q=75'
),

(
  (SELECT m.id FROM modelos m JOIN marcas ma ON ma.id = m.marca_id
   WHERE m.nome='Civic' AND ma.nome='Honda'),
  (SELECT id FROM cores WHERE nome='Branco'),
  2020, 42000, 124900.00,
  'Honda Civic Touring 1.5 turbo, piloto automático adaptativo, revisões na concessionária.',
  'https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202509/20250908/honda-civic-2.4-si-16v-gasolina-2p-manual-wmimagem10091698621.jpg?s=fill&w=1920&h=1440&q=75',
  'https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202509/20250908/honda-civic-2.4-si-16v-gasolina-2p-manual-wmimagem10091807723.jpg?s=fill&w=1920&h=1440&q=75',
  'https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202509/20250908/honda-civic-2.4-si-16v-gasolina-2p-manual-wmimagem10091907835.jpg?s=fill&w=1920&h=1440&q=75'
),

/* 4) Toyota Corolla – Preto */
(
  (SELECT m.id FROM modelos m JOIN marcas ma ON ma.id = m.marca_id
   WHERE m.nome='Corolla' AND ma.nome='Toyota'),
  (SELECT id FROM cores WHERE nome='Preto'),
  2021, 28000, 129900.00,
  'Toyota Corolla XEi 2.0, econômico, confiável, completo.',
  'https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202510/20251001/toyota-corolla-2.0-vvtie-flex-xei-direct-shift-wmimagem15011539192.jpg?s=fill&w=1920&h=1440&q=75',
  'https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202510/20251001/toyota-corolla-2.0-vvtie-flex-xei-direct-shift-wmimagem15011638344.jpg?s=fill&w=1920&h=1440&q=75',
  'https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202510/20251001/toyota-corolla-2.0-vvtie-flex-xei-direct-shift-wmimagem15011717688.jpg?s=fill&w=1920&h=1440&q=75'
),

(
  (SELECT m.id FROM modelos m JOIN marcas ma ON ma.id = m.marca_id
   WHERE m.nome='Onix' AND ma.nome='Chevrolet'),
  (SELECT id FROM cores WHERE nome='Vermelho'),
  2023, 8000, 89990.00,
  'Chevrolet Onix LT 1.0 turbo, MyLink, baixo consumo, único dono.',
  'https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202510/20251029/chevrolet-onix-1-0-turbo-flex-lt-automatico-wmimagem12154719643.webp?s=fill&w=1920&h=1440&q=75',
  'https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202510/20251029/chevrolet-onix-1-0-turbo-flex-lt-automatico-wmimagem12154745611.webp?s=fill&w=1920&h=1440&q=75',
  'https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202510/20251029/chevrolet-onix-1-0-turbo-flex-lt-automatico-wmimagem12154766622.webp?s=fill&w=1920&h=1440&q=75'
),

(
  (SELECT m.id FROM modelos m JOIN marcas ma ON ma.id = m.marca_id
   WHERE m.nome='Argo' AND ma.nome='Fiat'),
  (SELECT id FROM cores WHERE nome='Azul'),
  2022, 18000, 79990.00,
  'Fiat Argo Drive 1.3, central multimídia, sensor de ré.',
  'https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202511/20251103/fiat-argo-1.8-e.torq-flex-hgt-at6-wmimagem09565459519.jpg?s=fill&w=1920&h=1440&q=75',
  'https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202511/20251103/fiat-argo-1.8-e.torq-flex-hgt-at6-wmimagem09565178833.jpg?s=fill&w=1920&h=1440&q=75',
  'https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202511/20251103/fiat-argo-1.8-e.torq-flex-hgt-at6-wmimagem09565402226.jpg?s=fill&w=1920&h=1440&q=75'
),

(
  (SELECT m.id FROM modelos m JOIN marcas ma ON ma.id = m.marca_id
   WHERE m.nome='Ranger' AND ma.nome='Ford'),
  (SELECT id FROM cores WHERE nome='Cinza'),
  2019, 76000, 169900.00,
  'Ford Ranger Limited 3.2 4x4, capota marítima, estribo, revisões em dia.',
  'https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202511/20251103/ford-ranger-2.2-xls-4x2-cd-16v-diesel-4p-automatico-wmimagem10285854125.jpg?s=fill&w=1920&h=1440&q=75',
  'https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202511/20251103/ford-ranger-2.2-xls-4x2-cd-16v-diesel-4p-automatico-wmimagem10285958264.jpg?s=fill&w=1920&h=1440&q=75',
  'https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202511/20251103/ford-ranger-2.2-xls-4x2-cd-16v-diesel-4p-automatico-wmimagem10290051716.jpg?s=fill&w=1920&h=1440&q=75'
),

(
  (SELECT m.id FROM modelos m JOIN marcas ma ON ma.id = m.marca_id
   WHERE m.nome='Polo' AND ma.nome='Volkswagen'),
  (SELECT id FROM cores WHERE nome='Prata'),
  2022, 15000, 94990.00,
  'Volkswagen Polo 1.0 TSI, excelente consumo, multimídia.',
  'https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202510/20251006/volkswagen-polo-1.0-mpi-track-manual-wmimagem08312513562.jpg?s=fill&w=1920&h=1440&q=75',
  'https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202510/20251006/volkswagen-polo-1.0-mpi-track-manual-wmimagem08312625877.jpg?s=fill&w=1920&h=1440&q=75',
  'https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202510/20251006/volkswagen-polo-1.0-mpi-track-manual-wmimagem08312757610.jpg?s=fill&w=1920&h=1440&q=75'
);

INSERT INTO users (name, email, email_verified_at, password, remember_token, created_at, updated_at)
VALUES (
  'Admin',
  'admin@site.com',
  NOW(),
  -- Hash bcrypt de "password" padrão do Laravel:
  '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
  NULL,
  NOW(),
  NOW()
);

COMMIT;
