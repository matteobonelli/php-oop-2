<?php
include __DIR__ . '/Product.php';

class Game extends Product
{
    private $appid;
    private $name;
    public int $playtime_forever;

    public function __construct($appid, $name, $playtime_forever, $quantity, $price)
    {
        parent::__construct($quantity, $price);
        $this->appid = $appid;
        $this->name = $name;
        $this->playtime_forever = $playtime_forever;

    }

    private function getImage()
    {
        return 'https://cdn.cloudflare.steamstatic.com/steam/apps/' . $this->appid . '/header.jpg';
    }

    private function printPlaytime()
    {
        return "<span class ='badge text-bg-success my-1'>$this->playtime_forever</span>" . "<br>";
    }

    public function printGames()
    {
        $title = $this->name;
        $image = $this->getImage();
        $playtime = $this->printPlaytime();
        $quantity = $this->quantity;
        $price = $this->price;
        $sconto = $this->setDiscount($this->name);

        include __DIR__ . '/../Views/cards.php';
    }

    public static function fetchAll()
    {
        $getGames = file_get_contents(__DIR__ . '/steam_db.json');
        $gamesArray = json_decode($getGames, true);
        $gamesList = [];
        foreach ($gamesArray as $game) {
            $quantity = rand(0, 100);
            $price = rand(5, 50);
            $gamesList[] = new Game($game['appid'], $game['name'], $game['playtime_forever'], $quantity, $price);
        }
        return $gamesList;
    }
}
?>