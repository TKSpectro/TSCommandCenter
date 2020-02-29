<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <style>
    </style>
    <script src="assets/js/jquery-3.4.1.min.js"></script>
</head>
<body>
<header>
    <? include __DIR__ . '/shared/header.php'; ?>
</header>
<!-- include sidenav -->
<?= $body; ?>
<footer>
</footer>
</body>
</html>