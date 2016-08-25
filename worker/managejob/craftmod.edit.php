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
<h3>修改工艺流程</h3>
    <div id="bigmiddle">
        <form action="craftmod.edit.handle.php" method="post">
            <input type="hidden" name="id" value="<?php echo $data['id']?>" />
            <table width="1700" border="1" cellpadding="0" cellspacing="0" id="tableSelect"
				bgcolor="#EEEEEE">
				<tr>
					<th rowspan="1" width="330" bgcolor="#a1a3a6"><span style="font-size: 18pt;font-weight: bold;">装配工艺卡</span></th>
					<td rowspan="4" width="1100">
						<table width="1100" border="0" cellpadding="4" cellspacing="0" bgcolor="#E00000">
							<tr>
								<th width="300" bgcolor="#E00000">产品名称</th>
								<td width="250" align="center"><input width="200" type="text" name="proname" value="<?php echo $data['proname']?>"/></td>
								<th width="300" bgcolor="#E00000">产品代号</th>
								<td width="250" align="center"><input width="200" type="text" name="pronumber" value="<?php echo $data['pronumber']?>"/></td>
							</tr>
							<tr>
								<th width="300" bgcolor="#E00000">装配图名称</th>
								<td width="250" align="center"><input width="200" type="text" name="craftname" value="<?php echo $data['craftname']?>" /></td>
								<th width="300" bgcolor="#E00000">装配代号</th>
								<td width="250" align="center"><input width="200" type="text" name="craftnumber" value="<?php echo $data['craftnumber']?>"/></td>
							</tr>
						</table>
					</td>
					<th rowspan="1" width="270" bgcolor="#a1a3a6"><span style="padding: 3px; float: none;;"> </span></th>
				</tr>
			</table>
			
            <table id="tableInsert" width="1700" border="1" cellpadding="10" cellspacing="1" bgcolor="#EEEEEE" >
                <tr>
            		<th  width="50">序号</th>
            		<th  bgcolor="#a1a3a6" width="530">工序内容</th>
            		<th  width="250">材料、设备</th>
            	</tr>
            	<?php 
                        if(empty($data2)){
                            echo "没有流程";
                        }else{
                            foreach ($data2 as $value){
                    ?>
                 
                 <tr>
            		<td  width="50"><?php echo $value['craftorder'] ?></td>
            		<td  width="530"><textarea rows="3" cols="80" style="resize: none;" name="content<?php echo $value['craftorder'] ?>" ><?php echo $value['content'] ?></textarea ></td>
            		<td  width="250"><input class="addinputmiddle" type="text" name="meterial<?php echo $value['craftorder'] ?>" value="<?php echo $value['content'] ?>"/></td>
            	</tr>
                <input type="hidden" name="craftcontentid<?php echo $value['craftorder'] ?>" value="<?php echo $value['id']?>" />
                  <?php  
                            }
                        }
                    ?>
            </table>
            <div id="order">
			<input type="submit" value="提交修改" />
            </div>
		</form>
    </div>
</body>
</html>