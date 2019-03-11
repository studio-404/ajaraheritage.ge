<?php defined('DIR') OR exit; ?>
<div class="container-fluid ContainerPaddingAll">
	<div class="PageInfoDiv">
		<div class="">
			<div class="col-sm-3 padding_0">
				<div class="LeftInfo">
					<div class="BackButton" onclick="window.history.back();"></div>
					<div class="Title"><?php echo $title ?></div>
					<div class="Text">
						<span><?php echo convert_date($postdate);?></span>
						<span> </span>
					</div>
				</div>
			</div>
			<div class="col-sm-12 padding_0 ButtonsDiv">
				<button class="BlueButton"><i class="fa fa-file-word-o"></i> Virtual Tours</button>
			</div>
		</div>
	</div>
	<div class="PageMoreDIv">
		<div class="col-sm-3 padding_0">
			<div class="Images">
				<img src="<?php echo $image2 ?>" class="img-responsive"/>
			</div>
		</div>
		<div class="col-sm-9 padding_0">
			<div class="col-sm-9 Text1 padding_0 width_100">
				<?php echo $content ?>
			</div>
		</div>
	</div>
</div>
