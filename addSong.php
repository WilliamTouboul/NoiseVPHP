<?php include('head.php') ?>
<?php include('model/model&query.php') ?>
<?php
if (isset($_POST['buttonSubmit'])) {
    $album = $_POST['album'];
    $song = $_POST['song'];
    $path = $_POST['path'];
    $data = [
        'album' => $album,
        'song' => $song,
        'path' => $path
    ];
    $sql = 'INSERT INTO song (song_name,id_album,path) VALUES (:song,:album,:path)';
    $stmt = $connect->prepare($sql);
    $stmt->execute($data);
}
?>

<body class="bodyAdd">
    <div class="form">
        <form action="addSong.php" method="POST">
            <select class="form-control" name="album" id="album">
                <?php
                foreach ($albums as $item) {
                    echo '<option value=' . $item['id'] . '>' . $item['album_name'] . '</option>';
                }
                ?>
            </select>
            <input type="text" name="song" id="song" placeholder="Nom de la musique"><br>
            <input type="text" name="path" id="path" placeholder="Musique"><br>
            <input type="submit" name="buttonSubmit">
        </form>

        <div class="nav">
            <a href="main.php">
                << Retour </a>
        </div>
    </div>


</body>