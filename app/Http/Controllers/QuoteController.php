<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Quotes;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotes = Quotes::all();
        return view('pages.quotes.index', compact('quotes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.quotes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'author' => 'required',
            'content' => 'required'
        ]);

        $quotes = Quotes::create([
            'author' => $request->author,
            'content' => $request->content
        ]);

        toast('Data Disimpan!','success')->width('350px');
        return redirect()->route('quotes.index');
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
        $quotes = Quotes::findorfail($id);
        return view('pages.quotes.edit', compact('quotes'));
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
            'author' => 'required',
            'content' => 'required'
        ]);

        $quotes_data = [
            'author' => $request->author,
            'content' => $request->content
        ];

        Quotes::whereId($id)->update($quotes_data);

        toast('Berhasil Diupdate!','info')->width('350px');
        return redirect()->route('quotes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quotes = Quotes::findorfail($id);
        $quotes->delete();

        toast('Data Dihapus!','success')->width('350px');
        return redirect()->route('quotes.index');
    }
}
