<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Season;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    public function index(Season $season)
    {
        return view('episodes.index')
        ->with('episodes', $season->episodes)
        ->with('successMessage', session('message.success'));
    }

    public function update(Request $request, Season $season)
    {
        $watchedVideos = $request->episodes;
        $season->episodes->each(function(Episode $episode) use ($watchedVideos) {
            $episode->watched = in_array($episode->id, $watchedVideos);
        });

        /**
         * Salva a Model e todos os relacionamentos
         * Ou seja, atualiza também os episódios assistidos
         */
        $season->push();

        return redirect()->route('episodes.index', $season->id)->with('message.success', 'Episódios atualizados com sucesso!');
    }
}
