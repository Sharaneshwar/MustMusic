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

    <div class="aboutMe">
        <div class="myContent">
            Website Developed By <br>
            <span id="author">
                <div>Sharaneshwar</div>
                <div>Bharat</div>
                <div>Punjal</div>
            </span>
            <span id="thankYou">Thank You!</span>
        </div>
        <div class="myImage" align="center">
            <img src="img/me.png">
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