<?php
include __DIR__.'/Views/header.php';
include __DIR__.'/Model/Book.php';
$books = Book::fetchAll();
?>

<div class="container">
    <div class="row gy-4">
        <?php foreach($books as $book) {
            $book->printCard($book->getBooks());
        } ?>
    </div>
</div>
</body>

</html>