
 var map = null;
   
$(document).on('ready', function(){
	
    var styles = [{"featureType":"water","elementType":"all","stylers":[{"color":"#F4FFFD"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#276169"}]},{"featureType":"poi","elementType":"all","stylers":[{"color":"#276169"}]},{"featureType":"road","elementType":"all","stylers":[{"color":"#0A3238"}]},{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"off"},{"color":"#276169"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"on"}]}];

var styledMap = new google.maps.StyledMapType(styles,
    {name: "Styled Map"});
    if($('.js-location').attr('data-latitude')!="" && $('.js-location').attr('data-longitude')!=""){ 
		lat_orig = $('.js-location').attr('data-latitude');
		lng_orig = $('.js-location').attr('data-longitude');
	} else { 
		lat_orig = 39.470333;
		lng_orig = -0.368278;
	}

	
	var iniLatLon = new google.maps.LatLng(40.6166909, -3.7003454);
        var myLatlng = new google.maps.LatLng(lat_orig, lng_orig);
	
    var options = {
        zoom: 5, 
        center: iniLatLon, 
        mapTypeControlOptions: { mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style'] }, 
        mapTypeControl : false,
        panControl: false,
        draggable: false,
        streetViewControl: false,
		zoomControl: false,
    };
    map = new google.maps.Map(document.getElementById('mapuser'), options);
      
    var marker;
   var image = '/img/marker.png';
    	marker = new google.maps.Marker({ position: myLatlng, map: map,icon:image, draggable:false });
    	map.setCenter(myLatlng);
        map.setZoom(6);
        
 google.maps.event.addListener(map, 'resize', function(event) {
 	setTimeout(function(){
		map.setCenter(iniLatLon);
        map.setZoom(5);
 	}, 200);
  });

  	map.mapTypes.set('map_style', styledMap);
 	map.setMapTypeId('map_style');
 	
 	
});




