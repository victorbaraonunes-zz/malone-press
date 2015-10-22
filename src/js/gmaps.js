
//See coordinates on: http://www.geo-tag.de/generator/en.html

function initialize() {

	var gmaps = document.querySelector('.map--google--js');

	if(gmaps == null) {
		console.log('The element with the class .map--google--js wasn\'t found!');
		return null;
	}

	var latitude = gmaps.getAttribute('data-latitude');
	var longitude = gmaps.getAttribute('data-longitude');
	var title = gmaps.getAttribute('data-title');

	console.log(gmaps);

	var myLatlng = new google.maps.LatLng(latitude, longitude);
	var mapOptions = {

		zoom: 16,
		center: myLatlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		mapTypeControl: false,
		scaleControl: false,
		scrollwheel: false,
		streetViewControl: false

	}

	var map = new google.maps.Map(gmaps, mapOptions);

	 //var contentString = '<div id="bloco"><h2>Ponta Grossa</h2>' +
	//'Cidade localizada no Estado do Paraná</div>';
	//var infowindow = new google.maps.InfoWindow({
		//content: contentString,
		//maxWidth: 600
	//});

	//var image = "img/pin.png";
	var marker = new google.maps.Marker({
		position: myLatlng,
		map: map,
		//icon: image,
		title: title,
		animation: google.maps.Animation.DROP
	});


}

function loadMaps() {

	var script = document.createElement("script");
	script.type = "text/javascript";
	script.src ="http://maps.googleapis.com/maps/api/js?key=AIzaSyB5a_04MNISrrljjff4kKB37zz5HNCI8Rg&sensor=false&callback=initialize";

	document.body.appendChild(script);

}

window.onload = loadMaps;

