@component('mail::message')
# {{ $seriesName }} criada

A série {{ $seriesName }} com {{ $qtdSeasons }} temporadas e {{ $episodesPerSeason }} episódios foi criada com sucesso.

Acesse aqui:
@component('mail::button', ['url' => route('seasons.index', $seriesId)])
Ver série
@endcomponent

@endcomponent