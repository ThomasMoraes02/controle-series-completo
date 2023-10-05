<x-layout title="Séries">
    <a href="/series/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Adicionar</a>

    <ul>
        @foreach ($series as $serie)
            <li>{{ $serie }}</li>
        @endforeach
    </ul>

    {{-- Usando Variável em JS --}}
    <script>
        const series = @json($series);
        console.log(series);
    </script>

</x-layout>