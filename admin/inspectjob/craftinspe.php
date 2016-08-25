<?php 
    require_once '../../myERP/inc.php';
    $sql = "SELECT * FROM craft ORDER BY dateline DESC ;";
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
<h3>查看工艺流程</h3>
<div id="bigmiddle">
            <table width="1200" border="1" cellpadding="20" cellspacing="1" bgcolor="#408080">
			<tr>
				<th class="craft" width="100" bgcolor="#a1a3a6">装配代号</th>
				<th class="craft" width="150" bgcolor="#a1a3a6">装配图名称</th>
				<th class="craft" width="150" bgcolor="#a1a3a6">产品名称</th>
				<th class="craft" width="80" bgcolor="#a1a3a6">工艺创建时间</th>
				<th class="craft" width="80" bgcolor="#a1a3a6">创建者</th>
				<th class="craft" width="130" bgcolor="#a1a3a6">操作</th>
			</tr>
                <?php
                    if (! empty($data)) {
                        foreach ($data as $value) {
                ?>
            <tr >
				<td class="craft" bgcolor="#a1a3a6"> &nbsp; <?php echo $value['craftnumber'] ?></td>
				<td class="craft" bgcolor="#a1a3a6"> &nbsp; <?php echo $value['craftname'] ?></td>
				<td class="craft" bgcolor="#a1a3a6"> &nbsp; <?php echo $value['proname'] ?></td>
				<td class="craft" bgcolor="#a1a3a6"> &nbsp; <?php echo date("Y-m-d", $value['dateline']); ?></td>
				<td bgcolor="#a1a3a6"> &nbsp; <?php echo $value['creator'] ?></td>
				<td class="craft" bgcolor="#a1a3a6">
				<a target="subframe" href="craftinspe.show.php?id=<?php echo $value['id']?>" >查看具体流程</a>
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