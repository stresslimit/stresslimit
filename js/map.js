var STRESS = STRESS || {};

STRESS.googleMap = {
	init:function(location) {
		this.createMap(location, 'map');
	},
	createMap:function(loc, id) {
		var defaultOptions = {
			zoom:14,
			disableDefaultUI: true,
			center: new google.maps.LatLng(loc.lng, loc.lat),
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};

		var map = new google.maps.Map(document.getElementById(id), defaultOptions);

		this.setMarkers(map, loc);
	},
	setMarkers:function(map, locations) {
		var markers = locations.markers;
		
		var image = new google.maps.MarkerImage("/static/imgs/hicon.png",
			new google.maps.Size(19, 24),
			new google.maps.Point(0,0),
			new google.maps.Point(0, 24));
		var shadow = new google.maps.MarkerImage("/static/imgs/hshadow.png",
			new google.maps.Size(27, 24),
			new google.maps.Point(0,0),
			new google.maps.Point(0, 24));

		for (var i = 0; i < markers.length; i++) {
			var city = markers[i];
			var myLatLng = new google.maps.LatLng(city.lng, city.lat);

			var marker = new google.maps.Marker({
				position: myLatLng,
				map: map,
				shadow: shadow,
				icon: image,
				title: city.title,
				zIndex: city.zindex
			});
		}
	}
}



var city = {
		"name":"Montreal",
			"lng":45.527021,
			"lat":-73.595382,
			"markers":[
				{
					"title":"Montreal",
					"lng":45.527021,
					"lat":-73.595382,
					"address":"5445 Avenue de Gaspé, Montréal, QC",
					"zindex":1
				}
			]
		}
