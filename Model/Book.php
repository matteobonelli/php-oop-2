<?php
include __DIR__.'/Product.php';
class Book extends Product {
    private $_id;
    private $title;
    private $thumbnailUrl;
    private $longDescription;
    private array $authors;
    private array $categories;

    public function __construct($id, $title, $thumbnail = '', $description, $authors, $categories, $quantity, $price) {
        parent::__construct($price, $quantity);
        $this->_id = $id;
        $this->title = $title;
        $this->thumbnailUrl = $thumbnail;
        $this->longDescription = $description;
        $this->authors = $authors;
        $this->categories = $categories;
    }

    private function getCategories() {
        $template = "<h5>";
        foreach($this->categories as $category) {
            $template .= "<span class ='badge text-bg-primary my-1'>$category</span>"."<br>";
        }
        $template .= "</h5>";
        return $template;
    }

    private function getAuthors() {
        $template = "<div>";
        foreach($this->authors as $author) {
            $template .= "<h6>$author</h6>";
        }
        $template .= "</div>";
        return $template;
    }

    public function getBooks() {

        $bookItem = [
            'title' => $this->title,
            'image' => $this->thumbnailUrl,
            'descr' => $this->longDescription,
            'printGenre' => $this->getCategories(),
            'price' => $this->price,
            'quantity' => $this->quantity,
            'authors' => $this->getAuthors(),
            'sconto' => $this->setDiscount($this->title)
        ];
        return $bookItem;
    }

    public static function fetchAll() {
        $getBooks = file_get_contents(__DIR__.'/books_db.json');
        $booksList = json_decode($getBooks, true);
        $booksArray = [];
        foreach($booksList as $book) {
            $quantity = rand(0, 100);
            $price = rand(5, 50);
            $booksArray[] = new Book($book['_id'], $book['title'], $book['thumbnailUrl'], $book['longDescription'], $book['authors'], $book['categories'], $quantity, $price);
        }
        return $booksArray;
    }
}
?>