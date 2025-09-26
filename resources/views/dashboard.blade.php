@extends('layout')

@section('title', 'Dashboard')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-body text-center">
                <h2 class="mb-4">Sua agenda de contatos!</h2>
                <p>Bem-vindo(a), <strong>{{ auth()->user()->name }}</strong>!</p>
                <a href="{{ route('contacts.index') }}" class="btn btn-primary">Ver meus contatos</a>
            </div>
        </div>
    </div>
</div>
@endsection
