@extends('admin.public.master')

@section('title', '修改管理员')

@section('css')
    <link rel="stylesheet" href="{{ asset('/statics/iCheck-1.0.2/skins/all.css') }}">
@endsection

@section('nav', '权限管理 > 修改管理员')


@section('body')

    <!-- 导航栏结束 -->
    <ul id="myTab" class="nav nav-tabs">
        <li>
            <a href="{{ url('admin/auth_group_access/index') }}">管理员列表</a>
        </li>
        <li class="active">
            <a href="{{ url('admin/auth_group_access/edit') }}">修改管理员</a>
        </li>
    </ul>

    <form class="form-inline" action="{{ url('admin/auth_group_access/update') }}" method="post">
        <input type="hidden" name="id" value="{{ $user_data['id'] }}">
        <table class="table table-striped table-bordered table-hover table-condensed">
            {{ csrf_field() }}
            <tr>
                <th>管理组</th>
                <td>
                    @foreach($group_data as $v)
                        {{ $v['title'] }}
                        <input class="xb-icheck" type="checkbox" name="group_ids[]" value="{{ $v['id'] }}" @if(in_array($v['id'], $group_access_data)) checked="checked" @endif >
                        &emsp;
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>姓名</th>
                <td>
                    <input class="form-control" type="text" name="name" value="{{ $user_data['name'] }}">
                </td>
            </tr>
            <tr>
                <th>手机号</th>
                <td>
                    <input class="form-control" type="text" name="phone" value="{{ $user_data['phone'] }}">
                </td>
            </tr>
            <tr>
                <th>邮箱</th>
                <td>
                    <input class="form-control" type="text" name="email" value="{{ $user_data['email'] }}">
                </td>
            </tr>
            <tr>
                <th>初始密码</th>
                <td>
                    <input class="form-control" type="text" name="password">如不改密码；留空即可
                </td>
            </tr>
            <tr>
                <th>状态</th>
                <td>
                    <span class="inputword">允许登录</span>
                    <input class="xb-icheck" type="radio" name="status" value="1" @if($user_data['status']==1) checked="checked" @endif >
                    &emsp;
                    <span class="inputword">禁止登录</span>
                    <input class="xb-icheck" type="radio" name="status" value="0" @if($user_data['status']==0) checked="checked" @endif >
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input class="btn btn-success" type="submit" value="修改">
                </td>
            </tr>
        </table>
    </form>

@endsection


@section('js')

    <script src="{{ asset('/statics/iCheck-1.0.2/icheck.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('.xb-icheck').iCheck({
                checkboxClass: "icheckbox_minimal-blue",
                radioClass: "iradio_minimal-blue",
                increaseArea: "20%"
            });
        });
    </script>

@endsection