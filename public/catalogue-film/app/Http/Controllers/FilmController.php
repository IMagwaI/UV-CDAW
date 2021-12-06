<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view("addFilm");
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('addFilm', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //create new film from request
        $media = new Media();
        $media->title = $request->input('name');
        $media->rank = rand(251, 350);
        $media->imDBRating = rand(4, 9);
        $media->imDbRatingCount = rand(452, 2000);
        $media->duree_minute = 180;
        $media->vue = 0;
        $media->fullTitle = $request->input('name');
        $media->fullTitle = $request->input('name');
        $media->director = $request->input('director');
        $media->type = $request->input('type');
        $media->year = $request->input('year');
        $media->image = $request->input('image');
        $media->category = $request->input('category');
        $media->description = " Johnny is an emotionally stunted and softspoken radio journalist who travels the country
        interviewing a variety of kids about their thoughts concerning their world and their future.
        Then Johnny's saddled with caring for his young nephew Jesse. Jesse brings a new perspective
        and, as they travel from state to state, effectively turns the emotional tables on Johnny.
   ";
        $media->save();
        $homeFilms = DB::table('medias')->paginate(8);

        return view('home', ["homeFilms" => $homeFilms]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $film = Media::where('id', $id)->get()[0];
        return view("updateFilm", ["film" => $film, "categories" => $categories]);
        // echo $film;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Media::where('id', $id)->update(
            [
                'name' => $request->input('name'),
                'director' => $request->input('director'),
                'category_id' => $request->input('category')
            ]
        );
        return redirect('/addedFilms');
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

    public function getByCategory(Request $request, $category)
    {
        if ($request->ajax()) {
            $homeFilms = DB::table('medias')->where('category', $category)->paginate(8);
            return view('media', ["homeFilms" => $homeFilms])->render();
        }
    }
    public function destroy($id)
    {
        Media::destroy($id);
        return redirect('/addedFilms');
    }
}
