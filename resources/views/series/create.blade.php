<x-layout title="Nova Série">
    <form action="" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Nome:</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        @csrf
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</x-layout>