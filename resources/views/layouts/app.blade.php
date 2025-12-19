<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title', 'App')</title>

<link rel="stylesheet" href="https://unpkg.com/sakura.css/css/sakura.css">

<style>
/* Layout */
body {
    background: #f4f6f8;
}
.container {
    max-width: 1000px;
    margin: 2rem auto;
    background: #fff;
    padding: 1.5rem 2rem;
    border-radius: .75rem;
    box-shadow: 0 10px 25px rgba(0,0,0,.06);
}

/* Navbar */
.nav {
    display: flex;
    gap: 1rem;
    align-items: center;
    flex-wrap: wrap;
    margin-bottom: 1rem;
}
.nav a {
    text-decoration: none;
}
.nav a.active {
    font-weight: 700;
    border-bottom: 2px solid #000;
}
.right {
    margin-left: auto;
    display: flex;
    gap: .75rem;
    align-items: center;
}

/* Content */
.row {
    display: grid;
    gap: 1.25rem;
}

/* Card */
.card {
    border: 1px solid #e5e7eb;
    padding: 1.25rem 1.5rem;
    border-radius: .6rem;
    background: #fff;
}

/* Utility */
.muted {
    color: #6b7280;
    font-size: .9rem;
}
form.inline {
    display: inline;
}
.error {
    color: #dc2626;
}
.flash {
    padding: .6rem .9rem;
    border-radius: .4rem;
    border: 1px solid #bbf7d0;
    background: #ecfdf5;
    margin-bottom: .75rem;
}

/* Footer */
footer {
    margin-top: 2rem;
}
</style>
</head>

<body>
<div class="container">

    @include('partials.nav')

    <main class="row">
        @yield('content')
    </main>

    <footer>
        <hr>
        <div class="muted">© {{ date('Y') }} Artikel App</div>
    </footer>

</div>
</body>
</html>
