<?php
    require_once '../../myERP/inc.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM job WHERE id = $id ;";
    $query=mysql_query($sql);
//    echo $sql;
    if($query && mysql_num_rows($query)){
        $data = mysql_fetch_assoc($query);
    }else{
        echo "没有此任务！";
        exit;
    }
?>
<html>
<head>
<link href="../../common/subframe.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h3>修改任务</h3>
    <div id="middle">
        <form action="jobmod.edit.handle.php" method="post">
            <input type="hidden" name="id" value="<?php echo $data['id']?>" />
            <table width="1200" border="1" cellpadding="8" cellspacing="1"
			bgcolor="#EEEEEE">
			<tr>
				<th width="200" bgcolor="#a1a3a6">产品名称</th>
				<td width="500" align="center"  ><input  type="text" name="proname" value="<?php echo $data['proname']?>"/></td>
			</tr>
			<tr>
				<th width="200" bgcolor="#a1a3a6">任务编号</th>
				<td width="500" align="center" ><input type="text" name="jobnumber" value="<?php echo $data['jobnumber']?>"/></td>
			</tr>
			<tr>
				<th width="200" bgcolor="#a1a3a6">本月任务(台/件)</th>
				<td width="500" align="center" ><input type="text" name="jobmonth" value="<?php echo $data['jobmonth']?>" /></td>
			</tr>
			<tr>
				<th width="200" bgcolor="#a1a3a6">任务组</th>
				<td ><select name="jobgroup">
				<option <?php if($data['jobgroup'] == '工艺一组'){echo "selected = 'selected'" ;} ?>>工艺一组</option>
    				<option <?php if($data['jobgroup'] == '工艺二组'){echo "selected = 'selected'" ;} ?>>工艺二组</option>
    				<option <?php if($data['jobgroup'] == '工艺三组'){echo "selected = 'selected'" ;} ?>>工艺三组</option>
    				<option <?php if($data['jobgroup'] == '校对组'){echo "selected = 'selected'" ;} ?>>校对组</option>
    				<option <?php if($data['jobgroup'] == '库房组'){echo "selected = 'selected'" ;} ?>>库房组</option>
				</select></td>
			</tr>
			<tr>
				<th width="200" bgcolor="#a1a3a6">申领时间</th>
				<td ><input type="number" name="getjobyear" value="<?php echo $data['getjobyear']?>"/>年
				<input type="number" name="getjobmonth" value="<?php echo $data['getjobmonth']?>"/>月 到<br/> 
				<input type="number" name="stopjobyear" value="<?php echo $data['stopjobyear']?>"/>年
				<input type="number" name="stopjobmonth" value="<?php echo $data['stopjobmonth']?>"/>月</td>
			</tr>
			<tr>
				<th width="200" bgcolor="#a1a3a6">备注</th>
				<td ><textarea name="remark" rows="3" cols="80"  style="resize: none;"  ><?php echo $data['remark']?></textarea> </td>
			</tr>
			<tr>
				<td colspan="2" align="right"><input  type="submit" name="jobadd" value="提交修改" /></td>
			</tr>
			
            </table>
        </form>
    </div>
</body>
</html>