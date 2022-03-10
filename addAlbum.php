<?php include('head.php') ?>
<?php include('model/model&query.php') ?>
<?php
if (isset($_POST['buttonSubmit'])) {
    $artist = $_POST['artist'];
    $album = $_POST['album'];
    $cover = $_POST['cover'];
    $data = [
        'artist' => $artist,
        'album' => $album,
        'cover' => $cover
    ];
    $sql = 'INSERT INTO album (album_name,id_artist,cover) VALUES (:album,:artist,:cover)';
    $stmt = $connect->prepare($sql);
    $stmt->execute($data);
}

?>

<body class="bodyAdd">
    <div class="form">
        <a href="addSong.php">song</a>

        <form action="addAlbum.php" method="POST">
            <select class="form-control" name="artist" id="artist">
                <?php
                foreach ($artists as $item) {
                    echo '<option value=' . $item['id'] . '>' . $item['artistName'] . '</option>';
                }
                ?>
            </select>
            <input type="text" name="album" id="album" placeholder="Nom de l'album" ><br>
            <input type="text" name="cover" id="cover" placeholder="Couverture" ><br>
            <input type="submit" name="buttonSubmit">
        </form>


        <div class="nav">
            <a href="main.php">
                << Retour </a>
                    <a href="addSong.php">
                        Ajout Musique >>
                    </a>
        </div>
    </div>


</body>