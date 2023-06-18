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
    sound.volume = 1; // Ajusta el volumen del sonido (opcional)
    sound.play();
});

// Obtén el canvas y su contexto
var canvas = document.getElementById('photoCanvas');
var ctx = canvas.getContext('2d');

// Crea una nueva imagen
var image = new Image();

// Carga la imagen
image.onload = function() {
    // Establece las dimensiones del canvas como las dimensiones de la imagen
    canvas.width = image.width;
    canvas.height = image.height;

    // Dibuja la imagen en el canvas
    ctx.drawImage(image, 0, 0);

    // Aplica el filtro de escala de grises
    var imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
    var data = imageData.data;
    for (var i = 0; i < data.length; i += 4) {
        var r = data[i];
        var g = data[i + 1];
        var b = data[i + 2];
        // Calcula el valor de gris promedio
        var gray = (r + g + b) / 3;
        // Establece los componentes RGB en el valor de gris promedio
        data[i] = gray;
        data[i + 1] = gray;
        data[i + 2] = gray;
    }
    ctx.putImageData(imageData, 0, 0);
};

// Especifica la ruta de la imagen
image.src = 'videos/estiramiento.webp';
