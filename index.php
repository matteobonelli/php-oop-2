<?php
include __DIR__ . '/Model/Movie.php';
include __DIR__ . '/Views/header.php';
$movies = Movie::fetchAll();
?>


<div class="container">
    <div class="row gy-4">
        <?php foreach ($movies as $movie) {
            $movie->printCard();
        } ?>
    </div>
</div>
</body>

</html>