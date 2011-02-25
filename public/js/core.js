Core = {
    baseurl:null,
    init :function(){
        Core.baseurl = $(document.body).data('baseurl');
        Core.initNav();
        Map.init();
    },
    initNav:function(){
        $('#openSubLogBox').delegate('a', 'click', function(e){
            e.preventDefault();
            e.stopPropagation();
            
            var $this = $(this);
            
            if( $this.is('.selected') ){
                Core.closeSubForm();
                return false;
            }
            
            if( $this.is('.login') ){
                $('#formLogin').stop().fadeIn(100);
                $('#formSubscription').stop().fadeOut(100);
            }else{
                $('#formSubscription').stop().fadeIn(100);
                $('#formLogin').stop().fadeOut(100);
            }
            
            $(document.body).unbind('click').bind('click', function(){
                Core.closeSubForm();
            })
            
            $this.closest('ul').find('a').removeClass('selected');
            $this.addClass('selected');
                
        })
        $('#formLogin, #formSubscription').bind('click', function(e){
            e.stopPropagation();
        });
    },
    closeSubForm:function(){
         $('form#formLogin').stop().fadeOut(100);
         $('form#formSubscription').stop().fadeOut(100);
         $('#openSubLogBox').find('a').removeClass('selected');
    }
}

Map = {
    since:false,
    $obj:null,
    $container:null,
    interval:null,
    init:function(){
        var myLatlng = new google.maps.LatLng(46.820267,-71.309509); //center of quebec city
        var myOptions = {
          zoom: 12,
          center: myLatlng,
          mapTypeId: 'coroule',
          scrollwheel:false,
          mapTypeControl:false,
          keyboardShortcuts:false,
          disableDoubleClickZoom:false,
          draggable:false,
          zoomControl:false,
          streetViewControl:false
        }
        
        Map.$container = $("#mapContainer");
        
        Map.$obj = new google.maps.Map( Map.$container[0], myOptions);
        
        var styledMapType = new google.maps.StyledMapType([ { featureType: "all", elementType: "all", stylers: [ { saturation: -99 } ] } ]);
        Map.$obj.mapTypes.set('coroule', styledMapType);
        
        //add event to fireup the app when everything is loaded
        google.maps.event.addListenerOnce(Map.$obj, 'tilesloaded', function(){
            Map.getNewPointsSince();
            Map.startReloadInterval();
            /*
            var LatLng = new google.maps.LatLng(46.820267,-71.309509);
            marker = new google.maps.Marker({
                map:Map.$obj,
                draggable:false,
                animation: google.maps.Animation.DROP,
                position: LatLng
              });*/
        })
    },
    recenterMap:function(center){
        Map.reload();
    },
    reload:function(){
        //reload can only be call from a google maps event
        clearInterval(Map.interval);
        
        Map.getNewPointsSince();
    },
    startReloadInterval:function(){
        Map.interval = setInterval(Map.getNewPointsSince,10000); //skip the reload function  
    },
    getNewPointsSince:function(){
        var mapBounds = Map.$obj.getBounds();

        //prepare map settings
        var data = {
            eventid:Map.$container.data('eventid'),
            since:Map.since,
            ne_lat:mapBounds.getNorthEast().lat(),
            ne_lng:mapBounds.getNorthEast().lng(),
            sw_lat:mapBounds.getSouthWest().lat(),
            sw_lng:mapBounds.getSouthWest().lng()
        }
        $.ajax({
            url:Core.baseurl+'api/points/get/',
            data:data,
            method:'GET',
            dataType:'json',
        }).success(function(data){
           Map.parseData(data);
        });
    },
    parseData:function(data){
        Map.since = data.since;
        Map.appendsMarkers(data.markers);
    },
    appendsMarkers:function(markers){
        
    },
    clear:function(){
        
    }
}

$(document).ready(function() {
    Core.init();
});
