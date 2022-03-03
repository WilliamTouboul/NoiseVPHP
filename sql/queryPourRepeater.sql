/* -------------------------------------------------------------------------- */
/*                               Repeater Album                               */
/* -------------------------------------------------------------------------- */
SELECT album.id AS album_id, Album_name, id_artist, cover, artist.id AS artist_id, artist.name AS artist_name, pic FROM album 
JOIN artist ON id_artist = artist.id
WHERE id_artist = $i;


/* -------------------------------------------------------------------------- */
/*                                Repeater SONG                               */
/* -------------------------------------------------------------------------- */
SELECT song.id AS song_id, song_name, id_album, song.path AS song_path, album.id AS album_id, album_name, id_artist, cover FROM song 
JOIN album on id_album = album.id
WHERE id_album = 1;