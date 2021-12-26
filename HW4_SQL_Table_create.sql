CREATE TABLE customers
(
    id      INT NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(32),
    last_name  VARCHAR(32),
    primary key (id)
) CHARACTER set utf8;

INSERT INTO customers (id, first_name, last_name)
VALUES (
    1,
    'Mikhail',
    'Kurzin'
  );


CREATE TABLE `GB`.`order`
(
    id      INT NOT NULL AUTO_INCREMENT,
    customer_id int,
    created_at datetime default now(),
    primary key (id)
) CHARACTER set utf8;


CREATE TABLE book
(
    id      INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(255),
    page_count int,
    primary key (id)
) CHARACTER set utf8;

CREATE TABLE author
(
    id      INT NOT NULL AUTO_INCREMENT,
    author VARCHAR(64),
    primary key (id)
) CHARACTER set utf8;

CREATE TABLE author_to_book
(
    id      INT NOT NULL AUTO_INCREMENT,
    book_id INT,
    author_id INT,
    primary key (id)
) CHARACTER set utf8;

CREATE TABLE book_to_order
(
    id      INT NOT NULL AUTO_INCREMENT,
    order_id INT,
    book_id INT,
    quantity INT,
    primary key (id)
) CHARACTER set utf8;

CREATE TABLE address
(
    id      INT NOT NULL AUTO_INCREMENT,
    customer_id INT,
    country VARCHAR(64),
    city VARCHAR(64),
    address VARCHAR(64),
    primary key (id)
) CHARACTER set utf8;

CREATE TABLE phones
(
    id      INT NOT NULL AUTO_INCREMENT,
    customer_id INT,
    phone VARCHAR(16),
    primary key (id)
) CHARACTER set utf8;

SELECT customers.id,
    `order`.id as order_id,
    book.id as book_id,
    book.title,
    book.page_count,
    book_to_order.quantity,
    `order`.created_at,
    author.author
from customers
    inner join `order` on customers.id = `order`.customer_id
    join book_to_order on book_to_order.order_id = `order`.id
    join book on book.id = book_to_order.book_id
    join author_to_book on author_to_book.book_id = book.id
    join author on author.id = author_to_book.author_id
WHERE 1
    and book.id = 2;

select * 
from `order`
where date(created_at) BETWEEN date('2021-12-26') and date('2021-12-27')