<?php
    require_once ('../../myERP/inc.php');

$select = "SELECT * FROM user WHERE type = 0 ORDER BY id DESC; ";
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
<h3>增加库房</h3>
    <div id="middle">
        <form action="storeadd.handle.php" method="post">
            <table width="1200" border="1" cellpadding="8" cellspacing="1"
			bgcolor="#EEEEEE">
			<tr>
				<th width="200" bgcolor="#a1a3a6">库房名称</th>
				<td width="500" align="center"  ><input class="addinput" type="text" name="storename"/></td>
			</tr>
			<tr>
				<th width="200" bgcolor="#a1a3a6">库房管理员</th>
				<td >
				<select name="manager">
				 <?php
                    if (! empty($data)) {
                        foreach ($data as $value) {
                ?>
				<option><?php echo $value['realname'] ?></option>
				<?php
                        }
                    }
                ?>
                </select></td>
			</tr>
			<tr>
				<td colspan="2" align="right"><input  type="submit" value="确认添加" /></td>
			</tr>
			
            </table>
        </form>
    </div>
</body>
</html>