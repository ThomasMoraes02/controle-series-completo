<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Series::all();
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
        $serie = Series::create($request->all());

        for($i = 1; $i <= $request->seasonsQty; $i++) {
            $season = $serie->seasons()->create([
                'number' => $i
            ]);

            for($e = 1; $e <= $request->episodesPerSeason; $e++) {
                $season->episodes()->create([
                    'number' => $e
                ]);   
            }
        }

        return redirect()->route('series.index')->with('message.success', "Serie '{$serie->name}' criada com sucesso!");
    }

    public function edit(Series $series)
    {
        return view('series.edit')->with('serie', $series);
    }

    public function update(SeriesFormRequest $request, Series $series)
    {
        $series->fill($request->all());
        $series->save();

        return redirect()->route('series.index')->with('message.success', "Série '{$series->name}' alterada com sucesso!");
    }

    public function destroy(Request $request, Series $series)
    {
        $series->delete();
        return redirect()->route('series.index')->with('message.success', 'Série removida com sucesso!');
    }
}
