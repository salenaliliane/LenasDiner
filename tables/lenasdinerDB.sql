CREATE TABLE users (
		user_id INT(11) NOT NULL auto_increment PRIMARY KEY, 
        user_first VARCHAR(40), 
        user_last VARCHAR(40), 
        user_email VARCHAR(40), 
        user_uid VARCHAR(40), 
        user_pwd VARCHAR(40)
);

CREATE TABLE products (
	product_id INT(2) NOT NULL auto_increment PRIMARY KEY, 
    product_name VARCHAR(40), 
	price DECIMAL(10,2), 
    image VARCHAR(40), 
    item VARCHAR(40), 
    color VARCHAR(40)
);

INSERT INTO products VALUES
	("Purple Cover", 10.99, "purple-cover.jpg", "Cover", "Purple"),
    ("Yellow Cover", 10.99, "yellow-cover.jpg", "Cover", "Yellow"),
    ("Green Cover", 10.99, "green-cover.jpg", "Cover", "Green"),
    ("Blue Cover", 10.99, "blue-cover.jpg", "Cover", "Blue"),
    ("Pink Cover", 10.99, "pink-cover.jpg", "Cover", "Pink"),
    ("Orange Cover", 10.99, "orange-cover.jpg", "Cover", "Orange"),
	("Purple Crockpot", 12.99, "purple-crockpot.jpg", "Crockpot", "Purple"),
    ("Yellow Crockpot", 12.99, "yellow-crockpot.jpg", "Crockpot", "Yellow"),
    ("Green Crockpot", 12.99, "green-crockpot.jpg", "Crockpot", "Green"),
    ("Blue Crockpot", 12.99, "blue-crockpot.jpg", "Crockpot", "Blue"),
    ("Pink Crockpot", 12.99, "pink-crockpot.jpg", "Crockpot", "Pink"),
    ("Orange Crockpot", 12.99, "orange-crockpot.jpg", "Crockpot"),
    ("Purple Kettle", 11.99, "purple-kettle.jpg", "Kettle", "Purple"),
    ("Yellow Kettle", 11.99, "yellow-kettle.jpg", "Kettle", "Yellow"),
    ("Green Kettle", 11.99, "green-kettle.jpg", "Kettle", "Green"),
    ("Blue Kettle", 11.99, "blue-kettle.jpg", "Kettle", "Blue"),
    ("Pink Kettle", 11.99, "pink-kettle.jpg", "Kettle", "Pink"),
    ("Orange Kettle", 11.99, "orange-kettle.jpg", "Kettle", "Orange"),
    ("Purple Ladel", 11.99, "purple-ladel.jpg", "Ladel", "Purple"),
    ("Yellow Ladel", 11.99, "yellow-ladel.jpg", "Ladel", "Yellow"),
    ("Green Ladel", 11.99, "green-ladel.jpg", "Ladel", "Green"),
    ("Blue Ladel", 11.99, "blue-ladel.jpg", "Ladel", "Blue"),
    ("Pink Ladel", 11.99, "pink-ladel.jpg", "Ladel", "Pink"),
    ("Orange Ladel", 11.99, "orange-ladel.jpg", "Ladel", "Orange"),
    ("Purple Plate", 10.99, "purple-plate.jpg", "Plate", "Purple"),
    ("Yellow Plate", 10.99, "yellow-plate.jpg", "Plate", "Yellow"),
    ("Green Plate", 10.99, "green-plate.jpg", "Plate", "Green"),
    ("Blue Plate", 10.99, "blue-plate.jpg", "Plate", "Blue"),
    ("Pink Plate", 10.99, "pink-plate.jpg", "Plate", "Pink"),
    ("Orange Plate", 10.99, "orange-plate.jpg", "Plate", "Orange"),
    ("Purple Pot", 12.99, "purple-pot.jpg", "Pot", "Purple"),
    ("Yellow Pot", 12.99, "yellow-pot.jpg", "Pot", "Yellow"),
    ("Green Pot", 12.99, "green-pot.jpg", "Pot", "Green"),
    ("Blue Pot", 12.99, "blue-pot.jpg", "Pot", "Blue"),
    ("Pink Pot", 12.99, "pink-pot.jpg", "Pot", "Pink"),
    ("Orange Pot", 12.99, "orange-pot.jpg", "Pot", "Orange");
    
CREATE TABLE orders (
	order_id INT(11) NOT NULL auto_increment PRIMARY KEY, 
    user_id INT(11), 
    sale_date DATE,
    price_total DECIMAL(10,2), 
    tax DECIMAL(10,2), 
    sale_total DECIMAL(10,2), 
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

CREATE TABLE cart_items (
	order_id INT(11), 
    product_id INT(11), 
    product_count INT(11),
    FOREIGN KEY (order_id) REFERENCES orders(order_id),
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);