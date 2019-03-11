<?php defined('DIR') OR exit();
    if (empty($storage->product)) {
        $section = $storage->section;
    } else {
        $section = $storage->product;
    }
    $section['pid'] = $storage->product['id'];
    $section['id'] = $storage->section['id'];
    empty($section["meta_keys"]) AND $section["meta_keys"] = s('keywords');
    empty($section["meta_desc"]) AND $section["meta_desc"] = s('description');
?>

<!DOCTYPE html>
<html lang="en" class="HomePageBody">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <base href="<?php echo href(); ?>" />
    <title><?php echo strip_tags(s('sitetitle').' - '.$section["title"]); ?></title>
    <meta name="keywords" content="<?php echo s('keywords').', '.$section["meta_keys"] ?>" />
    <meta name="description" content="<?php echo s('description').', '.$section["meta_desc"] ?>" />
    <meta name="robots" content="index, follow" />
    
    <meta property="og:title" content="<?php echo strip_tags($section["title"]).' - '.s('sitetitle');?>" />
    <meta property="og:image" content="<?php echo (!empty($section["image1"])) ? $section["image1"] : href().WEBSITE."/images/logo.png";?>" />
    <meta property="og:description" content="<?php echo $section["meta_desc"] ?>"/>
    <meta property="og:url" content="<?php echo href($storage->section['id'], array(), '', $section["pid"]);?>" />
    <meta property="og:site_name" content="<?php echo s('sitetitle'); ?>" />
    <meta property="og:type" content="Website" />
    
    <link rel="icon" href="favicon.ico" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="_website/js/bootstrap.js"></script>
    <script src="_website/js/slick.js"></script>
    <script src="_website/js/bootstrap-select.js"></script>
    <script src="_website/js/jquery.fancybox.js"></script>
    <script src="_website/js/scripts.js"></script>  
    
    <link href="_website/css/bootstrap.css" rel="stylesheet"/>
    <link href="_website/css/bootstrap-select.css" rel="stylesheet"/>
    <link href="_website/css/font-awesome.css" rel="stylesheet"/>
    <link href="_website/css/slick-theme.css" rel="stylesheet"/>
    <link href="_website/css/slick.css" rel="stylesheet"/>
    <link href="_website/css/menu.css" rel="stylesheet"/>
    <link href="_website/css/jquery.fancybox.css" rel="stylesheet"/>
    <link href="_website/css/style.css" rel="stylesheet"/>
    <link href="_website/css/custom_res.css" rel="stylesheet"/>

    <?php if(l()=='ge'){ ?>
    <link href="_website/css/style_ge.css" rel="stylesheet"/>
    <?php }?>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3IdahWxCfjvg3ztOL_0TcyMwxKt9-aO0&callback=initMap"  type="text/javascript"></script>
   
</head>
<body>

<div class="MobileHeader">
	<div class="SocialIcons">
		<div class="TopSocialIcon">
					<a href="<?php echo s('facebook');?>" target="_blank"><i class="fa fa-facebook"></i></a>
					<a href="<?php echo s('twitter');?>" target="_blank"><i class="fa fa-twitter"></i></a>
					<a href="<?php echo s('youtube');?>" target="_blank"><i class="fa fa-youtube-play"></i></a>
					<a href="<?php echo s('instagram');?>" target="_blank"><i class="fa fa-instagram"></i></a>
		</div>
	</div>	
	<div class="MobileLanguage">
		<li<?php echo (l() == 'ge') ? ' class="active"' : '' ?>><a href="<?php echo href($section['id'], array(), 'en', $section['pid']) ?>">EN</a></li>
		<li<?php echo (l() == 'ge') ? ' class="active"' : '' ?>><a href="<?php echo href($section['id'], array(), 'ge', $section['pid']) ?>">ge</a></li>
		<li<?php echo (l() == 'ge') ? ' class="active"' : '' ?>><a href="<?php echo href($section['id'], array(), 'ru', $section['pid']) ?>">ru</a></li>
	</div>
</div>

<div class="Header">
	<div class="HeaderDiv">
		<div class="container-fluid ContainerPaddingAll padding_0">
			<div class="col-sm-5 LogoColumnd">
				<a href="<?php echo href('1'); ?>" class="Logo"></a>
			</div>
			<div class="col-sm-7 TopMenuColumn">
				<div class="TopSocialIcon2">
					<a href="<?php echo s('facebook');?>" target="_blank"><i class="fa fa-facebook"></i></a>
					<a href="<?php echo s('twitter');?>" target="_blank"><i class="fa fa-twitter"></i></a>
					<a href="<?php echo s('youtube');?>" target="_blank"><i class="fa fa-youtube-play"></i></a>
					<a href="<?php echo s('instagram');?>" target="_blank"><i class="fa fa-instagram"></i></a>
				</div>
			    <div id="MainMenu" class="CultureMenu">	
					<!-- <div class="overlay" style="display: none;"></div> -->
					<nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
					<ul class="nav sidebar-nav">
                    	<?php echo main_menu();?> 
					    	<li class="MenuDividing"></li>
                        <?php echo main_menu_bottom();?>					
					</ul>
					</nav>
					<div id="page-content-wrapper">
						<button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
							<span class="hamb-top"></span>
							<span class="hamb-middle"></span>
							<span class="hamb-bottom"></span>
						</button>
					</div>
				</div>
			</div>
			<div class="Language" id="Language">
				<select class="LangPicker"  onchange="location = this.value;">
					<option value="<?php echo href($section['id'], array(), 'ge', $section['pid']) ?>">GE</option>
					<option value="<?php echo href($section['id'], array(), 'ru', $section['pid']) ?>">RU</option>
					<option value="<?php echo href($section['id'], array(), 'en', $section['pid']) ?>">EN</option>
				</select>
			</div>
			<div class="VerticalMenuHeader">
				<li>
					<a href="#">
						<i class="fa fa-search" aria-hidden="true"></i>
						<div class="MenuTitle SearcHoverDiv">
							<input type="text" placeholder="<?php echo l('search');?>"/>
						</div>
					</a>
					<a href="#">						
						<i class="fa fa-phone" aria-hidden="true"></i>
						<div class="MenuTitle">Call</div>
					</a>
					<a href="#">						
						<i class="fa fa-info" aria-hidden="true"></i>
						<div class="MenuTitle">info</div>
					</a>
					<a href="#">						
						<i class="fa fa-video-camera" aria-hidden="true"></i>
						<div class="MenuTitle">Camera</div>
					</a>
				</li>
			</div>
		</div>
		<div class="MobileSearchDiv">
			<div class="SearchButton" data-toggle="collapse" href="#MobileSearchInput">
				<i class="fa fa-search"></i>
			</div>
			<div id="MobileSearchInput" class="collapse">
				<div class="input-group">
					<input type="text">
					<span class="input-group-addon">
						<button class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
					</span>
				</div>
			</div>
		</div>
	</div>
<?php if($storage->section["id"]==1) { ?>
	<div class="container-fluid ContainerPaddingLeft padding_0">
		<div class="HomeSlider">

	    	<ul class="SliderMenu container-fluid">
            	<?php // echo slide_home_title();?>
		    </ul>   
	   
		     
		    <div id="myCarousel" class="carousel slide">
		        <!-- main slider carousel items -->
		        <div class="SliderPositionDiv">
		            <div class="carousel-inner">
						<?php echo slide_home_img();?>
		            </div>
		        </div>
		        <a class="carousel-control left" href="#myCarousel" data-slide="prev">‹</a>
		        <a class="carousel-control right" href="#myCarousel" data-slide="next">›</a>
		    </div>                
			      
		</div>
	</div>
<?php } else { ?>
	<div class="container-fluid ContainerPaddingLeft padding_0">
		<div class="HomeSliderInner">
	        <div class="SliderPositionDiv">
	            <img src="<?php echo $storage->section["image1"] ?>"/>
	        </div>    
		</div>
	</div>
<?php } ?>
</div>	

<?php echo html_decode($storage->content); ?>

<div class="container-fluid">
	<div class="row">
		<div class="HomePageFooter">
			
		</div>
	</div>
</div>

<div class="container-fluid ">
	<div class="row">
		<div id="Footer">
			<div class="container-fluid" style="position:relative;">
				<div class="ContactList">
	    			<div class="col-sm-3">
	    				<li class="Title"><?php echo l('address');?></li>
	    				<li><?php echo s('address');?></li>
	    			</div>
	    			<div class="col-sm-3">
	    				<li class="Title"><?php echo l('contact');?></li>
	    				<li><?php echo s('phone');?></li>
	    				<li><?php echo s('mail');?></li>
	    			</div>
	    			<div class="col-sm-3">
	    				<li class="Title"><?php echo l('follow');?></li>
	    				<li>
	    					<div class="SocialIcons">            
                                <a href="<?php echo s('facebook');?>" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="<?php echo s('twitter');?>" target="_blank"><i class="fa fa-twitter"></i></a>
                                <a href="<?php echo s('youtube');?>" target="_blank"><i class="fa fa-youtube-play"></i></a>
                                <a href="<?php echo s('instagram');?>" target="_blank"><i class="fa fa-instagram"></i></a>
	    					</div>
	    				</li>
	    			</div>
	    			<div class="DisplayBlock"></div>
	    			<div class="col-sm-3 CopyDIv">
	    				<div class="CopiRight">
    						&copy; 2017 <br/> Adjara Cultural Heritage Protection Agency
	    				</div>
	    				<div class="ByShindi">
	    					Power By <a href="http://shindi.ge/" target="_blank">Shindi</a>
	    				</div>
	    			</div>
	    		</div>
	    		<div class="ScrollTop"></div>
    		</div>
    		
		</div>
	</div>
</div>
<script>
function goBack() {
    window.history.back();
}
</script>
</body>
</html>