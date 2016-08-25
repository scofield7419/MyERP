<?php
require_once '../../myERP/inc.php';
$userid=$_GET['id'];
$sql = "SELECT * FROM bulletin ORDER BY dateline DESC ;";
$query = mysql_query($sql);
if ($query && mysql_num_rows($query)) {
    while ($row = mysql_fetch_assoc($query)) {
        $data[] = $row;
    }
} else {
    $data[] = array();
}
// var_dump($data);
?>
<html>
<head>
<link href="../../common/subframe.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<h3>管理公告</h3>
	<div id="containers">
		<table width="900" border="0" cellpadding="8" cellspacing="1">
			<tr>
				<td colspan="1" width="200dp"><img alt="adduser"
					src="../../common/bulletin.png">  新建公告:</td>
				<td colspan="2" width="200dp"><a target="subframe" sytle="boder: 1; color=black"
					href="addbulletin.php?userid=<?php echo $userid?>">新建</a></td>
			</tr>
			<tr>
				<td colspan="1" width="200dp"><img alt="adduser"
					src="../../common/manage.png">  管理公告</td>
				<td colspan="2" width="200dp" align="left">公告清单：</td>
			</tr>
		</table>
		<br/>
		<table width="900" border="1" cellpadding="10" cellspacing="1"
			bgcolor="#EEEEEE">
			<tr>
				<th width="50" bgcolor="#a1a3a6">编号</th>
				<th width="350" bgcolor="#a1a3a6">标题</th>
				<th width="150" bgcolor="#a1a3a6">发布者</th>
				<th width="60" bgcolor="#a1a3a6">发布时间</th>
				<th width="150" bgcolor="#a1a3a6">操作</th>
			</tr>
                        
                        <?php
                        if (! empty($data)) {
                            foreach ($data as $value) {
                                
                                ?>
                        
                        <tr>
				<td bgcolor="#a1a3a6"> &nbsp; <?php echo $value['id'] ?></td>
				<td  bgcolor="#a1a3a6"> &nbsp; <?php echo $value['title'] ?></td>
				<td bgcolor="#a1a3a6"> &nbsp; <?php echo $value['distributor'] ?></td>
				<td bgcolor="#a1a3a6"> &nbsp; <?php echo date("Y-m-d H:i:s", $value['dateline']); ?></td>
				<td bgcolor="#a1a3a6">
				<a target="subframe" href="delbulletin.php?id=<?php echo $value['id']?>&userid=<?php echo $userid?>" onclick= "return confirm('确定删除？');">删除</a>
				</td>
			</tr>
                        <?php
                            }
                        }
                        ?>
                    </table>
	
</body>
</html>