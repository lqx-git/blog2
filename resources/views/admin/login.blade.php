<!doctype html>
<html  class="x-admin-sm">
<head>
	<meta charset="UTF-8">
	<title>后台登录-X-admin2.2</title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="stylesheet"  href="{{asset('admin/css/login.css') }}">

    @include('admin.public.styles')
    @include('admin.public.script')
{{--    1。下面一句会出现token--}}
{{--    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>--}}
{{--    <link rel="stylesheet" href="./css/font.css">--}}
{{--    <link rel="stylesheet" href="./css/login.css">--}}
{{--    <link rel="stylesheet" href="./css/xadmin.css">--}}
{{--    <link rel="stylesheet" href="{{asset('admin//css/login.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('admin/css/login.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('admin/css/font.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('admin/css/login.css')}}">--}}

{{--    @include('admin.public.styles')--}}
{{--    @include('admin.public.script')--}}
{{--    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>--}}
{{--    <script src="{{asset('admin/lib/layui/css/layui.js') }}" charset="utf-8"></script>--}}
{{--    <script type="text/javascript" src="{{asset('admin/js/xadmin.js')}}"></script>--}}

{{--      <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>--}}
{{--      <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>--}}

</head>
<body class="login-bg">

    <div class="login layui-anim layui-anim-up">
        <div class="message">后台管理系统</div>


{{--        @if( count((array)$errors) > 0)--}}
{{--        @if ($errors->any())--}}
        @if( count((array)$errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @if(is_object($errors))
                   @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                   @endforeach
                @else
                    <li>{{$errors }}</li>
                @endif
            </ul>
        </div>
        @endif


        <div id="darkbannerwrap"></div>

        <form method="post" class="layui-form" action="{{url('admin/dologin') }}">
            {{csrf_field() }}

            <input name="username" placeholder="用户名"  type="text" lay-verify="required" class="layui-input" >
            <hr class="hr15">
            <input name="password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
            <hr class="hr15">
            <input name="code" style="width:150px;" lay-verify="required" placeholder="验证码"  type="text" class="layui-input">

            <a onclick="javascript:re_captcha();">
                <img src="{{URL('/code/captcha/1') }}"  id="127ddf0de5a04167a9e427d883690ff6">
            </a>
            <hr class="hr15">

            <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
            <hr class="hr20" >
        </form>
    </div>

    <script>
        $(function  () {
            layui.use('form', function(){
              var form = layui.form;
              // layer.msg('玩命卖萌中', function(){
              //   //关闭后的操作
              //   });
              //监听提交
              form.on('submit(login)', function(data){
                // alert(888)
                layer.msg(JSON.stringify(data.field),function(){
                    location.href='index.html'
                });
                return false;
              });
            });
        })
    </script>


    <script type="text/javascript">
        function re_captcha() {
            $url ="{{URL('/code/captcha' )}}";
            $url =$url + "/" + Math.random();
            document.getElementById('127ddf0de5a04167a9e427d883690ff6').src =$url;
        }
    </script>

    <script>
    //百度统计可去掉
    var _hmt = _hmt || [];
    (function() {
      var hm = document.createElement("script");
      hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
      var s = document.getElementsByTagName("script")[0];
      s.parentNode.insertBefore(hm, s);
    })();
    </script>
</body>
</html>
