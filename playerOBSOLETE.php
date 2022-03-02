<?php include('head.php') ?>

<?php include 'model/model&query.php' ?>

<?php
$url = "http://";
$url .= $_SERVER['HTTP_HOST'];
$url .= $_SERVER['REQUEST_URI'];
$arr = parse_url($url);
$idToFetch = $arr['query'];
$getInfo = 'SELECT * FROM album JOIN artist ON album.id_artist = artist.id WHERE artist.id=' . $idToFetch . '';
$infos = getquery($connect, $getInfo);
var_dump($infos);
echo $infos['name'];


?>

<body>


    <script>
        let bloblo = "<?php echo $infos['name'] ?>";
        console.log(bloblo);
    </script>

    <audio id="my-audio" preload controls>
        <source src="assets/music/sounds/taemin.mp3" type="audio/mpeg">
    </audio>
    <!-- ----------------------------- CDN Jquery ------------------------------ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- ---------------------------- CDN Jquery UI ---------------------------- -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <!-- --------------------------- Script VIBRANT ---------------------------- -->
    <script src="assets/script/Vibrant.js"></script>
    <!-- -------------------------------- My JS -------------------------------- -->
    <script src="assets/script/main.js"></script>
</body>





</html>