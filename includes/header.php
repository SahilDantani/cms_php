<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">
    <title>My blog</title>

</head>

<body>
    <div class="container">
    <header>
        <h1>My body</h1>
    </header>

    <nav>
        <ul class="nav">
            <li class="nav-item"><a class="nav-link" href="/php_web/cms_php/">Home</a></li>
            <?php if (Auth::isLoggedIn()) : ?>
                <li class="nav-item"><a class="nav-link" href='/php_web/cms_php/admin'>Admin</a></li>
                <li class="nav-item"><a class="nav-link" href="/php_web/cms_php/logout.php">Log out</a></li>
            <?php else : ?>
                <li class="nav-item"><a class="nav-link" href="/php_web/cms_php/login.php">Log in</a></li>
            <?php endif; ?>
            <li class="nav-item"><a class="nav-link" href="/php_web/cms_php/contact.php">Contact</a></li>
        </ul>
    </nav>

    <main>