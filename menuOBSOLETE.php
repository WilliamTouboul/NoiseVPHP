<?php include('head.php') ?>

<?php include 'model/model&query.php' ?>

<body class="bodyMenu">
    <nav>
        <h1>NoISE</h1>
    </nav>
    <main>
        <!-- -------------------------- Dernieres écoutes -------------------------- -->
        <div class="section">
            <h3>Derniére écoute</h3>
            <div class="content">
                <?php 
                    echo '<img class="cover" src="' . $last['cover'] . '" alt="">
                    <div class="track">
                    <p class="artist">' . $last['name'] . '</p>
                    <p class="piste">' . $last['song_name'] . '</p>
                    <div music-path="' . $last['path'] . '" style="display:none"></div>
                </div>';
              
                ?>

                <a href="player.html">
                    <img src="assets/images/svg/Play.svg" alt="">
                </a>
            </div>
        </div>

        <!-- ------------------------- Ecoutées Récemment -------------------------- -->
        <div class="recents section">
            <h3>Albums</h3>
            <div class="sliders sliderAlbum">
                <?php
                foreach ($albums as $item) {
                    echo '<a href="player.php?' . $item['id'] . '">
                    <img src="' . $item['cover'] . '" alt="' . $item['name'] . '" class="cover" album-id="' . $item['id'] . '">
                    </a>';
                }
                ?>
            </div>
        </div>

        <!-- --------------------------- Artiteste Préf ---------------------------- -->
        <div class="recents section">
            <h3>Vos artistes préférés</h3>
            <div class="sliders slidersArtistes">
                <?php
                foreach ($artists as $item) {
                    echo '<img src="' . $item['pic'] . '" alt="' . $item['name'] . '" class="cover" artist-id="' . $item['id'] . '">';
                }
                ?>
            </div>
        </div>


    </main>

    <div class="mentions">
        <a href="mentionsLegales.html">Mentions légales</a>
        <a href="contact.html">Contact</a>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>

</html>