<?php //include("includes/breadcrumb.php"); ?>
<style>
	.container1{}
	#breadcrumb
	{
		border-top: none;
		border-bottom: 1px solid #666;
		padding: 0px; margin-top:6px;
	}
	.box{ padding:20px; text-align:justify}
</style>
<div id="breadcrumb">
    <ul>
        <li class="first">You Are At</li>
        <li>&#187;</li>
        <li>Homepage</li>
        <li>&#187;</li>
        <li class="current"><?=$pageName?></li>
    </ul>
</div>
<br />

<div class="box">
    <div class="content" style="float:none; width:100%">
        <h2 style="margin-bottom:10px"><?=$pageName?></h2>
        <?php
			$page=$groups->getById($pageId);
			$pageGet=$conn->fetchArray($page);
			if(!empty($pageGet['image']) and file_exists(CMS_GROUPS_DIR.$pageGet['image']))
			{?>
				<img src="<?=CMS_GROUPS_DIR.$pageGet['image']?>" width="300" height="196" style="float:left;
                margin:4px 10px 0px 0px"/>	
			<? }
			echo $pageGet['contents'];
			if(!empty($pageGet['image']) and file_exists(CMS_GROUPS_DIR.$pageGet['image']))
			{
				echo '<div style="clear:both"></div>';	
			}
		?>
        <br /><br /><br />
        <?php
		if($pageId==PUBLICATIONS)
		{
			echo '<div class="download"><h2>Download Our Publications</h2><ul>';
			$down=$groups->getByParentId(PUBLICATIONS);
			while($downRow=$conn->fetchArray($down))
			{?>
				<li style="margin:10px 0">
					<div style="float: left;"><?=$downRow['name'];?></div>
					<div style="float:right;">
						<a href="<?=CMS_FILES_DIR.$downRow['contents'];?>">
                        	<p style="float:left; margin-right:7px;">Download </p>
                        	<img style="float:right" src="images/pdf.png" width="20" />
                       	</a>
					</div>
					<div style="clear:both"></div>
				</li>
			<? }
			echo '</ul></div>';		
		}
		?>
        
    </div>
</div>