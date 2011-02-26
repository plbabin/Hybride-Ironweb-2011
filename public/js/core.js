Core = {
    baseurl:null,
    init :function(){
        Core.baseurl = $(document.body).data('baseurl');
        Core.initNav();
        Core.initAddTrackForm();
        Core.initSendComments();
        Core.initSearch();
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
    },
    initAddTrackForm:function(){
        var $wrapAddtrack = $('#wrapAddTrack');
        $wrapAddtrack.delegate('a.close','click',function  (e) {
            var $this = $(this);
            
            $wrapAddtrack.slideUp('fast', function(){
                $wrapAddtrack.closest('div.colLeft').removeClass('showForm');
            });
            return false;
        }).delegate('a.button','click',function(){
            $(this).closest('form').trigger('submit')
            return false;
        });
        
        $('#eventResume').delegate('a.button', 'click', function(){
            $wrapAddtrack.slideDown('fast', function(){
                $wrapAddtrack.closest('div.colLeft').addClass('showForm');
            });
            return false;
        })
        
    },
    initSendComments:function(){
        //open the form
        $('#feed.ride').delegate('li a.embarque', 'click', function(e){
            $(this).closest('li').find('.formContainer').slideDown('fast',function(){
                $(this).closest('li').addClass('show');
            });
            return false;
        });
        
        //hide the form
        $('#feed.ride').delegate('li a.close', 'click', function(e){
            $(this).closest('li').find('.formContainer').slideUp('fast',function(){
                $(this).closest('li').removeClass('show');
            });
            return false;
        });
        $('#feed.ride').delegate('li a.send', 'click', function(e){
            $(this).closest('form').trigger('submit');
            return false;
        });
    },
    initSearch:function(){
        var $search = $('#searchEvent');
        if($search.has('input[type=text]')){
            var $input = $search.find('input[type=text]');
            
            $input.bind({
               focusin:function(){
                   $(this).fadeTo(100, 1);
               },
               focusout:function(){
                   $(this).fadeTo(100, 0.25);
               } 
            }).trigger('focusout');
        }
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
        Map.$container.bind('click', function(){
            $('html, body').animate({scrollTop:$('#feed').find('li:eq(10)').offset().top},500)
        });
        Map.$obj = new google.maps.Map( Map.$container[0], myOptions);
        
        var styledMapType = new google.maps.StyledMapType([ { featureType: "all", elementType: "all", stylers: [ { saturation: -99 } ] } ]);
        Map.$obj.mapTypes.set('coroule', styledMapType);
        
        //map_event
        LatLng = new google.maps.LatLng(46.814464,-71.224564);
        marker = new google.maps.Marker({
            map:Map.$obj,
            draggable:false,
            position: LatLng,
            icon: '/public/images/map_event.png'
          });
        
        //add event to fireup the app when everything is loaded
        google.maps.event.addListenerOnce(Map.$obj, 'tilesloaded', function(){
            Map.getNewPointsSince();
            Map.startReloadInterval();
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
        Map.appendsMarkers(data.points);
    },
    appendsMarkers:function(points){
        
        for(var x=0;x<points.length;x++){
            var m = points[x], 
                LatLng = new google.maps.LatLng(m.lat,m.lng);
    
            if(m.status == 'O'){
                img = '/public/images/marker_open.png';
            }else{
                img = '/public/images/marker_close.png';
            }    
            marker = new google.maps.Marker({
                map:Map.$obj,
                draggable:false,
                position: LatLng,
                icon: '/public/images/marker_open.png'
              });
            
            marker.trackid = m.id_track;
        }
    },
    clear:function(){
        
    }
}

$(document).ready(function() {
    Core.init();
});
