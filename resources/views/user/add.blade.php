
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>登录页面</title>
</head>
<body>
<form action="{{url('/user/store')}}" method="post">
<table>
    <tr>
{{csrf_field() }}
<td>用户名</td>
<td><label>
        <input type="text" name="username">
    </label></td>
</tr>
<tr>
    <td>密码</td>
    <td><label>
            <input type="password" name="password">
        </label></td>
</tr>
<tr>
    <td></td>
    <td><input type="submit" value="提交"></td>
</tr>
</table>

</form>
</body>
</html>
