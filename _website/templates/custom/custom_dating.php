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
				<b>შიდუხის ანკეტა</b>
			</header>
			<div class="booking-form">
				<form style="font-weight:bold;">
				<div class="booking-form-i">
					<label>სახელი:</label>
					<div class="input"><input type="text" value=""></div>
				</div>
				<div class="booking-form-i">
					<label>ელ. ფოსტა:</label>
					<div class="input"><input type="text" value=""></div>
				</div>
				<div class="booking-form-i">
					<label>ქვეყანა:</label>
					<div class="input"><input type="text" value=""></div>
				</div>
				<div class="booking-form-i">
					<label>ქალაქი:</label>
					<div class="input"><input type="text" value=""></div>
				</div>
				<div class="booking-form-i">
					<label>დაბადების თარიღი:</label>
					<div class="input"><input type="text" value=""></div>
				</div>
				<div class="booking-form-i">
					<label>მობილური:</label>
					<div class="input"><input type="text" value=""></div>
				</div>
				<div class="booking-form-i">
					<label>სიმაღლე:</label>
					<div class="input"><input type="text" value=""></div>
				</div>

				<div class="booking-form-i">
					<label>facebook:</label>
					<div class="input"><input type="text" value=""></div>
				</div>
				<div class="booking-form-i">
					<label>skype:</label>
					<div class="input"><input type="text" value=""></div>
				</div>

				<div class="booking-form-i textarea">
					<label>ფოტო:</label>
					<div class="input"><input type="file" name="photo" value=""></div>
				</div>
				<div class="booking-form-i textarea">
					<label>ებრაელობა:</label>
					<div class="input"><input type="checkbox" value="">ორივე მშობელი</div>
					<div class="input"><input type="checkbox" value="">დედა</div>
					<div class="input"><input type="checkbox" value="">გიური</div>
				</div>

				<div class="booking-form-i textarea">
					<label>განათლება:</label>
					<div class="input"><input type="text" value=""></div>
				</div>

				<div class="booking-form-i textarea">
					<label>ენების ცოდნა:</label>
					<div class="input"><input type="text" value=""></div>
				</div>

				<div class="booking-form-i textarea">
					<label>საქმიანობა:</label>
					<div class="textarea-wrapper">
						<textarea name="work"></textarea>
					</div>
				</div>

				<div class="booking-form-i textarea">
					<label>გყავდათ თუ არა ოჯახი:</label>
					<div class="textarea-wrapper">
						<textarea name="family"></textarea>
					</div>
				</div>

				<div class="booking-form-i textarea">
					<label>გყავდათ თუ არა შვილები:</label>
					<div class="textarea-wrapper">
						<textarea name="childs"></textarea>
					</div>
				</div>

				<div class="booking-form-i textarea">
					<label>თორის დაცვა:</label>
					<div class="input"><input type="checkbox" value="">მინდა</div>
					<div class="input"><input type="checkbox" value="">მხოლოდ შაბათი</div>
					<div class="input"><input type="checkbox" value="">მხოლოდ ქაშერი</div>
					<div class="input"><input type="checkbox" value="">ყველაფერი</div>
				</div>

				<div class="booking-form-i textarea">
					<label>მზად ხართ თუ არა საცხოვრებელი ადგილის შესაცვლელად:</label>
					<div class="input"><input type="checkbox" value="">არავითარ შემთხვევაში</div>
					<div class="input"><input type="checkbox" value="">კი</div>
				</div>

				<div class="booking-form-i textarea">
					<label>რეკომენდატორი:</label>
					<div class="input"><input type="text" value=""></div>
				</div>

				<div class="booking-form-i textarea">
					<label>თქვენი ინტერესები პოტენციურ მეორე ნახევარზე:</label>
					<div class="input"></div>
				</div>

				<div class="booking-form-i textarea">
					<label>ებრაელობა:</label>
					<div class="input"><input type="checkbox" value="">ორივე მშობელი</div>
					<div class="input"><input type="checkbox" value="">დედა</div>
					<div class="input"><input type="checkbox" value="">გიური</div>
				</div>

				<div class="booking-form-i textarea">
					<label>განათლება, ასაკი და ა. შ.:</label>
					<div class="textarea-wrapper">
						<textarea name="Message"></textarea>
					</div>
				</div>
				<div class="clear"></div>
					
				<div class="booking-complete">
					<input type="submit" class="booking-complete-btn" value="გაგზავნა">
				</div>
				<div class="clear"></div>
				</form>
			</div>
    	</div>
    </div>
    <div class="wrapper-padding ip-full-width">
          <div class="mp-popular popular-destinations padding">
          	<header class="fly-in">
				<b><?php echo $title;?></b>
			</header>
            <div class="catalog-row alternative">
				<?php echo $content;?>

<?php /* foreach($articles as $a) : ?>					
				<div class="flat-adv large">
					<div class="flat-adv-a">
						<div class="flat-adv-l">
							<a href="<?php echo href($a["id"]);?>"><img alt="" src="<?php echo ($a["image1"]!="") ? $a["image1"]:"_website/img/article1.jpg";?>" width="99" height="99"></a>
						</div>
						<div class="flat-adv-r">
							<div class="flat-adv-rb">
								<div class="flat-adv-b"><a href="<?php echo href($a["id"]);?>"><?php echo $a["title"];?></a></div>
								<div class="flat-adv-c">
									<?php echo $a["description"];?>
								</div>
								<a class="flat-adv-btn" href="<?php echo href($a["id"]);?>">დეტალურად</a>
							</div>
						</div>
					</div>
				</div>
<?php endforeach; */ ?>
            </div>
            <div class="clear"></div>
            <div class="pagination">
<?php if($page_max>1) : ?>
		        <div class="pagination">
<?php for($i=1;$i<=$page_max;$i++) : ?>		          
		          <a href="<?php echo href($id).'?page='.$i;?>" <?php echo ($page_cur==$i) ? 'class="active"':'';?> ><?php echo $i;?></a>
<?php endfor; ?>
		          <div class="clear"></div>
		        </div>            
<?php endif;?>
            </div>            
          </div>
          <br class="clear" />
      	<div class="clear"></div>
      </div>	
    </div>
<?php require("_website/templates/widgets/popular.php");?>

</div>
