<html>
<head>
<link href="../../common/subframe.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h2>新建合同书</h2>
    <div id="bigmiddle">
        <form action="contractadd.handle.php" method="post">
            <table width="1200" border="1" cellpadding="8" cellspacing="1" bgcolor="#EEEEEE">
			<tr>
				<th width="100" bgcolor="#a1a3a6">对方公司名</th>
				<td width="200" align="center"  ><input class="addinput" type="text" name="companyother"/></td>
				<th width="100" bgcolor="#a1a3a6">对方签署代表</th>
				<td width="200" align="center"  ><input class="addinputmiddle" type="text" name="corporateother"/></td>
			</tr>
			<tr>
				<th width="100" bgcolor="#a1a3a6">本公司名</th>
				<td width="200" align="center"  ><input class="addinput" type="text" name="companyus"/></td>
				<th width="100" bgcolor="#a1a3a6">本签署代表</th>
				<td width="200" align="center"  ><input class="addinputmiddle" type="text" name="corporateus"/></td>
			</tr>
			<tr>
				<th bgcolor="#a1a3a6">正文</th>
				<td colspan="3"><textarea name="content" rows="25" cols="130" style="resize: none;"></textarea> </td>
			</tr>
			<tr>
				<th bgcolor="#a1a3a6">备注</th>
				<td colspan="3"><textarea name="remark" rows="5" cols="100" style="resize: none;"></textarea> </td>
			</tr>
            </table>
            <div id="order"><input  type="submit" value="确认添加"/></div>
            
        </form>
    </div>
</body>
</html>