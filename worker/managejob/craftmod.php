<?php 
    require_once '../../myERP/inc.php';
    $sql = "SELECT * FROM craft ORDER BY dateline DESC ;";
    $query = mysql_query($sql);
    if($query && mysql_num_rows($query)){
        while($row = mysql_fetch_assoc($query)){
            $data[]=$row ;
        }
    }
    $creator = $_SESSION['realname'];
//    var_dump($data);
?>
<html>
<head>
<link href="../../common/subframe.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h3>管理工艺流程</h3>
<div id="bigmiddle">
            <table width="1200" border="1" cellpadding="8" cellspacing="1" bgcolor="#EEEEEE">
			<tr>
				<th width="100" bgcolor="#a1a3a6">装配代号</th>
				<th width="200" bgcolor="#a1a3a6">装配图名称</th>
				<th width="170" bgcolor="#a1a3a6">产品名称</th>
				<th width="80" bgcolor="#a1a3a6">工艺创建时间</th>
				<th width="120" bgcolor="#a1a3a6">创建者</th>
				<th width="120" bgcolor="#a1a3a6">操作</th>
			</tr>
                <?php
                    if (! empty($data)) {
                        foreach ($data as $value) {
                ?>
            <tr >
				<td bgcolor="#a1a3a6"> &nbsp; <?php echo $value['craftnumber'] ?></td>
				<td bgcolor="#a1a3a6"> &nbsp; <?php echo $value['craftname'] ?></td>
				<td bgcolor="#a1a3a6"> &nbsp; <?php echo $value['proname'] ?></td>
				<td bgcolor="#a1a3a6"> &nbsp; <?php echo date("Y-m-d H:i:s", $value['dateline']); ?></td>
				<td bgcolor="#a1a3a6"> &nbsp; <?php echo $value['creator'] ?></td>
				<td bgcolor="#a1a3a6">
				<a target="subframe" href="craftmod.edit.php?id=<?php echo $value['id']?>" >
				<?php if($value['creator'] == $creator) echo '编辑';?>
				</a><?php if($value['creator'] == $creator){ echo ' | ';}else{echo '无权限修改';}?>
				<a target="subframe" href="craftdel.php?id=<?php echo $value['id']?>" onclick= "return confirm('确定删除？');" ><?php if($value['creator'] == $creator) echo '删除';?></a>
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