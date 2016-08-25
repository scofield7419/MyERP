<?php 
    require_once '../../myERP/inc.php';
    $sql = "SELECT * FROM meterial ORDER BY adddate DESC ;";
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
<h3>查看所有物料记录</h3>
            
                    <?php 
                        $i=count($data);
                        if(empty($data)){
                            echo "<h2>没有物料记录</h2>";
                        }else{
                            foreach ($data as $value){
                    ?>
                    <div id="showcontent">
                    <div id="space">
                    <span >第<?php echo $i--;?>件</span> <div id="right">入库时间<?php echo date("Y-m-d H:i:s", $value['adddate']);?></div>
                    </div>
                    </br>
                    
                    <table width="800" border="1" cellpadding="10" cellspacing="3" bgcolor="#408080">
                        <tr>
                            <th width="150"  >物料名称</th>
                            <td width="250" bgcolor="#a1a3a6"> &nbsp; <?php echo $value['meterialname'] ?></td>
                            <th width="150"  >物料编号</th>
                            <td width="250" bgcolor="#a1a3a6"> &nbsp; <?php echo $value['meterialnumber'] ?></td>
                        </tr>
                        <tr>
                            <th width="150"  >单价</th>
                            <td width="250" bgcolor="#a1a3a6"> &nbsp; <?php echo $value['price'] ?>（元）</td>
                            <th width="150" >数量</th>
                            <td width="250" bgcolor="#a1a3a6"> &nbsp; <?php echo $value['sum'] ?>（套/件）</td>
                        </tr>
                        <tr>
                            <th width="150"  >存储仓库</th>
                            <td colspan="3" bgcolor="#a1a3a6">
                            <?php 
                            $storeid = $value['storeid'];
                            $select = "SELECT * FROM store WHERE id = '$storeid'; ";
                            $query2 = mysql_query($select);
                            $storedata = mysql_fetch_array($query2); 
                            $storename = $storedata['storename'];
                            echo $storename ;
                            ?>
                            </td>
                        </tr>
                        <tr rowspan="2">
                            <th  width="150"  >备注</th>
                            <td colspan="3" bgcolor="#a1a3a6"><pre><?php echo $value['remark'] ?></pre></td>
                        </tr>
                    
                    </table>
                    </div>
                    <?php  
                            }
                        }
                    ?>
           
            
</body>
</html>