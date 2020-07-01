jQuery(document).ready( $ => {
    console.log('hola');
    $('#menu-menu-1').slicknav({
        label: '',
        appendTo: '.site-header'
    });

    if($('.list-testimonial').length > 0 ){
        $('.list-testimonial').bxSlider({
            auto: true,
            mode: 'fade',
            controls: false
        });
    }

    // Mapa
    const lat = document.querySelector('#lat').value;
    const lng = document.querySelector('#lng').value;
    const direction = document.querySelector('#direction').value;

    if(lat && lng && direction){
        var map = L.map('map').setView([lat, lng], 15);
    
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
    
        L.marker([lat, lng]).addTo(map)
            .bindPopup(direction)
            .openPopup();
    }
});

window.onscroll = () => {
    const scroll = window.scrollY;

    const navHeader = document.querySelector('.nav-bar');
    const selectBody = document.querySelector('body');

    if(scroll > 300){
        navHeader.classList.add('fixed-top');
        selectBody.classList.add('fixed-top-body');
    }else{
        navHeader.classList.remove('fixed-top');
        selectBody.classList.remove('fixed-top-body');

    }
}