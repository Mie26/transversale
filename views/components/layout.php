<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=<?= $description ?>>
    <title><?= $title ?></title>
    <link rel="stylesheet" href="public/style/bootstrap-4.0.0-dist/css/bootstrap.min.css">
</head>
<body class="min-vh-100 d-flex flex-column">
    <?php require_once("header.php"); ?>

    <main class="flex-grow-1">
        <?= $content ?>
    </main>

    <?php require_once("footer.php"); ?>
</body>
</html>