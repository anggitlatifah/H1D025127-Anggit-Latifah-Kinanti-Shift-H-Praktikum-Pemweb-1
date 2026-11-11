CREATE DATABASE IF NOT EXISTS modul_6
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE modul_6;

CREATE TABLE IF NOT EXISTS posts (
    id INT(11) NOT NULL AUTO_INCREMENT,
    judul VARCHAR(100) NOT NULL,
    konten VARCHAR(1000) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB;

ALTER TABLE posts
    MODIFY konten VARCHAR(1000) NOT NULL;

-- Tiga contoh post, masing-masing terdiri dari dua paragraf.
INSERT INTO posts (judul, konten)
SELECT
    'Starlink is getting daytime data caps',
    'Starlink mengumumkan kebijakan data baru untuk layanan internet satelitnya. Perubahan ini menjadi perhatian pelanggan di berbagai wilayah.\n\nPelanggan dapat memeriksa rincian kebijakan dan penggunaan data melalui akun layanan masing-masing.'
WHERE NOT EXISTS (SELECT 1 FROM posts);

INSERT INTO posts (judul, konten)
SELECT
    'With Netflix ads tier, you never know what you are going to get',
    'Paket beriklan Netflix menawarkan pilihan berlangganan dengan harga lebih terjangkau. Pengguna akan melihat iklan selama menonton beberapa judul.\n\nKatalog dan pengalaman menonton dapat berbeda berdasarkan wilayah serta ketersediaan konten.'
WHERE (SELECT COUNT(*) FROM posts) = 1;

INSERT INTO posts (judul, konten)
SELECT
    'Twitter Blue with verification is coming soon on iOS',
    'Layanan berlangganan Twitter Blue memperkenalkan fitur tambahan untuk pengguna. Ketersediaan fitur dapat berubah sesuai platform dan wilayah.\n\nPengguna disarankan memeriksa informasi terbaru langsung pada aplikasi sebelum berlangganan.'
WHERE (SELECT COUNT(*) FROM posts) = 2;