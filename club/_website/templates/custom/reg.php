<?php defined('DIR') OR exit; ?>
<div class="container-fluid ContainerPaddingAll">
	<div class="PageInfoDiv">
		<div class="">
			<div class="col-sm-3 padding_0">
				<div class="LeftInfo">
					<div class="BackButton" onclick="window.history.back();"></div>
					<div class="Title"><?=l("regisration")?></div>
					<div class="Text">
						<span><?=l("hot.line")?></span>
						<span><?=s("hot.line")?></span>
					</div>
				</div>
			</div> 
		</div>
	</div>
	<div class="GalleryPageDiv">		
		<div class="row">
			<div class="col-sm-6">
				<div class="PageTitle Blue"><?=l("regisration")?></div>
			</div>
			<div class="col-sm-6 text-right">
				<div class="ChooiseDiv">
					<div class="Numbers">				 
						<a href="#" class="Item">3</a>
						<a href="#" class="Item">4</a>
					</div>	
					<div class="CurrentNumber">
						<span>1</span>
						<span>2</span>
						<label><?=l("chooseprojects")?></label>
					</div>
				</div>
			</div>
		</div>
		
		<div class="RegisrationPage">
			<div class="Left LeftMobile">
				<?php 
				foreach ($g_members as $item):
				?>
				<label class="MemberBoxItem"> 
					<div class="ItemHeader">
						<div class="col-sm-6 padding_0">
							<input class="AjaraRadio g_memberType" type="radio" id="memberType<?=(int)$item["id"]?>" name="radio1" value="<?=(int)$item["id"]?>">
							<label for="memberType<?=(int)$item["id"]?>" class="MyLabel" name="radio1"><?=strip_tags($item["title"])?></label>
						</div>
						<div class="col-sm-6 padding_0 text-right">
							<div class="Price"><?=strip_tags($item["menutitle"])?></div>
						</div>
					</div>
					<div class="Item">
						<?=strip_tags($item["description"], "<table><tr><th><td>")?>
					</div>
				</label>
				<?php endforeach; ?>
			</div>
			<div class="Right">
				<div class="ChooseProjectDiv">
					<?php
					foreach ($g_projects as $item):
					?>
					<label class="ProjectBoxItem"> 
						<div class="ItemHeader">
							<div class="col-sm-12 padding_0">
								<input class="AjaraRadio g_chosenproject" type="radio" id="projects<?=(int)$item["id"]?>" name="radio2" value="<?=(int)$item["id"]?>">
								<label for="projects<?=(int)$item["id"]?>" class="MyLabel222" name="radio2"><?=strip_tags($item["title"])?></label>
							</div>
						</div> 
						<div class="Info">
							<div class="Image" style="background:url('<?=$item["image1"]?>');"></div>
							<div class="Text">
								<?=strip_tags($item["description"])?>
							</div>
						</div>
					</label>
					<?php endforeach; ?>

				</div>
				<div class="col-sm-12 padding_0 text-right MobileStyle2">
					<a href="javascript:void(0)" class="Button_3 g_button_prev_first"><?=l("prev")?></a>
					<a href="javascript:void(0)" class="Button_3 g_button_next_first active"><?=l("next")?></a>
				</div>
			</div>
		</div>
		
	</div>
</div>

<script type="text/javascript" src="/club/_website/js/g_registration.js" charset="utf-8"></script>