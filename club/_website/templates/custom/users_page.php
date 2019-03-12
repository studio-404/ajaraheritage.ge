<?php defined('DIR') OR exit; ?>

<div class="container-fluid ContainerPaddingAll">
	<div class="PageInfoDiv">
		<div class="">
			<div class="col-sm-3 padding_0">
				<div class="LeftInfo">
					<div class="BackButton" onclick="window.history.back();"></div>
					<div class="Title"><?=$title?></div>
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
				<div class="PageTitle Blue"><?=l("welcometext")?>, <?=$user_firstname?></div>
			</div>
		</div>
		
		<div class="RegisrationPage">
			<div class="Left LeftMobile">
				<label class="MemberBoxItem" style="width: calc(100% - 40px);"> 
					<div class="ItemHeader">
						<div class="col-sm-12 padding_0">
							<label class="MyLabel"><?=l("navigation")?></label>
						</div>
					</div>
					<div class="Item">
						<a href="/club/<?=l()?>/usersprofile" style="display: block;"><?=l("profile")?></a>
						<a href="/club/<?=l()?>/usersprofile?password=true" style="display: block;"><?=l("updatepassword")?></a>

						<a href="javascript:void(0)" style="display: block;" class="g_signout"><?=l("signout")?></a>
						<br />
					</div>
				</label>
			</div>
			<div class="Right">
				
				<div class="col-sm-9">
					<form action="" method="post">
						<?php $_SESSION["CSRF_token"] = md5(time()); ?>
						<input type="hidden" name="CSRF_token" id="CSRF_token" class="CSRF_token" value="<?=$_SESSION["CSRF_token"]?>" />
						
						<?php if(!isset($_GET["password"])): ?>
						<div class="form-group col-sm-6">
							<div class="InputDiv">
								<label for="g_firstname"><?=l("firstname")?></label>
								<input type="text" id="g_firstname" value="<?=htmlentities($user_firstname)?>" />
							</div>
						</div>
						<div class="form-group col-sm-6">
							<div class="InputDiv">
								<label for="g_lastname"><?=l("lastname")?></label>
								<input type="text" id="g_lastname" value="<?=htmlentities($user_lastname)?>" />
							</div>
						</div>
						<div class="form-group col-sm-6">
							<div class="InputDiv">
								<label for="g_birthday"><?=l("birthday")?></label>
								<input type="text" class="datepicker" id="g_birthday" value="<?=$user_birthday?>" />
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
								<input type="text" id="g_personalnumber" value="<?=htmlentities($user_pn)?>" />
							</div>
						</div>
						<div class="form-group col-sm-6">
							<div class="InputDiv">
								<label for="g_address"><?=l("address")?></label>
								<input type="text" id="g_address" value="<?=htmlentities($user_address)?>" />
							</div>
						</div>
						<div class="form-group col-sm-6">
							<div class="InputDiv">
								<label for="email"><?=l("email")?></label>
								<input type="text" id="g_email" value="<?=htmlentities($user_email)?>" readonly="readonly" />
							</div>
						</div>
						<div class="form-group col-sm-6">
							<div class="InputDiv">
								<label for="g_phone"><?=l("phone")?></label>
								<input type="text" id="g_phone" value="<?=htmlentities($user_phone)?>" />
							</div>
						</div>
						<div class="form-group col-sm-6">
							<div class="InputDiv">
								<label for="g_workplace"><?=l("workplace")?></label>
								<input type="text" id="g_workplace" value="<?=htmlentities($user_workplace)?>" />
							</div>
						</div>
						<div class="form-group col-sm-6">
							<div class="InputDiv">
								<label for="g_position"><?=l("position")?></label>
								<input type="text" id="g_position" value="<?=htmlentities($user_position)?>" />
							</div>
						</div>
						<?php endif; ?>

						<?php if(isset($_GET["password"])): ?>
						<div class="form-group col-sm-12" id="msgForUserBox" style="display: none;">
							<div class="InputDiv">
								<label id="msgForUser"></label>
							</div>
						</div>

						<div class="form-group col-sm-12">
							<div class="InputDiv">
								<label for="g_old_password"><?=l("oldpassword")?></label>
								<input type="password" id="g_old_password" value="" />
							</div>
						</div>

						<div class="form-group col-sm-12">
							<div class="InputDiv">
								<label for="g_password"><?=l("password")?></label>
								<input type="password" id="g_password" value="" />
							</div>
						</div>
						<div class="form-group col-sm-12">
							<div class="InputDiv"><!-- InputError -->
								<label for="g_comfirmpassword"><?=l("comfirmpassword")?></label>
								<input type="password" id="g_comfirmpassword" value="" />
								<!-- <div class="ErrorBox">error notification</div> -->
							</div>
						</div>
						<?php endif; ?>


					</form>
				</div>


				<div class="col-sm-9 text-right MobileStyle2" style="margin-top: 20px;">
					<a href="javascript:void(0)" class="Button_3 <?=(isset($_GET["password"])) ? 'g_button_update_password' : 'g_button_update'?>  active"><?=l("update")?></a>
				</div>
			</div>
		</div>
		
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

