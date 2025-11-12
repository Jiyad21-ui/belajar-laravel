<nav class="nav">
  <a href="{{ route('home') }}">Home</a>

  @auth
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <span>Hi, {{ auth()->user()->name }}</span>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit">Logout</button>
    </form>
  @endauth

  @guest
    <a href="{{ route('login') }}">Login</a>
    <a href="{{ route('register') }}">Register</a>
  @endguest
</nav>
<hr>
