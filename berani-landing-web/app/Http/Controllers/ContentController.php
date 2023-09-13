<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\MainContent;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('/maincontents');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.create', [
            'tabTitle' => 'Berani Digital Talent Platform'
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
        $validateData = $request->validate([
            'about' => ['required', 'min:3', 'max:20']
        ]);

        Content::create($validateData);

        return redirect('maincontents')->with('create_content', 'Konten berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        return redirect('/maincontents');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content)
    {
        return redirect('/maincontents');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Content $content)
    {
        if (MainContent::where('id', $request['maincontent_id'])->first()->content->id != 1) {
            return redirect('/maincontents')->with('error', "Main content yang dipilih sudah digunakan. Harap menggunakan main content yang lain!");
        }

        $request->validate([
            'about' => ['required', 'min:3', 'max:20'],
            'maincontent_id' => ['required'],
        ]);

        $content->update(['about' => $request['about']]);

        MainContent::where('id', $content->maincontents->first()->id)->update(['content_id' => 1]);

        $maincontent = MainContent::where('id', $request['maincontent_id']);

        if ($maincontent) {
            $maincontent->update(['content_id' => $content->id]);
        }

        return redirect('/maincontents')->with('update_content', 'Pengaturan Konten Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        if ($content->maincontents->first() != null) {
            return redirect('/maincontents')->with('errorDeleteContent', "Content gagal dihapus. Harap ubah Main Content ke 'Not Assigned' terlebih dahulu.");
        }

        $content->delete();

        return redirect('/maincontents')->with('delete', "Content berhasil dihapus");
    }
}
