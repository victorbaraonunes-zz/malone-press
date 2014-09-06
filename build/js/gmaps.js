


function initialize() {
 
	var myLatlng = new google.maps.LatLng(-25.099425,-50.158322);
	var mapOptions = {

		zoom: 16,
		center: myLatlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		mapTypeControl: false,
		scaleControl: false,
		scrollwheel: false,
		streetViewControl: false

	}

	var map = new google.maps.Map(document.getElementById("gmap"), mapOptions);

	 var contentString = '<div id="bloco"><h2>Ponta Grossa</h2>' +
	'Cidade localizada no Estado do Paraná</div>';
	var infowindow = new google.maps.InfoWindow({
		content: contentString,
		maxWidth: 600
	});

	//var image = "img/pin.png";
	var marker = new google.maps.Marker({
		position: myLatlng,
		map: map,
		//icon: image,
		title: 'Cidade de Ponta Grossa',
		animation: google.maps.Animation.DROP
	});

 
}

function loadScript() {

	var script = document.createElement("script");
	script.type = "text/javascript";
	script.src ="http://maps.googleapis.com/maps/api/js?key=AIzaSyB5a_04MNISrrljjff4kKB37zz5HNCI8Rg&sensor=false&callback=initialize";
	 
	document.body.appendChild(script);

}
 
window.onload = loadScript;