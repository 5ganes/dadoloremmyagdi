<script type="text/javascript">
	function ajaxinsert()
	{
		mobile = document.getElementById("mobile").value; //alert(mobile); return false;
		document.getElementById("msg").style = "margin-top:15px; color:red";
		if(mobile=="" || isNaN(mobile) || mobile.length>10 || mobile.length<10)
		{
			document.getElementById("msg").innerHTML="Please Enter valid mobile number";
		}
		else
		{
			//alert(urlname);
			var xmlHttp;
			if(window.XMLHttpRequest)
			{
				xmlHttp=new XMLHttpRequest();
			}
			else
			{
				xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			
			xmlHttp.onreadystatechange=function()
			{
				if (xmlHttp.readyState==4)
				{
					document.getElementById("msg").innerHTML = xmlHttp.responseText;
				}
			};
			
			xmlHttp.open("GET",'savemobile.php?mobile='+ mobile,true);
			xmlHttp.send(null);
		}
	}
</script>

<h2>SMS Subscription</h2>
<div id="msg"></div>
<input id="mobile" type="number" name="mobile"  placeholder="Enter your mobile number"/><br />
<input class="submit" type="button" name="subscribe" value="Subscribe" onclick="ajaxinsert()"/>
<br /><br /><br />
<span style="color:red">[ Note: Only for NTC and SKY Users ]</span>