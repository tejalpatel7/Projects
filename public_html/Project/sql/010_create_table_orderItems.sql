CREATE TABLE IF NOT EXISTS OrderItems(
    id int AUTO_INCREMENT PRIMARY KEY,
    order_id int,
    item_id int,
    desired_quantity int DEFAULT  1,
    unit_price int,
    FOREIGN KEY (item_id) REFERENCES Products(id)
)