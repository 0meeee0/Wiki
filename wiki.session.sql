-- Create a new database
DROP DATABASE IF EXISTS wiki;
CREATE DATABASE wiki;
USE wiki;

-- Table: users
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('auteur', 'admin') NOT NULL
);

-- Table: categories
CREATE TABLE categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(50) NOT NULL
);

-- Table: tags
CREATE TABLE tags (
    tag_id INT AUTO_INCREMENT PRIMARY KEY,
    tag_name VARCHAR(50) NOT NULL
);

-- Table: wikis
CREATE TABLE wikis (
    wiki_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    category_id INT,
    title VARCHAR(100) NOT NULL,
    content TEXT NOT NULL,
    date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    archived BOOLEAN DEFAULT 0,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (category_id) REFERENCES categories(category_id)
);

-- Table: wiki_tags (Many-to-Many Relationship between wikis and tags)
CREATE TABLE wiki_tags (
    wiki_id INT,
    tag_id INT,
    PRIMARY KEY (wiki_id, tag_id),
    FOREIGN KEY (wiki_id) REFERENCES wikis(wiki_id),
    FOREIGN KEY (tag_id) REFERENCES tags(tag_id)
);

-- Insert random values into categories table
INSERT INTO categories (category_name) VALUES
    ('Technology'),
    ('Science'),
    ('History'),
    ('Art');

-- Insert random values into wikis table
INSERT INTO wikis (user_id, category_id, title, content, date_created, archived) VALUES
    (1, 1, 'Introduction to Programming', 'Lorem Ipsum is simply dummy text of the printing...', '2024-01-09 12:00:00', 0),
    (2, 2, 'The Theory of Relativity', 'Albert Einstein revolutionized our understanding of...', '2024-01-10 14:30:00', 0),
    (3, 3, 'Ancient Rome', 'The history of Ancient Rome spans a millennium...', '2024-01-11 09:45:00', 1),
    (4, 4, 'Impressionist Art Movement', 'Impressionism was an art movement that emerged in the late 19th century...', '2024-01-12 16:20:00', 0);

-- Insert random values into tags table
INSERT INTO tags (tag_name) VALUES
    ('Programming'),
    ('Physics'),
    ('History'),
    ('Art');

