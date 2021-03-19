<!doctype html>
<html lang="ru" class="h-100">
<head>
    <meta charset="utf-8">
    <title>My custom site</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
            crossorigin="anonymous"></script>
    <style>
        <?php include 'css/cover.css'; ?>
    </style>


</head>
<body class="d-flex h-100 text-center text-white bg-dark">

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">
        <div>
            <nav class="nav nav-masthead justify-content-center float-md-start mb-0">
                <h4>
                    <a class="nav-link" href="/">Abstract Products</a>
                </h4>
            </nav>

            <nav class="nav nav-masthead justify-content-center float-md-end">
                <?php if (isset($_SESSION['loggedUser']) && $_SESSION['role'] == 'admin') { ?>
                    <a class="nav-link" href="/orders">Orders by Products</a>
                    <ul class="nav" style="border: none; margin-left: 1rem;">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="dropdown01" data-bs-toggle="dropdown"
                               aria-expanded="false">Export</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown01" data-bs-popper="none">
                                <li><a class="dropdown-item" href="/export/csv/">CSV</a></li>
                                <li><a class="dropdown-item" href="/export/json/">JSON</a></li>
                                <li><a class="dropdown-item" href="/export/xml/">XML</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php } ?>
                <a class="nav-link" href="/cart">Cart</a>
                <a class="nav-link" href="/products">Products</a>

                <?php if (isset($_SESSION['loggedUser'])) { ?>
                    <a class="nav-link" href="/logout">Logout</a>
                <?php } else { ?>
                    <a class="nav-link" href="/login">Login</a>
                <?php } ?>
            </nav>

        </div>
    </header>

    <main role="main" class="inner cover">
        <?php if (isset($template))
            require_once($template . ".php");
        else { ?>
            <div class="row">
                <h1>This is home page</h1>
            </div>
        <?php } ?>
    </main>

    <footer class="mastfoot mt-auto">
        <div class="inner">
            <p>by <a href="https://github.com/SoulWalker5">@soulwalker5</a></p>
        </div>
    </footer>
</div>
</body>
</html>

