CREATE TABLE IF NOT EXISTS Cart(
    id int AUTO_INCREMENT PRIMARY  KEY,
    item_id int,
    user_id int,
    unit_price int,
    desired_quantity int DEFAULT 1,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
    check (desired_quantity > 0),
    check (unit_price >= 0), -- don't allow negative costs
    FOREIGN KEY (`user_id`) REFERENCES Users(`id`),
    FOREIGN KEY (`item_id`) REFERENCES Items(`id`)
    
)