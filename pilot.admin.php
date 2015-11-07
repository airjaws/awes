<?
/* AWE Simple : Airjaws Web Engine Simple Version
   System     : pilot
   pageID	    : admin.php 
   pageName   : system admin   

   date			    editor		  description
   ============	===========	======================================================	
   2015.10.16	  이기현	    init

*/
if (!$AJP) exit(); 
switch ($func) {
	case "savefile" : fn_savefile();  break;
	case "openfile" : fn_openfile();  break;
	case "newfile"  : fn_newfile();   break;
	case "editor"		: fn_editor(); break;
	
	case "init"     : fn_init();      break;
	default         : fn_init();      break;	
} 


 
/* phpeditor *************************************************/
function fn_phpeditor() {
?>
<h3>Editor</h3>
<?
}


/* init ******************************************************/
function fn_init() {
?>
AWES Admin tools
<?	
}
?> 