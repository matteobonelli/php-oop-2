<?php
include __DIR__ . '/Views/header.php';
include __DIR__ . '/Model/Game.php';

$games = Game::fetchAll();
?>

<div class="container">
    <div class="row gy-4">
        <?php foreach ($games as $game) {
            $game->printGames();
        } ?>
    </div>
</div>
</body>

</html>