@extends('layout')

@section('title', 'Novo Contato')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="mb-4 text-center">Adicionar Novo Contato</h2>

                <form action="{{ route('contacts.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Telefone</label>
                        <input type="tel" name="phone" id="phone" class="form-control"
                               placeholder="(xx) xxxxx-xxxx"
                               value="{{ old('phone') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Endereço (opcional)</label>
                        <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                    </div>

                    <button type="submit" class="btn btn-success w-100">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const phoneInput = document.getElementById('phone');

    if (phoneInput) {
        phoneInput.addEventListener('input', function (e) {
            let value = e.target.value.replace(/\D/g, "");

            if (value.length > 11) value = value.slice(0, 11);

            if (value.length > 6) {
                e.target.value = `(${value.slice(0, 2)}) ${value.slice(2, 7)}-${value.slice(7)}`;
            } else if (value.length > 2) {
                e.target.value = `(${value.slice(0, 2)}) ${value.slice(2)}`;
            } else {
                e.target.value = value;
            }
        });
    }
});
</script>
@endsection
