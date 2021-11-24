<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /*
    store json data into database
      */
    public function populate()  // n'oublie pas de commenter une fois la base est déja rempli
    {
        $json = file_get_contents('http://localhost/UV-CDAW/public/catalogue-film/app/Http/Controllers/response.json');
        $films = json_decode($json, true);
        foreach ($films["items"] as $key => $value) {
            $film = new Film();
            $film->title = $value['title'];
            $film->fullTitle = $value['fullTitle'];
            $film->director = $value['crew'];
            $film->year = $value['year'];
            $film->rank = $value['rank'];
            $film->image = $value['image'];
            $film->vue = 0;
            $film->imDBRating = $value['imDbRating'];
            $film->imDbRatingCount = $value['imDbRatingCount'];
            $film->category_id = 0000;
            $film->duree_minute = 180;
            $film->description="description non defini";
            $film->save();
        }
        $homeFilms = DB::table('films')->paginate(24);
        return view('home',["homeFilms" => $homeFilms]);
    }
}
