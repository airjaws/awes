<?
/* AWE Simple : Airjaws Web Engine Simple Version
   System     : pilot
   pageID	    : default.php 
   pageName   : default page for pilot system  

   date			    editor		  description
   ============	===========	======================================================	
   2015.10.16	  이기현	    init

*/
if (!$AJP) exit(); 
switch ($func) {
	case "today"    : fn_today(); 	  break;
	case "logout"   : fn_logout();    break;
	case "loginchk" : fn_loginchk();  break;
	case "login"    : fn_login();     break;
	case "copyright": fn_copyright(); break;
	case "gnb"      : fn_gnb();       break;
	case "init"     : fn_init();      break;
	default         : fn_init();      break;	
} 


/* today ****************************************************/
function fn_today() {
	global $usid;
?>
<h3>Today!</h3>
<hr/>
<?= date("Y-m-d H:i:s") ?>
<? 
}


/* logout ***************************************************/
function fn_logout() {
	global $usid;
	$usid = "";
	session_unset();  
	die();
}


/* loginchk **************************************************/
function fn_loginchk() {
	$_SESSION["usid"] = $_REQUEST["usid"];
	echo "welcome!"; 
?>
<script>
jQuery(function () {
	gfn_mainload("default.today",{},gfn_gnbload);
});
</script>
<?
}


/* login *****************************************************/
function fn_login() {
?>
pilot project에 오신 것을 환영합니다! 
<hr/>
<h3>로그인</h3>
사용자ID: <input type="text" id="userid">
<input type="button" value="로그인" onclick="fn_login()">
<script>
function fn_login() {
	var usid = $("#userid").val();
	gfn_mainload("default.loginchk",{usid:usid});
} 
</script>
<?
}


/* gnb *****************************************************/
function fn_gnb() {
	global $usid;

  if ($usid !="") {
?>  	 
<div style="text-align:right"> 	
<a href="javascript:fn_logout()">logout</a>
</div>
<script>
function fn_logout() { 
	gfn_mainload("default.logout",{},function(){ location.href="/"; }); 
}
</script>
<?
	}
	
	if ($usid !="") {
?>
<h4>global navigation bar for <?= $usid ?> </h4>
<?	
	} else {
?>
<h4>global navigation bar</h4> 
<?
  }
}


/* copyright *************************************************/
function fn_copyright() {
?>
<h4>brought you by AirjawsWebEngine Simple - ASK Co. 2015</h4>
<?
}


/* init ******************************************************/
function fn_init() {
?>
<link href="jquery-ui.min.css" rel="stylesheet">
<style>
	H4 { 
		color: white;
		background-color: darkgrey; 
		padding: 3px;
	}
</style>
<script type="text/javascript" src="./awes/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="./awes/jquery-ui.min.js"></script>
<body>
<h3>AWES - pilot project</h3> 
<div id="gnb"></div> 
<div id="main"></div>
<div id="copyright"></div>

<hr>
<div id="hidden"></div>

<script>
function gfn_gnbload() {
	$("#gnb").load("index.php"
		, {cmd: "default.gnb" }
		, gfn_copyrightload 
	);
}	
function gfn_copyrightload() { 
	$("#copyright").load("index.php"
		, {cmd: "default.copyright" }  
	);
}	
function gfn_mainload(cmd, args, callback) {
	if (callback == null) callback = gfn_callback(cmd);
	$("#main").load("index.php?cmd="+cmd
		, args
		, callback 
	);
}	
function gfn_callback(val) {
	window.status=val+" complete!";
}  
</script>
<?
	global $usid;
	if ($usid=="") $func = "login";
	else $func = "today";
?> 
<script id="clearit">  
gfn_mainload("default.<?=$func?>",null,gfn_gnbload);  
</script>
</div>
<?	
}
?> 