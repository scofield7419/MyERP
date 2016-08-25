<?php 
require_once '../../myERP/inc.php';
$userid=$_GET['userid'];
?>
<html>
<head>
<link href="../../common/subframe.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h3>添加公告</h3>
    <div id="middle">
        <form action="addbulletin.handle.php" method="post">
            <input type="hidden" name="userid" value="<?php echo $userid ?>" />
            <table   border="1" cellpadding="8" cellspacing="1" bgcolor="#EEEEEE">
			<tr>
				<th width="100" bgcolor="#a1a3a6">标题</th>
				<td width="300" align="center"  ><input class="addinput" type="text" name="title"/></td>
			</tr>
			<tr>
				<th width="100" bgcolor="#a1a3a6">公告内容</th>
				<td ><textarea name="content" cols="110" rows="20" id="content"></textarea></td>
			</tr>
			<tr>
				<td colspan="2" align="right"><input  type="submit" name="addbulletin" value="发布" /></td>
			</tr>
			
            </table>
        </form>
    </div>
</body>
</html>