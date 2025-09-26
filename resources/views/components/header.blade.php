<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('contacts.index') }}"> Contatos</a>
    <div>
      @auth
        <span class="text-white me-3">{{ auth()->user()->name }}</span>
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button class="btn btn-outline-light btn-sm">Sair</button>
        </form>
      @endauth

      @guest
        <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Login</a>
      @endguest
    </div>
  </div>
</nav>
