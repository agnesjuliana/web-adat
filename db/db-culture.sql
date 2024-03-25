-- Create Users table
CREATE TABLE Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
);

-- Create Provinces table
CREATE TABLE Provinces (
    province_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

-- Create Categories table
CREATE TABLE Categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

-- Create CultureItems table
CREATE TABLE CultureItems (
    item_id INT AUTO_INCREMENT PRIMARY KEY,
    province_id INT NOT NULL,
    category_id INT NOT NULL,
    user_id INT NOT NULL,
    description TEXT,
    FOREIGN KEY (province_id) REFERENCES Provinces(province_id),
    FOREIGN KEY (category_id) REFERENCES Categories(category_id),
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);
