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
        <li class="current">भुक्तानीका लागि प्राप्त विलहरुको सार्वजनिकरण</li>
    </ul>
</div>
<br />

<div class="box">
    <div class="content" style="float:none; width:100%">
		<h2 style="margin-bottom:10px">भुक्तानीका लागि प्राप्त विलहरुको सार्वजनिकरण</h2>

		<table align="center" border="1" cellspacing="0" cellpadding="0">
  
    <tbody>
    <tr bgcolor="#DFDFDF">
      <th width="2" align="center">सि.नं</th>
      <th width="17" align="center">विवरण</th>
      <th width="10" align="center">ब.उ.शि.नं.</th>
      <th width="12" align="center">खर्च शिर्षक</th>
      <th width="15" align="center">खरिद प्रक्रिया</th>
      <th width="12" align="center">प्यान नं</th>
      <th width="28" align="center">भुक्तानी पाउने व्यक्ति/ संस्था</th>
      <th width="16" align="center">बिल / निवेदन प्राप्त भएको मिति</th>
      <th align="center" width="12">रकम</th>
      <th width="7" align="center">कैफियत</th>
      <th width="15" align="center">अप्लोड समय</th>
       
    </tr>
    <? $bill=mysql_query("select * from bills where publish='Yes' order by weight"); $i=0;
	while($billGet=mysql_fetch_array($bill))
	{?>
    	<tr>
            <td align="center"><?=++$i;?></td>
            <td align="center"><?=$billGet['description'];?></td>
            <td align="center"><?=$billGet['busn'];?></td>
            <td align="center"><?=$billGet['spentTitle'];?></td>
            <td align="center"><?=$billGet['buying'];?></td>
            <td align="center"><?=$billGet['panNo'];?></td>
            <td align="center"><?=$billGet['paymentReceiver'];?></td>
            <td align="center"><?=$billGet['billDate']?></td>
            <td align="center"><?=$billGet['amount'];?></td>
            <td align="center"><?=$billGet['remarks'];?></td>
            <td align="center"><?=$billGet['onDate'];?></td>
    	</tr>
  	<? }?>
       
    </tbody>
    </table>
    
	</div>
</div>