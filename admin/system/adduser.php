<html>
<head>
<link href="../../common/subframe.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h3>添加用户</h3>
    <div id="middle">
        <form action="adduser.handle.php" method="post">
            <table width="900" border="1" cellpadding="8" cellspacing="1"
			bgcolor="#EEEEEE">
			<tr>
				<th width="200" bgcolor="#a1a3a6">用户名</th>
				<td width="300" align="center"  ><input class="addinput" type="text" name="username"/></td>
			</tr>
			<tr>
				<th width="200" bgcolor="#a1a3a6">密码</th>
				<td width="300" align="center" ><input class="addinput" type="password" name="userpassword" /></td>
			</tr>
			<tr>
				<th width="200" bgcolor="#a1a3a6">真实姓名</th>
				<td width="300" align="center" ><input class="addinput" type="text" name="realname" /></td>
			</tr>
			<tr>
				<th width="200" bgcolor="#a1a3a6">部门</th>
				<td ><select name="userdepartment"><option>工艺一组<option>工艺二组<option>工艺三组<option>校对组<option>库房组</select></td>
			</tr>
			<tr>
				<th width="200" bgcolor="#a1a3a6">角色</th>
				<td ><select name="userrole"><option>管理员<option>工人</select></td>
			</tr>
			<tr>
				<td colspan="2" align="right"><input  type="submit" name="adduser" value="提交" /></td>
			</tr>
			
            </table>
        </form>
    </div>
</body>
</html>