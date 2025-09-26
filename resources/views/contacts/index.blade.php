@extends('layout')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <a href="{{ route('contacts.create') }}" class="btn btn-primary">Novo Contato</a>

    <form method="GET" action="{{ route('contacts.index') }}" class="d-flex">
        <input type="text" name="q" class="form-control me-2" placeholder="Buscar..." value="{{ $query ?? '' }}">
        <button class="btn btn-outline-secondary">🔍</button>
    </form>
</div>

<table class="table table-bordered">
    <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>Telefone</th>
        <th>Endereço</th>
        <th>Ações</th>
    </tr>
    @forelse($contacts as $contact)
    <tr>
        <td>{{ $contact->name }}</td>
        <td>{{ $contact->email }}</td>
        <td>{{ $contact->phone }}</td>
        <td>{{ $contact->address }}</td>
        <td>
            <a href="{{ route('contacts.show', $contact) }}" class="btn btn-info btn-sm">Visualizar</a>
            <a href="{{ route('contacts.edit', $contact) }}" class="btn btn-warning btn-sm">Editar</a>
            <form action="{{ route('contacts.destroy', $contact) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este contato?')">Excluir</button>
            </form>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="5" class="text-center">Nenhum contato encontrado</td>
    </tr>
    @endforelse
</table>
@endsection
