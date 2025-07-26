CREATE DATABASE IF NOT EXISTS brownies_shop;
USE brownies_shop;

CREATE TABLE contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    message TEXT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE activity_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    activity_type ENUM('login','logout') NOT NULL,
    activity_time DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE history_transaksi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    order_id INT NOT NULL,
    product VARCHAR(255) NOT NULL,
    quantity INT NOT NULL,
    price INT NOT NULL,
    order_date DATETIME NOT NULL
);

CREATE TABLE admin_users (
    id INT(11) NOT NULL AUTO_INCREMENT,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE categories (
    id INT(11) NOT NULL AUTO_INCREMENT,
    nama_kategori VARCHAR(100) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE orders (
    id INT(11) NOT NULL AUTO_INCREMENT,
    nama VARCHAR(100) NOT NULL,
    alamat TEXT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

CREATE TABLE order_items (
    id INT(11) NOT NULL AUTO_INCREMENT,
    order_id INT(11) NOT NULL,
    produk VARCHAR(100) NOT NULL,
    jumlah INT(11) NOT NULL,
    harga DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE
);

CREATE TABLE pesanan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    alamat TEXT,
    produk VARCHAR(100),
    jumlah INT
);

CREATE TABLE products (
    id INT(11) NOT NULL AUTO_INCREMENT,
    nama VARCHAR(100) NOT NULL,
    harga DECIMAL(10,2) NOT NULL,
    stok INT(11) NOT NULL,
    kategori_id INT(11),
    deskripsi TEXT,
    gambar VARCHAR(255),
    PRIMARY KEY (id),
    FOREIGN KEY (kategori_id) REFERENCES categories(id) ON DELETE SET NULL
);

CREATE TABLE user_profiles (
    id INT(11) NOT NULL AUTO_INCREMENT,
    user_id INT(11) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    alamat TEXT,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);