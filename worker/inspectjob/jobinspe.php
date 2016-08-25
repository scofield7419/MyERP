<?php 
    require_once '../../myERP/inc.php';
    $sql = "SELECT * FROM job ORDER BY dateline DESC ;";
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
<h3>查看所有任务</h3>
            
                    <?php 
                        $i=count($data);
                        if(empty($data)){
                            echo "没有任务";
                        }else{
                            foreach ($data as $value){
                    ?>
                    <div id="showcontent">
                    <div id="space">
                    <span >系统工程任务单</span> 第<?php echo $i--;?>单 
                      <div id="right">创建时间<?php echo date("Y-m-d H:i:s", $value['dateline']);?></div>
                    </div>
                    <br/>
                    <table width="800" border="1" cellpadding="10" cellspacing="3" bgcolor="#408080">
                        <tr>
                            <th width="150"  >产品名称</th>
                            <td width="250" bgcolor="#a1a3a6"> &nbsp; <?php echo $value['proname'] ?></td>
                            <th width="150"  >任务编号</th>
                            <td width="250" bgcolor="#a1a3a6"> &nbsp; <?php echo $value['jobnumber'] ?></td>
                        </tr>
                        <tr>
                            <th width="150"  >任务组</th>
                            <td width="250" bgcolor="#a1a3a6"> &nbsp; <?php echo $value['jobgroup'] ?></td>
                            <th width="150" >本月任务</th>
                            <td width="250" bgcolor="#a1a3a6"> &nbsp; <?php echo $value['jobmonth'] ?>（套/件）</td>
                        </tr>
                        <tr>
                            <th width="150"  >申领套数</th>
                            <td colspan="3" bgcolor="#a1a3a6">——</td>
                        </tr>
                        <tr>
                            <th width="150"  >任务期</th>
                            <td colspan="3" bgcolor="#a1a3a6">
                             <?php echo $value['getjobyear'] ?>年 <?php echo $value['getjobmonth'] ?>月———— <?php echo $value['stopjobyear'] ?>年<?php echo $value['stopjobmonth'] ?>月
                            </td>
                        </tr>
                        <tr>
                            <th width="150"  >负责人签字</th>
                            <td colspan="3" bgcolor="#a1a3a6">——</td>
                        </tr>
                        <tr>
                            <th rowspan="3" width="150"  >备注</th>
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