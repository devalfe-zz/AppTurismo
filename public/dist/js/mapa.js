(function () {
    var s = document.createElement('script');
    s.type = 'text/javascript';
    s.async = true;
    s.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCUWXMO1cgM6E-JgB7qGd3eWrogZVCqoFI&amp&v=3.13&libraries=places';
    var x = document.getElementsByTagName('script')[0];
    x.parentNode.insertBefore(s, x);
})();

// When the DOM is ready, run this function

//function init() {
//    window.addEventListener('scroll', function (e) {
//        var distanceY = window.pageYOffset || document.documentElement.scrollTop,
//            shrinkOn = 300,
//            header = document.querySelector("nav");
//        if (distanceY > shrinkOn) {
//            classie.add(header, "smaller");
//        } else {
//            if (classie.has(header, "smaller")) {
//                classie.remove(header, "smaller");
//            }
//        }
//    });
//}
//window.onload = init();

var map;
var service;
var latMap;
var longMap;
var g;
var schoolMarkers = [];
var hospitalMarkers = [];
var restaurantMarkers = [];
var doctorMarkers = [];
var shopping_mallMarkers = [];
var movie_theaterMarkers = [];
var foodMarkers = [];
var metro_stationMarkers = [];
var mosqueMarkers = [];
var infowindow;
var html = "";
var markers = [];
//
//function TextualZoomControl(map) {
//    var g = google.maps;
//    var control = document.createElement("div");
//    control.id = "zoomcontrol";
//    var zoomInDiv = document.createElement("div");
//    this.setButtonStyle_(zoomInDiv);
//    control.appendChild(zoomInDiv);
//    zoomInDiv.appendChild(document.createTextNode(" "));
//
//    g.event.addDomListener(zoomInDiv, "click", function () {
//        map.setZoom(map.getZoom() + 1);
//    });
//
//    var zoomOutDiv = document.createElement("div");
//    this.setButtonStyle_(zoomOutDiv);
//    control.appendChild(zoomOutDiv);
//    zoomOutDiv.appendChild(document.createTextNode(" "));
//
//    g.event.addDomListener(zoomOutDiv, "click", function () {
//        map.setZoom(map.getZoom() - 1);
//    });
//
//    document.body.appendChild(control);
//    return control;
//}
//
//
//// Set the proper CSS for the given button element.
//TextualZoomControl.prototype.setButtonStyle_ = function (button) {
//    button.style.cursor = "pointer";
//}
//
function loadMap() {

    g = google.maps;
    latMap = -17.1927361;
    longMap = -70.9328138;
    var opts_map = {
        zoom: 5,
        styles: 
        [
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "hue": "#7fc8ed"
            },
            {
                "saturation": 55
            },
            {
                "lightness": -6
            },
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "labels",
        "stylers": [
            {
                "hue": "#7fc8ed"
            },
            {
                "saturation": 55
            },
            {
                "lightness": -6
            },
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "geometry",
        "stylers": [
            {
                "hue": "#83cead"
            },
            {
                "saturation": 1
            },
            {
                "lightness": -15
            },
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [
            {
                "hue": "#f3f4f4"
            },
            {
                "saturation": -84
            },
            {
                "lightness": 59
            },
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "labels",
        "stylers": [
            {
                "hue": "#ffffff"
            },
            {
                "saturation": -100
            },
            {
                "lightness": 100
            },
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "geometry",
        "stylers": [
            {
                "hue": "#ffffff"
            },
            {
                "saturation": -100
            },
            {
                "lightness": 100
            },
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels",
        "stylers": [
            {
                "hue": "#bbbbbb"
            },
            {
                "saturation": -100
            },
            {
                "lightness": 26
            },
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [
            {
                "hue": "#ffcc00"
            },
            {
                "saturation": 100
            },
            {
                "lightness": -35
            },
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry",
        "stylers": [
            {
                "hue": "#ffcc00"
            },
            {
                "saturation": 100
            },
            {
                "lightness": -22
            },
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "poi.school",
        "elementType": "all",
        "stylers": [
            {
                "hue": "#d7e4e4"
            },
            {
                "saturation": -60
            },
            {
                "lightness": 23
            },
            {
                "visibility": "on"
            }
        ]
    }
],
        center: new g.LatLng(latMap, longMap),
        //        disableDefaultUI: true,
        //        scrollwheel: false,
        mapTypeControlOptions: {
            style: g.MapTypeControlStyle.DEFAULT
        },
        mapTypeId: g.MapTypeId.ROADMAP,
    };

    // map = new g.Map(document.getElementById("map"), opts_map);
    const map = new google.maps.Map(document.getElementById('map'), opts_map);

    const marker = new google.maps.Marker({
        position: new g.LatLng(latMap, longMap),
        map: map,
        title: "Moquegua",
        visible: true,
        icon: 'images/mapic.png'
    });
    // Add self created control
    //    var zoom_control = new TextualZoomControl(map);
    //    zoom_control.index = 1;
    //    $("#zoomcontrol").appendTo("#map");
    infowindow = new google.maps.InfoWindow();
}

window.onload = loadMap;
/*$(".mapBtn").click(function(e){
  e.preventDefault();
  var type = $(this).attr("type");
  if($(this).hasClass('disabled'))
  {

    addPlaces(type);
    //console.log(type);
    $(this).removeClass('disabled') 
  }
  else
  {
    removePlaces(type);
    $(this).addClass('disabled')  

  }
});*/
