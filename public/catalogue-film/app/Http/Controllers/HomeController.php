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
        $media = json_decode($json, true);
        foreach ($media["items"] as $key => $value) {
            $media = new Media();
            $media->title = $value['title'];
            $media->fullTitle = $value['fullTitle'];
            $media->director = $value['crew'];
            $media->year = $value['year'];
            $media->rank = $value['rank'];
            $media->image = $value['image'];
            $media->type = $value['type'];
            $media->vue = 0;
            $media->imDBRating = $value['imDbRating'];
            $media->imDbRatingCount = $value['imDbRatingCount'];
            $media->category_id = 0000;
            $media->duree_minute = 180;
            $media->description = " Johnny is an emotionally stunted and softspoken radio journalist who travels the country
            interviewing a variety of kids about their thoughts concerning their world and their future.
            Then Johnny's saddled with caring for his young nephew Jesse. Jesse brings a new perspective
            and, as they travel from state to state, effectively turns the emotional tables on Johnny.
       ";
            // $media->save();
        }
        $homeFilms = DB::table('medias')->paginate(8);
        return view('home', ["homeFilms" => $homeFilms]);
    }

    public function searchByTitle(Request $request)
    {
        $homeFilms = Media::where('title', 'like', '%' . $request->title . '%')->paginate(8);
        // echo $homeFilms;
        return view('search', ["homeFilms" => $homeFilms]);
    }


    public function showAllMedias(Request $request)
    {
        if ($request->ajax()) {
            $homeFilms = DB::table('medias')->paginate(8);
            return view('media', ["homeFilms" => $homeFilms])->render();
        }
    }

    public function getMediaByType(Request $request, $type)
    {
        if ($request->ajax()) {
            if ($type == "all") {
                $homeFilms = DB::table('medias')->paginate(8);
                return view('media', ["homeFilms" => $homeFilms])->render();
            } else {
                $homeFilms = DB::table('medias')->where('type', $type)->paginate(8);
                return view('media', ["homeFilms" => $homeFilms])->render();
            }
        }
    }
}
