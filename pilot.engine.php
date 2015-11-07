<?
/* AWE Simple : Airjaws Web Engine Simple Version
   System     : pilot
   pageID	    : engine.php 
   pageName   : system admin   

   date			    editor		  description
   ============	===========	======================================================	
   2015.10.20	  이기현	    init

*/
if (!$AJP) exit(); 
switch ($func) {
	case "DicSrch"			: fn_DicSrch(); 		break; 
	case "Dictionary"		: fn_Dictionary(); 	break; 
	case "init"     		: fn_init();      	break;
	default         		: fn_init();      	break;	
} 


 
/* Dictionary *************************************************/
function fn_Dictionary() {
?>
<h3>Dictionary</h3>
<hr/>
<input type="text" id="dicSrch" value="">
<input type="button" value="조회" onclick="fn_dicSrch()">
<input type="button" value="줄추가" onclick="fn_dicAddRow()">
<input type="button" value="줄삭제" onclick="fn_dicDelRow()">
<table id="tblDic">
	<thead>
		<tr>
			<th>Code</th>
			<th>Name</th>
			<th>Prefix</th>
			<th>Suffix</th>
			<th>Domain</th>
			<th>Use Yn</th>
		</tr> 
	</thead>
	<tbody> 
	</tbody>
</table>
<script>
function fn_dicSrch() {
	alert("debug: called");
	$("#tblDic tbody").html("		
		<tr>
			<td>Dt</td>
			<td>일</td>
			<td>N</td>
			<td>Y</td>
			<td>일</td>
			<td>Y</td>
		</tr>
		<tr>
			<td>Dttm</td>
			<td>일자</td>
			<td>N</td>
			<td>Y</td>
			<td>&nbsp;</td>
			<td>Y</td>
		</tr>
		<tr>
			<td>Amt</td>
			<td>액</td>
			<td>N</td>
			<td>Y</td>
			<td>금액</td>
			<td>Y</td>
		</tr>
		<tr>
			<td>Dic</td>
			<td>용어</td>
			<td>N</td>
			<td>N</td>
			<td>&nbsp;</td>
			<td>Y</td>
		</tr>
		<tr>
			<td>Srch</td>
			<td>검색</td>
			<td>N</td>
			<td>N</td>
			<td>&nbsp;</td>
			<td>Y</td>
		</tr>
	");
} 
function fn_dicAddRow() {
	$("#tblDic tbody").add("
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
	");		
}
function fn_dicDelRow()	{
	$("#tblDic tbody tr:last").css("color","red");
}
</script>
<?
}


/* init ******************************************************/
function fn_init() {
?>
AWES Engine Core
<?	
}
?> 