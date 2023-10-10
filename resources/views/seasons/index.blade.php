<x-layout title="Temporadas de {!! $series->name !!}">
    <div class="d-flex justify-content-center align-items-center my-3">
        <img src="{{ asset('storage/' . $series->cover) }}" alt="Capa da {{ $series->name }}" class="img-fluid" style="height: 400px">
    </div>
    <ul class="list-group">
        @foreach ($seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('episodes.index', $season->id) }}">
                    Temporada {{ $season->number }}
                </a>

                <span class="badge bg-secondary">
                    {{ $season->numberOfWatchedEpisodes() }} / {{ $season->episodes->count() }}
                </span>
            </li>
        @endforeach
    </ul>
</x-layout>