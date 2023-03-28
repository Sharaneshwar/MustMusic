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
                <a href="index.php">
                    <li class="brand"><img src="img/logo.png" alt="Must Music">Must Music</li>
                </a>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
        </nav>
        <div class="social">
            <a href="https://twitter.com/Sharan_2208" target="_blank"><img src="img/twitter_logo.png" alt="Twitter"></a>
            <a href="https://www.instagram.com/sharan_2208/" target="_blank"><img src="img/insta_logo.png" alt="Instagram"></a>
            <a href="https://www.facebook.com/sharan2208/" target="_blank"><img src="img/fb_logo.png" alt="Facebook"></a>
        </div>
    </div>

    <?php
    include("db.php");
    parse_str(parse_url("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]")['query'], $params);
    $album = $params['value'];
    $cover;
    $sql = "SELECT * FROM albums WHERE NAME='$album'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $cover = $row["COVER"];
            echo "<div class='container' style='background-color: " . $row['COLOR'] . "BF'><div class='songAlbum'>";
            echo "<div id='albumTitle'>" . $row["TITLE"] . "</div>";
            echo "<img id='albumCover' src='" . $row["COVER"] . "'>";
        }
    }
    echo "</div>
    <div class='songList'>Songs
    <div id='songItemContainer'>";
    $sql = "SELECT * FROM " . strtolower($album);
    $result = mysqli_query($conn, $sql);
    $data = array();
    if (mysqli_num_rows($result) > 0) {
        for ($i = 0; $row = mysqli_fetch_assoc($result); $i++) {
            echo "<div class='songItem'>
            <img src='" . $cover . "'>
            <span class='songName'>" . $row["NAME"] . "</span>
            <span class='songListPlay'>
                <span class='timestamp'>" . $row["DURATION"] . "</span>
                <i id=$i class='songItemPlay fa-solid fa-circle-play'></i>
            </span>
            </div>";
            $data[$i] = $row;
        }
    }
    mysqli_close($conn);
    echo "</div></div></div>";
    $json = json_encode($data);
    $cover = json_encode($cover);
    ?>

    <div class="bottom">
        <div><img alt="" id="masterSongCover"></div>
        <div id="masterSongName"></div>
        <div><img src="img/playing.gif" id="gif"></div>
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
    <script type="text/javascript">
        let songs = <?php echo json_encode($json); ?>;
        let cover = <?php echo json_encode($cover); ?>;
    </script>
    <script type="text/javascript" src="script.js"></script>


</body>

</html>