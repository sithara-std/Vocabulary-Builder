<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Vocabulary Builder</title>
    <style>
        /* Custom Navbar Color */
        .navbar-custom {
            background-color: #4CAF50; /* Change this to your desired color */
        }
        .navbar-custom .navbar-brand, .navbar-custom .nav-link {
            color: white; /* Text color */
        }

         .vocabulary-section {
            background-color: #ccffcc; /* Light green background */
            padding: 20px;
            border-radius: 10px;
        }
 

    </style>
</head>
<body>

    <!-- Custom Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand" href="#">Vocabulary Builder</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('vocabularies.create') }}">ADD</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('vocabularies.index') }}">VIEW</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Split background -->
    <div class="split-background">
        <!-- Left Section with Background Image -->
        <div class="left-section"></div>

        <!-- Right Section with Solid Color -->
        <div class="right-section">
            <div class="vocabulary-box">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

