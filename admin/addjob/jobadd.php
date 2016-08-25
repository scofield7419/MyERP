<html>
<head>
<link href="../../common/subframe.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h3>增加任务</h3>
    <div id="middle">
        <form action="jobadd.handle.php" method="post">
            <table width="1200" border="1" cellpadding="8" cellspacing="1"
			bgcolor="#EEEEEE">
			<tr>
				<th width="200" bgcolor="#a1a3a6">产品名称</th>
				<td width="500" align="center"  ><input class="addinput" type="text" name="proname"/></td>
			</tr>
			<tr>
				<th width="200" bgcolor="#a1a3a6">任务编号</th>
				<td width="500" align="center" ><input class="addinput" type="text" name="jobnumber" /></td>
			</tr>
			<tr>
				<th width="200" bgcolor="#a1a3a6">本月任务(台/件)</th>
				<td width="500" align="center" ><input class="addinput" type="text" name="jobmonth" /></td>
			</tr>
			<tr>
				<th width="200" bgcolor="#a1a3a6">任务组</th>
				<td ><select name="jobgroup"><option>工艺一组<option>工艺二组<option>工艺三组<option>校对组<option>库房组</select></td>
			</tr>
			<tr>
				<th width="200" bgcolor="#a1a3a6">申领时间</th>
				<td ><input type="number" name="getjobyear" />年<input type="number" name="getjobmonth" />月 到</br> <input type="number" name="stopjobyear" />年<input type="number" name="stopjobmonth" />月        &nbsp;&nbsp; </td>
			</tr>
			<tr>
				<th width="200" bgcolor="#a1a3a6">备注</th>
				<td ><textarea name="remark" rows="3" cols="80" style="resize: none;"></textarea> </td>
			</tr>
			<tr>
				<td colspan="2" align="right"><input  type="submit" name="jobadd" value="分配任务" /></td>
			</tr>
			
            </table>
        </form>
    </div>
</body>
</html>