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
				<?php if(isset($_GET["step"]) && $_GET["step"]=="second"){?>
					<div class="ChooiseDiv">
						<div class="Numbers">				 
							<a href="#" class="Item">4</a>
						</div>	
						<div class="CurrentNumber">
							<span>1</span>
							<span>2</span>
							<span>3</span>
							<label><?=l("personaldata")?></label>
						</div>
					</div>
				<?php }else if(isset($_GET["step"]) && $_GET["step"]=="final"){ ?>
					<div class="ChooiseDiv">
						<div class="Numbers">				
						</div>	
						<div class="CurrentNumber">
							<span>1</span>
							<span>2</span>
							<span>3</span>
							<span>4</span>
							<label><?=l("paymentmethod")?></label>
						</div>
					</div>
				<? }else{ ?>
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
				<?php } ?>
			</div>
		</div>
		
		
			<?php 
			if(isset($_POST['userhash']) && !empty($_POST['userhash'])){
				?>
				<div class="RegisrationPageForm">
					<div class="container">
						<p>you are registered ! </p>
						<p>registered hash: <?=$_POST['userhash']?> </p>
						<p>payment methods here</p>
					</div>
				</div>
				<?php
			}else if(
				isset($_GET["step"]) && 
				$_GET["step"]=="second" && 
				isset($_POST["memberType"]) && 
				is_numeric($_POST["memberType"]) && 
				isset($_POST["chosenProject"]) && 
				is_numeric($_POST["chosenProject"])
			){ ?>
				<div class="RegisrationPageForm">
					<form action="<?=l()?>/registratsia?step=final" method="post" id="g_final_step_form">
						<input type="hidden" name="userhash" id="userhash" value="" />

						<?php $_SESSION["CSRF_token"] = md5(time()); ?>
						<input type="hidden" name="CSRF_token" id="CSRF_token" class="CSRF_token" value="<?=$_SESSION["CSRF_token"]?>">
					</form>
					<div class="container">
						<div class="form-group col-sm-6">
							<div class="InputDiv">
								<label for="g_firstname"><?=l("firstname")?></label>
								<input type="text" id="g_firstname" value="" />
							</div>
						</div>
						<div class="form-group col-sm-6">
							<div class="InputDiv">
								<label for="g_lastname"><?=l("lastname")?></label>
								<input type="text" id="g_lastname" value="" />
							</div>
						</div>
						<div class="form-group col-sm-6">
							<div class="InputDiv">
								<label for="g_birthday"><?=l("birthday")?></label>
								<input type="text" class="datepicker" id="g_birthday" value="" />
							</div>
						</div>
						
						<div class="form-group col-sm-6">
							<div class="InputDiv">
								<label for="g_usertype"><?=l("usertype")?></label>
								<input type="hidden" name="g_usertype" id="g_usertype" value="<?=(int)$_POST["memberType"]?>" />
								<input type="text" value="<?=$selectedMember["title"]?>" readonly="readonly" />
							</div>
						</div>
						<div class="form-group col-sm-6">
							<div class="InputDiv">
								<label for="g_personalnumber"><?=l("personalnumber")?></label>
								<input type="text" id="g_personalnumber" value="" />
							</div>
						</div>
						<div class="form-group col-sm-6">
							<div class="InputDiv">
								<label for="g_address"><?=l("address")?></label>
								<input type="text" id="g_address" value="" />
							</div>
						</div>
						<div class="form-group col-sm-6">
							<div class="InputDiv">
								<label for="email"><?=l("email")?></label>
								<input type="text" id="g_email" value="" />
							</div>
						</div>
						<div class="form-group col-sm-6">
							<div class="InputDiv">
								<label for="g_phone"><?=l("phone")?></label>
								<input type="text" id="g_phone" value="" />
							</div>
						</div>
						<div class="form-group col-sm-6">
							<div class="InputDiv">
								<label for="g_workplace"><?=l("workplace")?></label>
								<input type="text" id="g_workplace" value="" />
							</div>
						</div>
						<div class="form-group col-sm-6">
							<div class="InputDiv">
								<label for="g_position"><?=l("position")?></label>
								<input type="text" id="g_position">
							</div>
						</div>
						<div class="form-group col-sm-6">
							<div class="InputDiv">
								<label for="g_password"><?=l("password")?></label>
								<input type="password" id="g_password" value="" />
							</div>
						</div>
						<div class="form-group col-sm-6">
							<div class="InputDiv"><!-- InputError -->
								<label for="g_comfirmpassword"><?=l("comfirmpassword")?></label>
								<input type="password" id="g_comfirmpassword" value="" />
								<!-- <div class="ErrorBox">error notification</div> -->
							</div>
						</div>
						<div class="form-group col-sm-12"> 
							<input class="AjaraCheckbox" type="checkbox" id="g_agreeterms" data-error="<?=l("pleaseagreetheterms")?>" value="" />
							<label class="pull-left Text SmallLabel" for="g_agreeterms"><a href="" target="_blank"><?=l("agreeterms")?></a></label>
						</div>
					</div>
				</div>

				<div class="col-sm-12 padding_0 text-right MobileStyle2">
					<a href="javascript:void(0)" class="Button_3 active g_button_prev_second"><?=l("prev")?></a>
					<a href="javascript:void(0)" class="Button_3 active g_button_next_second"><?=l("next")?></a>
				</div>

			<?php }else{ ?>
				<div class="RegisrationPage">
					<form action="<?=l()?>/registratsia?step=second" method="post" id="registration_step_one">
						<?php $_SESSION["CSRF_token"] = md5(time()); ?>
						<input type="hidden" name="CSRF_token" id="CSRF_token" class="CSRF_token" value="<?=$_SESSION["CSRF_token"]?>">
						<div class="Left LeftMobile">
							<?php 
							foreach ($g_members as $item):
							?>
							<label class="MemberBoxItem"> 
								<div class="ItemHeader">
									<div class="col-sm-6 padding_0">
										<input class="AjaraRadio g_memberType" type="radio" id="memberType<?=(int)$item["id"]?>" name="memberType" value="<?=(int)$item["id"]?>">
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
											<input class="AjaraRadio g_chosenproject" type="radio" id="projects<?=(int)$item["id"]?>" name="chosenProject" value="<?=(int)$item["id"]?>">
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
					</form>
				</div>
			<?php } ?>
		
		
	</div>
</div>

<!-- datepicker start -->
<script type="text/javascript" src="/club/_website/js/bootstrap-datepicker.min.js" charset="utf-8"></script>
<script type="text/javascript" src="/club/_website/js/bootstrap-datepicker.<?=l()?>.min.js" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
(function(){
	$(".datepicker").datepicker({
  		language: '<?=l()?>',
  		format: 'mm-dd-yyyy'
  	});
})();
</script>
<!-- datepicker end -->

<script type="text/javascript" src="/club/_website/js/g_registration.js" charset="utf-8"></script>
