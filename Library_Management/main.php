<?php
require_once 'Books.php';
// Create Library
$library = new Library();

// Add Books
$book1 = new PrintedBook("The Alchemist", "Paulo Coelho", "12345", 200);
$book2 = new Ebook("Clean Code", "Robert C. Martin", "67890", "5MB");

$library->addBook($book1);
$library->addBook($book2);

// List books
$library->listBooks();

// Create Member
$member = new Member("Zafar");

// Borrow and return books
$member->borrowBook($book1);
$member->borrowBook($book2);
$library->listBooks();

$member->returnBook($book1);
$library->listBooks();
