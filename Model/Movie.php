<?php
include __DIR__ . '/Genres.php';
include __DIR__ . '/Product.php';
class Movie extends Product
{
    private int $id;
    private string $title;
    private string $original_language;
    private string $overview;
    private float $vote_average;
    private string $poster_path;
    private string $release_date;
    private array $genres;


    public function __construct($id, $name, $lang, $descr, $vote, $image, $release, $genres, $quantity, $price)
    {
        parent::__construct($price, $quantity);
        $this->id = $id;
        $this->title = $name;
        $this->original_language = $lang;
        $this->overview = $descr;
        $this->vote_average = $vote;
        $this->poster_path = $image;
        $this->release_date = $release;
        $this->genres = $genres;
    }

    private function getVote()
    {
        $vote = ceil($this->vote_average / 2);
        $template = "<p>";
        for ($i = 0; $i < 5; $i++) {
            $template .= $i <= $vote ? '<i class="fa-solid fa-star"></i>' : '<i class="fa-regular fa-star"></i>';
        }
        $template .= "</p>";
        return $template;
    }

    private function getGenres()
    {

        $genreArray = [];
        while (count($genreArray) < 2) {
            $randGenre = $this->genres[rand(0, count($this->genres) - 1)];
            if (!in_array($randGenre, $genreArray)) {
                array_push($genreArray, $randGenre);
            }
        }
        $template = "<h5>";
        foreach ($genreArray as $genre) {
            $template .= $genre->drawGenre() . "<br>";
        }
        $template .= "</h5>";
        return $template;
    }

    private function getFlags()
    {
        $acceptedLanguages = ['de', 'es', 'en', 'fr', 'it', 'ja'];
        if (!in_array($this->original_language, $acceptedLanguages)) {
            return "question.png";
        }
        return $this->original_language . ".png";
    }


    public function printCard()
    {

        $sconto = $this->setDiscount($this->title);
        $title = $this->title;
        $id = $this->id;
        $image = $this->poster_path;
        $descr = $this->overview;
        $vote = $this->getVote();
        $flag = $this->getFlags();
        $lang = $this->original_language;
        $release = $this->release_date;
        $printGenre = $this->getGenres();
        $price = $this->price;
        $quantity = $this->quantity;

        include __DIR__ . '/../Views/cards.php';

    }

    public static function fetchAll()
    {
        $getContent = file_get_contents(__DIR__ . '/movie_db.json');
        $movieList = json_decode($getContent, true);
        $moviesDecoded = [];
        $genres = Genre::fetchAll();
        $quantity = rand(0, 100);
        $price = rand(5, 200);
        foreach ($movieList as $movie) {
            $moviesDecoded[] = new Movie($movie['id'], $movie['title'], $movie['original_language'], $movie['overview'], $movie['vote_average'], $movie['poster_path'], $movie['release_date'], $genres, $quantity, $price);
        }
        return $moviesDecoded;
    }



}

// Movie::fetchAll();

?>