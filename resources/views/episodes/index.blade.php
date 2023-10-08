<x-layout title="Episódios" :successMessage="$successMessage">
    <form method="post">
        @method('PUT')
        @csrf
        <ul class="list-group">
            @foreach ($episodes as $episode)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Episódio {{ $episode->number }}

                    <input type="checkbox" name="episodes[]" value="{{ $episode->id }}"
                        @if ($episode->watched) checked @endif class="form-check-input">
                </li>
            @endforeach
        </ul>

        <button type="submit" class="btn btn-primary my-2">Salvar</button>
    </form>
</x-layout>
