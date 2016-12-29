<?php
function createMenu($parentId, $groupType, $pageId)
{
	global $groups;
	global $conn;

	if ($parentId == 0)
		$groupResult = $groups->getByParentIdAndType($parentId, $groupType);	
	else
		$groupResult = $groups->getByParentId($parentId);
	
	if ($conn->numRows($groupResult) > 0)
	{
		if($parentId==0){?> <? }
		else {?> <ul> <? }?>
	<?php }
	
	while($groupRow = $conn->fetchArray($groupResult))
	{
		$sub=$groups->getById($pageId); $subGet=$conn->fetchArray($sub);
		$p=$groups->getById($groupRow['parentId']); $pGet=$conn->fetchArray($p);
		?>	
        	<li <? if(($pGet['id']==0) and ($pageId==$groupRow['id'] or ($groupRow['urlname']=="home"  and $pageId=='' and !isset($_GET['action'])) or ($groupRow['urlname']=="contact-us"  and $pageId=='' and $_GET['action']=="contact-us") or ($groupRow['urlname']=="bills"  and $pageId=='' and $_GET['action']=="bills")) or ($pGet['id']!=0 and $pageId==$groupRow['id']) or $groupRow['id']==$subGet['parentId']){?> class="active"<? }?>>
			
    			<a target="_parent" href="<? if($groupRow['id']==358 or $groupRow['id']==366){ echo "#";}else{ echo$groupRow['urlname'];}?>"><?=$groupRow['name']?></a>
			<?
			if($groupRow['linkType'] == "Normal Group")
			{
				createMenu($groupRow['id'], $groupType, $pageId);
			}
			echo "</li>\n";
	}
	if ($conn->numRows($groupResult) > 0)
		echo '</ul>';
}
?>