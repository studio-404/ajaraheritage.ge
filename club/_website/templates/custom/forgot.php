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
				<div class="PageTitle Blue"><?=$title?></div>
			</div>
			<div class="col-sm-6 text-right">				
				<div class="ChooiseDiv">
					<?php if(isset($_GET["step"]) && $_GET["step"]=="final"){ ?>
						<div class="Numbers">				 
						</div>	
						<div class="CurrentNumber">
							<span>1</span>
							<span>2</span>
							<span>3</span>
							<label><?=$title?></label>
						</div>
					<?php }else if(isset($_POST["g_email"])){ ?>
						<div class="Numbers">				 
							<a href="#" class="Item">3</a>
						</div>	
						<div class="CurrentNumber">
							<span>1</span>
							<span>2</span>
							<label><?=$title?></label>
						</div>
					<?php }else{ ?>
						<div class="Numbers">				 
							<a href="#" class="Item">2</a>
							<a href="#" class="Item">3</a>
						</div>	
						<div class="CurrentNumber">
							<span>1</span>
							<label><?=$title?></label>
						</div>	
					<?php } ?>
					
				</div>
			</div>
		</div>
		
		<div class="RegisrationPageForm">
			<?php if(isset($_GET["step"]) && $_GET["step"]=="final"){ ?>
				<div class="container">
					<div class="form-group col-sm-12">
						<b><?=l("welldone")?></b><br>
					</div>
				</div>
				<script type="text/javascript">
					setTimeout(()=>{
						location.href="/club";
					},1800);
				</script>
			<?php }else{ ?>
				<form action="<?=l()?>/forgot?step=<?=(isset($_POST["g_email"])) ? "final" : "second"?>" method="post" id="g_recover_form">
					<?php $_SESSION["CSRF_token"] = md5(time()); ?>
					<input type="hidden" name="CSRF_token" id="CSRF_token" class="CSRF_token" value="<?=$_SESSION["CSRF_token"]?>">
					<?php if(isset($_POST["g_email"])): ?>
						<div class="container">
							<div class="form-group col-sm-9">
								<b><?=l("checkyouremail")?></b><br>
							</div>
						</div>
					<?php endif; ?>
				
					<div class="container">
						<div class="form-group col-sm-9">
							<div class="InputDiv">
								<label for="email"><?=l("email")?></label>
								<input type="text" name="g_email" id="g_email" value="<?=(isset($_POST["g_email"])) ? $_POST["g_email"] : ""?>" <?=(isset($_POST["g_email"])) ? 'readonly="readonly"' : ''?> />
							</div>
						</div>	

						<?php if(isset($_POST["g_email"])): ?>
						<div class="form-group col-sm-9">
							<div class="InputDiv">
								<label for="email"><?=l("code")?></label>
								<input type="text" name="g_code" id="g_code" value="" />
							</div>
						</div>

						<div class="form-group col-sm-9">
							<div class="InputDiv">
								<label for="g_newpass"><?=l("newpass")?></label>
								<input type="text" name="g_newpass" id="g_newpass" value="" />
							</div>
						</div>	
						<?php endif; ?>
					</div>
				</form>
			<?php } ?>
		</div>

		<div class="col-sm-12 padding_0 text-right MobileStyle2">
			<a href="javascript:void(0)" class="Button_3 active <?=(isset($_POST["g_email"])) ? 'g_button_forget_final' : 'g_button_forget_second'?>"><?=l("next")?></a>
		</div>
			
	</div>
</div>
