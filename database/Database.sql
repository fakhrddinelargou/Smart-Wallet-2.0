
CREATE DATABASE smart_wallet_2;


CREATE TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(225) NOT NULL UNIQUE,
    password VARCHAR(225) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);
ALTER TABLE users
ADD full_name VARCHAR(100) NOT NULL AFTER id;




CREATE TABLE categories (
  id INT AUTO_INCREMENT PRIMARY KEY,
  fullName VARCHAR(100) NOT NULL,
  type ENUM('income','expense') NOT NULL
);

INSERT INTO categories (fullName, type) VALUES
('Shopping', 'expense'),
('Food', 'expense'),
('Transport', 'expense'),
('Salary', 'income'),
('Other', 'expense');


CREATE TABLE category_limit(
    id INT AUTO_INCREMENT PRIMARY KEY,
    limit_amount DECIMAL(10,2) NOT NULL ,
    month INT NOT NULL,
    year INT NOT NULL,
    user_id INT NOT NULL ,
    category_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (category_id) REFERENCES categories(id)
);



CREATE TABLE incomes(
    id INT AUTO_INCREMENT PRIMARY KEY , 
    amount DECIMAL(10,2) NOT NULL, 
    date DATE NOT NULL ,
    description VARCHAR(225) NOT NULL,
    user_id INT NOT NULL ,
    category_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

ALTER TABLE incomes
MODIFY category_id INT NULL;




CREATE TABLE expenses(
    id INT AUTO_INCREMENT PRIMARY KEY ,
    amount  DECIMAL(10,2) NOT NULL,
    date DATE NOT NULL,
    description VARCHAR(225) NOT NULL,
    user_id INT NOT NULL,
    category_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id ) REFERENCES users(id),
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

DROP TABLE expenses;

-- INSERT INTO users (email,password) VALUES ("fakhreddinelargou@gmail.com" , "123456789");
-- INSERT INTO users (email,password) VALUES ("redwan@gmail.com" , "rdwan");
-- INSERT INTO users (email,password) VALUES ("houssam@gmail.com" , "houssam");





-- DROP TABLE incomes;
USE smart_wallet_2;

