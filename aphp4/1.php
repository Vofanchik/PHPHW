<?php
include "2.php";

$pdo = new PDO("sqlite:./database.db");

$sql = [
    'CREATE TABLE IF NOT EXISTS shop (
        id INTEGER PRIMARY KEY,
        name TEXT,
        address TEXT
    )',

    'CREATE TABLE IF NOT EXISTS product (
        id INTEGER PRIMARY KEY,
        name TEXT,
        price REAL,
        count INTEGER,
        shop_id INTEGER,
        FOREIGN KEY (shop_id) REFERENCES shop(id)
    )',

    'CREATE TABLE IF NOT EXISTS order_table (
        id INTEGER PRIMARY KEY,
        created_at DATETIME,
        shop_id INTEGER,
        client_id Integer,
        FOREIGN KEY (shop_id) REFERENCES shop(id),
        FOREIGN KEY (client_id) REFERENCES client(id)
    )',

    'CREATE TABLE IF NOT EXISTS order_product (
        order_id INTEGER,
        product_id INTEGER,
        quantity INTEGER,
        price REAL,
        FOREIGN KEY (order_id) REFERENCES order_table(id),
        FOREIGN KEY (product_id) REFERENCES product(id)
    )',

    'CREATE TABLE IF NOT EXISTS client (
        id INTEGER PRIMARY KEY,
        name TEXT,
        phone TEXT,
        birthdate DATE
    )',

    'INSERT INTO shop (name, address) VALUES
        ("Магазин 1", "ул. Пушкина, 1"),
        ("Магазин ", "ул. Лермонтова, 2"),
        ("Магазин 3", "ул. Тургенева, 3");',
        

    "INSERT INTO product (name, price, count, shop_id) VALUES
        ('Товар 1', 10.99, 100, 1),
        ('Товар 2', 20.99, 50, 1),
        ('Товар 3', 5.99, 200, 2),
        ('Товар 4', 15.99, 75, 2),
        ('Товар 5', 7.99, 150, 3),
        ('Товар 6', 12.99, 100, 3)",

    "INSERT INTO order_table (created_at, shop_id, client_id) VALUES
        ('2023-04-11 10:00:00', 1, 1),
        ('2023-04-11 11:00:00', 2, 2),
        ('2023-04-11 12:00:00', 3, 3);",

    "INSERT INTO order_product (order_id, product_id, quantity, price) VALUES
        (1, 1, 2, 10.99),
        (1, 2, 1, 20.99),
        (2, 3, 3, 5.99),
        (2, 4, 2, 15.99),
        (3, 5, 4, 7.99),
        (3, 6, 1, 12.99);",

    "INSERT INTO client (name, phone, birthdate) VALUES
        ('Иванов Иван', '+7(123)456-78-90', '1990-01-01'),
        ('Сидоров Сидор', '+7(987)654-32-10', '1985-02-02'),
        ('Петров Петр', '+7(111)222-33-44', '2000-03-03');"] ;

foreach ($sql as $command) {
    $pdo->exec($command);
}




// $shop = new Shop($pdo);
// $shop->insert(['name', 'address'], ['Магазин 4', 'ул. Колотушкина 4']) ;
// $shop->update(2, ['name'=> 'Shop']) ;
// $shop->delete(1);
// echo implode(",", $shop->find(3));
// echo $shop->get(["name"=>"Магазин 3"])[0]["address"];

// $prod = new Product($pdo);
// echo $prod->get(["name"=>"Товар 3"])[0]["price"];
// echo implode(",", $prod->find(3));