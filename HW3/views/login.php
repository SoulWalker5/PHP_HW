<!doctype html>
<html lang="ru" class="h-100">
<head>
    <meta charset="utf-8">
    <title>My custom site</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
            crossorigin="anonymous"></script>
    <style>
        <?php include 'css/cover.css'; ?>
    </style>


</head>

<body class="d-flex h-100 text-center align-items-center text-white bg-dark">
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column justify-content-center">
    <h5 class="mt-3">Join over 25 million <br> learners from around the globe</h5> <small
        class="mt-2 text-muted">Master the languages of the web: HTML, CSS and javascript. This path will
        prepare you to build basic websites and then build interactive web apps</small>
    <form name="registerUser" method="POST">
        <div class="form-input">
            <i class="fa fa-envelope"></i>
            <input type="email" name="email" class="form-control" placeholder="Email address">
        </div>
        <div class="form-input">
            <i class="fa fa-lock"></i>
            <input type="password" name="password" class="form-control" placeholder="password">
        </div>
        <button class="btn btn-primary mt-4 signup" type="submit">Login</button>
    </form>
    <div class="text-center mt-3">
        <span>Or continue with these social profile</span>
    </div>
    <div class="d-flex justify-content-center mt-4">
            <span class="social">
                <i class="fa fa-google"></i>
            </span>
    </div>
    <div class="text-center mt-4">
        <span>Still not a member?</span>
        <a href="/register" class="text-decoration-none">Register</a>
    </div>
</div>
</body>