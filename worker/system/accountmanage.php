<?php
    require_once ('../../myERP/inc.php');
    
    $id = $_GET['id'];
    $select = "SELECT * FROM user WHERE id = $id ;";
    $query =mysql_query($select);
    $data = mysql_fetch_assoc($query);
//    print_r($data);
?>

<html>
<head>
<link href="../../common/subframe.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h3>账户修改</h3>
    <div id="middle">
        <form action="accountmanage.handle.php" method="post">
            <input type="hidden" name="id" value="<?php echo $data['id']?>" />
            <table width="900" border="1" cellpadding="8" cellspacing="1"
			bgcolor="#EEEEEE">
			<tr>
				<th width="200" bgcolor="#a1a3a6">用户名</th>
				<td width="300" align="center" ><input  class="addinput" type="text" name="username" value="<?php echo $data['name']?>"/></td>
			</tr>
			<tr>
				<th width="200" bgcolor="#a1a3a6">密码</th>
				<td  width="300" align="center" ><input class="addinput" type="password" name="userpassword" value="<?php echo $data['password']?>"/></td>
			</tr>
			<tr>
				<th width="200" bgcolor="#a1a3a6">真实姓名</th>
				<td  width="300" align="center" ><?php echo $data['realname']?></td>
			</tr>
			<tr>
				<th width="200" bgcolor="#a1a3a6">部门</th>
				<td><?php echo $data['department'] ?></td>
			</tr>
			<tr>
				<th width="200" bgcolor="#a1a3a6">角色</th>
				<td><?php echo $data['role'] ?></td>
			</tr>
			<tr>
				<td colspan="2" align="left"><input  type="submit" name="moduser" value="提交修改" /></td>
			</tr>
			
            </table>
        </form>
    </div>
</body>
</html>