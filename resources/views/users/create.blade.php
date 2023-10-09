<x-layout title="Novo Usuário">
    <form method="POST" action="">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="name" class="form-control" name="name" id="name">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" name="email" id="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
</x-layout>