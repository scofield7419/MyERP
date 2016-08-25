<?php 
    require_once '../../myERP/inc.php';
    $sql = "SELECT * FROM meterial ORDER BY adddate DESC ;";
    $query = mysql_query($sql);
    if($query && mysql_num_rows($query)){
        while($row = mysql_fetch_assoc($query)){
            $data[]=$row ;
        }
    }
//    var_dump($data);
?>
<html>
<head>
<link href="../../common/subframe.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h3>管理物料</h3>
<div id="bigmiddle">
            <table width="1200" border="1" cellpadding="8" cellspacing="1" bgcolor="#EEEEEE">
			<tr>
				<th width="180" bgcolor="#a1a3a6">物料编号</th>
				<th width="180" bgcolor="#a1a3a6">物料名称</th>
				<th width="150" bgcolor="#a1a3a6">备注</th>
				<th width="50" bgcolor="#a1a3a6">物料存档时间</th>
				<th width="120" bgcolor="#a1a3a6">操作</th>
			</tr>
                <?php
                    if (! empty($data)) {
                        foreach ($data as $value) {
                ?>
            <tr >
				<td bgcolor="#a1a3a6"> &nbsp; <?php echo $value['meterialnumber'] ?></td>
				<td bgcolor="#a1a3a6"> &nbsp; <?php echo $value['meterialname'] ?></td>
				<td bgcolor="#a1a3a6"> &nbsp; <?php echo $value['remark'] ?></td>
				<td bgcolor="#a1a3a6"> &nbsp; <?php echo date("Y-m-d", $value['adddate']); ?></td>
				<td bgcolor="#a1a3a6">
				<a target="subframe" href="meterialmod.edit.php?id=<?php echo $value['id']?>" >编辑</a> | 
				<a target="subframe" href="meterialdel.php?id=<?php echo $value['id']?>&meterialname=<?php echo $value['meterialname']?>&storeid=<?php echo $value['storeid']?>" onclick= "return confirm('确定删除？');" >删除</a>
				</td>
			</tr>
                <?php
                    }
                }
                ?>
            </table>
            
</div>           
</body>
</html>