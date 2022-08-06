<!doctype html>
<html lang="fr">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Blog - Monster Hunter</title>
      <!-- Iconify -->
      <script src="https://code.iconify.design/2/2.2.0/iconify.min.js"></script>
      <!-- Font awesome -->
      <script src="https://kit.fontawesome.com/b87194bec0.js" crossorigin="anonymous"></script>
      <!-- Font Family -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Volkhov:ital@0;1&display=swap" rel="stylesheet">
      <!-- App CSS -->
      <link rel="stylesheet" href="./public/css/app.css">
      <!-- Burger JS -->
      <script src="./public/js/menuBurger.js" defer></script>
      <!-- Search JS -->
      <script src="./public/js/search.js" defer></script>
      <!-- scrolling JS -->
      <script src="./public/js/scrollingMenu.js" defer></script>
</head>

<body>
      <?php require './views/partials/_header.php'; ?>
      <main>
            <?php require $templatePath ?>
      </main>
      <?php require './views/partials/_footer.php'; ?>
</body>

</html>