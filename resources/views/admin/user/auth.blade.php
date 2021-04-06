<!DOCTYPE html>
<html class="x-admin-sm">

<head>
    <meta charset="UTF-8">
    <title>用户授权页面</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="csrf-token" content="{{csrf_token() }}">
{{--        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi " />--}}



@include('admin.public.styles')
@include('admin.public.script')
<!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="layui-fluid">
    <div class="layui-row">
        <form class="layui-form" action="{{ url('admin/user/doauth') }}" method="post">
            {{csrf_field()}}

            <div class="layui-form-item">
                <label for="username" class="layui-form-label">
                    <span class="x-red">*</span>角色名称
                </label>
                <div class="layui-input-inline">

                    <input type="hidden" value="{{$user->user_id}}"  name="user_id">
                    <input type="text" value="{{ $user->user_name }}" disabled="" name="user_name" required="" lay-verify=""
                           autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>
                </div>
            </div>

            <div class="layui-form-item">
                <label for="username" class="layui-form-label">
                    <span class="x-red">*</span>所有的角色
                </label>
                <div class="layui-input-inline" style="width:220px">
                    @foreach($roles as $v)
                        {{--//  如果当前用户拥有正在遍历的角色--}}
                        @if(in_array($v->id,$own_roleids))
                            <input type="checkbox" checked value="{{$v->id}}" name="role_id[]" title="{{$v->role_name}}"  lay-skin="primary">
                        @else
                            <input type="checkbox" value="{{$v->id}}" name="role_id[]" title="{{$v->role_name}}"  lay-skin="primary">


                        @endif



                    @endforeach
                    {{--<input type="checkbox" name="" title="用户" lay-skin="primary">--}}
                    {{--                            <input type="checkbox" name="" title="经理" lay-skin="primary">--}}
                </div>
                {{--                        <div class="layui-form-mid layui-word-aux">--}}
                {{--                            <span class="x-red">*</span>--}}
                {{--                        </div>--}}
            </div>

            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                </label>
                <button  class="layui-btn" lay-filter="add" lay-submit="">
                    授权
                </button>
            </div>

        </form>
    </div>
</div>
<script>
    layui.use(['form', 'layer'],
        function() {
            $ = layui.jquery;
            var form = layui.form,
                layer = layui.layer;



            //监听提交
            form.on('submit(add)', function(data) {


                // return false;
            });

        });</script>
<script>var _hmt = _hmt || []; (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();</script>
</body>

</html>
