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
        <li class="current">Contact Us</li>
    </ul>
</div>
<br />

<div class="box">
    <div class="content" style="float:none; width:100%">
        <h2 style="margin-bottom:10px">Contact Us</h2>
        <?php
			$pageResult = $groups->getById(CONTACT);
			$pageRow = $conn->fetchArray($pageResult);
			echo $pageRow['contents'];
		?>
        <br />
        <?php
		if(!empty($feedbackmsg))
			$msg = $feedbackmsg;
		else if(isset($_REQUEST['msg']))
			$msg = $_REQUEST['msg'];
		?>
                
       	<div class="contentHdr" style=" margin-top:20px">
        	<h2 style="margin-top:20px;">Contact Form</h2>
      	</div>
        <div style="padding-top:10px;">
		
        	<form name="frmFeedback" method="post" action="" onSubmit="return validateform(this);">
		
        		<table width="92%" border="0" cellspacing="0" cellpadding="2" class="cmsFormTable" style="border:none">      
					<?php if(!empty($msg)){ ?>
                    	<tr>
                    		<td colspan="2">
                            	<span class="cmsFormSubmitMsg" style="color:red;"><?php echo $msg; ?>...</span>
                          	</td>
                   	 	</tr>
						
					<?php } ?>
                    <tr>
                    <th width="27%" align="left" valign="top">Name : <span class="cmsAstriks">*</span></th>
                    <td width="73%">
                    	<input type="text" class="cmsTxtField" name="txtname" value="<?php echo $txtname; ?>" required />
                  	</td>
                    </tr>
					
                    <tr>
                    <th align="left" valign="top">Address :</th>
                    <td><input type="text" class="cmsTxtField" name="txtaddress" value="<?php echo $txtaddress; ?>" /></td>
                    </tr>
                    
                    <tr>
                    <th align="left" valign="top">E-mail : <span class="cmsAstriks">*</span></th>
                    <td><input type="text" class="cmsTxtField" name="txtemail" value="<?php echo $txtemail; ?>" required /></td>
                    </tr>
                    <tr><td></td></tr>
                    <tr>
                    <th align="left" valign="top">Country :</th>
                    <td><input type="text" class="cmsTxtField" name="txtcountry" value="<?php echo $txtcountry; ?>" /></td>
                    </tr>
                    
                    <tr>
                    <th valign="top" align="left">Comment : <span class="cmsAstriks">*</span></th>
                    <td><textarea style="width:570px;" class="cmsTxtArea" name="txtcomment" cols="120" rows="3"><?php echo $txtcomment; ?></textarea></td>
                    </tr>
                    
                    <tr>
                    <th align="left">Security Code : <span class="cmsAstriks">*</span></th>
                    <td><img src="includes/captcha.php?width=110&height=40&characters=6" id="captchaimage" style="margin-bottom:3px;" />&nbsp; <a href="javascript: void(0);" onclick="document.getElementById('captchaimage').src = 'includes/captcha.php?width=110&height=40&characters=6&' + Math.random(); return false;" class="captchaReload" style="position:relative; top:-20px; color:#02451A; margin-left:107px; color:red">[ Reload Image ]</a></td>
                    </tr>
                    
                    <tr>
                    <th></th>
                    <td><input id="security_code" name="security_code" type="text" maxlength="6" class="securitycode cmsTxtField" required="required" /></td>
                    </tr>
                    
                    <tr>
                    <th></th>
                    <td><input name="btnFeedback" type="submit" value="Submit" class="cmsFormBtn cmsBtn" style="background: none repeat scroll 0 0 #961C32;
                    border: 2px solid #320A11;
                    border-radius: 4px;
                    color: #FFFFFF;
                    cursor: pointer;
                    font-weight: bold;
                     width:90px;" /></td>
                    </tr>
                    <tr>
                    <th>&nbsp;</th>
                    <td>&nbsp;</td>
                    </tr>
                    <tr>
                    <td colspan="2"><span class="cmsFormNotes" style="color:#910000;">[ Fields marked with <span class="cmsAstriks">*</span> are compulsory fields ]</span></td>
                    </tr>
</table>
		
        	</form>
		
        </div>
    
    </div>
</div>