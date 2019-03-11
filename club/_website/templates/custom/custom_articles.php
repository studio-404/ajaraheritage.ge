<?php defined('DIR') OR exit; ?>
<!-- main-cont -->
<?php
    $all = (get('all') == 'show');
	$children=db_fetch_all("select * from pages where masterid=".$id." and language='".l()."'");
	$menus = array();
	if(isset($_GET["a_0"]) or count($_GET)==0) :
		foreach($children as $c) :
			$menus[] = $c["menutype"];
		endforeach;
	else :
		foreach($_GET as $key=>$value) :
			$menus[] = $value;
		endforeach;
	endif;
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
	if($level==1) $t=$id; else $t=$masterid;
?>
<div class="main-cont">
	<div class="body-wrapper">
		<div class="page-head">
			 <div class="wrapper-padding">
			      <div class="page-title"><?php echo $title;?></div>
			      <div class="clear"></div>
		     </div>
		</div>
		<div class="wrapper-padding">
		<div class="two-colls">
		  <div class="two-colls-left">

		    <!-- // side // -->
		    <div class="side-block fly-in">
		      <div class="side-stars">
		        <div class="side-padding">
		        <form id="cats" method="get" action="<?php echo href($t);?>">
		          <div class="side-lbl">კატეგორიები</div>
<?php 
	$article_cats = db_fetch_all("select * from pages where language='".l()."' and masterid=".$t);
	foreach($article_cats as $a) :	
?>
		          <div class="checkbox">
		            <label>
		              <input type="checkbox" value="<?php echo $a["menutype"];?>" name="a_<?php echo $a["menutype"];?>" id="a_<?php echo $a["menutype"];?>" onclick="goPage('<?php echo $a["menutype"];?>');" <?php echo isset($_GET["a_".$a["menutype"]]) ? 'checked':'';?> />
		              <?php echo $a["title"];?>
		            </label>
		          </div> 
<?php 
	endforeach; 
?>
<script>
	function goPage(id) {
		if(id!=0)
			$("#a_0").prop('checked', false);
		$("#cats").submit();
//		location.href=link;
	}
</script>
		          <div class="checkbox all">
		            <label>
		              <input type="checkbox" value="0" name="a_0" id="a_0" onclick="goPage(0);" <?php echo isset($_GET["a_0"]) ? 'checked':'';?> />
		              ყველა
		            </label>
		          </div>
				  </form>
<?php if($t==9) : ?>	
				  <a href="<?php echo href(34); ?>" class="add-recipe-btn">რეცეპტის დამატება</a>
<?php endif; ?>
		        </div>
		      </div>  
		    </div>
		    <!-- \\ side \\ -->
		  </div>
		  <div class="two-colls-right">
		    <div class="two-colls-right-b">
		      <div class="padding">
		        <div class="catalog-row alternative">
<?php foreach($articles as $a) : ?>					
<?php if($t==6) : ?>
					<div class="flat-adv large">
						<div class="offer-slider-i">
							<a class="offer-slider-img" href="<?php echo href($a["id"]);?>" width="330" height="216">
								<img alt="" src="<?php echo ($a["image1"]!="") ? $a["image1"]:"_website/img/article1.jpg";?>">
								<span class="offer-slider-overlay" style="display: none;">
									<span class="offer-slider-btn" style="top: -200px;">დეტალურად</span>
								</span>
							</a>
							<div class="offer-slider-txt">
								<div class="offer-slider-link"><a href="<?php echo href($a["id"]);?>"><?php echo $a["title"];?></a></div>
								<div class="offer-slider-cat">
<?php
	$cat = db_fetch("select * from pages where language='".l()."' and menutype=".$a["menuid"]);
	echo $cat["title"];
?>
								</div>
								<div class="offer-slider-auth">
									<?php echo $a["author"];?>
								</div>						
								<div class="clear"></div>
							</div>
						</div>  
					</div>
<?php else : ?>
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
<?php endif; ?>
<?php endforeach; ?>
			        </div>

		        <div class="clear"></div>
		        
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
		  </div>
		</div>
		<div class="clear"></div>
		</div>	
	</div>
<?php require("_website/templates/widgets/popular.php");?>
</div>