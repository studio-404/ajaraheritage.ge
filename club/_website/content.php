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
<script src="https://ajaraheritage.ge/club/_website/js/bootstrap.js"></script>
<script src="https://ajaraheritage.ge/club/_website/js/slick.js"></script>
<script src="https://ajaraheritage.ge/club/_website/js/bootstrap-select.js"></script>
<script src="https://ajaraheritage.ge/club/_website/js/jquery.fancybox.js"></script>
<script src="https://ajaraheritage.ge/club/_website/js/scripts.js"></script>     

<link href="https://ajaraheritage.ge/club/_website/css/bootstrap.css" rel="stylesheet"/>
<link href="https://ajaraheritage.ge/club/_website/css/bootstrap-select.css" rel="stylesheet"/>
<link href="https://ajaraheritage.ge/club/_website/css/bootstrap-datepicker3.min.css" rel="stylesheet"/>
<link href="https://ajaraheritage.ge/club/_website/css/font-awesome.css" rel="stylesheet"/>
<link href="https://ajaraheritage.ge/club/_website/css/slick-theme.css" rel="stylesheet"/>
<link href="https://ajaraheritage.ge/club/_website/css/slick.css" rel="stylesheet"/>
<link href="https://ajaraheritage.ge/club/_website/css/menu.css" rel="stylesheet"/>
<link href="https://ajaraheritage.ge/club/_website/css/jquery.fancybox.css" rel="stylesheet"/>
<link href="https://ajaraheritage.ge/club/_website/css/style.css" rel="stylesheet"/>
<link href="https://ajaraheritage.ge/club/_website/css/custom_res.css" rel="stylesheet"/>


    <?php if(l()=='ge'){ ?>
    <link href="https://ajaraheritage.ge/club/_website/css/style_ge.css" rel="stylesheet"/>
    <?php }?>
   
</head>
<body>

<?php 
if(!isset($_COOKIE["user"]) && !isset($_SESSION["g_username"])):
?>
<div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content"> 
            <div class="modal-body">
                <div class="ModalHeader">
                	<span><?=l("login")?></span>
                	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    	<span aria-hidden="true">&times;</span>
                	</button>
                </div>
                <div class="LoginForm">
                	<form action="" method="post" id="loginForm">
                		<?php $_SESSION["CSRF_login_token"] = md5(time()); ?>
                		<input type="hidden" name="CSRF_token" class="CSRF_login_token" value="<?=$_SESSION["CSRF_login_token"]?>" />
						<div class="row FormMargin">
							<div class="form-group col-sm-12 g_login_error_box" style="margin: 0; display: none;">
								<div class="InputDiv">
									<label class="g_login_error_text" style="text-align: center; font-size: 16px; color: red; padding-bottom: 10px;"></label>
								</div>
							</div>
							<div class="form-group col-sm-12">
								<div class="InputDiv">
									<label><?=l("email")?></label>
									<input type="text" class="g_login_email" value=""/>
								</div>
							</div>
							<div class="form-group col-sm-12">
								<div class="InputDiv">
									<label><?=l("password")?></label>
									<input type="password" class="g_login_password" value="" />
								</div>
							</div>
						</div>
	                	<div class="row">						
	                		<div class="col-sm-12 padding_0">
	                			<div class="form-group col-sm-6">
			                		<input class="AjaraCheckbox g_login_save" type="checkbox" id="Cat105" value="1" />
									<label class="pull-left Text" for="Cat105"><?=l("save")?></label>
			                	</div>
			                	<div class="form-group col-sm-6 text-right">
			                		<a href="<?php echo href('223');?>" class="ForgotPassword"><?=l("forgotpass")?></a>
			                	</div>
	                		</div>
	                		<div class="ModalBUttons">
	                			<div class="form-group col-sm-6">
			                		<a href="javascript:void(0)" class="Button_1 g_login_submit"><?=l("login")?></a>
			                	</div>
			                	<div class="form-group col-sm-6">
			                		<a href="<?php echo href('222');?>"><div class="Button_2"><?=l("regisration")?></div></a>
			                	</div>
	                		</div>
	                	</div>
                	</form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
endif;
?>

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
		<input type="hidden" name="input_lang" id="input_lang" class="input_lang" value="<?=l()?>" />
	</div>
</div>


<div class="Header">
	<div class="HeaderDiv">
		<div class="container-fluid ContainerPaddingAll padding_0">
			<div class="col-sm-5 LogoColumnd">
				<a href="<?php echo href('1');?>" class="Logo"></a>
			</div>
			<div class="col-sm-7 TopMenuColumn">
				<?php 
				if(!isset($_COOKIE["user"]) && !isset($_SESSION["g_username"])):
				?>	
				<div class="LoginButton" data-toggle="modal" data-target="#LoginModal"><?=l("login")?></div>
				<?php endif; ?>	
				

				<?php 
				if(isset($_COOKIE["user"]) || isset($_SESSION["g_username"])):
					$user_firstname = "";
					if(isset($_COOKIE["user_info"])){
						$exp = explode("@@", $_COOKIE["user_info"]);
						$user_firstname = $exp[4];
					}

					if(isset($_SESSION["g_user_info"]["firstname"])){
						$user_firstname = $_SESSION["g_user_info"]["firstname"];
					}
				?>
				<div class="LoginButton" onclick="location.href = '/club/<?=l()?>/usersprofile'"><?=$user_firstname?></div>
				<?php endif; ?>	


				<div class="TopSocialIcon2">
					<a href="<?php echo s('facebook');?>" target="_blank"><i class="fa fa-facebook"></i></a>
					<a href="<?php echo s('twitter');?>" target="_blank"><i class="fa fa-twitter"></i></a>
					<a href="<?php echo s('youtube');?>" target="_blank"><i class="fa fa-youtube-play"></i></a>
					<a href="<?php echo s('instagram');?>" target="_blank"><i class="fa fa-instagram"></i></a>
				</div>		
			    <div id="MainMenu" class="CultureMenu">	
					<nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
					<ul class="nav sidebar-nav"> 
                    	<?php echo club_menu();?>			
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
				<div class="ButtonVertical">Heritage  assistance</div>
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

<div class="container-fluid ContainerPaddingAll HomePartneBackground">
	<div class="HomePageProject">	
		<div class="PartArrows">
			<div class="PartLeftArrow"></div>	
			<div class="PartRightArrow"></div>	
		</div>
		<div class="PageTitle">Partners</div>
		<div class="row row10">
			<div class="HomePartnersSlide">
				<div class="Item"><div class="Image"><img src="_website/img/part_1.png"/></div></div>
				<div class="Item"><div class="Image"><img src="_website/img/part_2.png"/></div></div>
				<div class="Item"><div class="Image"><img src="_website/img/part_3.png"/></div></div>
				<div class="Item"><div class="Image"><img src="_website/img/part_4.png"/></div></div>
				<div class="Item"><div class="Image"><img src="_website/img/part_5.png"/></div></div>
				<div class="Item"><div class="Image"><img src="_website/img/part_6.png"/></div></div>
				<div class="Item"><div class="Image"><img src="_website/img/part_7.png"/></div></div>
				<div class="Item"><div class="Image"><img src="_website/img/part_8.png"/></div></div>
				<div class="Item"><div class="Image"><img src="_website/img/part_1.png"/></div></div>
				<div class="Item"><div class="Image"><img src="_website/img/part_2.png"/></div></div>
				<div class="Item"><div class="Image"><img src="_website/img/part_3.png"/></div></div>
				<div class="Item"><div class="Image"><img src="_website/img/part_4.png"/></div></div>
				<div class="Item"><div class="Image"><img src="_website/img/part_5.png"/></div></div>
				<div class="Item"><div class="Image"><img src="_website/img/part_6.png"/></div></div>
				<div class="Item"><div class="Image"><img src="_website/img/part_7.png"/></div></div>
				<div class="Item"><div class="Image"><img src="_website/img/part_8.png"/></div></div>
			</div>
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
    						&copy; 2018 <br/> Adjara Cultural Heritage Protection Agency
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

<script src="https://ajaraheritage.ge/club/_website/js/g_scripts.js"></script> 

</body>
</html>