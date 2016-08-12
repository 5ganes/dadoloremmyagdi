<?php //include("includes/breadcrumb.php"); ?>
<style>
	.container1{}
	#breadcrumb
	{
		border-top: none;
		border-bottom: 1px solid #666;
		padding: 0px; margin-top:6px; width:auto
	}
	.box{ padding:20px; text-align:justify}
</style>
<div id="breadcrumb">
    <ul>
        <li class="first">You Are At</li>
        <li>&#187;</li>
        <li>Homepage</li>
        <li>&#187;</li>
        <li>
        	<?
			$p=$groups->getById($pageId);
			$pGet=$conn->fetchArray($p);
			$prnt=$groups->getById($pGet['parentId']);
			$prntGet=$conn->fetchArray($prnt); echo $prntGet['name'];
			?>
        </li>
        <li>&#187;</li>
        <li class="current"><?=$pageName?></li>
    </ul>
</div>
<br />

<div class="box">
    <div class="content" style="float:none; width:100%">
    	<?php include("breadcrumb.php"); ?><br />
        <?php
			$listResult = $groups->getById($pageId);
			$listRow = $conn->fetchArray($listResult);
			
			$pageResult = $groups->getById($pageParentId);
			$pageRow = $conn->fetchArray($pageResult);
		?>
    	
        <?
		$navNextResult = $groups->getNextResult($pageId);
		$navNextRow = $conn->fetchArray($navNextResult);

		$navPreviousResult = $groups->getPreviousResult($pageId);
		$navPreviousRow = $conn->fetchArray($navPreviousResult);
		?>
  		<div style="float: left;" > <a href="<?= $navPreviousRow['urlname']; ?>" class="paging">&laquo; Previous</a> </div>
  		<div style="float: right;"> <a href="<?php echo $navNextRow['urlname']; ?>" class="paging">Next &raquo;</a> </div>
  		<div style="clear:both"></div>
		<div class="listRow">
  <h2 style="margin-bottom:10px"><?=$pageName?></h2>
  <? if(file_exists(CMS_GROUPS_DIR . $listRow['image']) && !empty($listRow['image'])){?>
  <div align="center" style="text-align:center; padding-top:10px;"><img src="<?php echo imager($listRow['image'], 500, 500, ""); ?>" />  <div style="clear:both"></div>
  </div>
  <? }?>
  <br />
  <div>
    <?= $listRow['contents']; ?>
  </div>
</div>
		<br />
		<div><u>Attachments#</u></div>
		<?
		$lfResult = $listingFiles->getByListingId($pageId);
		if ($conn->numRows($lfResult) == 0)
		{
			echo "<div class='attach'>No files</div>";
		}
		else
		{
		?>
	
    		<div class="attach">
  <table width="50%" style="width:500px">
    <?
			}
			while ($lfRow = $conn->fetchArray($lfResult))
			{
			$file = CMS_LISTING_FILES_DIR . $lfRow['filename'];
			?>
    <tr>
      <td><?= $lfRow['filename'] . " (" . round((filesize($file)/1024),0) ." KB)"; ?></td>
      <td><?= $lfRow['caption']; ?></td>
      <td><a href="<?= CMS_LISTING_FILES_DIR . $lfRow['filename']; ?>">Download</a></td>
    </tr>
    <?
			}
			
			if ($conn->numRows($lfResult) > 0)
			{
			?>
  </table>
</div>
	
		<? }?>
        
        
    </div>
</div>