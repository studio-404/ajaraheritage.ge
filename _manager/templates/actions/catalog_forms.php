<?php defined('DIR') OR exit;
    $parent_slug = db_retrieve('slug', c("table.pages"), 'menutype', $menuid);
?>
    <div id="title" class="fix">
        <div class="icon"><img src="_manager/img/edit.png" width="16" height="16" alt="" /></div>
        <div class="name"><?php echo a("catalogs");?>: <?php echo ($route[1] == 'edit') ? $pagetitle.' - '.a('ql.edit') : $pagetitle.' - '.a('add'); ?></div>
    </div>
    <div id="box">
        <div id="part">
<?php $ulink = ($route[1]=="add") ? ahref(array($route[0], 'add', $menuid)) : ahref(array($route[0], 'edit', $id)); ?>
            <div id="news">
                <form id="catform" name="catform" method="post" action="<?php echo $ulink;?>">
                    <div id="general">
                        <input type="hidden" name="tabstop" id="tabstop" value="edit" />
                        <input type="hidden" name="menuid" value="<?php echo $menuid ?>" />
                        <div class="list fix">
                            <div class="icon"><a href="#"><img src="_manager/img/minus.png" width="16" height="16" alt="" /></a></div>
                            <div class="title"><?php echo a("info");?>: <span class="star">*</span></div>
                        </div>

                        <div class="list2 fix">
                            <div class="name"><?php echo a("title");?>: <span class="star">*</span></div>
                            <input type="text" id="pagetitle" name="title" value="<?php echo ($route[1]=='edit') ? $title : '' ?>" class="inp"/>
                        </div>

                        <div class="list fix">
                            <div class="name"><?php echo a("friendlyURL");?>:</div>
                            <?php echo c('site.url') . l() .'/'. $parent_slug.'/'; ?>
                            <input type="text" id="slug" name="slug" value="<?php echo ($route[1]=='edit') ? $slug : '' ?>" class="inp-ssmall" />
                            <?php echo ($route[1] == 'edit') ? '/'.$id : '';?>
                        </div>

                        <div class="list2 fix dn">
                            <div class="name"><?php echo a("date");?>: <span class="star">*</span></div>
                            <input type="text" name="postdate" value="<?php echo ($route[1]=='edit') ? date('Y-m-d', strtotime($postdate)) : date('Y-m-d'); ?>" id="postdate" class="inp-small" />
                            <div class="name"><?php echo a("time");?>: <span class="star">*</span></div>
                            <input type="text" name="posttime" value="<?php echo ($route[1]=='edit') ? date('H:i:s', strtotime($postdate)) : date('H:i:s'); ?>" id="posttime" class="inp-small" />
                        </div>

                        <div class="list fix">
                            <div class="name">Artikul</div>
                            <input type="text" name="artikul" value="<?php echo ($route[1]=='edit') ? $artikul : '' ?>" class="inp"/>
                        </div>

                        <div class="list fix">
                            <div class="name">Price</div>
                            <input type="text" name="price" value="<?php echo ($route[1]=='edit') ? $price : '' ?>" class="inp"/>
                        </div>


                        <div class="list fix">
                            <div class="icon"><a href="#"><img src="_manager/img/minus.png" width="16" height="16" alt="" /></a></div>
                            <div class="title"><?php echo a("general");?>: <span class="star">*</span></div>
                        </div>

                        <div class="list2 fix">
                            <div class="name" style="line-height:16px;"><?php echo a('content') ?>: <span class="star">*</span></div>
                            <div class="left" style="width:900px;">
                                <textarea name="description" class="editor" style="height:200px; margin-top:2px; margin-bottom:2px;"><?php echo ($route[1]=='edit') ? $description : '' ?></textarea>
                            </div>
                        </div>
                        
						<div class="list2 fix">
						<div class="name" style="line-height:16px;">აირჩიეთ რუკაზე კოორდინატები <span class="star">*</span></div>					
	                        
							<div id="canvas"></div>
							
							
							<div class="name">X: <span class="star">*</span></div>					
                            <input type="text" id="latitude" name="x" value="<?php echo ($route[1]=='edit') ? $x : '' ?>" class="inp-small"/>
                            
                            <div class="name">Y: <span class="star">*</span></div>					
                            <input type="text" id="longitude" name="y" value="<?php echo ($route[1]=='edit') ? $y : '' ?>" class="inp-small"/>

                        </div>                  

                        <div class="list2 fix">
                            <div class="name"><?php echo a("description");?></div>
                            <input type="text" name="meta_desc" value="<?php echo ($route[1]=='edit') ? $meta_desc : '' ?>" class="inp"/>
                        </div>

                        <div class="list fix">
                            <div class="name"><?php echo a("keywords");?></div>
                            <input type="text" name="meta_keys" value="<?php echo ($route[1]=='edit') ? $meta_keys : '' ?>" class="inp"/>
                        </div>

                        <div class="list2 fix">
                            <div class="name"><?php echo a("image");?>: <span class="star">*</span></div>
                            <input type="text" id="image1" name="image1" value="<?php echo ($route[1]=='edit') ? $image1 : '' ?>" class="inp" style="width:500px;" />
                            <a href="javascript:;" class="popup button br" data-browse="image1"><?php echo a('browse') ?></a>
                        </div>
                        
                        <div class="list fix">
                            <div class="name"><?php echo a("image");?>: <span class="star">*</span></div>
                            <input type="text" id="image2" name="image2" value="<?php echo ($route[1]=='edit') ? $image2 : '' ?>" class="inp" style="width:500px;" />
                            <a href="javascript:;" class="popup button br" data-browse="image2"><?php echo a('browse') ?></a>
                        </div>
                        
                        <div class="list2 fix">
                            <div class="name"><?php echo a("image");?>: <span class="star">*</span></div>
                            <input type="text" id="image3" name="image3" value="<?php echo ($route[1]=='edit') ? $image3 : '' ?>" class="inp" style="width:500px;" />
                            <a href="javascript:;" class="popup button br" data-browse="image3"><?php echo a('browse') ?></a>
                        </div>
                        
                        <div class="list fix">
                            <div class="name"><?php echo a("image");?>: <span class="star">*</span></div>
                            <input type="text" id="image4" name="image4" value="<?php echo ($route[1]=='edit') ? $image4 : '' ?>" class="inp" style="width:500px;" />
                            <a href="javascript:;" class="popup button br" data-browse="image4"><?php echo a('browse') ?></a>
                        </div>
                        
                        <div class="list2 fix">
                            <div class="name"><?php echo a("image");?>: <span class="star">*</span></div>
                            <input type="text" id="image5" name="image5" value="<?php echo ($route[1]=='edit') ? $image5 : '' ?>" class="inp" style="width:500px;" />
                            <a href="javascript:;" class="popup button br" data-browse="image5"><?php echo a('browse') ?></a>
                        </div>
                        
                        <div class="list fix">
                            <div class="name"><?php echo a("image");?>: <span class="star">*</span></div>
                            <input type="text" id="image6" name="image6" value="<?php echo ($route[1]=='edit') ? $image6 : '' ?>" class="inp" style="width:500px;" />
                            <a href="javascript:;" class="popup button br" data-browse="image6"><?php echo a('browse') ?></a>
                        </div>                                                 
                                                
                        <div class="list fix">
                            <div class="name">File: <span class="star">*</span></div>
                            <input type="text" id="file" name="file" value="<?php echo ($route[1]=='edit') ? $file : '' ?>" class="inp" style="width:500px;" />
                            <a href="javascript:;" class="popup button br" data-browse="file"><?php echo a('browse') ?></a>
                        </div>

                        <div class="list2 fix">
                            <div class="name"><?php echo a("visibility");?>: <span class="star" title="<?php echo a('tt.visibility');?>">*</span></div>
                            <input type="checkbox" name="visibility" class="inp-check"<?php echo (($route[1]=='edit')&&($visibility==0)) ? '' : ' checked' ?> />
                        </div>
                    </div>
                </form>
            </div>
            <div id="bottom" class="fix">
                <a href="javascript:save('edit');" class="button br"><?php echo a("save");?></a>
                <a href="javascript:save('close');" class="button br"><?php echo a("save&close");?></a>
                <a href="<?php echo ahref(array($route[0], 'show', $menuid));?>" class="button br"><?php echo a("cancel");?></a>
            </div>
        </div>
    </div>
<script language="javascript" type="text/javascript">
    $(document).on('click', function(e){
        target = $(e.target);
        if (target.hasClass('popup')) {
            id = target.data('browse');
            $.fancybox({
                width    : 985,
                height   : 600,
                type     : 'iframe',
                href     : '<?php echo JAVASCRIPT ?>/tinymce/filemanager/dialog.php?field_id='+id,
                autoSize : false
            });
            e.preventDefault();
        } else if (target.data('tab')) {
            $(target).toggleClass('selbutton');
            $(target).siblings().removeClass('selbutton');
            $('#'+target.data('tab')).show().siblings().hide();
            $('#tab').val(target.data('tab'));
        }
    });

	function save(action) {
        $("#tabstop").val(action);
		var validate = 1;
		var msg = "";
        if($("#pagetitle, #otitle").val()=='') {
            msg = "<?php echo a('error.title');?>";
            validate = 0;
        }
		if(validate == 1) {
            $('#catform').submit();
		} else {
			alert(msg);
		}
	}

    function nextlang(lang) {
        save(lang);
    }
    function chclick(id, tab) {
        var active = ($('#vis_'+id).val()==0) ? 1 : 0;
        $.post("<?php echo ahref(array($route[0], 'visitem'));?>?visibility=" + active + "&id=" + id + "&tab=" + tab, function(data) {
            if(active==1)
                $('#img_'+id).attr("src","_manager/img/buttons/icon_visible.png");
            else
                $('#img_'+id).attr("src","_manager/img/buttons/icon_unvisible.png");
            $('#vis_'+id).val(active);
        });
    }

    function del(id, title, tab) {
        if (confirm("<?php echo a('deletequestion'); ?>" + title + "?")) {
            $.post("<?php echo ahref(array($route[0], 'delitem'));?>?id=" + id + "&tab=" + tab, function(){
                $("#div" + id).innerHTML = "";
                $("#div" + id).hide();
            });
        }
    }
</script>

<script language="javascript" type="text/javascript">
// configuration
var myZoom = 15;
var myMarkerIsDraggable = true;
var myCoordsLenght = 6;

<?php if($x==0 and $y==0){?>
var defaultLat = 41.646172;
var defaultLng = 41.630881;
<?php }else{ ?>
var defaultLat = <?php echo $x; ?>;
var defaultLng = <?php echo $y; ?>;
<?php } ?>

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
</script>