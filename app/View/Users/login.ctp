<div id="googlemaps" class="loginBg"></div>
    <div class="loginForm visible">
        <h4>Inicio de sesión</h4>
                <?php echo $this->Session->flash('auth'); ?>
        <?php echo $this->Form->create('User'); 
        echo $this->Form->input('username',array(
            'label' => false,
            'class'=>'loginInput js-required',
            'placeholder'=>"Username"
        ));
        echo $this->Form->input('password',array(
            'label' => false,
            'class'=>'loginInput js-required',
            'placeholder'=>"Password"
        ));
    ?>
<?php echo $this->Form->end(__('Acceder')); ?>

    </div>
<!-- Include the Google Maps API library - required for embedding maps -->
<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
 
<script type="text/javascript">
 
// The latitude and longitude of your business / place
if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                    var position=[46.95402660265127, -4.046287429687478];
                }else{
                 var position=[42.68648922089851, -20.1742171171875];   
                }

 
function showGoogleMaps() {
 
    var latLng = new google.maps.LatLng(position[0], position[1]);
    var styles = [{"featureType":"water","elementType":"all","stylers":[{"color":"#F4FFFD"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#276169"}]},{"featureType":"poi","elementType":"all","stylers":[{"color":"#276169"}]},{"featureType":"road","elementType":"all","stylers":[{"color":"#0A3238"}]},{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"off"},{"color":"#276169"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"on"}]}];
    var styledMap = new google.maps.StyledMapType(styles,
    {name: "Styled Map"});
    var mapOptions = {
        zoom: 5, 
        streetViewControl: false, 
        mapTypeControlOptions: {
      mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
    },
    mapTypeControl : false,
    scrollwheel: false,
    disableDoubleClickZoom: true,
        scaleControl: false,
        center: latLng
    };
    position = [38.417000, -3.703584];
    latLng = new google.maps.LatLng(position[0], position[1]);
    map = new google.maps.Map(document.getElementById('googlemaps'),
        mapOptions);
    var image = '/img/findemw.png';
    // Show the default red marker at the location
    marker = new google.maps.Marker({
        position: latLng,
        map: map,
        draggable: false,
        icon:image,
        animation: google.maps.Animation.DROP
    });
    map.mapTypes.set('map_style', styledMap);
 map.setMapTypeId('map_style');
}
 
google.maps.event.addDomListener(window, 'load', showGoogleMaps);
</script>