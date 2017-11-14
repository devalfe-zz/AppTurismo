function initialize() {
    var marcadores = [
        ['<h5>Plaza de Armas</h5><p>Se ubica en el centro de la Zona monumental, inscrita en el damero típico de la estructura urbana española implantada en la época de la colonia, rodeada por enormes y antiguos ficus y casonas como: la Casa Tradicional, la antigua Cárcel Pública, Casa Chocano, entre otras que por su gran valor arquitectónico merecen ser visitadas.</p><img class="d-block img-fluid " src="https://firebasestorage.googleapis.com/v0/b/toursapp-78bac.appspot.com/o/fotos%2Fplaza-de-armas-de-moquegua.jpg?alt=media&token=f66f5f88-f31a-4438-814e-504c9afbe867" alt="Atractivo">', -17.193794, -70.934612],
        ['<h5>Catedral Santo Domingo Urna de Santa Fortunata</h5>', -17.193972, -70.933673],
        ['<h5>Muro Matriz</h5>', -17.193480, -70.934754],
        ['<h5>Museo Contisuyo</h5>', -17.193251, -70.934698],
        ['Casa Tradicional de Moquegua', -17.194111, -70.934385],
        ['Casona Chocano', -17.194330, -70.934784],
        ['Portada de la Casa Conde de Alastaya', -17.194228, -70.935744],
        ['Casona Vargas Morán', -17.194587, -70.934492],
        ['Casa de las 10 Ventanas', -17.194080, -70.934118],
        ['Iglesia Belen', -17.1912332, -70.931011],
        ['Casa de Mercedes Cabello de Carbonera', -17.1924336, -70.9328891],
        ['Parque Santa Fortunata', -17.192284, -70.9346702],
        ['Parque Andrés Avelino Cáceres', -17.1959263, -70.9371256],
        ['Mirador Turístico Cristo Blanco', -17.1981117, -70.9296019],
        ['Mercado Central de Moquegua', -17.1923753, -70.9374534],
        ['Terminal Terrestre Moquegua', -17.1911595, -70.9482136],
        ['Parque Ecológico de Moquegua', -17.1875914, -70.9466091],
        ['Real Plaza Moquegua', -17.1875683, -70.9366795],
        ['Estadio 25 de Noviembre', -17.1862302, -70.9297962]

    ];
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: new google.maps.LatLng(-17.1927361, -70.9328138),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    var infowindow = new google.maps.InfoWindow();
    var marker, i;
    for (i = 0; i < marcadores.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(marcadores[i][1], marcadores[i][2]),
            map: map,
            icon: 'images/mapic.png'
        });
        google.maps.event.addListener(marker, 'click', (function (marker, i) {
            return function () {
                infowindow.setContent(marcadores[i][0]);

                infowindow.open(map, marker);

            }
        })(marker, i));
    }
}
google.maps.event.addDomListener(window, 'load', initialize);
