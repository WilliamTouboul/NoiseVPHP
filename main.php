<?php include('head.php') ?>
<?php include('model/model&query.php') ?>

<?php
$getInfo = 'SELECT artist.id, song_name, path, album_name, cover, artist.name AS artistName, pic FROM song JOIN album ON album.id = id_album JOIN artist ON id_artist = artist.id WHERE song.id=2';
$infos = getquery($connect, $getInfo);
?>

<body>
    <!-- ----------------------------------------------------------------------- -->
    <!--                                 PLAYER                                  -->
    <!-- ----------------------------------------------------------------------- -->
    <div class="player">
        <img src="<?= $infos['cover'] ?>" alt="" class="cover" id="playerCover">
        <div class="infos">
            <p class="artist"><?= $infos['artistName'] ?></p>
            <p class="album"><?= $infos['album_name'] ?></p>
            <p class="song"><?= $infos['song_name'] ?></p>
        </div>
        <!-- INPUT RANGE DURATION -->
        <input type="range" id="durationRange" min="0" max="100" value="0" step="1">
        <div class="commands">
            <!-- LOOP -->
            <svg class="loop" width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.1786 3.35274L16.1803 3.35273C16.6447 3.3488 17.1053 3.43638 17.5358 3.61047C17.9663 3.78455 18.3583 4.04174 18.6895 4.36734C19.0206 4.69293 19.2844 5.08057 19.4657 5.5081C19.6469 5.93537 19.7422 6.39411 19.7462 6.85819V9.44962C19.7462 9.67492 19.6567 9.89099 19.4974 10.0503C19.3381 10.2096 19.122 10.2991 18.8967 10.2991C18.6714 10.2991 18.4554 10.2096 18.2961 10.0503C18.1368 9.89099 18.0473 9.67492 18.0473 9.44962V6.85741H18.0473L18.0472 6.8536C18.0426 6.61232 17.9905 6.37431 17.8939 6.15317C17.7973 5.93203 17.6581 5.73208 17.4842 5.56475C17.3104 5.39743 17.1052 5.266 16.8805 5.17797C16.6564 5.09019 16.4173 5.04729 16.1767 5.0517H3.58482H3.09932L3.44394 5.39367L4.80827 6.7475L4.8083 6.74753C4.88792 6.8265 4.95112 6.92045 4.99424 7.02397C5.03737 7.12749 5.05958 7.23852 5.05958 7.35066C5.05958 7.4628 5.03737 7.57383 4.99424 7.67735C4.95112 7.78087 4.88792 7.87482 4.8083 7.95379L4.80714 7.95495C4.72817 8.03457 4.63422 8.09777 4.5307 8.1409C4.42718 8.18402 4.31615 8.20623 4.20401 8.20623C4.09187 8.20623 3.98084 8.18402 3.87732 8.1409C3.7738 8.09777 3.67985 8.03457 3.60088 7.95495L3.6003 7.95437L0.451857 4.80593L0.451275 4.80535C0.371655 4.72638 0.308458 4.63243 0.265331 4.52891C0.222204 4.42539 0.2 4.31436 0.2 4.20222C0.2 4.09008 0.222204 3.97904 0.265331 3.87553C0.308458 3.77201 0.371654 3.67806 0.451276 3.59909L0.451856 3.59851L3.6003 0.450065C3.76041 0.289951 3.97757 0.2 4.20401 0.2C4.43044 0.2 4.64761 0.289951 4.80772 0.450065C4.96783 0.610179 5.05779 0.82734 5.05779 1.05378C5.05779 1.28007 4.96794 1.4971 4.80802 1.65719C4.80792 1.65729 4.80782 1.65739 4.80772 1.65749L3.44394 3.01077L3.09932 3.35274H3.58482L16.1786 3.35274ZM16.3675 15.9465H16.853L16.5084 15.6045L15.1446 14.2513C15.1445 14.2512 15.1445 14.2511 15.1444 14.2511C14.9844 14.091 14.8945 13.8739 14.8945 13.6475C14.8945 13.4211 14.9845 13.204 15.1446 13.0438C15.3047 12.8837 15.5219 12.7938 15.7483 12.7938C15.9747 12.7938 16.1919 12.8837 16.352 13.0438L19.5005 16.1923L19.501 16.1929C19.5807 16.2718 19.6439 16.3658 19.687 16.4693C19.7301 16.5728 19.7523 16.6838 19.7523 16.796C19.7523 16.9081 19.7301 17.0192 19.687 17.1227C19.6439 17.2262 19.5807 17.3201 19.501 17.3991L19.5005 17.3997L16.352 20.5481L16.3514 20.5487C16.2725 20.6283 16.1785 20.6915 16.075 20.7347C15.9715 20.7778 15.8604 20.8 15.7483 20.8C15.6362 20.8 15.5251 20.7778 15.4216 20.7347C15.3181 20.6915 15.2241 20.6283 15.1452 20.5487L15.144 20.5476C15.0644 20.4686 15.0012 20.3746 14.9581 20.2711C14.9149 20.1676 14.8927 20.0566 14.8927 19.9444C14.8927 19.8323 14.9149 19.7213 14.9581 19.6177C15.0012 19.5142 15.0644 19.4203 15.144 19.3413L15.144 19.3413L16.5084 17.9874L16.853 17.6455H16.3675L3.77372 17.6455L3.77203 17.6455C3.30765 17.6494 2.84705 17.5618 2.41652 17.3877C1.98598 17.2137 1.59396 16.9565 1.26283 16.6309C0.931695 16.3053 0.66794 15.9176 0.486622 15.4901C0.305412 15.0628 0.210088 14.604 0.206085 14.14V11.5486C0.206085 11.3233 0.295584 11.1072 0.454892 10.9479C0.614201 10.7886 0.83027 10.6991 1.05557 10.6991C1.28086 10.6991 1.49693 10.7886 1.65624 10.9479C1.81555 11.1072 1.90505 11.3233 1.90505 11.5486V14.1408H1.90501L1.90508 14.1446C1.90968 14.3859 1.96176 14.6239 2.05836 14.845C2.15496 15.0662 2.29418 15.2661 2.46807 15.4335C2.64196 15.6008 2.84711 15.7322 3.0718 15.8202C3.29588 15.908 3.53502 15.9509 3.77563 15.9465H16.3675Z" />
            </svg>
            <!-- PREV -->
            <svg class="prev" width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.61243 9.57406L21.1342 0.798897C21.3093 0.699886 21.4968 0.834063 21.4968 0.990437L21.4968 18.5408C21.4968 18.6971 21.3093 18.8313 21.1342 18.7323L5.61243 9.95713C5.45825 9.86997 5.45825 9.66122 5.61243 9.57406Z" />
                <rect x="4.5" y="18.5" width="4" height="18" rx="1.5" transform="rotate(-180 4.5 18.5)" />
            </svg>
            <!-- PLAY -->
            <svg class="play" width="28" height="33" viewBox="0 0 28 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M27.1353 15.8408C27.6216 16.1307 27.6216 16.8693 27.1353 17.1592L1.57005 32.4002C1.11593 32.671 0.5 32.3492 0.5 31.7411V1.25894C0.5 0.650765 1.11593 0.329031 1.57005 0.599762L27.1353 15.8408Z" />
            </svg>
            <svg class="pause" width="38" height="53" viewBox="0 0 38 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="-0.5" y="0.5" width="15" height="52" rx="2.5" transform="matrix(-1 0 0 1 15 0)" />
                <rect x="-0.5" y="0.5" width="15" height="52" rx="2.5" transform="matrix(-1 0 0 1 37 0)" />
            </svg>

            <!-- NEXT -->
            <svg class="next" width="22" height="19" viewBox="0 0 22 19" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.3844 9.30846C16.5385 9.39563 16.5385 9.60437 16.3844 9.69154L0.862623 18.4667C0.687488 18.5657 0.5 18.4315 0.5 18.2752V0.724841C0.5 0.568469 0.687488 0.43429 0.862624 0.533303L16.3844 9.30846Z" />
                <rect x="17.5" y="0.5" width="4" height="18" rx="1.5" />
            </svg>
            <!-- SHUFFLE -->
            <svg class="shuffle" width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.5354 12.6937L7.56145 12.7457L7.61139 12.7757C7.66327 12.8068 7.69149 12.8331 7.70684 12.8536C6.51614 14.3538 4.93698 15.1021 2.95082 15.1021H0.885246C0.721466 15.1021 0.566652 15.0379 0.415426 14.8867C0.2642 14.7355 0.2 14.5806 0.2 14.4169C0.2 14.2531 0.264199 14.0983 0.415426 13.947C0.566653 13.7958 0.721466 13.7316 0.885246 13.7316H2.95082C3.83297 13.7316 4.65048 13.4883 5.39905 13.004C6.03305 12.5937 6.53662 12.0713 6.9077 11.4383L7.5354 12.6937ZM12.5588 5.03818C11.9248 5.44841 11.4212 5.97083 11.0501 6.60389L10.4224 5.3485L10.4079 5.31947L10.385 5.29652C10.3401 5.25166 10.3115 5.21508 10.2944 5.18691C11.4851 3.68709 13.0502 2.94005 15.007 2.94005H18.5059H18.9766L18.6498 2.60122L17.5117 1.42089L17.5117 1.42087L17.5091 1.4183C17.3201 1.22932 17.2515 1.06642 17.2515 0.9274C17.2515 0.788379 17.3201 0.625477 17.5091 0.436504L17.3682 0.295558L17.5091 0.436503C17.6808 0.264848 17.8365 0.2 17.9789 0.2C18.1232 0.2 18.2944 0.266506 18.4957 0.441333L21.1836 3.1292C21.3418 3.31341 21.4042 3.47776 21.4042 3.62529C21.4042 3.77282 21.3418 3.93718 21.1836 4.12139L18.5012 6.80377C18.3016 6.95108 18.1359 7.00843 18 7.00843C17.7965 7.00843 17.6378 6.94274 17.5091 6.81408C17.3201 6.62511 17.2515 6.46221 17.2515 6.32318C17.2515 6.18416 17.3201 6.02126 17.5091 5.83229L17.5091 5.83231L17.5117 5.82969L18.6498 4.64937L18.9766 4.31054H18.5059H15.007C14.1249 4.31054 13.3074 4.55381 12.5588 5.03818ZM9.61571 11.7031L9.1555 10.9082L8.18901 8.93317L8.18904 8.93315L8.18749 8.93012L7.17578 6.94886L7.17581 6.94884L7.17413 6.94569C6.71132 6.07793 6.1271 5.41677 5.41748 4.97326C4.70721 4.52934 3.88257 4.31054 2.95082 4.31054H0.885246C0.721466 4.31054 0.566653 4.24634 0.415426 4.09511C0.264199 3.94389 0.2 3.78907 0.2 3.62529C0.2 3.46151 0.264199 3.3067 0.415426 3.15547C0.566653 3.00425 0.721466 2.94005 0.885246 2.94005H2.95082C4.12228 2.94005 5.19554 3.24594 6.17503 3.85812C7.15464 4.47038 7.88731 5.29149 8.37663 6.32449L8.37647 6.32457L8.38039 6.33203L8.80139 7.13191L8.80194 7.13296L9.81172 9.11049L10.7805 11.0903L10.7805 11.0903L10.7826 11.0944C11.1926 11.885 11.7791 12.5225 12.5392 13.0049C13.301 13.4884 14.1249 13.7316 15.007 13.7316H18.5059H18.9766L18.6498 13.3928L17.5117 12.2125L17.5117 12.2124L17.5091 12.2099C17.3201 12.0209 17.2515 11.858 17.2515 11.719C17.2515 11.5799 17.3201 11.417 17.5091 11.2281C17.6808 11.0564 17.8365 10.9916 17.9789 10.9916C18.1235 10.9916 18.2951 11.0583 18.4969 11.2339L21.2689 13.9219C21.4263 14.1056 21.4885 14.2696 21.4885 14.4169C21.4885 14.5644 21.4261 14.7287 21.2679 14.913L18.5808 17.6C18.4164 17.7392 18.2523 17.8 18.0843 17.8C17.8809 17.8 17.7221 17.7343 17.5934 17.6056C17.4044 17.4167 17.3358 17.2538 17.3358 17.1148C17.3358 16.9757 17.4044 16.8128 17.5934 16.6239L18.7737 15.4435L19.1152 15.1021H18.6323H15.0913C13.9199 15.1021 12.8541 14.7962 11.8893 14.1847C10.9218 13.5715 10.1658 12.7478 9.61961 11.7101L9.61975 11.7101L9.61571 11.7031Z" />
            </svg>
        </div>

        <!-- INPUT RANGE VOLUME-->
        <input type="range" min="0" max="100" step="1" value="50" id="soundControl">
    </div>

    <!-- ----------------------------------------------------------------------- -->
    <!--                                  MAIN                                   -->
    <!-- ----------------------------------------------------------------------- -->
    <div class="main">
        <!-- --------------------------------- nav --------------------------------- -->
        <nav>
            <h1>NOISE</h1>
            <div class="search">
                <input type="text" placeholder="Recherche...">
                <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M28 28L21.6252 21.6138L28 28ZM25.1579 13.0789C25.1579 16.2825 23.8853 19.3548 21.6201 21.6201C19.3548 23.8853 16.2825 25.1579 13.0789 25.1579C9.87541 25.1579 6.80308 23.8853 4.53784 21.6201C2.2726 19.3548 1 16.2825 1 13.0789C1 9.87541 2.2726 6.80308 4.53784 4.53784C6.80308 2.2726 9.87541 1 13.0789 1C16.2825 1 19.3548 2.2726 21.6201 4.53784C23.8853 6.80308 25.1579 9.87541 25.1579 13.0789V13.0789Z" stroke="white" stroke-width="2" stroke-linecap="round" />
                </svg>
            </div>
        </nav>

        <!-- -------------------------------- menu --------------------------------- -->
        <div class="menu">
            <div class="top">
                <!-- SLIDERS 1 -->
                <h2>Albums : </h2>
                <div class="sliders sliders_album">
                    <?php
                    foreach ($albums as $item) {
                        // On prend tout les albums un par un $item dans la liste des album $albums
                        echo ' <div class="item item_album albumid' . $item['id'] . '" id_artist="' . $item['id_artist'] . '" album_id="' . $item['id'] . '" style="background-image:url(\'' . $item['cover'] . '\')">
                        <p>' . $item['album_name'] . '</p>
                    </div>';
                        // Pour chaque $item dans $album on fait une query avec l'id ($item['id']) de l'album. 
                        $querySongPerAlbum = 'SELECT song.id AS song_id, song_name, id_album, song.path AS song_path, album.id AS album_id, album_name, id_artist, artist.name AS artist_name, cover FROM song 
                        JOIN album on id_album = album.id
                        JOIN artist on album.id_artist = artist.id
                        WHERE id_album = ' . $item['id'];
                        //On enregistre dans une variable nommé différement a chaque fois un tableau qui nous renvoi toutes les pistes de l'album choisi
                        ${'test' . $item['id']} =  getArray($connect, $querySongPerAlbum);
                    ?> <div class="songContainer songContainer<?= $item['id'] ?>">
                            <?php
                            // Pour chaque musique $item dans l'array qu'on vient de recupérer, on ecrit ce qu'on veut
                            foreach (${'test' . $item['id']} as $item) {
                                echo ' <div class="item_song songAlbum' . $item['id_album'] . ' id_song_' . $item['song_id'] . '" id_album=' . $item['id_album'] . ' id_song=' . $item['song_id'] . ' song_path=' . $item['song_path'] . ' cover_path=' . $item['cover'] . ' album_name=' . $item['album_name'] . ' artist_name=' . $item['artist_name'] . ' song_name=' . $item['song_name'] . '>
                            <img src=' . $item['cover'] . ' alt="cover" class="cover">
                            <p>' . $item['song_name'] . '</p>
                            <p class="display_id_song" > ' . $item['song_id'] . '</p>
                        </div>';
                            };
                            ?> </div>
                    <?php
                    }
                    ?>
                </div>

                <!-- SLIDERS 2 -->
                <h2 class="artist_title">Artistes :</h2>
                <div class="sliders sliders_artist">
                    <?php
                    foreach ($artists as $item) {
                        echo ' <div class="item_artist" id_artist="' . $item['id'] . '" style="background-image:url(\'' . $item['pic'] . '\')">
                        <p>' . $item['artistName'] . '</p>
                    </div>';
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>


    <audio id="audioPlayer" preload="metadata" controls>
        <source src="assets/music/sounds/Advice/Advice.mp3" type="audio/mpeg">
    </audio>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {

            function getExDuration() {
                globalAudioDuration = audio.duration;
                rounded = Math.round(audio.duration);
                return rounded;
            };

            let exactDuration = getExDuration();
            // ( ex:204 -> * 10 => 2040, ecart en ms );
            for (i = 0; i = 100; i++) {

            };
            var i = 1; //  set your counter to 1
            function myLoop() {
                setTimeout(function() {
                    console.log('hello' + i);
                    $("#durationRange").val(i);
                    i++;
                    if (i < 100) {
                        myLoop();
                    }
                }, exactDuration * 10)
            }
            
            myLoop();

            //Navigation dans la musique
            $("#durationRange").mouseup(function(e) {
                var leftOffset = e.pageX - $(this).offset().left;
                var songPercents = leftOffset / $("#durationRange").width();
                console.log(songPercents);
                audio.currentTime = songPercents * audio.duration;
                console.log(audio.currentTime);
                return songPercents;
            });
        });
    </script>

    <script>
        const albums = document.querySelectorAll('.item_album');
        console.log(albums.length);

        function display(classAlbum, classContainer) {
            let albums = document.querySelector(classAlbum);
            let container = document.querySelector(classContainer);
            let state = false;
            albums.addEventListener('click', function() {
                if (!state) {
                    container.style.display = 'block';
                    state = true;
                    return state;
                } else if (state) {
                    container.style.display = 'none';
                    state = false;
                    return state;
                };
            });
        };

        for (i = 1; i <= albums.length; i++) {
            display('.albumid' + i, '.songContainer' + i);
        };

        /* -------------------------------------------------------------------------- */
        /*                                    MUSIC                                   */
        /* -------------------------------------------------------------------------- */
        const playButton = document.querySelector('.play');
        const audio = document.getElementById('audioPlayer');
        const cover = document.querySelector('#playerCover');
        const artist = document.querySelector('.artist');
        const album = document.querySelector('.album');
        const song = document.querySelector('.song');

        document.querySelectorAll('.item_song').forEach(item => {
            item.addEventListener('click', (e) => {
                audio.src = item.getAttribute('song_path');
                cover.src = item.getAttribute('cover_path');
                artist.innerHTML = item.getAttribute('artist_name');
                song.innerHTML = item.getAttribute('song_name');
                album.innerHTML = item.getAttribute('album_name');

                setTimeout(function() {
                    vibrant();
                }, 100);
            });
        });
        musicIsPlaying = false;


        playButton.addEventListener('click', () => {
            if (musicIsPlaying) {
                audio.pause();
                musicIsPlaying = false;
            } else {
                audio.play();
                musicIsPlaying = true;
            }
        });



        display('.albumid1', '.songContainer1');
    </script>

    <script src="assets/script/range.js"></script>
    <script src="assets/Script/slider.js"></script>
    <script src="assets/script/Vibrant.js"></script>
    <script src="assets/script/main.js"></script>
</body>

</html>