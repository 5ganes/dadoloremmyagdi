<?php
include("init.php");
if(!isset($_SESSION['sessUserId']))//User authentication
{
 header("Location: login.php");
 exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title><?php echo ADMIN_TITLE; ?></title>
<link href="../css/admin.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<table width="<?php echo ADMIN_PAGE_WIDTH; ?>" border="0" align="center" cellpadding="0"
	cellspacing="5" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2"><?php include("header.php"); ?></td>
  </tr>
  <tr>
    <td width="<?php echo ADMIN_LEFT_WIDTH; ?>" valign="top"><?php include("leftnav.php"); ?></td>
    <td width="<?php echo ADMIN_BODY_WIDTH; ?>" valign="top">
    <table width="100%" border="0" cellspacing="1" cellpadding="0">

        <tr>

          <td class="bgborder"><table width="100%" border="0" cellspacing="1" cellpadding="0">

              <tr>

                <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">

                    <tr>

                      <td class="heading2">&nbsp;SMS Subscription</td>

                    </tr>

                    <tr>

                      <td><table width="100%"  border="0" cellpadding="4" cellspacing="0">

                          <tr bgcolor="#F1F1F1" class="tahomabold11">

                            <td width="1">&nbsp;</td>

                            <td><strong>SN</strong></td>

                            <td><strong>Mobile Number</strong></td>


                          </tr>

													<?php

													$counter = 0;

													$pagename = "subscription.php?";

													$sql = "SELECT * FROM sms ORDER BY id DESC";
													//echo $sql;

													$limit = 40;

													include("../includes/paging.php");

													while($row = $conn -> fetchArray($result))

													{

													?>

                          <tr <?php if($counter%2 != 0) echo 'bgcolor="#F7F7F7"'; else echo 'bgcolor="#FFFFFF"'; ?>>

                            <td valign="top">&nbsp;</td>

                            <td valign="top"><?= ++$counter; ?></td>

                            <td valign="top"><?= $row['mobile'] ?></td>

                            

                            
                          </tr>

                          <?

													}

													?>

                        </table>

												<?php include("../includes/paging_show.php"); ?>

												</td>

                    </tr>

                  </table></td>

              </tr>

            </table></td>

        </tr>

  	</table>
    </td>

  </tr>

  <tr>

    <td colspan="2"><?php include("footer.php"); ?></td>

  </tr>

</table>

</body>

</html>