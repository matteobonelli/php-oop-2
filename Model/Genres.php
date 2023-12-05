<?php

class Genre
{
    public string $genre;

    public function __construct($genre)
    {
        $this->genre = $genre;
    }
    public function drawGenre()
    {
        return "<span class ='badge text-bg-primary my-1'>$this->genre</span>";
    }

    public static function fetchAll()
    {
        $genresString = file_get_contents(__DIR__ . '/genre_db.json');
        $genresList = json_decode($genresString, true);
        $genres = [];
        foreach ($genresList as $genre) {
            $genres[] = new Genre($genre);
        }
        return $genres;
    }

}




?>