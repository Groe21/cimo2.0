 // Ajustar la velocidad del carrusel
 var myCarousel = document.querySelector('#carrouselPrincipal');
 var carousel = new bootstrap.Carousel(myCarousel, {
 interval: 4500, // Cambia la velocidad en milisegundos (4500 ms = 4,5 segundos)
 ride: 'carousel'
 });