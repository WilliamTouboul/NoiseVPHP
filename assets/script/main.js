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


$(document).ready(function () {
    // Variable -------------------------------------------------
    // ----------------------------------------------------------
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

    // Display la bonne cover dans le 
    function display(classAlbum, classContainer) {
        let albums = document.querySelector(classAlbum);
        let container = document.querySelector(classContainer);
        let state = false;
        albums.addEventListener('click', function () {
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
            return musicIsPlaying;
        });
    });

    // PLAY / PAUSE Function.
    playButton.addEventListener('click', () => {
        if (musicIsPlaying) {
            audio.pause();
            musicIsPlaying = false;
            playButton.src = "assets/images/svg/Play.svg";
            return musicIsPlaying;
        } else {
            myLoop();
            audio.play();
            playButton.src = "assets/images/svg/group 9.svg";
            musicIsPlaying = true;
            return musicIsPlaying;
        }
    });

    display('.albumid1', '.songContainer1');

    /* --------------------------------- SLIDERS -------------------------------- */
    const slider = document.querySelector('.sliders');
    let isDown = false;
    let startX;
    let scrollLeft;

    document.querySelectorAll('.sliders').forEach(item => {
        item.addEventListener('mousedown', (e) => {
            isDown = true;
            startX = e.pageX - slider.offsetLeft;
            scrollLeft = slider.scrollLeft;
            item.style.cursor = "grabbing";
        });
    });

    document.querySelectorAll('.sliders').forEach(item => {
        item.addEventListener('mouseleave', (e) => {
            isDown = false;
            item.style.cursor = "grab";
        });
    });

    document.querySelectorAll('.sliders').forEach(item => {
        item.addEventListener('mouseup', (e) => {
            isDown = false;
            item.style.cursor = "grab";
        });
    });

    document.querySelectorAll('.sliders').forEach(item => {
        item.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - slider.offsetLeft;
            const walk = (x - startX) * 1.8;
            item.scrollLeft = scrollLeft - walk;
            item.style.cursor = "grab";
        });
    });

    const mouseMoveHandler = function (e) {
        const dx = e.clientX - pos.x;
        const dy = e.clientY - pos.y;

        ele.scrollTop = pos.top - dy;
        ele.scrollLeft = pos.left - dx;
    };
});