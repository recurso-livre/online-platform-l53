window.marker = null;

function initialize() {
    var map;

    var newyork = new google.maps.LatLng(40.712784, -74.005941);

    var style = [
        {
            "featureType": "road",
            "elementType": "labels.icon",
            "stylers": [
                {
                    "saturation": 1
                },
                {
                    "gamma": 1
                },
                {
                    "visibility": "off"
                },
					   ]
					},
        {
            "elementType": "geometry",
            "stylers": [
                {
                    "saturation": -100
                }
					  ]
					}
				];

    var mapOptions = {
        // SET THE CENTER
        center: newyork,

        // SET THE MAP STYLE & ZOOM LEVEL
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        zoom: 12,

        // SET THE BACKGROUND COLOUR
        backgroundColor: "#eeeeee",

        // REMOVE ALL THE CONTROLS EXCEPT ZOOM
        panControl: false,
        zoomControl: true,
        mapTypeControl: false,
        scaleControl: false,
        scrollwheel: false,
        streetViewControl: false,
        overviewMapControl: false,
        zoomControlOptions: {
            style: google.maps.ZoomControlStyle.SMALL
        }

    }
    map = new google.maps.Map(document.getElementById('googleMap2'), mapOptions);

    // SET THE MAP TYPE
    var mapType = new google.maps.StyledMapType(style, {
        name: "Grayscale"
    });
    map.mapTypes.set('grey', mapType);
    map.setMapTypeId('grey');

    //CREATE A CUSTOM PIN ICON
    var marker_image = 'images/pin.png';
    var pinIcon = new google.maps.MarkerImage(marker_image, null, null, null, new google.maps.Size(21, 34));

    marker = new google.maps.Marker({
        position: newyork,
        map: map,
        icon: 'img/map-marker.png',
        title: 'New York'
    });
}

google.maps.event.addDomListener(window, 'load', initialize);