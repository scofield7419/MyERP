<?php 
    require_once '../../myERP/inc.php';
    $sql = "SELECT * FROM bulletin ORDER BY dateline DESC ;";
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
<h3>查看所有公告</h3>
            
                    <?php 
                        $i=count($data);
                        if(empty($data)){
                            echo "没有任务";
                        }else{
                            foreach ($data as $value){
                    ?>
                    <div id="bulletincontent">
                    
                    <div id="title">
                       <h2>  <?php echo $value['title'] ?> </h2>
                    </div>
                    <div id="info">
                                                                                发布者：<?php echo $value['distributor'] ?>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  发布时间:<?php echo date("Y-m-d H:i:s", $value['dateline']);?>
                    </div>
                    <div id="contentbody">
                        <p><?php echo $value['content'] ?></p>
                    </div>
                    <div id="order">
                                                                                第<?php echo $i--;?>条 
                    </div>
                    
                    </div>
                    <?php  
                            }
                        }
                    ?>
           
            
</body>
</html>