<div class="container-fluid ContainerPaddingAll">
	<div class="PageInfoDiv">
		<div class="">
			<div class="col-sm-12 padding_0">
				<div class="LeftInfo">
					<div class="BackButton" onclick="window.history.back();"></div>
					<div class="Title"><?php echo $title;?></div>
					<div class="Text">
						<span>Hot Line</span>
						<span>0 422 225 602</span>
					</div>
				</div>
			</div>
			<div class="col-sm-12 padding_0 ButtonsDiv">
				<button class="BlueButton"><i class="fa fa-youtube-play"></i> <span>virtual tours</span></button>
			</div>
		</div>
	</div>
	<div class="MuseumPageDIv">
			<div class="col-sm-3 padding_0">
				<div class="LeftMenu">
                	<?php echo similar_products($menuid, $id); ?>
				</div>
			</div>
			<div class="col-sm-9"> 
				<div class="TabsDIv">
					  <ul class="nav nav-tabs" role="tablist">
					    <li class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab"><?php echo l('history');?></a></li>
					    <li><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab"><?php echo l('map');?></a></li>
					    <li><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab"><?php echo l('gallery');?></a></li>
					  </ul>

					  <!-- Tab panes -->
					  <div class="tab-content">
					  	<!-- TAB HISTORY -->
					    <div role="tabpanel" class="tab-pane active" id="tab1">
					    	<div class="row row2">
					    		<div class="Descrription">
					    			<?php echo $description;?>
					    		</div>								
							</div>
					    </div>


					    <!-- TAB EVENTS -->
					    <div role="tabpanel" class="tab-pane" id="tab2">


				<div id="map" style="width:100%; height:700px"></div>


<script type="text/javascript">
$(".TabsDIv ul li a").click(function(){
	setTimeout(function(){
	// რუკის შექმნა
		var map = new google.maps.Map(document.getElementById('map'), {
		 zoom: 15,
		 center: new google.maps.LatLng(<?php echo $x;?>,<?php echo $y;?>),
		 mapTypeId: google.maps.MapTypeId.roadmap
		});
	
		var marker = new google.maps.Marker({
		position: new google.maps.LatLng(<?php echo $x;?>,<?php echo $y;?>),
		map: map,
		icon: "_website/img/red-mark.png"
		});
	});
});
</script>

                        </div>


					    <!-- TAN GALLERY -->
					    <div role="tabpanel" class="tab-pane" id="tab3">
                        
								<div class="GalleryList">
                                <?php if($image1!=''){?>
									<div class="col-sm-4">
										<a href="<?php echo $image1;?>" class="fancybox GalleryItem" data-fancybox-group="gallery">
											<div class="Image">
												<img src="<?php echo $image1;?>"/>
											</div>						
										</a>
									</div>
                                <?php } ?>  
                                <?php if($image2!=''){?> 
									<div class="col-sm-4">
										<a href="<?php echo $image2;?>" class="fancybox GalleryItem" data-fancybox-group="gallery">
											<div class="Image">
												<img src="<?php echo $image2;?>"/>
											</div>						
										</a>
									</div>
                                <?php } ?>  
                                <?php if($image3!=''){?> 
									<div class="col-sm-4">
										<a href="<?php echo $image3;?>" class="fancybox GalleryItem" data-fancybox-group="gallery">
											<div class="Image">
												<img src="<?php echo $image3;?>"/>
											</div>						
										</a>
									</div>
                                <?php } ?>
                                <?php if($image4!=''){?> 
									<div class="col-sm-4">
										<a href="<?php echo $image4;?>" class="fancybox GalleryItem" data-fancybox-group="gallery">
											<div class="Image">
												<img src="<?php echo $image4;?>"/>
											</div>						
										</a>
									</div>
                                <?php } ?>
                                <?php if($image5!=''){?> 
									<div class="col-sm-4">
										<a href="<?php echo $image5;?>" class="fancybox GalleryItem" data-fancybox-group="gallery">
											<div class="Image">
												<img src="<?php echo $image5;?>"/>
											</div>						
										</a>
									</div>
                                <?php } ?> 
                                <?php if($image6!=''){?> 
									<div class="col-sm-4">
										<a href="<?php echo $image6;?>" class="fancybox GalleryItem" data-fancybox-group="gallery">
											<div class="Image">
												<img src="<?php echo $image6;?>"/>
											</div>						
										</a>
									</div>
                                <?php } ?>                                                               
								</div>
                                
                        </div>
					  </div>
				</div>
		
			</div>
	</div>
</div>