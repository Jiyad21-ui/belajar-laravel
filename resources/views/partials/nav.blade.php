<nav class="nav">
    <a href="{{ route('home') }}">Home</a>

    @auth
        <a href="{{ route('dashboard') }}">Dashboard</a>

        <div class="right">
            <span class="muted">
                Hi, <strong>{{ auth()->user()->name }}</strong>
            </span>

            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    @endauth

    @guest
        <div class="right">
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        </div>
    @endguest
</nav>

<hr>
