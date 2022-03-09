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

<body>
    <a href="addAlbum.php">ALBUM</a>

    <form action="addForm.php" method="POST">
        ARTIST: <input type="text" name="artist" id="artist"><br>
        PIC: <input type="text" name="pic" id="pic"><br>
        <input type="submit" name="buttonSubmit">
    </form>


</body>