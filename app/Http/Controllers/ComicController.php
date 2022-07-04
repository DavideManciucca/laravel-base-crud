<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comic;
use Illuminate\Support\Str;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::orderBy('id','desc')->get();
        // dump($comics);
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            "title"=>"required|max:255|min:3",
            "type"=>"required|max:50|min:3",
        ],
        [
            "title.required"=>"Devi inserire un titolo!",
            "title.max"=>"Il titolo non può essere più lungo di :max caratteri!",
            "title.min"=>"Il titolo non può essere più corto di :min caratteri!",
            "type.required"=>"Devi specificare la categoria!",
            "type.max"=>"La categoria non può essere più lunga di :max caratteri!",
            "type.min"=>"La categoria non può essere più corta di :min caratteri!",

        ]

        );
        // dump($request->all());
        $data=$request->all();
        $new_comic= new Comic();
        // $new_comic->title=$data['title'];
        // $new_comic->type=$data['type'];
        // $new_comic->image=$data['image'];
        // $new_comic->slug=Str::slug($data['title'],'-');
        $data['slug'] = Str::slug($data['title'],'-');
        $new_comic->fill($data);
        $new_comic->save();

        return redirect()->route('comics.show',$new_comic);
        // $new_comic->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::find($id);
        if($comic){
            return view('comics.show', compact('comic'));
        }
        abort(404, 'Pagina non trovata');
        // dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::find($id);
        if($comic){
            return view('comics.edit', compact('comic'));
        }
        abort(404,'Pagina non trovata');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {

        $data = $request->all();
        $data['slug']=Str::slug($data['title'],'-');
        $comic->update($data);
        return redirect()->route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index');
    }
}
