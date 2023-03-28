var preloader = document.getElementById("preloader");
window.addEventListener('load', function () {
    preloader.style.display = 'none';
})

// Homepage script
var myDate = new Date();
var hrs = myDate.getHours();
var greet;

if (hrs < 12)
    greet = 'Good Morning';
else if (hrs >= 12 && hrs < 17)
    greet = 'Good Afternoon';
else if (hrs >= 17 && hrs < 24)
    greet = 'Good Evening';

let greeting = document.getElementById('greeting');
if (greeting != null)
    greeting.innerHTML = greet;

// Navigation Code
function navigateAlbum(ele) {
    window.location.href = `albums.php?value=${ele.id}`;
}

songs = JSON.parse(songs);
cover = JSON.parse(cover);
let songIndex = 0;
let audioElement = new Audio(songs[songIndex].PATH);
let masterPlay = document.getElementById('masterPlay');
let next = document.getElementById("next");
let previous = document.getElementById("previous");
let myProgressBar = document.getElementById('myProgressBar');
let gif = document.getElementById('gif');
let masterSongName = document.getElementById('masterSongName');
let masterSongCover = document.getElementById('masterSongCover');
let masterSongDuration = document.getElementById('masterSongDuration');
let masterSongProgressDuration = document.getElementById('masterSongProgressDuration');

let songItemPlay = Array.from(document.getElementsByClassName('songItemPlay'));
const makeAllPlays = function () {
    songItemPlay.forEach((element) => {
        element.classList.remove('fa-circle-pause');
        element.classList.add('fa-circle-play');
    })
}

const makeSongIndexPause = () => {
    songItemPlay[songIndex].classList.remove('fa-circle-play');
    songItemPlay[songIndex].classList.add('fa-circle-pause');
}

const zeroPad = (num) => String(num).padStart(2, '0');
masterSongName.innerText = songs[songIndex].NAME;
masterSongDuration.innerText = songs[songIndex].DURATION;
masterSongProgressDuration.innerText = '0.00';
masterSongCover.src = cover;

// Handle play pause click
masterPlay.addEventListener('click', () => {
    if (audioElement.paused || audioElement.currentTime <= 0) {
        audioElement.play();
        makeSongIndexPause();
        masterPlay.classList.remove('fa-circle-play');
        masterPlay.classList.add('fa-circle-pause');
        gif.style.opacity = 1;
    } else {
        audioElement.pause();
        makeAllPlays();
        masterPlay.classList.remove('fa-circle-pause');
        masterPlay.classList.add('fa-circle-play');
        gif.style.opacity = 0;
    }
})

// Listen to Events
audioElement.addEventListener('timeupdate', () => {
    if (audioElement.currentTime == audioElement.duration) {
        // For autoplay songs
        next.click();
    } else {
        progress = (audioElement.currentTime / audioElement.duration) * 100;
        myProgressBar.value = progress;
        seconds = parseInt(audioElement.currentTime);
        minutes = 0;
        if (seconds >= 60) {
            minutes = parseInt(seconds / 60);
            seconds -= minutes * 60;
        }
        masterSongProgressDuration.innerText = minutes + ':' + zeroPad(seconds);
    }
})

myProgressBar.addEventListener('change', () => {
    audioElement.currentTime = (myProgressBar.value * audioElement.duration) / 100;
})

songItemPlay.forEach((element) => {
    element.addEventListener('click', () => {
        makeAllPlays();
        songIndex = parseInt(element.id);
        element.classList.remove('fa-circle-play');
        element.classList.add('fa-circle-pause');
        masterSongName.innerText = songs[songIndex].NAME;
        masterSongDuration.innerText = songs[songIndex].DURATION;
        audioElement.src = songs[songIndex].PATH;
        audioElement.currentTime = 0;
        audioElement.play();
        masterPlay.classList.remove('fa-circle-play');
        masterPlay.classList.add('fa-circle-pause');
        gif.style.opacity = 1;
    })
})

next.addEventListener('click', () => {
    if (songIndex >= songs.length - 1) {
        songIndex = 0;
    } else {
        songIndex++;
    }
    makeAllPlays();
    songItemPlay[songIndex].classList.remove('fa-circle-play');
    songItemPlay[songIndex].classList.add('fa-circle-pause');
    masterSongName.innerText = songs[songIndex].NAME;
    masterSongDuration.innerText = songs[songIndex].DURATION;
    audioElement.src = songs[songIndex].PATH;
    audioElement.currentTime = 0;
    audioElement.play();
    masterPlay.classList.remove('fa-circle-play');
    masterPlay.classList.add('fa-circle-pause');
    gif.style.opacity = 1;
})

previous.addEventListener('click', () => {
    if (songIndex <= 1) {
        songIndex = 0;
    } else {
        songIndex--;
    }
    makeAllPlays();
    songItemPlay[songIndex].classList.remove('fa-circle-play');
    songItemPlay[songIndex].classList.add('fa-circle-pause');
    masterSongName.innerText = songs[songIndex].NAME;
    audioElement.src = songs[songIndex].PATH;
    masterSongDuration.innerText = songs[songIndex].DURATION;
    audioElement.currentTime = 0;
    audioElement.play();
    masterPlay.classList.remove('fa-circle-play');
    masterPlay.classList.add('fa-circle-pause');
    gif.style.opacity = 1;
})