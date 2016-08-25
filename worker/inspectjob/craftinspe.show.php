<?php
    require_once '../../myERP/inc.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM craft WHERE id = $id ;";
    $sql2 = "SELECT * FROM craftcontent WHERE craftid = $id ORDER BY craftorder ASC;";
    $query=mysql_query($sql);
    $query2=mysql_query($sql2);
//    echo $sql;
    if($query && mysql_num_rows($query)){
        $data = mysql_fetch_assoc($query);
    }else{
        echo "没有此工艺流程！";
        exit;
    }
    if($query && mysql_num_rows($query2)){
        while($row2 = mysql_fetch_assoc($query2)){
            $data2[]=$row2 ;
        }
    }
?>

<html>
<head>
<link href="../../common/subframe.css" rel="stylesheet" type="text/css" />
</head>
<body>
            <table class="middlecraft" width="1500" border="1" cellpadding="0" cellspacing="0" id="tableSelect"
				bgcolor="#EEEEEE">
				<tr>
					<th rowspan="1" width="330" bgcolor="#a1a3a6"><span style="font-size: 18pt;font-weight: bold;">装配工艺卡</span></th>
				</tr>
			</table>
    <div id="bigmiddle">
			
			<table width="1700" border="1" cellpadding="8" cellspacing="1" bgcolor="#E00000">
							<tr>
								<th width="300" bgcolor="#E00000">产品名称</th>
								<td width="250" align="center"><?php echo $data['proname']?></td>
								<th width="300" bgcolor="#E00000">产品代号</th>
								<td width="250" align="center"><?php echo $data['pronumber']?></td>
							</tr>
							<tr>
								<th width="300" bgcolor="#E00000">装配图名称</th>
								<td width="250" align="center"><?php echo $data['craftname']?></td>
								<th width="300" bgcolor="#E00000">装配代号</th>
								<td width="250" align="center"><?php echo $data['craftnumber']?></td>
							</tr>
			</table>
			
            <table class="lasttable" width="1700" border="1" cellpadding="10" cellspacing="1" bgcolor="#408080" >
                <tr>
            		<th  width="50">序号</th>
            		<th  bgcolor="#a1a3a6" width="530">工序内容</th>
            		<th  width="150">材料、设备</th>
            	</tr>
            	<?php 
            	        $i=count($data2);
                        if(empty($data2)){
                            echo "没有流程";
                        }else{
                            foreach ($data2 as $value){
                    ?>
                 
                 <tr>
            		<td  width="50" style="font-weight: bold;"><?php echo $value['craftorder'] ?></td>
            		<td  width="530" style="font-weight: bold;"><?php echo $value['content'] ?></td>
            		<td  width="150" style="font-weight: bold;"><?php echo $value['meterial'] ?></td>
            	</tr>
            	<?php 
            	$i--;
            	if($i > 0){
            	    echo '<tr><td colspan="3" bgcolor="#c0c0c0" ><img class="arrow" alt="" src="../../common/arrow2.png"></td></tr>' ;
            	}
            	?>
                  <?php  
                            }
                        }
                    ?>
            </table>
    </div>
</body>
</html>
