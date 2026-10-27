
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Library System')</title>

</head>

<body>
    <header>
        <h1>Library System</h1>

        <nav>
            <a href="/dashboard">Dashboard</a>
            <a href="/books">Books</a>
            <a href="{{ route('categories.index') }}">Categories</a>
            <a href="/members">Members</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>Library System &copy; {{ date('Y') }}</p>
    </footer>
</body>
</html>
