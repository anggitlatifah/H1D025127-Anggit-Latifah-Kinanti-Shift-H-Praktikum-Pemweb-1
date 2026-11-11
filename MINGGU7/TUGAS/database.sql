CREATE DATABASE IF NOT EXISTS cod_barang;
USE cod_barang;

-- Tabel 1: barang (id, nama, harga)
CREATE TABLE IF NOT EXISTS `barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100),
  `harga` int(11),
  PRIMARY KEY (`id`)
);

-- Tabel 2: pembeli (id, nama, nomor hp, alamat)
CREATE TABLE IF NOT EXISTS `pembeli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100),
  `nomor_hp` varchar(20),     -- nomor HP pakai varchar agar angka 0 di depan tidak hilang
  `alamat` varchar(255),
  PRIMARY KEY (`id`)
);

-- Tabel 3: kurir (id, nama, nomor hp)
CREATE TABLE IF NOT EXISTS `kurir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100),
  `nomor_hp` varchar(20),
  PRIMARY KEY (`id`)
);

INSERT INTO barang (nama, harga) VALUES ('Gergaji', 85000), ('Pulpen', 3000), ('Laptop', 7500000);
INSERT INTO pembeli (nama, nomor_hp, alamat) VALUES
 ('Muflih', '081234567801', 'Purwokerto'),
 ('Romi',   '081234567802', 'Bogor'),
 ('Anin',   '081234567803', 'Banyumas');
INSERT INTO kurir (nama, nomor_hp) VALUES
 ('Althaaf', '085100000001'),
 ('Irsyad',  '085100000002'),
 ('Ilhan',   '085100000003');