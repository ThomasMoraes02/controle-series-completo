<form action="{{ $action }}" method="post">
    @csrf

    @isset($name)
        @method('PUT')
    @endisset

    @php
        $buttonName = isset($name) ? 'Atualizar' : 'Salvar';
    @endphp

    <div class="mb-3">
        <label for="name" class="form-label">Nome:</label>
        <input type="text" name="name" id="name" class="form-control" @isset($name) value="{{ $name }}" @endisset>
    </div>

    <button type="submit" class="btn btn-primary">{{ $buttonName }}</button>
</form>