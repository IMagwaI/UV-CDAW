<?php

namespace App\Http\Controllers;

use App\Models\Media;
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
            $film = new Media();
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
            $film->description = "description non defini";
            // $film->save();
        }
        $homeFilms = DB::table('medias')->paginate(8);
        return view('home', ["homeFilms" => $homeFilms]);
    }
    public function moviesshowAjax(Request $request){
        if($request->ajax())
        {
            $homeFilms = DB::table('medias')->paginate(8);
            return view('media', ["homeFilms" => $homeFilms])->render();
        }
    }

}
