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
      <link href="https://fonts.googleapis.com/css2?family=Volkhov:ital@0;1&display=swap" rel="stylesheet">
      <!-- App CSS -->
      <link rel="stylesheet" href="./public/css/app.css">
      <!-- Nav CSS -->
      <link rel="stylesheet" href="./public/css/nav.css">
      <!-- Home CSS -->
      <link rel="stylesheet" href="./public/css/home.css">
      <!-- Article CSS -->
      <link rel="stylesheet" href="./public/css/article.css">
      <!-- register CSS -->
      <link rel="stylesheet" href="./public/css/forms.css">
      <!-- Footer CSS -->
      <link rel="stylesheet" href="./public/css/footer.css">
      <!-- APP JS -->
      <script src="./public/js/app.js" defer></script>
</head>

<body>
      <div class="parralax">
            <?php require './views/partials/_header.php'; ?>
            <main class="container-main">
                  <?php require $templatePath ?>
            </main>
            <?php require './views/partials/_footer.php'; ?>
      </div>
</body>

</html>