<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Monster Hunter</title>
    <!-- Iconify -->
    <script src="https://code.iconify.design/2/2.2.0/iconify.min.js"></script>
    <!-- Font Family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Volkhov:ital@0;1&display=swap"
        rel="stylesheet">
    <!-- App CSS -->
    <link rel="stylesheet" href="./public/css/app.css">
    <!-- Nav CSS -->
    <link rel="stylesheet" href="./public/css/nav.css">
    <!-- Footer CSS -->
    <link rel="stylesheet" href="./public/css/footer.css">
    <!-- Home CSS -->
    <link rel="stylesheet" href="./public/css/home.css">
    <!-- Menu JS -->
    <script src="./public/js/menu.js" defer></script>
    <!-- register CSS -->
    <link rel="stylesheet" href="./public/css/register.css">
</head>

<body>
    <?php require './views/partials/_header.php'; ?>
    <main class="container-main">
        <?php require $templatePath ?>
    </main>
    <?php require './views/partials/_footer.php'; ?>
</body>

</html>