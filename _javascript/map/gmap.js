// configuration
var myZoom = 15;
var myMarkerIsDraggable = true;
var myCoordsLenght = 6;
var defaultLat = 41.646172;
var defaultLng = 41.630881;

// creates the map
// zooms
// centers the map
// sets the map's type 
var map = new google.maps.Map(document.getElementById('canvas'), {
	zoom: myZoom,
	center: new google.maps.LatLng(defaultLat, defaultLng),
	mapTypeId: google.maps.MapTypeId.ROADMAP

});

// creates a draggable marker to the given coords
var myMarker = new google.maps.Marker({
	position: new google.maps.LatLng(defaultLat, defaultLng),
	draggable: myMarkerIsDraggable
	});

// adds a listener to the marker
// gets the coords when drag event ends
// then updates the input with the new coords
google.maps.event.addListener(myMarker, 'dragend', function(evt){
	document.getElementById('latitude').value = evt.latLng.lat().toFixed(myCoordsLenght);
	document.getElementById('longitude').value = evt.latLng.lng().toFixed(myCoordsLenght);
});

// centers the map on markers coords
map.setCenter(myMarker.position);

// adds the marker on the map
myMarker.setMap(map);

/*
var map;
var micon = new GIcon();
var iasizet='32,32';
var iasize=new Array();
iasize=iasizet.split(',');
iasize[0]=iasize[0]/2;
micon.image = "http://www.podolsk.ru/plugins/p228_googlemap_directory/icons/marker_green.png";
micon.shadow = "http://www.podolsk.ru/plugins/p228_googlemap_directory/icons/shadow/markers.png";
micon.iconSize = new GSize(32,32);
micon.shadowSize = new GSize(59,32);
micon.iconAnchor = new GPoint(iasize[0], iasize[1]);
micon.infoWindowAnchor = new GPoint(iasize[0], 0);

function p228_initialize() { 
if (GBrowserIsCompatible()) {
        map = new GMap2(document.getElementById("canvas"));
        map.setCenter(new GLatLng(55.431375,37.545905), 15);
        map.addControl(new GMapTypeControl());
        map.setMapType(G_NORMAL_MAP);
        map.addControl(new GSmallMapControl());
        
        GEvent.addListener(map, "moveend", function() {
        });
        GEvent.addListener(map, "click", function(overly,point) {
        if(!marker && point) {
        p228_set_vals(point);
        map.clearOverlays();
        var marker = new GMarker(point,{draggable: true,icon:micon});
        GEvent.addListener(marker, "dragend", function() { p228_set_vals(marker.getPoint());});
        map.addOverlay(marker);
        }
        }); 
        p228_set_map();
        }
        
      if(typeof window.onunload == 'function') {
        
        var prevonu= onunload;
        window.onunload = function() {
            prevonu();
            GUnload();  
        }} else{window.onunload = GUnload;}        
        
}


function p228_set_vals(point){
        document.getElementById('lat').value= point.y;
        document.getElementById('lon').value= point.x;
        document.getElementById('lonlat').value= point.y+','+point.x;

}

function p228_set_map(){
       var point=new Array();
       point.y=document.getElementById('lat').value;
       point.x=document.getElementById('lon').value;
       map.setCenter(new GLatLng(point.y,point.x));
       map.clearOverlays();
       var marker = new GMarker(point,{draggable: true,icon:micon});
       GEvent.addListener(marker, "dragend", function() { p228_set_vals(marker.getPoint());});
       map.addOverlay(marker);
       
} 

*/