<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
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

    public function store(SeriesFormRequest $request)
    {
        $serie = Serie::create($request->all());
        return redirect()->route('series.index')->with('message.success', "Serie '{$serie->name}' criada com sucesso!");
    }

    public function edit(Serie $series)
    {
        return view('series.edit')->with('serie', $series);
    }

    public function update(SeriesFormRequest $request, Serie $series)
    {
        $series->fill($request->all());
        $series->save();

        return redirect()->route('series.index')->with('message.success', "Série '{$series->name}' alterada com sucesso!");
    }

    public function destroy(Request $request, Serie $series)
    {
        $series->delete();
        return redirect()->route('series.index')->with('message.success', 'Série removida com sucesso!');
    }
}
