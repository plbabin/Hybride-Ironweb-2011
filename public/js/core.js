Core = {
    init :function(){
        Map.init();
    }
}

Map = {
    init:function(){
        var myLatlng = new google.maps.LatLng(46.820267,-71.309509);
        var myOptions = {
          zoom: 12,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.SATELLITE
        }
        var map = new google.maps.Map(document.getElementById("mapContainer"), myOptions);
    }
}

$(document).ready(function() {
    Core.init();
});
