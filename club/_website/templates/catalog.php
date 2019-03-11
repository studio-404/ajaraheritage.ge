<div class="container-fluid ContainerPaddingAll">
	<div class="PageInfoDiv">
		<div class="">
			<div class="col-sm-3 padding_0">
				<div class="LeftInfo">
					<div class="BackButton" onclick="window.history.back();"></div>
					<div class="Title"><?php echo $title; ?></div>
					<div class="Text">
						<span>Hot Line</span>
						<span>0 422 225 602</span>
					</div>
				</div>
			</div>
			<div class="col-sm-12 padding_0 ButtonsDiv">
				<div class="SearchFormDiv">
					<div class="input-group">
					    <input type="text" class="form-control" placeholder="<?php echo l('search');?>">
					    <span class="input-group-btn">
					        <button class="SubmitSearch"><i class="fa fa-search" aria-hidden="true"></i></button>
					    </span>
				    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="GalleryPageDiv">		
		<div class="PageTitle Blue"><?php echo $title; ?></div>
		<div class="row row10">
			<div class="GalleryList">
            <?php $counter = 0; 
            foreach ($items as $item): $counter++; 
            $link = href($id, array(), l(), $item['id']);
            ?>				
                <div class="col-sm-3">
					<a href="<?php echo $link; ?>" class="GalleryItem">
						<div class="Image">
							<img src="<?php echo $item['image1'] ?>" alt="<?php echo $item['title'] ?>" title="<?php echo $item['title'] ?>"/>
						</div>						
						<div class="Title">							
							<?php echo $item['title'] ?>
						</div>
					</a>
				</div>
			<?php endforeach ?>
			</div>
		</div>
	</div>
</div>