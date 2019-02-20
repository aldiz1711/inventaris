<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Absen Siswa SMKN 4 Tangerang</title>
    <!-- Assets Core -->
    <?php require_once('assets/core.php'); ?>
    <!-- PHP CORE -->
    <?php
    require_once('controller/pages.php');
    $page = new Page();
    $page->CheckingQuery();
    ?>
</head>
<body>
    <?php $page->CorePages(); ?>
</body>
</html>