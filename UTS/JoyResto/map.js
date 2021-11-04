var mymap = L.map('map').setView([-6.9463706,107.6580563], 12);
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1Ijoid2lvcm1pdyIsImEiOiJja3ZqaXltNHQybGhtMndueXM3OG9hMm56In0._VhfgTfU50JsfSltUPgPdg'
}).addTo(mymap);

var marker = L.marker([-6.9526661,107.6627506]).addTo(mymap);

function onMapClick() {
    marker.bindPopup("Jalan Taman Saturnus 1 No.33, Margahayu Raya, Bandung.").openPopup();   
}

mymap.on('click', onMapClick);