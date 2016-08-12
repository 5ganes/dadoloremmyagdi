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
<br />

<div class="box">
    <div class="content" style="float:none; width:100%">
        <h2 style="margin-bottom:10px">Search Results</h2>
        
        <?php
		$keyword=$_POST['keyword'];
		$keyword=explode(" ",$keyword); //echo $keyword; die();
		$arrlen=count($kwords);
		$tablenames=array('groups');
		$arrtbllen=count($tablenames);
		$nums=0;
		
		if(!empty($keyword))
		{
			foreach($keyword as $ex)
			{
				foreach($tablenames as $tb)
				{
					$s = "select DISTINCT * from $tb where `name` LIKE '%$ex%' OR `urlname` like '%$ex%' OR shortcontents LIKE '%$ex%' OR contents like '%$ex%'";
					$sql=mysql_query($s);
					$numRows= mysql_num_rows($sql);
					$nums+=$numRows;
					while($row=mysql_fetch_array($sql))
					{?>
						<div style="padding:5px 0" class="listTitle"><br/>
						<?php
						if ($row['linkType'] == "Link")
						{
							echo "<a href='" . $row['contents'] . "' >";
						}
						else if ($row['linkType'] == "File")
						{
							echo "<a href='" . CMS_FILES_DIR . $row['contents'] . "' >";
						}	
						else if ($row['linkType'] == "Activity")
						{	
							echo "<a href='"."activity-".$row['urlname'].".html"."'>";
						}
						else if ($row['linkType'] == "Destination")
						{
				
							echo "<a href='"."destination-".$row['urlname'].".html"."'>";
						}  
						else if ($row['linkType'] == "Region")
						{
				
							echo "<a href='"."region-".$row['urlname'].".html"."'>";
						}  
						else
						{
							echo "<a href='".$row['urlname']."'>";
						}
			
						echo $row['name'] . "</a>";
						?>
						<?php if($row['linkType'] != "Link" || $row['linkType'] != "File"){ ?>
						<div id="news"> <? echo $row['shortcontents']; ?> </div>
                    	</div>    
					<?php } ?>
						
				<?php }		
			}
		}
?>

<?php
if($nums<1)
{
	echo "<br/><br/><h3> No search result found!!!</h3>";
}
?>


<?php

}
else {
	echo "<h2> Please Enter the keyword for Searching !!</h2>";
}
?>
        
    </div>
</div>