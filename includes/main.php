<div class="leftbar">
	<div class="infocat">
    	
        <ul>
        	<?php
			$info=$groups->getByType("Information Categories");
			while($infoGet=$conn->fetchArray($info))
			{?>
        		<li><a href="<?=$infoGet['urlname'];?>"><?=$infoGet['name'];?></a></li>
        	<? }?>
        </ul>
    </div>
    
    <div class="infocat">
      <p>महत्वपूर्ण लिन्क्स</p>
      <ul>
      	<?
		$link=$groups->getByParentIdWithLimit(LINKS, 10);
		while($linkGet=$conn->fetchArray($link))
		{?>
        	<li><a href="<?=$linkGet['urlname'];?>"><?=$linkGet['name'];?></a></li>
        <? }?>      
       </ul>
    </div>
    
    <style type="text/css"> 
        .video_gall{    text-align: center;
        background: #016894;
        height: 27px;
        padding: 29px 0;
        font-size: 20px;
        font-weight: bold;
    }
    .video_gall a{color: white;}
    .video_gall a:hover{color: #E4E4E4}
    </style>
    <div class="infocat">
      <div class="video_gall"><a href="video-gallery">हाम्रा भिडियोहरु</a></div>
    </div>
    
</div>

<div class="wrap">
	<script type="text/javascript" src="engine1/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="engine1/style.css" />
    <!-- Start WOWSlider.com BODY section -->
    <div id="wowslider-container1" style="margin-bottom:15px">
            
        <div class="ws_images">
            <ul>
                <?php $i=0;
                $slide=$groups->getByParentId(SLIDER);
                while($slideGet=$conn->fetchArray($slide))
                {?>
                    <li><img height="300" width="470" src="<?=CMS_GROUPS_DIR.$slideGet['image'];?>" 
                    alt="<?=$slideGet['name'];?>" 
                    title="" id="wows1_<?=$i;?>"/></li>
                    
                <?php $i++; }?>
            </ul>
        </div>
            
        <div class="ws_bullets">
            <div>
                <?php $i=1;
                $slide=$groups->getByParentId(SLIDER);
                while($slideGet=$conn->fetchArray($slide))
                {?>
                    <a href="<?=$slideGet['urlname'];?>" title="<?=$slideGet['name'];?>">
                   <img height="300" width="470" src="<?=CMS_GROUPS_DIR.$slideGet['image'];?>" 
                   alt="<?=$slideGet['name'];?>"/><?=$i;?></a>
                <?php $i++; }?> 
            </div>
        </div>
    
    </div>
    <script type="text/javascript" src="engine1/wowslider.js"></script>
    <script type="text/javascript" src="engine1/script.js"></script>
    <!-- End WOWSlider.com BODY section -->
    
    <!--welcome message-->
	<?php
        $wel=$groups->getById(WELCOME);
        $welGet=$conn->fetchArray($wel);
    ?>
    <div class="welcome" style="float:none; text-align:justify; font-style;">
        <p style="font-size: 19px; font-weight:bold; font-family:Artifika,Arial,Helvetica,sans-serif; line-height:25px;">
			<?=$welGet['name'];?>
      	</p>
		<?=$welGet['shortcontents'];?>
        <a href="<?=$welGet['urlname'];?>" class="read_more">Read More</a> 
    </div>
    
</div>

<div class="rightbar">
	<?php
        $msg=$groups->getById(MESSAGE);
        $msgGet=$conn->fetchArray($msg);
    ?>
    <div class="infocat">
    	<p style="margin-bottom:12px;"><?=$msgGet['name'];?></p>
        <img src="<?=CMS_GROUPS_DIR.$msgGet['image'];?>" 
        style="float:left; margin:5px 10px 0 0; width:100px; height:95px" />
        <?=$msgGet['shortcontents'];?>
        <br />
        <a href="<?=$msgGet['urlname'];?>" class="read_more">Read More</a>
        <div style="clear:both"></div>
    </div>
    
    <div class="infocat">
    	<?php
		$rep=$groups->getById(388);
		$repGet=$conn->fetchArray($rep);
		?>
        <p style="margin-bottom:12px;"><?=$repGet['name'];?></p>
		<img style="float:left; margin:5px 10px 0 0" src="<?=CMS_GROUPS_DIR.$repGet['image'];?>" 
		width="100" height="100">
		<?=$repGet['shortcontents'];?>
		<br/>
		<a href="<?=$repGet['urlname'];?>" class="read_more">Read More</a>
        <div style="clear:both"></div>
    </div>
    
    <div class="infocat">
        <p>प्रकाशन</p>
        <ul style="margin:0 3px">
		<?php
			$down=$groups->getByParentIdWithLimit(PUBLICATIONS,3);
			while($downRow=$conn->fetchArray($down))
			{?>
				<li style="margin:10px 0;background:#01a2e7" class="second">
					<b><?=$downRow['name'];?></b><br />
                    <a href="<?=CMS_FILES_DIR.$downRow['contents'];?>">
                       Download
                    </a>
				</li>
			<? }?>
  		</ul>
                <?php $url=$groups->getById(PUBLICATIONS); $url=$conn->fetchArray($url);?>
                <a style="margin:5px 0 10px 4px" href="<?=$url['urlname'];?>" class="read_more">Read More</a>
  </div>
</div>
<div style="clear:both"></div>