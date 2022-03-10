<?php include('head.php') ?>
<?php include('model/model&query.php') ?>
<?php
if (isset($_POST['buttonSubmit'])) {
    $artist = $_POST['artist'];
    $pic = $_POST['pic'];
    $data = [
        'artist' => $artist,
        'pic' => $pic
    ];
    $sql = 'INSERT INTO artist (name,pic) VALUES (:artist,:pic)';
    $stmt = $connect->prepare($sql);
    $stmt->execute($data);
}

?>

<body class="bodyAdd">
    <div class="form">

        <form action="addForm.php" method="POST">
            <h2>Ajout d'un artiste</h2>
            <label for="artist">Nom de l'artiste : </label><input type="text" name="artist" id="artist" placeholder="Nom"><br>
            <label for="pic">Image de l'artiste : </label><input type="text" name="pic" id="pic" placeholder="Photo"><br>
            <input type="submit" name="buttonSubmit">

        </form>

        <div class="nav">
            <a href="main.php">
                << Retour
            </a>
            <a href="addAlbum.php">
                Ajout Album >>
            </a>
        </div>
    </div>

</body>