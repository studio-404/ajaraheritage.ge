<?php defined('DIR') OR exit; ?>
<!-- main-cont -->
<div class="main-cont">
	<div class="body-wrapper">
    	<div class="page-head">
    	 	<div class="wrapper-padding">
		      	<div class="page-title"><?php echo $title;?></div>
		      	<div class="clear"></div>
	     	</div>
    	</div>
	    <div class="wrapper-padding">
	    	<div class="mp-popular popular-destinations padding">
	    		<header class="fly-in">
					<?php echo $description;?>
				</header>
				<div class="booking-form">
					<form style="font-weight:bold;">
					<div class="booking-form-i">
						<label>სახელი:</label>
						<div class="input"><input type="text"  name="name" value=""></div>
					</div>
					<div class="booking-form-i">
						<label>ელ-ფოსტა:</label>
						<div class="input"><input type="text" name="email" value=""></div>
					</div>
					<div class="booking-form-i">
						<label>კერძის სახელი:</label>
						<div class="input"><input type="text" name="recipe" value=""></div>
					</div>
					<div class="booking-form-i">
						<label>ფოტო:</label>
						<div class="input"><input type="file" name="photo" value=""></div>
					</div>
					<div class="booking-form-i textarea">
						<label>გაგვიზიარეთ თქვენი რეცეპტი: (გთხოვთ, მიუთითოთ ყველა ინგრედიენტები და რაოდენობა, ასევე დეტალური ინსტრუქცია)</label>
						<div class="textarea-wrapper">
							<textarea name="Message"></textarea>
						</div>
					</div>
					<div class="clear"></div>
					<div class="booking-complete">
					<input type="submit" class="add-recipe-btn" value="რეცეპტის დამატება">
					</div>
					<div class="clear"></div>
					</form>
				</div>
    		</div>
    	</div>
  	</div>
<?php require("_website/templates/widgets/popular.php");?> 
</div>

    
