<?
/* AWE Simple : Airjaws Web Engine Simple Version
   System     : awes
   pageID	  : engine.php 
   pageName   : default page for pilot system  

   date			    editor		  description
   ============	===========	======================================================	
   2015.11.10	  이기현	    init

*/
if (!$AJP) exit(); 
switch ($func) {
	case "lists"     : lists();      break;
	case "save"      : save();      break;
	case "initForms" : initForms();      break;
	case "initFuncs" : initFuncs();      break;
	case "init"      : init();      break;
	default          : init();      break;	
} 

function lists() { ?>
<hr/>
<h4>공통코드 목록조회 </h4>
<? 	
	$con = gf_db_init();
	$sql = "SELECT * FROM `codes` WHERE 1";
	$rst = mysqli_query($con,$sql);
	while($row = mysqli_fetch_row($rst)){
		for ($i=0; $i<mysqli_field_count($con); $i++) {
			echo $row[$i].", ";	
		}
		echo "<br/>";
	} 
	gf_db_exit($con);
}

function save() { 
	$cd = $_REQUEST["cd"];
	$val = $_REQUEST["val"];
	$remark = $_REQUEST["remark"];

	$con = gf_db_init();
	$sql = "INSERT INTO `airjaws7`.`codes` (`id`, `cd`, `val`, `remark`, `dttm`) VALUES (NULL, '$cd', '$val', '$remark', CURRENT_TIMESTAMP);";
	echo $sql;
	$rst = mysqli_query($con,$sql);
	echo "\n $rst";
	gf_db_exit($con); 
?>
<script>
	gfn_load("engine.lists");
</script> 
<? 	
} 
 
function initForms() { ?>
<hr/>
<h4>공통코드 등록 </h4>
<label for="cd">code</label><input type="text" id="cd"><br/>
<label for="val">value</label><input type="text" id="val"><br/>
<label for="remark">remark</label><textarea id="remark"></textarea><br/>
<input type="button" value="submit" onclick="fn_savecode()">
<script>
function fn_savecode() {
	var cd = $("#cd").val();
	var val = $("#val").val();
	var remark = $("#remark").val();
	gfn_load("engine.save",{cd:cd, val:val, remark:remark},gfn_load("engine.lists"),"hidden");
}
</script>
<? }

function initFuncs() { ?>
<input type="button" value="regs" onclick="fn_regsform()">
<input type="button" value="lists" onclick="fn_listcodes()">
<script>
function fn_regsform() {
	gfn_load("engine.initForms");
}
function fn_listcodes() {
	gfn_load("engine.lists");
}
</script> 
<? }

function init() {
?>
<hr/>
<h4>공통코드 관리</h4>
<script>
gfn_load("engine.initFuncs","",gfn_load("engine.lists"),"gnb");
</script> 
<? } ?> 