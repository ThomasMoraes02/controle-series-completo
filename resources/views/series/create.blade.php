<x-layout title="Nova Série">
    {{-- <x-series.form :action="route('series.store')" :name="old('name')" :buttonName="'Salvar'" /> --}}

    <form action="{{ route('series.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">
            <div class="col-8">
                <label for="name" class="form-label">Nome:</label>
                <input autofocus type="text" name="name" id="name" class="form-control"
                    @isset($name) value="{{ old('name') }}" @endisset>
            </div>
            <div class="col-2">
                <label for="seasonsQty" class="form-label">Temporadas:</label>
                <input type="number" name="seasonsQty" id="seasonsQty" class="form-control"
                    @isset($seasonsQty) value="{{ old('seasonsQty') }}" @endisset>
            </div>
            <div class="col-2">
                <label for="episodesPerSeason" class="form-label">Eps Temporada:</label>
                <input type="number" name="episodesPerSeason" id="episodesPerSeason" class="form-control"
                    @isset($episodesPerSeason) value="{{ old('episodesPerSeason') }}" @endisset>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <label for="cover">Capa</label>
                <input type="file" name="cover" id="cover" class="form-control" accept="image/png,image/jpeg">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</x-layout>