<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type, application/json');
?>

<!DOCTYPE html>
<html lang="hu" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pénzügyi Nyilvántartó</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <header>
        <div class="container">
            <nav
                class="navbar navbar-expand-sm navbar-dark bg-dark">
                <a class="navbar-brand" href="/">Financial Tracker</a>
                <button
                    class="navbar-toggler-icon d-lg-none"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavId"
                    aria-controls="collapsibleNavId"
                    aria-expanded="false"
                    aria-label="Toggle navigation"></button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/" aria-current="page">Dashboard <span class="visually-hidden">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/profile">Profile</a>
                        </li>
                    </ul>
                </div>
            </nav>


        </div>
    </header>

    <main>
        <?php
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        if ($uri === '/') {
            require_once 'templates/dashboard.php';
        } else if ($uri === '/profile') {
            echo '<h3 class="text-center mt-5">Not implemented yet</h3>';
        }
        ?>
    </main>

    <footer class="text-center text-muted py-3">
        <p>&copy; 2024 Kiss Attila</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/menu.js"></script>
</body>

</html>