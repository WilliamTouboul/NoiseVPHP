
<?php
/* -------------------------------- Connexion ------------------------------- */
$connect = new PDO('mysql:host=localhost;dbname=noise', 'root', '');

/* -------------------------------- Functions ------------------------------- */
function getSingleValue($conn, $query)
{
    $q = $conn->prepare($query);
    $q->execute();
    return $q->fetchColumn();
}

function getArray($conn, $query)
{
    $q = $conn->prepare($query);
    $q->execute();
    $result = $q->fetchAll();
    return $result;
}
function getQuery($conn, $query)
{
    $q = $conn->query($query);
    $result = $q->fetch();
    return $result;
}

/* -------------------------- Appels des functions -------------------------- */

$queryAlbums = 'SELECT album.id, album_name, artist.name AS artistName, id_artist, cover, pic FROM album LEFT JOIN artist ON album.id_artist = artist.id ORDER BY album.id';
$albums = getArray($connect, $queryAlbums);

$queryArtist = 'SELECT id,name AS artistName, pic FROM artist ORDER BY id';
$artists = getArray($connect, $queryArtist);


$queryLast = 'SELECT song_name,album_name, artist.name AS artistName, album.cover, song.path FROM song JOIN album ON song.id_album = album.id JOIN artist ON album.id_artist = artist.id WHERE song.id=2';
$last = getQuery($connect, $queryLast);

?>
