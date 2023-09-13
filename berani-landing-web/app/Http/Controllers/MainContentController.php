<?php

namespace App\Http\Controllers;

use App\Models\MainContent;
use App\Models\Content;
use Illuminate\Http\Request;

class MainContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('MainContent.index', [
            'maincontents' => MainContent::all()->where('content_id', '!=', 0),
            'contents' => Content::all(),
            'tabTitle' => 'Berani Digital Talent Platform'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('MainContent.create', [
            'tabTitle' => 'Berani Digital Talent Platform',
            'contents' => Content::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'contentHeader' => ['required', 'min:15'],
            'contentMain' => ['required', 'min:30'],
            'contentFooter' => ['required', 'min:15'],
            'about' => ['required', 'min:3', 'max:20'],
            'image' => ['required', 'file', 'max:3072']
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('public_contents');
            $image = $request->file('image');
            $input['imageName'] = $validatedData['image'];
            $destinationPath = public_path('/public_contents');
            $image->move($destinationPath, $input['imageName']);
        } else {
            $validatedData['image'] = "img/1600x800.jpg";
        }

        MainContent::create($validatedData);

        return redirect('/maincontents')->with('create', 'Main Content berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MainContent  $mainContent
     * @return \Illuminate\Http\Response
     */
    public function show(MainContent $maincontent)
    {
        return view('mainContent.show', [
            'maincontent' => $maincontent,
            'tabTitle' => 'Berani Digital Talent Platform'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MainContent  $mainContent
     * @return \Illuminate\Http\Response
     */
    public function edit(MainContent $maincontent)
    {
        return view('mainContent.edit', [
            'maincontent' => $maincontent,
            'tabTitle' => 'Berani Digital Talent Platform'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MainContent  $mainContent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MainContent $maincontent)
    {
        $validatedData = $request->validate([
            'contentHeader' => ['required', 'min:15'],
            'contentMain' => ['required', 'min:30'],
            'contentFooter' => ['required', 'min:15'],
            'about' => ['required', 'min:3', 'max:20'],
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('public_contents');
            $image = $request->file('image');
            $input['imageName'] = $validatedData['image'];
            $destinationPath = public_path('/public_contents');
            $image->move($destinationPath, $input['imageName']);
        } else {
            $validatedData['image'] = $maincontent->image;
        }

        $maincontent->update($validatedData);

        return redirect('/maincontents')->with('update', 'Main Content berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MainContent  $mainContent
     * @return \Illuminate\Http\Response
     */
    public function destroy(MainContent $maincontent)
    {
        if ($maincontent->id != 1) {
            return redirect('/maincontents')->with('errorDelete', "Main Content sedang digunakan. Main Content gagal dihapus.");
        }

        $maincontent->delete();
        return redirect('/maincontents')->with('delete', "Main Content berhasil dihapus");
    }
}
