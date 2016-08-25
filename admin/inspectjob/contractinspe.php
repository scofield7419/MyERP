<?php 
    require_once '../../myERP/inc.php';
    $sql = "SELECT * FROM contract ORDER BY dateline DESC ;";
    $query = mysql_query($sql);
    if($query && mysql_num_rows($query)){
        while($row = mysql_fetch_assoc($query)){
            $data[]=$row ;
        }
    }else{
        $data=array();
    }
//    var_dump($data);

?>
<html>
<head>
<link href="../../common/subframe.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h2>查看所有合同记录</h2>
            
                    <?php 
                        $i=count($data);
                        if(empty($data)){
                            echo "<h2>没有合同记录，请添加</h2>";
                        }else{
                            foreach ($data as $value){
                    ?>
                    <div id="showcontent">
                    <div id="space">
                    <span >第<?php echo $i--;?>条合同</span> <div id="right">创建时间<?php echo date("Y-m-d H:i:s", $value['dateline']);?></div>
                    </div>
                    </br>
                    <table width="1200" border="1" cellpadding="10" cellspacing="3" bgcolor="#408080">
			<tr>
				<th width="100" bgcolor="#a1a3a6">对方公司名</th>
				<td width="200" align="center"  ><?php echo $value['companyother'];?></td>
				<th width="100" bgcolor="#a1a3a6">对方签署代表</th>
				<td width="200" align="center"  ><?php echo $value['corporateother'];?></td>
			</tr>
			<tr>
				<th width="100" bgcolor="#a1a3a6">本公司名</th>
				<td width="200" align="center"  ><?php echo $value['companyus'];?></td>
				<th width="100" bgcolor="#a1a3a6">本签署代表</th>
				<td width="200" align="center"  ><?php echo $value['corporateus'];?></td>
			</tr>
			<tr>
				<th bgcolor="#a1a3a6">正文</th>
				<td colspan="3"><?php echo $value['content'];?></td>
			</tr>
			<tr>
				<th bgcolor="#a1a3a6">备注</th>
				<td colspan="3"><?php echo $value['remark'];?></td>
			</tr>
            </table>
                    </div>
                    <?php  
                            }
                        }
                    ?>
           
            
</body>
</html>