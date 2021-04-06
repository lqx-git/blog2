<!DOCTYPE html>
<html class="x-admin-sm">

    <head>
        <meta charset="UTF-8">
        <title>角色添加</title>
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
                <form class="layui-form" action="{{ url('admin/role') }}" method="post">
{{csrf_field()}}
                  <div class="layui-form-item">
                      <label for="username" class="layui-form-label">
                          <span class="x-red">*</span>角色名称
                      </label>
                      <div class="layui-input-inline">
                          <input type="text" id="username" name="role_name" required="" lay-verify=""
                          autocomplete="off" class="layui-input">
                      </div>
                      <div class="layui-form-mid layui-word-aux">
                          <span class="x-red">*</span>
                      </div>
                  </div>

{{--                  <div class="layui-form-item">--}}
{{--                      <label for="phone" class="layui-form-label">--}}
{{--                          <span class="x-red">*</span>手机--}}
{{--                      </label>--}}
{{--                      <div class="layui-input-inline">--}}
{{--                          <input type="text" id="phone" name="phone" required="" lay-verify="phone"--}}
{{--                          autocomplete="off" class="layui-input">--}}
{{--                      </div>--}}
{{--                      <div class="layui-form-mid layui-word-aux">--}}
{{--                          <span class="x-red">*</span>将会成为您唯一的手机登入名--}}
{{--                      </div>--}}
{{--                  </div>--}}

{{--                  <div class="layui-form-item">--}}
{{--                      <label for="L_email" class="layui-form-label">--}}
{{--                          <span class="x-red">*</span>邮箱--}}
{{--                      </label>--}}
{{--                      <div class="layui-input-inline">--}}
{{--                          <input type="text" id="L_email" name="email" required="" lay-verify="email"--}}
{{--                          autocomplete="off" class="layui-input">--}}
{{--                      </div>--}}
{{--                      <div class="layui-form-mid layui-word-aux">--}}
{{--                          <span class="x-red">*</span>--}}
{{--                      </div>--}}
{{--                  </div>--}}

{{--                  <div class="layui-form-item">--}}
{{--                      <label class="layui-form-label"><span class="x-red">*</span>角色</label>--}}
{{--                      <div class="layui-input-block">--}}
{{--                        <input type="checkbox" name="like1[write]" lay-skin="primary" title="超级管理员" checked="">--}}
{{--                        <input type="checkbox" name="like1[read]" lay-skin="primary" title="编辑人员">--}}
{{--                        <input type="checkbox" name="like1[write]" lay-skin="primary" title="宣传人员" checked="">--}}
{{--                      </div>--}}
{{--                  </div>--}}



                  <div class="layui-form-item">
                      <label for="L_repass" class="layui-form-label">
                      </label>
                      <button  class="layui-btn" lay-filter="add" lay-submit="">
                          增加
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
