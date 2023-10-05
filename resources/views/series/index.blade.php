<x-layout title="Séries">
    <a href="/series/create" class="btn btn-dark mb-2">Adicionar</a>

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item">{{ $serie }}</li>
        @endforeach
    </ul>

    {{-- Usando Variável em JS --}}
    <script>
        const series = @json($series);
        console.log(series);
    </script>

</x-layout>