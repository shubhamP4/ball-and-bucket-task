<!-- app.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ball and Bucket Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="/">Ball and Bucket Task</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('buckets.index') }}">Buckets</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('balls.index') }}">Balls</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('bucket_suggestion.index') }}">Bucket Suggestion</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </header>

    <main>
        <!-- Display content from the child views here -->
        @yield('content')
    </main>

    <footer>
        <!-- Add your footer content here -->
        <p>&copy; {{ date('Y') }} Ball and Bucket Task. All rights reserved.</p>
    </footer>
</body>
</html>
