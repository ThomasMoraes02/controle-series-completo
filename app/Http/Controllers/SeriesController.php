<?php

namespace App\Http\Controllers;

use App\Events\SeriesCreated;
use App\Models\Series;
use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest;
use App\Repositories\SeriesRepository;

class SeriesController extends Controller
{
    private SeriesRepository $seriesRepository;

    public function __construct(SeriesRepository $seriesRepository)
    {
        $this->seriesRepository = $seriesRepository;
    }

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
        $serie = $this->seriesRepository->add($request);

        // Evento
        SeriesCreated::dispatch($serie->id, $serie->name, $request->seasonsQty, $request->episodesPerSeason);

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
