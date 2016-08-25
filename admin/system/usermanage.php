<?php
    require_once ('../../myERP/inc.php');
    $userid=$_SESSION['id'];
$select = "SELECT * FROM user ORDER BY id DESC; ";
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
<h3>用户管理</h3>
	<div id="containers">
		<table width="900" border="0" cellpadding="8" cellspacing="1">
			<tr>
				<td colspan="1" width="200dp"><img alt="adduser"
					src="../../common/add.png">  新建用户:</td>
				<td colspan="2" width="200dp"><a target="subframe"
					href="adduser.php">新建</a></td>
			</tr>
			<tr>
				<td colspan="1" width="200dp"><img alt="adduser"
					src="../../common/manage.png">  管理用户</td>
				<td colspan="2" width="200dp" align="left">用户清单：</td>
			</tr>
		</table>
		<?php echo '<br/>'?>
		<table width="900" border="1" cellpadding="8" cellspacing="1"
			bgcolor="#EEEEEE">
			<tr>
				<th width="60" bgcolor="#a1a3a6">编号</th>
				<th width="120" bgcolor="#a1a3a6">用户名</th>
				<th width="120" bgcolor="#a1a3a6">真实姓名</th>
				<th width="120" bgcolor="#a1a3a6">部门</th>
				<th width="120" bgcolor="#a1a3a6">角色</th>
				<th width="120" bgcolor="#a1a3a6">操作</th>
			</tr>
                        
                        <?php
                        if (! empty($data)) {
                            foreach ($data as $value) {
                                
                                ?>
                        
                        <tr>
				<td bgcolor="#a1a3a6"> &nbsp; <?php echo $value['id'] ?></td>
				<td bgcolor="#a1a3a6"> &nbsp; <?php echo $value['name'] ?></td>
				<td bgcolor="#a1a3a6"> &nbsp; <?php echo $value['realname'] ?></td>
				<td bgcolor="#a1a3a6"> &nbsp; <?php echo $value['department'] ?></td>
				<td bgcolor="#a1a3a6"> &nbsp; <?php echo $value['role'] ?></td>
				<td bgcolor="#a1a3a6">
				<a target="subframe" href="accountmanage.php?id=<?php echo $value['id']?>">编辑</a> | 
				<a target="subframe" href="deluser.php?id=<?php echo $value['id']?>" onclick= "return confirm('确定删除？');">删除</a>
				</td>
			</tr>
                        <?php
                            }
                        }
                        ?>
                    </table>

</body>
</html>