<?php

class Books {
    private $title;
    private $author;
    private $isbn;
    private $isAvailable;

    public function __construct($title,$author,$isbn){
        $this->title = $title;
        $this->author = $author;
        $this->isbn = $isbn;
        $this->isAvailable = true;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getAuthor(){
        return $this->author;
    }

    public function getIsbn(){
        return $this->isbn;
    }

    public function isAvailable(){
        return $this->isAvailable;
    }

    public function borrow(){
        if($this->isAvailable){
            $this->isAvailable = false;
            echo "Book '{$this->title}' borrowed successfully.\n";
        }else{
            echo "Book '{$this->title}' is not available.\n";
        }
    }

    public function returnBook(){
        $this->isAvailable = true;
        echo "Book '{$this->title}' returned successfully.\n";
    }

}

class Ebook extends Books{
    private $fileSize;

    public function __construct($title,$author,$isbn,$fileSize){
        parent::__construct($title,$author,$isbn);
        $this->fileSize = $fileSize;
    }

    public function getFileSize(){
        return $this->fileSize;
    }   
}

class PrintedBook extends Books{
    private $pages;

    public function __construct($title,$author,$isbn,$pages){
        parent::__construct($title,$author,$isbn);
        $this->pages = $pages;
    }

    public function getPages(){
        return $this->pages;
    }   
}

class Library {
    private $books = [];

    public function addBook(Books $book){
        $this->books[] = $book;
        echo "Book '{$book->getTitle()}' added to Library. \n";
    }

    public function removeBook($isbn){
        foreach($this->books as $key => $book){
            if($book->getIsbn() === $isbn){
                unset($this->books[$key]);
                echo "Book with ISBN {$isbn} removed.\n";
                return;
            }
        }
        echo "Book with ISBN '{$isbn}' not found in Library. \n";
    }

    public function listBooks(){
         echo "📖 Library Books:\n";
         foreach($this->books as $book){
             $status = $book->isAvailable() ? "Available" : "Borrowed";
             echo "- {$book->getTitle()} by {$book->getAuthor()} ({$status})\n";
         }
    }

    public function searchBook($title){
        foreach($this->books as $book){
            if(stripos($book->getTitle(), $title) !== false){
                $status = $book->isAvailable() ? "Available" : "Borrowed";
                echo "Found: {$book->getTitle()} by {$book->getAuthor()} ({$status})\n";
                 return $book;
            }
        }
        echo "Book '{$title}' not found.\n";
        return null;
    }
}


class Member {
    private $name;
    private $borrowedBooks = [];

    public  function __construct($name){
        $this->name = $name;
    }

    public function borrowBook(Books $book){

        if($book->isAvailable()){
            $book->borrow();
            $this->borrowedBooks[] = $book;
        }
         else {
            echo "Sorry, '{$book->getTitle()}' is already borrowed.\n";
        }
    }

    public function returnBook(Books $book){
       foreach($this->borrowedBooks as $key => $b){
          if($b->getIsbn() === $book->getIsbn()){
                $book->returnBook();
                unset($this->borrowedBooks[$key]);
                return;
          }
       }
        echo "This member didn’t borrow '{$book->getTitle()}'.\n";
    }
}