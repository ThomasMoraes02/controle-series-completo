<x-layout title="Nova Série">
    <form action="" method="post">
        @csrf
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name">
        <button type="submit">Salvar</button>
    </form>
</x-layout>