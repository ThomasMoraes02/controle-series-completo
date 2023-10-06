<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::all();
        $successMessage = session('message.success');

        return view('series.index')
        ->with('series', $series)
        ->with('successMessage', $successMessage);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $serie = Serie::create($request->all());
        return redirect()->route('series.index')->with('message.success', "Serie '{$serie->name}' criada com sucesso!");
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy(Serie $series, Request $request)
    {
        $series->delete();
        return redirect()->route('series.index')->with('message.success', 'Série removida com sucesso!');
    }
}
