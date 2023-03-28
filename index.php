<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Must Music - Your Fav Music</title>
    <link rel="icon" href="img/logo.png" type="image/icon type">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" media="screen and (max-width: 700px)" href="phone.css">
</head>

<body>
    <div id="preloader"></div>

    <div class="navbar">
        <nav>
            <ul>
                <a href="/">
                    <li class="brand"><img src="img/logo.png" alt="Must Music">Must Music</li>
                </a>
                <li><a href="/">Home</a></li>
                <li><a href="/aboutme">About</a></li>
            </ul>
        </nav>
        <div class="social">
            <a href="https://twitter.com/Sharan_2208" target="_blank"><img src="img/twitter_logo.png" alt="Twitter"></a>
            <a href="https://www.instagram.com/sharan_2208/" target="_blank"><img src="img/insta_logo.png" alt="Instagram"></a>
            <a href="https://www.facebook.com/sharan2208/" target="_blank"><img src="img/fb_logo.png" alt="Facebook"></a>
        </div>
    </div>

    <div class="home_body">
        <div id="greeting">Good Morning</div>
        <div id="horizontalLine"></div>
        <div class="albumList">
            <span>ALBUMS</span>
            <div class="albumCovers">
                <?php
                include("db.php");
                $sql = "SELECT * FROM albums";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<img src='" . $row["COVER"] . "' id='" . $row["NAME"] . "' onclick='navigateAlbum(this)'>";
                    }
                }
                mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>

    <div class="bottom" id="hideBottom">
        <img alt="" id="masterSongCover">
        <div id="masterSongName"></div>
        <img src="img/playing.gif" alt="" id="gif">
        <div class="icons">
            <!-- fontawesome icons -->
            <i class="fa-solid fa-xl fa-backward-step" id="previous"></i>
            <i class="fa-solid fa-2xl fa-circle-play" id="masterPlay"></i>
            <i class="fa-solid fa-xl fa-forward-step" id="next"></i>
        </div>
        <div class="progressBarContent">
            <span id="masterSongProgressDuration"></span>
            <input type="range" name="range" id="myProgressBar" value="0" step="0.1">
            <span id="masterSongDuration"></span>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/7485876171.js" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>