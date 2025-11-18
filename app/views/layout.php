<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php require __DIR__ . '/partials/header.php'; ?>
</head>
<body class="dark-theme">

    <?php require __DIR__ . '/partials/navbar.php'; ?>

    <main class="container mt-4">
        <?= $content ?> 
    </main>

    <?php require __DIR__ . '/partials/footer.php'; ?>
</body>
</html