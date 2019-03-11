<?php defined('DIR') OR exit; ?>
<div class="container-fluid ContainerPaddingAll">

	<div class="HomePageDiv">		
		<div class="PageTitle"><?php echo l('news');?> <a href="<?php echo href('3');?>"><?php echo l('all.news');?></a></div>
		<div class="row row10">
			<div class="NewsList">
            	<?php echo news();?>
			</div>
		</div>
	</div>
<!--    
	<div class="HomePageDiv">		
		<div class="PageTitle"><?php echo l('events');?> <a href="<?php echo href('3');?>"><?php echo l('all.events');?></a></div>
		<div class="row row10">
			<div class="NewsList">
            	<?php echo news();?>
			</div>
		</div>
	</div>-->
    
</div>