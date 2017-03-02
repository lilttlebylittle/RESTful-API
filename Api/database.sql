
CREATE TABLE customers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(255) NOT NULL,
email VARCHAR(255) NOT NULL,
password VARCHAR(255),
profilename varchar(255)
)


INSERT INTO `customers` (`id`, `username`, `email`, `password`, `frofilename`) VALUES (NULL, 'john', 'johndoe@gmail.com', '123456', 'John Doe'), (NULL, 'marymoe', 'mary@yahoo.com', 'mary123', 'Mary Moe');