let audio = document.getElementById("audio");
let startpausebtn = document.getElementById("playpausebtn");
let cnt = 0;


function playPause() {
    if (cnt == 0) {
        cnt = 1;
        audio.play();
        startpausebtn.innerHTML = "&#9208";
    }
    else {
        cnt = 0;
        audio.pause();
        startpausebtn.innerHTML = "&#9658";
    }
}