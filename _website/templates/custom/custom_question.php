<?php defined('DIR') OR exit; ?>
<!-- main-cont -->
<?php
    $all = (get('all') == 'show');
	$children=db_fetch_all("select * from pages where masterid=".$id." and language='".l()."'");
	$menus = array();
	foreach($children as $c) :
		$menus[] = $c["menutype"];
	endforeach;
    $menu_id = implode(",", $menus);
    if (!$all AND (empty($menu_id) OR $menu_id == 'NULL'))
        $menu_id="0";
    $all_news = $all ? " AND menuid IN (SELECT id FROM `".c("table.menus")."` WHERE `deleted` = '0' AND type = 'articles') " : " AND menuid in ({$menu_id}) ";
    //Pager: start
    $page = abs(get('page', 1));
    $per_page = c('articles.per_page');
    $limit = " LIMIT " . (($page - 1) * $per_page) . ",{$per_page}";
    $count = "SELECT COUNT(*) AS cnt FROM `".c("table.pages")."` WHERE language = '" . l() . "' {$all_news}AND visibility = 1 AND deleted = 0 ORDER BY postdate DESC;";
    $count = db_fetch($count);
    $count = empty($count) ? 0 : $count['cnt'];
    $page_max = ceil($count / $per_page);
    $page_cur = $page;
    $page_max = $page_max;
    $item_count = $count;
    $all_par = $all ? '&all=show' : null;
    //Pager: end
    $sql = "SELECT * FROM `".c("table.pages")."` WHERE language = '" . l() . "' {$all_news}AND `deleted` = '0' AND visibility = 1 ORDER BY postdate DESC{$limit};";
    $res = db_fetch_all($sql);
    $articles = $res;
?>
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


          <div class="mp-popular popular-destinations padding">
          	<header class="fly-in">
				<b>შეკითხვა რაბინს</b>
			</header>
          	<div class="booking-form">
				<form style="font-weight:bold;">
				<div class="booking-form-i">
					<label>თქვენი სახელი:</label>
					<div class="input"><input type="text" value=""></div>
				</div>
				<div class="booking-form-i">
					<label>ელ-ფოსტა:</label>
					<div class="input"><input type="text" value=""></div>
				</div>
				<div class="booking-form-i textarea">
					<label>შეკითხვა:</label>
					<div class="textarea-wrapper">
						<textarea name="Message"></textarea>
					</div>
				</div>
				<div class="booking-complete">
					<input type="submit" class="booking-complete-btn" value="გაგზავნა">
				</div>
				<div class="clear"></div>
				</form>
			</div>         
          </div>
	      <div class="mp-popular popular-destinations padding">
	        	<header class="fly-in">
					<b>შეკითხვები</b>
				</header>
				<div class="shortcodes">
					<!-- // toggle // -->
						<div class="toggle">
						<!-- // -->
<?php foreach($articles as $a) : ?>					
						<div class="toggle-i">
							<div class="toggle-ia">
								<div class="toggle-ia-a">
									<div class="toggle-ia-l">
										<a href="#" class="toggle-trigger"></a>
									</div>
									<div class="toggle-ia-r">
  										<div class="toggle-ia-rb">
											<div class="toggle-lbl">შეკითხვის ტექსტის ადგილი. შეკითხვის ტექსტის ადგილი</div>
											<div class="toggle-txt" style="display: none;">
												<div class="cat">
													კატეგორია
												</div>
												<p class="txt">ცნობილი ფაქტია, რომ გვერდის წაკითხვად შიგთავსს შეუძლია მკითხველის ყურადღება მიიზიდოს და დიზაინის აღქმაში ხელი შეუშალოს. Lorem Ipsum-ის გამოყენებით ვღებულობთ იმაზე მეტ-ნაკლებად სწორი გადანაწილების ტექსტს, ვიდრე ერთიდაიგივე გამეორებადი სიტყვებია ხოლმე. შედეგად, ტექსტი ჩვეულებრივ ინგლისურს გავს, მისი წაითხვა კი შეუძლებელია.</p>
											</div>
  										</div>
  										<div class="clear"></div>
										</div>
									</div>
								<div class="clear"></div>
							</div>
						</div>
<?php endforeach; ?>			
						<!-- \\ -->
						</div>
					<!-- \\ toggle \\ -->
				</div>
	      </div>
        </div>
        <br class="clear" />
      </div>
    <div class="clear"></div>
    </div>	
  </div>
    
<?php require("_website/templates/widgets/popular.php");?>


</div>
<!-- /main-cont --> 