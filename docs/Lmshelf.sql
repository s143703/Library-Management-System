/* DATABASE */
CREATE DATABASE IF NOT EXISTS lmshelf;
USE lmshelf;




/* TABLE: users */
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    member_id VARCHAR(20) UNIQUE NOT NULL
);

INSERT INTO users (name, email, member_id) VALUES
('John Student', 'john@uni.edu', 's123456'),
('Sara Lee', 'sara@uni.edu', 's234567'),
('Mike Brown', 'mike@uni.edu', 's345678'),
('Anna Smith', 'anna@uni.edu', 's456789'),
('David Kim', 'david@uni.edu', 's567890');




/* TABLE: books */
CREATE TABLE books (
    book_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    author VARCHAR(150) NOT NULL,
    category VARCHAR(100),
    subjects VARCHAR(200),
    status VARCHAR(20) DEFAULT 'Available'
);

INSERT INTO books (title, author, category, subjects, status) VALUES
('Introduction to Algorithms', 'Cormen et al.', 'Textbooks', 'Algorithms, CS', 'Available'),
('Modern Web Design', 'Jane Doe', 'Textbooks', 'Web Development', 'On Loan'),
('The Great Gatsby', 'F. Scott Fitzgerald', 'Fiction', 'Classic', 'Available'),
('Harry Potter', 'J.K. Rowling', 'Fiction', 'Fantasy', 'Available'),
('Clean Code', 'Robert Martin', 'Textbooks', 'Programming', 'Available');




/* TABLE: loans */
CREATE TABLE loans (
    loan_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    book_id INT,
    checkout_date DATE,
    due_date DATE,
    status VARCHAR(20),
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (book_id) REFERENCES books(book_id)
);

INSERT INTO loans (user_id, book_id, checkout_date, due_date, status) VALUES
(1, 1, '2025-10-20', '2025-11-05', 'Active'),
(2, 2, '2025-10-10', '2025-10-25', 'Overdue'),
(3, 3, '2025-10-18', '2025-11-01', 'Returned'),
(4, 4, '2025-10-15', '2025-11-01', 'Active'),
(5, 5, '2025-10-22', '2025-11-05', 'Active');