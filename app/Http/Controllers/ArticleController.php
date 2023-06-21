<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use File;
use Image;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::all();
        return view('admin.article.index', compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function saveFile($photo)
    {
        $images = now()->format('Y-m-d-H_i_s') . '.' . $photo->getClientOriginalExtension();
        $path = public_path('images');

        if(!File::isDirectory($path)){
            File::makeDirectory($path);
        }

        Image::make($photo)->resize('600', '400')->save($path . '/' . $images);
        return $images;
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'content' => 'required|string'
        ]);

        try {
            $photo = null;

            if($request->hasFile('photo')){
                $photo = $this->saveFile($request->file('photo'));

            }

            // $photoName = now()->format('Y-m-d') . '.' . $request->photo->extension();
            // $request->photo->move(public_path('images'), $photoName);

            $article = Article::create([
                'title' => $request->title,
                'content' => $request->content,
                'photo' => $photo,
            ]);
            return redirect(route('article.index'))->with(['success' => 'Data Article: Berhasil Ditambahkan!']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }


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
        $article = Article::findOrFail($id);
        return view('admin.article.edit', compact('article'));
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
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'content' => 'required|string'
        ]);

        try {
            $article = Article::findOrFail($id);
            $photo = $article->photo;

            if($request->hasFile('photo')){
                !empty($photo) ? File::delete(public_path('images' . $photo)):null;
                $photo = $this->saveFile($request->file('photo'));
            }

            $article->update([
                'title' => $request->title,
                'content' => $request->content,
                'photo' => $photo,
            ]);

            return redirect(route('article.index'))->with(['success' => 'Data Article: Berhasil Ditambahkan!']);

        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        if(!empty($article->photo)){
            File::delete(public_path('images/'. $article->photo));
        }

        $article->delete();
        return redirect()->back()->with(['success' => 'Data Article: Berhasil Dihapus!']);
    }
}
