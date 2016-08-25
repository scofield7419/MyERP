<?php
    require_once ('../../myERP/inc.php');
$select = "SELECT * FROM store ORDER BY id DESC; ";
$query = mysql_query($select);
if ($query && mysql_num_rows($query)) {
    while ($rows = mysql_fetch_assoc($query)) {
        $data[] = $rows;
    }
} else {
    $data[] = array();
}

?>
<html>
<head>
<link href="../../common/subframe.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h3>增加物料</h3>
    <div id="middle">
        <form action="meterialadd.handle.php" method="post">
            <table width="1200" border="1" cellpadding="8" cellspacing="1"
			bgcolor="#EEEEEE">
			<tr>
				<th colspan="2" width="200" bgcolor="#a1a3a6">物料名称</th>
				<td colspan="2" width="300" align="center"  ><input class="addinput" type="text" name="meterialname"/></td>
			</tr>
			<tr>
				<th colspan="2" width="200" bgcolor="#a1a3a6">物料编号</th>
				<td colspan="2" width="300" align="center" ><input class="addinput" type="number" name="meterialnumber" /></td>
			</tr>
			<tr>
				<th width="150" bgcolor="#a1a3a6">单价(元)</th>
				<td width="200" align="center" ><input type="text" name="price" /></td>
				<th width="150" bgcolor="#a1a3a6">数量(台/件)</th>
				<td width="200" align="center" ><input type="number" name="sum" /></td>
			</tr>
			<tr>
				<th colspan="2" width="200" bgcolor="#a1a3a6">储存库房</th>
				<td colspan="2" ><select name="storename">
				<?php
                    if (! empty($data)) {
                        foreach ($data as $value) {
                ?>
				<option><?php echo $value['storename'] ?></option>
				<?php
                        }
                    }
                ?>
				</select></td>
			</tr>
			<tr>
				<th colspan="2" width="200" bgcolor="#a1a3a6">备注</th>
				<td colspan="2" ><textarea name="remark" rows="3" cols="50" style="resize: none;"></textarea> </td>
			</tr>
			<tr>
				<td colspan="4" align="right"><input  type="submit" name="meterialadd" value="存储物料记录" /></td>
			</tr>    
			
            </table>
        </form>
    </div>
</body>
</html>