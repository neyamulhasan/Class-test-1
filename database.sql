CREATE DATABASE IF NOT EXISTS todo_app;
USE todo_app;

CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    status ENUM('pending', 'done') DEFAULT 'pending',
    tags VARCHAR(255),
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



CREATE DATABASE IF NOT EXISTS todo_app;
USE todo_app;

-- Predefined tags table
CREATE TABLE IF NOT EXISTS predefined_tags (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tag_name VARCHAR(50) NOT NULL UNIQUE
);

-- Insert predefined tags
INSERT IGNORE INTO predefined_tags (tag_name) VALUES 
('work'), ('personal'), ('urgent'), ('shopping'), ('study'), ('health'), ('family');

-- Tasks table
CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    status ENUM('pending', 'done') DEFAULT 'pending',
    tag_id INT,
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (tag_id) REFERENCES predefined_tags(id)
);
