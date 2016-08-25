<?php 
require_once '../../myERP/inc.php';
$creator = $_SESSION['realname'];
?>
<html>
<head>
<link href="../../common/subframe.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<h3>增加工艺</h3>
	<div id="bigmiddle">
		<form action="craftadd.handle.php" method="post">
			<table width="1700" border="1" cellpadding="0" cellspacing="0" id="tableSelect"
				bgcolor="#EEEEEE">
				<tr>
					<th rowspan="1" width="330" bgcolor="#a1a3a6"><span style="font-size: 18pt;font-weight: bold;">装配工艺卡</span></th>
					<td rowspan="4" width="1100">
						<table width="1100" border="0" cellpadding="4" cellspacing="0" bgcolor="#E00000">
							<tr>
								<th width="300" bgcolor="#E00000">产品名称</th>
								<td width="250" align="center"><input width="200" type="text" name="proname" /></td>
								<th width="300" bgcolor="#E00000">产品代号</th>
								<td width="250" align="center"><input width="200" type="text" name="pronumber" /></td>
							</tr>
							<tr>
								<th width="300" bgcolor="#E00000">装配图名称</th>
								<td width="250" align="center"><input width="200" type="text" name="craftname" /></td>
								<th width="300" bgcolor="#E00000">装配代号</th>
								<td width="250" align="center"><input width="200" type="text" name="craftnumber" /></td>
							</tr>
						</table>
					</td>
					<th rowspan="1" width="270" bgcolor="#a1a3a6"><a href="javascript:addrow();" style="padding: 3px; float: none;;">添加工艺项</a></th>
				</tr>
			</table>
            <table id="tableInsert" width="1700" border="1" cellpadding="10" cellspacing="1" bgcolor="#EEEEEE" >
                <tr>
            		<th  width="50">序号</th>
            		<th  bgcolor="#a1a3a6" width="530">工序内容</th>
            		<th  width="250">材料、设备</th>
            	</tr>
            <script type="text/javascript">
                var tableSelect = document.getElementById("tableSelect");
                var tableInsert = document.getElementById("tableInsert");
                var hfSelectCount = document.getElementById("hfSelectCount ");
               // var hfDelIds = document.getElementById("hfDelIds ");
                function addrow(){
                    var r = tableInsert.insertRow(tableInsert.rows.length);//插入一行tr
                    var c = r.insertCell(0);//插入一个单元格td
                    var rIndex = tableInsert.rows.length - 1;//每一行的下标号
                    c.innerHTML = rIndex;
                    c = r.insertCell(1);
                    c.innerHTML = "<textarea rows=\"3\" cols=\"80\" style=\"resize: none;\" id=\"content" + rIndex + "\" name=\"content" + rIndex + "\"></textarea >";
                    c = r.insertCell(2);
                    c.innerHTML = "<input class=\"addinputmiddle\" type=\"text\" id=\"meterial" + rIndex + "\" name=\"meterial" + rIndex + "\"/>";
                    hfSelectCount.value = tableInsert.rows.length;
                    document.getElementById("content" + rIndex).focus();
                }
                hfSelectCount.value = tableSelect.rows.length;
            </script>
            </table>
            <div id="order">
			<input type="submit" value="上传工艺卡" />
            </div>
            <input type="hidden" name="creator" value="<?php echo $creator?>" />
		</form>
	</div>
</body>
</html>