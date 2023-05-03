CREATE TABLE IF NOT EXISTS Orders(
    id int AUTO_INCREMENT PRIMARY KEY,
    user_id int,
    payment_method VARCHAR(50),
    money_received VARCHAR(100),
    address varchar(255),
    total_price int,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(id)
)