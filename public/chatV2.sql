CREATE DATABASE IF NOT EXISTS chatv2;

USE chatv2;

CREATE TABLE IF NOT EXISTS users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    number_phone INT(10) UNIQUE,
    password VARCHAR(300),
    avatar VARCHAR(300) NULL,
    status INT(1),
    created_at DATE,
    deleted_at DATE NULL,
    updated_at DATE,
    last_login DATE NULL
);

CREATE TABLE IF NOT EXISTS groups (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    avatar VARCHAR(300) NULL,
    created_at DATE,
    deleted_at DATE NULL,
    updated_at DATE
);

CREATE TABLE IF NOT EXISTS user_groups(
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    group_id INT,
    status INT(1),
    user_status INT(1),
    created_at DATE,
    deleted_at DATE NULL,
    updated_at DATE,

    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (group_id) REFERENCES groups(id)

);

CREATE TABLE IF NOT EXISTS messages(
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    group_id INT,
    status INT(1),
    content VARCHAR(1000) NULL,
    attachment VARCHAR(300) NULL,

    created_at DATE,
    deleted_at DATE NULL,
    updated_at DATE,

    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (group_id) REFERENCES groups(id)
);

CREATE TABLE IF NOT EXISTS user_messages(
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    message_id INT,
    is_seen INT(1),
    status INT(1),
    created_at DATE,
    deleted_at DATE NULL,
    updated_at DATE,

    FOREIGN KEY (user_id) REFERENCES users(id)
)
