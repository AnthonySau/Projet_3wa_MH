<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Monster Hunter</title>
    <!-- Iconify -->
    <script src="https://code.iconify.design/2/2.2.0/iconify.min.js"></script>
    <!-- App CSS -->
    <link rel="stylesheet" href="./public/css/app.css">
    <!-- Menu CSS -->
    <link rel="stylesheet" href="./public/css/menu.css">
    <!-- Home CSS -->
    <link rel="stylesheet" href="./public/css/home.css">
    <!-- Menu burger JS -->
    <script src="./public/js/menu.js" defer></script>
</head>

<body>
    <?php require './views/partials/_header.php'; ?>
    <main class="container-main">
        <?php require $templatePath ?>
    </main>
    <?php require './views/partials/_footer.php'; ?>
</body>

</html>