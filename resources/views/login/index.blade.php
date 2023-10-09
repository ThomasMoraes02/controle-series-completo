<x-layout title="Login">
    <form method="POST" action="">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>

    </form>
    <a href="{{ route('users.create') }}" class="btn btn-secondary mt-3">Registrar</a>
</x-layout>
