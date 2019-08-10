<?php
include "functions.php";

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Hello, world!</title>
</head>
<body>
<header class="header-default">
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item mx-3">
                <a href="index.php?action=seed" class="btn btn-primary">Seed</a>
            </li>
            <li class="nav-item">
                <?php include './partials/add-qoute-form.php'; ?>
            </li>
        </ul>
    </div>
    </div>

</nav>
    <div class="d-flex justify-content-center">
        <h1 class="text-white font-weight-bold display-2">Quotes for life</h1>
    </div>
</header>
