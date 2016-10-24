<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html class="no-js login" lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo ($title); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="/Public/Admin/css/images/favicon.png">
        <!-- Le styles -->
        <link href="/Public/Admin/css/twitter/bootstrap.css" rel="stylesheet">
        <link href="/Public/Admin/css/base.css" rel="stylesheet">
        <link href="/Public/Admin/css/twitter/responsive.css" rel="stylesheet">
        <link href="/Public/Admin/css/common.css" rel="stylesheet">
        <script src="/Public/Admin/js/plugins/modernizr.custom.32549.js"></script>
        <script src="/Public/static/jquery/jquery-2.0.3.min.js"></script>
        <script type="text/javascript" src="/Public/static/layer/layer.js"></script>
        <script src="/Public/Admin/js/common.js"></script>
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
              <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
              <![endif]-->

    </head>

    <body>
        <div id="login_page"> 
            <!-- Login page -->
            <div id="login">
                <div class="row-fluid fluid">
                    <div class="span8">
                        <div class="title text-align-center">
                            <span class="name">后台管理系统</span>
                            <span class="subtitle ">用户登录</span>
                        </div>
                        <form class="form-search row-fluid form-login" action="" method="post">
                            <div class="input-append row-fluid fluid">
                                <input type="text" class="row-fluid search-query" name='username' placeholder="Username">
                            </div>
<!--                             <div class="input-append row-fluid fluid">
                                <input type="text" class="row-fluid search-query" name='username' placeholder="Username">
                            </div>-->
                            <div class="input-append row-fluid fluid">
                                <input type="password" class="row-fluid search-query" name='password' placeholder="Password">
                                <a class="btn color_4 btn-submit ajax-post" data-for="form-login" data-verify="all">Go</a> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End #login --> 
            <!-- <img src="/Public/Admin/img/ajax-loader.gif"> --> 
        </div>
        <!-- End #loading --> 

        <!-- Le javascript
            ================================================== --> 
        <!-- Placed at the end of the document so the pages load faster --> 

        <!-- Flip effect on login screen --> 
        <script type="text/javascript">
            $(function (){
            })
        </script>
    </body>

</html>