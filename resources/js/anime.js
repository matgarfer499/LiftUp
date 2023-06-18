import anime from 'animejs/lib/anime.es.js';

anime({
    targets: '#logo',
    translateX: [-300, 0],
    scale: 2,
    rotate: '1turn',
    duration: 2000,
});

window.addEventListener('DOMContentLoaded', function() {
    let sound = document.getElementById('sound');
    sound.volume = 1;
    sound.play();
});

var canvas = document.getElementById('photoCanvas');
var ctx = canvas.getContext('2d');

var image = new Image();

image.onload = function() {
    canvas.width = image.width;
    canvas.height = image.height;

    ctx.drawImage(image, 0, 0);

    var imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
    var data = imageData.data;
    for (var i = 0; i < data.length; i += 4) {
        var r = data[i];
        var g = data[i + 1];
        var b = data[i + 2];
        var gray = (r + g + b) / 3;
        data[i] = gray;
        data[i + 1] = gray;
        data[i + 2] = gray;
    }
    ctx.putImageData(imageData, 0, 0);
};

image.src = 'videos/estiramiento.webp';
