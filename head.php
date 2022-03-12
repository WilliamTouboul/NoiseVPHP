    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <?php
        if (basename($_SERVER['PHP_SELF']) == 'index.php') {
            $css = 'assets/style/index.css';
        } else if (basename($_SERVER['PHP_SELF']) == 'main.php') {
            $css = 'assets/style/style.css';
        } else if (basename($_SERVER['PHP_SELF']) == 'addForm.php' || basename($_SERVER['PHP_SELF']) == 'addAlbum.php' || basename($_SERVER['PHP_SELF']) == 'addSong.php') {
            $css = 'assets/style/addForm.css';
        }
        ?>
        <link rel="stylesheet" href=<?= $css ?>>
        <link rel="stylesheet" href="assets/style/responsive.css">
        <link rel="icon" type="image/png" href="assets/images/svg/NFavLogo.png" />

    </head>