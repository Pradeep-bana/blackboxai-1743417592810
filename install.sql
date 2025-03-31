CREATE DATABASE IF NOT EXISTS voicechat;
USE voicechat;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    profile_image VARCHAR(255) DEFAULT 'https://images.pexels.com/photos/736716/pexels-photo-736716.jpeg',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);