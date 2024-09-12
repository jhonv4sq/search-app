<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_ENV['APP_NAME']; ?></title>
    <link rel="stylesheet" href="/assets/css/app.css">
</head>
<body class="screen-cemter">
    <section class="container">
        <?php echo $content; ?>
    </section>
    <script src="/assets/js/app.js"></script>
</body>
</html>
