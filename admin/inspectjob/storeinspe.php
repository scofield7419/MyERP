<?php 
    require_once '../../myERP/inc.php';
    $sql = "SELECT * FROM store ORDER BY dateline DESC ;";
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
<h3>查看所有仓库</h3>
<div id="bigmiddle">
            <table width="1200" border="1" cellpadding="8" cellspacing="1" bgcolor="#EEEEEE">
			<tr>
				<th width="200" bgcolor="#a1a3a6">库房名称</th>
				<th width="180" bgcolor="#a1a3a6">库房管理员</th>
				<th width="130" bgcolor="#a1a3a6">库房物料总数（件）</th>
				<th width="50" bgcolor="#a1a3a6">库房创建时间</th>
				<th width="120" bgcolor="#a1a3a6">操作</th>
			</tr>
                <?php
                    if (! empty($data)) {
                        foreach ($data as $value) {
                ?>
            <tr >
				<td bgcolor="#a1a3a6"> &nbsp; <?php echo $value['storename'] ?></td>
				<td bgcolor="#a1a3a6"> &nbsp; <?php echo $value['manager'] ?></td>
				<td bgcolor="#a1a3a6"> &nbsp; <?php echo $value['allsum'] ?></td>
				<td bgcolor="#a1a3a6"> &nbsp; <?php echo date("Y-m-d", $value['dateline']); ?></td>
				<td bgcolor="#a1a3a6">
				<a target="subframe" href="storeinspe.show.php?id=<?php echo $value['id']?>" >查看具体</a>
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