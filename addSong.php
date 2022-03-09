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

<body>
    <form action="addSong.php" method="POST">
        <select class="form-control" name="album" id="album">
            <?php
            foreach ($albums as $item) {
                echo '<option value=' . $item['id'] . '>' . $item['album_name'] . '</option>';
            }
            ?>
        </select>
        SONG <input type="text" name="song" id="song"><br>
        path: <input type="text" name="path" id="path"><br>
        <input type="submit" name="buttonSubmit">
    </form>


</body>