CREATE DATABASE IF NOT EXISTS aastu_info;

USE aastu_info;

CREATE TABLE IF NOT EXISTS roles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    -- Store hashed passwords securely
    password VARCHAR(255) NOT NULL,
    profile_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- User ↔ Role (many-to-many)
CREATE TABLE IF NOT EXISTS user_roles (
    user_id INT NOT NULL,
    role_id INT NOT NULL,
    PRIMARY KEY (user_id, role_id),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS university (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    location TEXT NOT NULL,
    founded_year INT,
    description TEXT,
    contact_email VARCHAR(100),
    website_url VARCHAR(255),
    image_url VARCHAR(255) -- University logo or image
);

CREATE TABLE IF NOT EXISTS clubs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    contact_email VARCHAR(100),
    image_url VARCHAR(255),
    -- Club logo or image
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS blocks (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    location VARCHAR(255),
    office_email VARCHAR(100),
    image_url VARCHAR(255),
    -- Block/building image
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS admissions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    program_name VARCHAR(100) NOT NULL,
    requirements TEXT NOT NULL,
    deadline DATE,
    application_link VARCHAR(255),
    contact_email VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS academics (
    id INT PRIMARY KEY AUTO_INCREMENT,
    faculty_name VARCHAR(100) NOT NULL,
    department_name VARCHAR(100),
    description TEXT,
    contact_email VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS tags (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS academic_tags (
    academic_id INT NOT NULL,
    tag_id INT NOT NULL,
    PRIMARY KEY (academic_id, tag_id),
    FOREIGN KEY (academic_id) REFERENCES academics(id) ON DELETE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES tags(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS posts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    published_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    user_id INT NOT NULL,
    image_url VARCHAR(255),
    -- Post feature image
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);