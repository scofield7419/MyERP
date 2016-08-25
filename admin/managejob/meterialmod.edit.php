<?php
    require_once '../../myERP/inc.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM meterial WHERE id = $id ;";
    $query=mysql_query($sql);
//    echo $sql;
    if($query && mysql_num_rows($query)){
        $data = mysql_fetch_assoc($query);
    }else{
        echo "没有此物料记录！";
        exit;
    }
    
    $select = "SELECT * FROM store ORDER BY id DESC; ";
    $query2 = mysql_query($select);
    if ($query && mysql_num_rows($query2)) {
        while ($rows = mysql_fetch_assoc($query2)) {
            $data2[] = $rows;
        }
    } else {
        $data2[] = array();
    }
?>
<html>
<head>
<link href="../../common/subframe.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h3>修改物料记录</h3>
    <div id="middle">
        <form action="meterialmod.edit.handle.php" method="post">
            <input type="hidden" name="id" value="<?php echo $data['id']?>" />
            <table width="1200" border="1" cellpadding="8" cellspacing="1"
			bgcolor="#EEEEEE">
			<tr>
				<th colspan="2" width="200" bgcolor="#a1a3a6">物料名称</th>
				<td colspan="2" width="300" align="center"  ><input class="addinput" type="text" name="meterialname" value="<?php echo $data['meterialname']?>"/></td>
			</tr>
			<tr>
				<th colspan="2" width="200" bgcolor="#a1a3a6">物料编号</th>
				<td colspan="2" width="300" align="center" ><input class="addinput" type="number" name="meterialnumber" value="<?php echo $data['meterialnumber']?>"/></td>
			</tr>
			<tr>
				<th width="150" bgcolor="#a1a3a6">单价(元)</th>
				<td width="200" align="center" ><input type="text" name="price" value="<?php echo $data['price']?>"/></td>
				<th width="150" bgcolor="#a1a3a6">数量(台/件)</th>
				<td width="200" align="center" ><input type="number" name="sum" value="<?php echo $data['sum']?>"/></td>
			</tr>
			<tr>
				<th colspan="2" width="200" bgcolor="#a1a3a6">储存仓库</th>
				<td colspan="2" ><select name="storename">
				<?php
                    if (! empty($data2)) {
                        foreach ($data2 as $value) {
                ?>
				<option <?php  if($data['storeid'] == $value['id']){echo "selected = 'selected'" ;} ?>><?php echo $value['storename'] ?></option>
				<?php
                        }
                    }
                ?>
				</select></td>
			</tr>
			<tr>
				<th colspan="2" width="200" bgcolor="#a1a3a6">备注</th>
				<td colspan="2" ><textarea name="remark" rows="3" cols="50" style="resize: none;"><?php echo $data['remark']?></textarea> </td>
			</tr>
			<tr>
				<td colspan="4" align="right"><input  type="submit" name="meterialmod" value="确认修改" /></td>
			</tr>    
			
            </table>
        </form>
    </div>
</body>
</html>