<?php defined('DIR') OR exit; ?>
<div class="container-fluid ContainerPaddingAll">
	<div class="PageInfoDiv">
		<div class="">
			<div class="col-sm-3 padding_0">
				<div class="LeftInfo">
					<div class="BackButton" onclick="history.go(-1);return false;"></div>
					<div class="Title"><?php echo $title;?></div>
					<div class="Text">
						<span><?php echo l('hot.line');?></span>
						<span><?php echo s('hot.line');?></span>
					</div>
				</div>
			</div>
			<div class="col-sm-12 padding_0 ButtonsDiv">
				<div class="SearchFormDiv">
					<div class="input-group">
					    <input type="text" class="form-control" placeholder="<?php echo l('search');?>">
					    <span class="input-group-btn">
					        <button class="SubmitSearch"><i class="fa fa-search" aria-hidden="true"></i></button>
					    </span>
				    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="GalleryPageDiv">		
		<div class="PageTitle Blue"><?php echo $title;?></div>
		<div class="row row10">
        
            <div class="NewsList">
                
<?php foreach($news as $a) : ?>	
                <div class="col-sm-3">
                    <a href="<?php echo href($a["id"]);?>" class="NewsItem">
                        <div class="Image">
                            <img src="<?php echo ($a["image1"]!="") ? $a["image1"]:"_website/img/article1.jpg";?>" title="<?php echo $a["title"];?>" alt="<?php echo $a["title"];?>"/>
                        </div>
                        <div class="Date"><span><?php echo convert_date($a['postdate']) ?></span></div>
                        <div class="Title">
                            <?php echo $a["title"];?>
                            <div class="ReadmoRe"><span><?php echo l('readmore');?></span></div>
                        </div>
                    </a>
                </div>
<?php endforeach; ?>

                
            </div>

		</div>
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