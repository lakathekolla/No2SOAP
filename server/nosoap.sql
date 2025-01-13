CREATE DATABASE IF NOT EXISTS no_nosoap;

USE no_nosoap;

CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL
);

-- Insert sample data
INSERT INTO products (title, description, price) VALUES
('Wireless Headphones', 'High-quality wireless over-ear headphones with noise cancellation.', 99.99),
('Gaming Mouse', 'Ergonomic gaming mouse with customizable RGB lighting.', 49.99),
('Smartphone Stand', 'Adjustable smartphone stand for hands-free viewing.', 14.99),
('Portable Charger', '10,000mAh portable charger with fast charging capabilities.', 29.99),
('Bluetooth Speaker', 'Compact and powerful Bluetooth speaker with excellent sound quality.', 59.99),
('4K Monitor', '27-inch 4K UHD monitor with HDR support for gaming and productivity.', 399.99),
('Mechanical Keyboard', 'RGB backlit mechanical keyboard with customizable keycaps.', 89.99),
('Smartwatch', 'Fitness-focused smartwatch with heart rate and sleep tracking.', 149.99),
('USB-C Hub', 'Multi-port USB-C hub with HDMI, USB-A, and SD card reader.', 39.99),
('Action Camera', 'Waterproof 4K action camera with wide-angle lens and Wi-Fi.', 199.99);
