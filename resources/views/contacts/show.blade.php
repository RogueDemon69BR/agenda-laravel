@extends('layout')

@section('title', 'Detalhes do Contato')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="mb-4 text-center">Detalhes do Contato</h2>

                <div class="mb-3">
                    <strong>Nome:</strong>
                    <p>{{ $contact->name }}</p>
                </div>

                <div class="mb-3">
                    <strong>Email:</strong>
                    <p>{{ $contact->email ?? '-' }}</p>
                </div>

                <div class="mb-3">
                    <strong>Telefone:</strong>
                    <p>{{ $contact->phone }}</p>
                </div>

                <div class="mb-3">
                    <strong>Endereço:</strong>
                    <p>{{ $contact->address ?? '-' }}</p>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('contacts.index') }}" class="btn btn-primary">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
