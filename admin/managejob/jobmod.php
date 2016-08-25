<?php 
    require_once '../../myERP/inc.php';
    $sql = "SELECT * FROM job ORDER BY dateline DESC ;";
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
<h3>管理任务</h3>
<div id="bigmiddle">
            <table width="800" border="1" cellpadding="8" cellspacing="1" bgcolor="#EEEEEE">
			<tr>
				<th width="80" bgcolor="#a1a3a6">任务编号</th>
				<th width="150" bgcolor="#a1a3a6">产品名称</th>
				<th width="80" bgcolor="#a1a3a6">备注</th>
				<th width="80" bgcolor="#a1a3a6">任务创建时间</th>
				<th width="120" bgcolor="#a1a3a6">操作</th>
			</tr>
                <?php
                    if (! empty($data)) {
                        foreach ($data as $value) {
                ?>
            <tr >
				<td bgcolor="#a1a3a6"> &nbsp; <?php echo $value['jobnumber'] ?></td>
				<td bgcolor="#a1a3a6"> &nbsp; <?php echo $value['proname'] ?></td>
				<td bgcolor="#a1a3a6"> &nbsp; <?php echo $value['remark'] ?></td>
				<td bgcolor="#a1a3a6"> &nbsp; <?php echo date("Y-m-d H:i:s", $value['dateline']); ?></td>
				<td bgcolor="#a1a3a6">
				<a target="subframe" href="jobmod.edit.php?id=<?php echo $value['id']?>" >编辑</a> | 
				<a target="subframe" href="jobdel.php?id=<?php echo $value['id']?>" onclick= "return confirm('确定删除？');" >删除</a>
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