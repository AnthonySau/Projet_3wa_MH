<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Monster Hunter</title>
    <!-- Iconify -->
    <script src="https://code.iconify.design/2/2.2.0/iconify.min.js"></script>
    <!-- Menu Burger CSS -->
    <link rel="stylesheet" href="./public/css/menuBurger.css">
    <!-- Menu burger JS -->
    <script src="./public/js/menuBurger.js" defer></script>
</head>

<body>
    <?php require './views/partials/_header.php'; ?>
    <main>
        <?php require $templatePath ?>
    </main>
    <?php require './views/partials/_footer.php'; ?>
</body>

</html>