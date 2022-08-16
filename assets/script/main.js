$(document).ready(function () {

    const rangeInputs = document.querySelectorAll('input[type="range"]')

    // Fonction pour deplacer le background en cliquant.
    function handleInputChange(e) {
        const min = e.target.min
        const max = e.target.max
        const val = e.target.value
        let current = (val - min) * 100 / (max - min);
        e.target.style.backgroundSize = current + '% 100%';
    }

    rangeInputs.forEach(input => {
        input.addEventListener('input', handleInputChange)
    });



    // Variable Cover + Vibrant();
    let img = document.querySelector(".player .cover");

    window.addEventListener('load', vibrant());

    function vibrant() {
        let vibrant = new Vibrant(img);
        let swatches = vibrant.swatches()

        for (var swatch in swatches) {
            if (swatches.hasOwnProperty(swatch) && swatches[swatch]) {
                // console.log(swatch, swatches[swatch].getHex())
                if (swatch == 'Vibrant') {
                    // console.log(swatches[swatch].getHex());
                    document.querySelector(':root').style.setProperty('--highlight', swatches[swatch]
                        .getHex())
                }
            }
        }
    }

    const playButton = document.querySelector('.play');
    const audio = document.getElementById('audioPlayer');
    const cover = document.querySelector('#playerCover');
    const artist = document.querySelector('.artist');
    const album = document.querySelector('.album');
    const song = document.querySelector('.song');
    let inputed;
    let blublu;
    let i = 0;
    let blubluEntered = false;
    const albums = document.querySelectorAll('.item_album');
    let musicIsPlaying = false;

    function getExDuration() {
        globalAudioDuration = audio.duration;
        rounded = Math.round(audio.duration);
        return rounded;
    };

    $('#soundControl').mouseup(function (e) {
        audio.volume = (this.value) / 100;
        console.log(audio.volume)
    });


    let exactDuration = getExDuration(); // Durée en s de la musique. *10 pour délai ms

    //Navigation dans la musique
    inputed = $("#durationRange").mouseup(function (e) {
        var leftOffset = e.pageX - $(this).offset().left;
        var songPercents = leftOffset / $("#durationRange").width();
        audio.currentTime = songPercents * audio.duration;
    });

    // Valeur de la jauge en cliquant.
    $('#durationRange').mouseup(function () {
        blublu = inputed[0].value;
        return blublu;
    });

    // Booléan pour check si la jauge a été utilisé
    $('#durationRange').mouseup(
        function () {
            blubluEntered = true
            return blubluEntered;
        }
    );

    // Loop pour faire avancer 
    function myLoop() {
        setTimeout(function () {
            if (blubluEntered) {
                $('#durationRange').val(blublu);
                $('#durationRange')[0].style.backgroundSize = blublu + '% 100%';
                blublu++;
                if (blublu < 100 && musicIsPlaying) {
                    myLoop(blublu);
                }
            } else {
                $("#durationRange").val(i);
                $('#durationRange')[0].style.backgroundSize = i + '% 100%';
                i++;
                if (i < 100 && musicIsPlaying) {
                    myLoop();
                }
            }
        }, exactDuration * 10);
    };

    // Fonction musique pour lancer et remettre a 0 a la séléction.
    document.querySelectorAll('.item_song').forEach(item => {
        item.addEventListener('click', (e) => {
            audio.src = item.getAttribute('song_path');
            cover.src = item.getAttribute('cover_path');
            artist.innerHTML = item.getAttribute('artist_name');
            song.innerHTML = item.getAttribute('song_name');
            album.innerHTML = item.getAttribute('album_name');
            blubluEntered = false;
            blublu = 0;
            i = 0;
            $('#durationRange').val(0);
            var exactDuration = getExDuration();
            myLoop();
            audio.pause();
            musicIsPlaying = false;
            setTimeout(function () {
                vibrant();
            }, 100);
            if (screen.width < 800) {
                toggleMenu();
            }
            return musicIsPlaying;
        });
    });

    // PLAY / PAUSE Function.
    playButton.addEventListener('click', () => {
        if (musicIsPlaying) {
            audio.pause();
            musicIsPlaying = false;
            playButton.src = "assets/images/svg/Play.svg";
            var tween = KUTE.to('#svgPlay', {
                path: '#svgPlayB'
            }).start();
            return musicIsPlaying;
        } else {
            myLoop();
            audio.play();
            playButton.src = "assets/images/svg/group 9.svg";
            musicIsPlaying = true;
            var tween = KUTE.to('#svgPlay', {
                path: '#svgRect'
            }).start();

            return musicIsPlaying;
        }
    });

    display('.albumid1', '.songContainer1');

    /* -------------------------------------------------------------------------- */
    /*                                  DARKMODE                                  */
    /* -------------------------------------------------------------------------- */
    document.querySelector('.param').onclick = function () {
        window.location.href = "addForm.php"
    }

    let root = document.querySelector(':root'); // raccourci pour target
    let actualMode = false; // booleen pour check le mode

    function goLight() {
        root.style.setProperty('--background', '#ffffff'); // change bg
        root.style.setProperty('--white', '#000000'); // change text
        actualMode = true; // toggle booleen
        localStorage.setItem('actualMode', actualMode); // ls.set le mode
        document.getElementById('dayNight').checked = true;
        return actualMode; // RETURN DUH
    }

    function goDark() {
        root.style.setProperty('--background', "#111111"); // change bg
        root.style.setProperty('--white', "#ffffff"); // change text
        actualMode = false; // toggle booleen
        localStorage.setItem('actualMode', actualMode); // ls.set le mode
        return actualMode; // RETURN DUH
    }

    window.onload = function () {
        let retrievedMode = localStorage.getItem('actualMode');
        console.dir(retrievedMode);
        if (retrievedMode == "true") {
            goLight();
        } else if (retrievedMode == "false") {
            goDark();
        }
    };

    function dayNightMode() {
        if (document.getElementById('dayNight').checked) {
            goLight();
        } else {
            goDark();
        }
    }

    document.getElementById('dayNight').onclick = function () {
        dayNightMode();
    }

    /* -------------------------------------------------------------------------- */
    /*                            DISPLAY ARTISTE ALBUM                           */
    /* -------------------------------------------------------------------------- */


    // Display la bonne cover
    function display(classAlbum, classContainer) {
        let albumsToDisplay = document.querySelector(classAlbum); // Param 1
        let albumsToDisP = document.querySelector(classAlbum + " p")
        let containerToDisplay = document.querySelector(classContainer); // Param 2
        let state = false; // Affiché ou pas.
        albumsToDisplay.addEventListener('click', function () {
            if (!state) {
                containerToDisplay.style.display = 'block';
                if (screen.width < 800) {
                    albumsToDisplay.style.height = "8rem";
                    albumsToDisplay.style.width = "8rem";
                    albumsToDisplay.style.minWidth = "8rem";
                    albumsToDisP.style.fontSize = "1rem"
                    albumsToDisplay.getBoundingClientRect().left = "0";
                }
                state = true; //-------------------------------------- ON
                return state;
            } else if (state) {
                containerToDisplay.style.display = 'none';
                if (screen.width < 800) {
                    albumsToDisplay.style.height = "22rem";
                    albumsToDisplay.style.width = "22rem";
                    albumsToDisplay.style.minWidth = "22rem";
                    albumsToDisP.style.fontSize = "1.6rem"

                }
                state = false; //------------------------------------- OFF
                return state;
            };
        });
    };

    // Array Display song from Albums
    let arrayAlbums = document.querySelectorAll('.item_album'); // Array avec les albums.
    arrayAlbums.forEach(function (element) { // Foreach album dans la liste
        let attrib = element.getAttribute('album_id'); // On prend l'id
        display('.albumid' + attrib, '.songContainer' + attrib); // Concatenation pour cibler la bonne div.
    });



    let artistArray = document.querySelectorAll('.item_artist_not_all');
    let albumArray = document.querySelectorAll('.item_album');
    let allArtist = document.querySelector('.allArtist');

    function displayArtistPerAlbum(argAttrib) {
        albumArray.forEach(function (element) {
            element.style.display = "none";
            if (element.getAttribute('id_artist') == argAttrib) {
                element.style.display = "block";
            }
        });
    }
    artistArray.forEach(function (element) {
        let attrib = element.getAttribute('id_artist');
        element.addEventListener('click', function () {
            displayArtistPerAlbum(attrib);
        })
    });

    allArtist.addEventListener('click', function () {
        albumArray.forEach(element => element.style.display = "block")
    });
});