CREATE DATABASE db_toko;

USE db_toko;

CREATE TABLE produk (
    id_produk INT PRIMARY KEY AUTO_INCREMENT,
    nama_produk VARCHAR(100),
    harga INT,
    stok INT
);
