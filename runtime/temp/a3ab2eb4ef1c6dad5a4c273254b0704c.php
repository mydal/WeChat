<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:68:"F:\xampp\htdocs\api\public/../application/admin\view\music\edit.html";i:1586420082;s:58:"F:\xampp\htdocs\api\application\admin\view\common\top.html";i:1586310097;s:59:"F:\xampp\htdocs\api\application\admin\view\common\left.html";i:1586345450;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>

    <meta name="description" content="Dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--Basic Styles-->
    <link href="/static/admin/style/bootstrap.css" rel="stylesheet">
    <link href="/static/admin/style/font-awesome.css" rel="stylesheet">
    <link href="/static/admin/style/weather-icons.css" rel="stylesheet">

    <!--Beyond styles-->
    <link id="beyond-link" href="/static/admin/style/beyond.css" rel="stylesheet" type="text/css">
    <link href="/static/admin/style/demo.css" rel="stylesheet">
    <link href="/static/admin/style/typicons.css" rel="stylesheet">
    <link href="/static/admin/style/animate.css" rel="stylesheet">

</head>
<body>
<!-- 头部 -->
<div class="navbar">
    <div class="navbar-inner" style="background-color:black">
        <div class="navbar-container">
            <!-- Navbar Barnd -->
            <div class="navbar-header pull-left">
                <a href="#" class="navbar-brand">
                    <small>
                        <img src="/static/admin/images/11.jpg"  alt="">
                    </small>
                </a>
            </div>
            <!-- /Navbar Barnd -->
            <!-- Sidebar Collapse -->
            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="collapse-icon fa fa-bars"></i>
            </div>
            <!-- /Sidebar Collapse -->
            <!-- Account Area and Settings -->
            <div class="navbar-header pull-right">
                <div class="navbar-account">
                    <ul class="account-area">
                        <li>
                            <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                <div class="avatar" title="View your public profile">
                                    <img src="<?php echo \think\Request::instance()->session('pic'); ?>" >
                                </div>
                                <section>
                                    <h2><span class="profile"><span><?php echo \think\Request::instance()->session('username'); ?></span></span></h2>
                                </section>
                            </a>
                            <!--Login Area Dropdown-->
                            <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                <li class="username"><a>David Stevenson</a></li>
                                <li class="dropdown-footer">
                                    <a href="<?php echo url('login/index'); ?>">
                                        退出登录
                                    </a>
                                </li>
                                <li class="dropdown-footer">
                                    <a href="<?php echo url('admin/edit',['id'=>\think\Request::instance()->session('uid')]); ?>">
                                        修改密码
                                    </a>
                                </li>
                            </ul>
                            <!--/Login Area Dropdown-->
                        </li>
                        <!-- /Account Area -->
                        <!--Note: notice that setting div must start right after account area list.
                            no space must be between these elements-->
                        <!-- Settings -->
                    </ul>
                </div>
            </div>
            <!-- /Account Area and Settings -->
        </div>
    </div>
</div>

<!-- /头部 -->

<div class="main-container container-fluid">
    <div class="page-container">
        <!-- Page Sidebar -->
        <div class="page-sidebar" id="sidebar" >
    <!-- Page Sidebar Header-->
    <div class="sidebar-header-wrapper">
        <input class="searchinput" type="text">
        <i class="searchicon fa fa-search"></i>
        <div class="searchhelper">Search Reports, Charts, Emails or Notifications</div>
    </div>
    <!-- /Page Sidebar Header -->
    <!-- Sidebar Menu -->
    <ul class="nav sidebar-menu">
        <!--Dashboard-->
        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-user"></i>
                <span class="menu-text">管理员</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('admin/lists'); ?>">
                                    <span class="menu-text">
                                        管理员列表                                    </span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-user-md"></i>
                <span class="menu-text">用户</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('user/lists'); ?>">
                                    <span class="menu-text">
                                        用户列表                                    </span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-file-archive-o"></i>
                <span class="menu-text">电影信息</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('news/lists'); ?>">
                                    <span class="menu-text">
                                        电影信息列表                                   </span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-file-movie-o"></i>
                <span class="menu-text">电影详细信息</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('article/lists'); ?>">
                                    <span class="menu-text">
                                        电影详细信息列表                                    </span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-list"></i>
                <span class="menu-text">电影类别</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('mcate/lists'); ?>">
                                    <span class="menu-text">
                                        电影类别列表                                    </span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
            </ul>
        </li>


        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-image"></i>
                <span class="menu-text">电影轮播图</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('rotaion/lists'); ?>">
                                    <span class="menu-text">
                                        轮播图列表                                    </span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-music"></i>
                <span class="menu-text">电影音乐</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('music/lists'); ?>">
                                    <span class="menu-text">
                                        电影音乐列表                                    </span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-comment"></i>
                <span class="menu-text">电影评论</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('comment/lists'); ?>">
                                    <span class="menu-text">
                                        电影评论列表                                    </span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
            </ul>
        </li>




    </ul>
    <!-- /Sidebar Menu -->
</div>
        <!-- /Page Sidebar -->
        <!-- Page Content -->
        <div class="page-content">
            <!-- Page Breadcrumb -->
            <div class="page-breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <a href="<?php echo url('index/index'); ?>">首页</a>
                    </li>
                    <li>
                        <a href="<?php echo url('music/lists'); ?>">电影音乐管理</a>
                    </li>
                    <li class="active">更新电影音乐</li>
                </ul>
            </div>
            <!-- /Page Breadcrumb -->

            <!-- Page Body -->
            <div class="page-body">

                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <div class="widget-header bordered-bottom bordered-blue">
                                <span class="widget-caption">更新电影音乐</span>
                            </div>
                            <div class="widget-body">
                                <div id="horizontal-form">
                                    <form class="form-horizontal" role="form" action="<?php echo url('music/edit'); ?>" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="group_id"
                                                   class="col-sm-2 control-label no-padding-right">电影音乐名称</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" id="" placeholder="" name="title"
                                                       required="" type="text" value="<?php echo $model['title']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="group_id"
                                                   class="col-sm-2 control-label no-padding-right">电影音乐专辑</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" id="" placeholder="" name="epname"
                                                       required="" type="text" value="<?php echo $model['epname']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="group_id"
                                                   class="col-sm-2 control-label no-padding-right">电影音乐作者</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" id="" placeholder="" name="simger"
                                                       required="" type="text" value="<?php echo $model['simger']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="group_id"
                                                   class="col-sm-2 control-label no-padding-right">电影音乐地址</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" id="" placeholder="" name="src"
                                                       required="" type="text" value="<?php echo $model['src']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="id" value="<?php echo $model['id']; ?>">
                                            <label for="group_id"
                                                   class="col-sm-2 control-label no-padding-right">电影音乐缩略图</label>
                                            <div class="col-sm-6">
                                                <input type="file" name="coverImgUrl">
                                                <img src="<?php echo $model['coverImgUrl']; ?>" alt="" height="30px">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-default">更新电影音乐信息</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /Page Body -->
        </div>
        <!-- /Page Content -->
    </div>
</div>

<!--Basic Scripts-->
<script src="/static/admin/style/jquery_002.js"></script>
<script src="/static/admin/style/bootstrap.js"></script>
<script src="/static/admin/style/jquery.js"></script>
<!--Beyond Scripts-->
<script src="/static/admin/style/beyond.js"></script>


</body>
</html>