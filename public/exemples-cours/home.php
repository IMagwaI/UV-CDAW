<?php $user = "John";
$curl = curl_init();

/* curl_setopt_array($curl, array(
  CURLOPT_URL => "https://imdb-api.com/API/Search/k_bj3ys5s9/superman",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
));

$response = curl_exec($curl);
curl_close($curl);
$json = json_decode($response, true); */
$odd_numbers = [1, 3, 5, 7, 9];
$even_numbers = [2, 4, 6, 8, 10];
$all_numbers = array_merge($odd_numbers, $even_numbers);
$numbers = [1, 2, 3, 4, 5, 6];


class Movie
{
  public $title;
  public $year;
  public $rating;
  public $genre;
  public $director;
  public $actors;
  public $plot;
  public $poster;
  public $imdbID;
  public $imdbRating;
  public $imdbVotes;
  public $type;
  public $response;
  public function __construct($title, $year, $rating, $genre, $director, $actors, $plot, $poster, $imdbID, $imdbRating, $imdbVotes, $type, $response)
  {
    $this->title = $title;
    $this->year = $year;
    $this->rating = $rating;
    $this->genre = $genre;
    $this->director = $director;
    $this->actors = $actors;
    $this->plot = $plot;
    $this->poster = $poster;
    $this->imdbID = $imdbID;
    $this->imdbRating = $imdbRating;
    $this->imdbVotes = $imdbVotes;
    $this->type = $type;
    $this->response = $response;
  }

  public static function getMovieByTitle($title)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://imdb-api.com/API/Search/k_bj3ys5s9/" . $title,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    $json = json_decode($response, true);
    $movie = new Movie($json['title'], $json['year'], $json['rating'], $json['genre'], $json['director'], $json['actors'], $json['plot'], $json['poster'], $json['imdbID'], $json['imdbRating'], $json['imdbVotes'], $json['type'], $json['response']);
    return $movie;
  }


  public function getResponse()
  {
    return $this->response;
  }

  public function getTitle()
  {
    return $this->title;
  }
  public function getYear()
  {
    return $this->year;
  }

  public function getRating()
  {
    return $this->rating;
  }
  public function getGenre()
  {
    return $this->genre;
  }
  public function getDirector()
  {
    return $this->director;
  }
  public function getActors()
  {
    return $this->actors;
  }
  public function getPlot()
  {
    return $this->plot;
  }
  public function getPoster()
  {
    return $this->poster;
  }
  public function getImdbID()
  {
    return $this->imdbID;
  }
  public function getImdbRating()
  {
    return $this->imdbRating;
  }
  public function getImdbVotes()
  {
    return $this->imdbVotes;
  }
  public function getType()
  {
    return $this->type;
  }
  public function getAllMovies()
  {
    return $this->response;
  }

  public function ToHtml($movie)
  {
    $html = "<div class='movie'>";
    $html .= "<h2>" . $movie->getTitle() . "</h2>";
    $html .= "<p>" . $movie->getYear() . "</p>";
    $html .= "<p>" . $movie->getRating() . "</p>";
    $html .= "<p>" . $movie->getGenre() . "</p>";
    $html .= "<p>" . $movie->getDirector() . "</p>";
    $html .= "<p>" . $movie->getActors() . "</p>";
    $html .= "<p>" . $movie->getPlot() . "</p>";
    $html .= "<p>" . $movie->getPoster() . "</p>";
    $html .= "<p>" . $movie->getImdbID() . "</p>";
    $html .= "<p>" . $movie->getImdbRating() . "</p>";
    $html .= "<p>" . $movie->getImdbVotes() . "</p>";
    $html .= "<p>" . $movie->getImdbVotes() . "</p>";
    $html .= "</div>";
    return $html;
  }
}
class MoviesCollection
{
  public $movies;
  public function __construct($movies)
  {
    $this->movies = $movies;
  }
  public function getAllMovies()
  {
    return $this->movies;
  }
  public function ToHtml()
  {
    $html = "<div class='movies'>";
    foreach ($this->movies as $movie) {
      $html .= $movie->ToHtml();
    }
    $html .= "</div>";
    return $html;
  }
}

?>



<html>

<head></head>

<body>
  <?php

  /*   $movies = MoviesCollection::getAllMovies();
  foreach($movies as $movie) {
    $movie->ToHtml();
  } */
  $movie = Movie::getMovieByTitle("The Godfather");
  toHtml($movie);

  ?>
</body>

</html>