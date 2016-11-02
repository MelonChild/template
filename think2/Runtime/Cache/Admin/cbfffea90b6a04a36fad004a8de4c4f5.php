<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html class="sidebar_default  no-js" lang="en">
    <head>
      <meta charset="utf-8">
    <title><?php echo ($title); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le styles -->
    <script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>

    <link rel="stylesheet" href="/Public/Admin/css/style.css">
    <link rel="stylesheet" href="/Public/Admin/css/loader-style.css">
    <link rel="stylesheet" href="/Public/Admin/css/bootstrap.css">


    <link href="/Public/Admin/js/footable/css/footable.core.css?v=2-0-1" rel="stylesheet" type="text/css">
    <link href="/Public/Admin/js/footable/css/footable.standalone.css" rel="stylesheet" type="text/css">
    <link href="/Public/Admin/js/footable/css/footable-demos.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="/Public/Admin/js/dataTable/lib/jquery.dataTables/css/DT_bootstrap.css">
    <link rel="stylesheet" href="/Public/Admin/js/dataTable/css/datatables.responsive.css">





    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    <!-- Fav and touch icons -->
    
    <style>
        a{color:#fff;}
        .checker{display: block !important;}
    </style>

</head>

<body>
    <!-- TOP NAVBAR -->

    <!--<div class="header row-fluid">
    <div class="logo"> <a href="/Admin"><span>首页</span><span class="icon"></span></a> </div>
    <div class="top_right">
        <ul class="nav nav_menu">
            <li class="dropdown"> <a class="dropdown-toggle administrator" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
                    <div class="title"><span class="name"><?php echo ($adminusers["name"]); ?></span><span class="subtitle"><?php echo ($rolename); ?></span></div>
                    <span class="icon"><img src="img/thumbnail_george.jpg"></span></a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                    <li><a href="<?php echo U('Admin/Rbac/editUser');?>"><i class=" icon-cog"></i>Settings</a></li>
                    <li><a href="<?php echo U('Login/logout');?>"><i class=" icon-unlock"></i>Log Out</a></li>
                </ul>
            </li>
        </ul>
    </div>
     End top-right  
</div>-->

 <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <!-- TOP NAVBAR -->
    <nav role="navigation" class="navbar navbar-static-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" class="navbar-toggle" type="button">
                    <span class="entypo-menu"></span>
                </button>
                <button class="navbar-toggle toggle-menu-mobile toggle-left" type="button">
                    <span class="entypo-list-add"></span>
                </button>

            </div>


            <!-- Collect the nav links, forms, and other content for toggling -->
            <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">

                <ul style="margin-right:0;" class="nav navbar-nav navbar-right">
                    <li>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" class="admin-pic img-circle" src=""><?php echo ($adminusers["name"]); ?><b class="caret"></b>
                        </a>
                        <ul style="margin-top:14px;" role="menu" class="dropdown-setting dropdown-menu">
                            <li>
                                <a href="#">
                                    <span class="entypo-user"></span>&#160;&#160;My Profile</a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="entypo-vcard"></span>&#160;&#160;Account Setting</a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="entypo-lifebuoy"></span>&#160;&#160;Help</a>
                            </li>
                            <li class="divider"></li>
                        </ul>
                    </li>
                    <li>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="icon-gear"></span>&#160;&#160;Setting</a>
                        <ul role="menu" class="dropdown-setting dropdown-menu">

                            <li class="theme-bg">
                                <div id="button-bg"></div>
                                <div id="button-bg2"></div>
                                <div id="button-bg3"></div>
                                <div id="button-bg5"></div>
                                <div id="button-bg6"></div>
                                <div id="button-bg7"></div>
                                <div id="button-bg8"></div>
                                <div id="button-bg9"></div>
                                <div id="button-bg10"></div>
                                <div id="button-bg11"></div>
                                <div id="button-bg12"></div>
                                <div id="button-bg13"></div>
                            </li>
                        </ul>
                    </li>
                  
                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- /END OF TOP NAVBAR -->

<!-- /END OF TOP NAVBAR -->


<!--左边栏-->

    <!-- SIDE MENU -->
<div id="skin-select">
    <div id="logo">
        <h1>WeMax<span>v1.0</span></h1>
    </div>

    <a id="toggle">
        <span class="entypo-menu"></span>
    </a>
    <div class="dark">
        <form action="#">
            <span>
                <input type="text" name="search" value="" class="search rounded id_search" placeholder="搜索" autofocus="">
            </span>
        </form>
    </div>

    <div class="search-hover">
        <form id="demo-2">
            <input type="search" placeholder="搜索" class="id_search">
        </form>
    </div>

    <div class="skin-part">
        <div id="tree-wrap">
            <div class="side-bar">
                <ul class="topnav menu-left-nest">
                    <li>
                        <a href="#" style="border-left:0px solid!important;" class="title-menu-left">
                            <span class="widget-menu"></span>
                            <i data-toggle="tooltip" class="entypo-cog pull-right config-wrap"></i>

                        </a>
                    </li>
                    <?php if(is_array($menus)): foreach($menus as $key=>$menu): ?><li>
                            <a class="tooltip-tip ajax-load" <?php if(empty($menu[child])): ?>href="/Admin/<?php echo ($menu[url]); ?>"<?php endif; ?> title="<?php echo ($menu[name]); ?>" target="mainframe">
                                <i class="<?php echo ((isset($menu['icon']) && ($menu['icon'] !== ""))?($menu['icon']):'icon-document-edit'); ?>"></i>
                                <span><?php echo ($menu[name]); ?></span>
                            </a>
                        <?php if(!empty($menu[child])): ?><ul>
                                <?php if(is_array($menu[child])): foreach($menu[child] as $key=>$childmenu): ?><li class="<?php if($this_menu == $menu[url]): ?>active<?php endif; ?>">
                                        <a class="tooltip-tip2 ajax-load" href="/Admin/<?php echo ($childmenu["url"]); ?>" title="<?php echo ($childmenu["name"]); ?>"><i class="<?php echo ((isset($menu['icon']) && ($menu['icon'] !== ""))?($menu['icon']):'entypo-doc-text'); ?>"></i><span><?php echo ($childmenu["name"]); ?></span></a>
                                    </li><?php endforeach; endif; ?>
                            </ul><?php endif; ?>
                        </li><?php endforeach; endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- END OF SIDE MENU -->



<!-- END OF SIDE MENU -->



<!--  PAPER WRAP -->
<div class="wrap-fluid">
    <div class="container-fluid paper-wrap bevel tlbr">
        
    <form action="<?php echo U('Admin/Rbac/setAccess');?>" method="post">
        <?php if(is_array($nodes)): foreach($nodes as $key=>$app): ?><div class="span12">
                <div class="box paint color_2 app">
                    <div class="title">
                        <div class="row-fluid">
                            <h4>
                                 <label class="checkbox "><input type="checkbox" name="access[]" value="<?php echo ($app["id"]); ?>_1" level="1" <?php if($app[access]): ?>checked='checked'<?php endif; ?> /><?php echo ($app["title"]); ?></label>
                            </h4>
                        </div>
                    </div>
                    <!-- End .title -->
                    <div class="content">
                        <div class="tabbable tabs-left">
                            <ul id="tabExample2" class="nav nav-tabs">
                                <?php if(is_array($app["child"])): foreach($app["child"] as $actionKey=>$action): ?><li <?php if($actionKey == 0): ?>class="active"<?php endif; ?>>
                                    <a href="#action<?php echo ($action["id"]); ?>" data-toggle="tab">
                                        <label class="checkbox "><?php echo ($action["title"]); ?></label>
                                    </a>
                                    </li><?php endforeach; endif; ?>
                            </ul>
                            <div class="tab-content">
                                <?php if(is_array($app["child"])): foreach($app["child"] as $actionKey=>$action): ?><div class="tab-pane fade <?php if($actionKey == 0): ?>in active<?php endif; ?>" id="action<?php echo ($action["id"]); ?>">
                                        <label class="checkbox "><input type="checkbox" name="access[]" value="<?php echo ($action["id"]); ?>_2" level="2" <?php if($action[access]): ?>checked='checked'<?php endif; ?>/>选择控制器</label>
                                        <?php if(is_array($action["child"])): foreach($action["child"] as $key=>$method): ?><label class="checkbox "><input type="checkbox" name="access[]" value="<?php echo ($method["id"]); ?>_3" level="3" <?php if($method[access]): ?>checked='checked'<?php endif; ?>/><?php echo ($method["title"]); ?></label><?php endforeach; endif; ?>
                                    </div><?php endforeach; endif; ?>
                            </div>
                        </div>
                    </div>
                    <!-- End .content --> 
                    <input type="hidden" value="<?php echo ($rid); ?>" name="rid" />
                    <a href="<?php echo U('Admin/Rbac/role');?>" class="btn btn-primary">返回</a>     
                    <button type="submit" class='btn btn-default'> 保存</button>
                </div>
                <!-- End  .box --> 

            </div><?php endforeach; endif; ?>
    </form>

    </div>
</div>
<!-- /END OF CONTENT -->


<!-- RIGHT SLIDER CONTENT -->

        <!-- RIGHT SLIDER CONTENT -->
<!--    <div class="sb-slidebar sb-right">
        <div class="right-wrapper">
            <div class="row">
                <h3>
                    <span><i class="entypo-gauge"></i>&nbsp;&nbsp;MAIN WIDGET</span>
                </h3>
                <div class="col-sm-12">

                    <div class="widget-knob">
                        <span class="chart" style="position:relative" data-percent="86">
                            <span class="percent"></span>
                        </span>
                    </div>
                    <div class="widget-def">
                        <b>Distance traveled</b>
                        <br>
                        <i>86% to the check point</i>
                    </div>

                    <div class="widget-knob">
                        <span class="speed-car" style="position:relative" data-percent="60">
                            <span class="percent2"></span>
                        </span>
                    </div>
                    <div class="widget-def">
                        <b>The average speed</b>
                        <br>
                        <i>30KM/h avarage speed</i>
                    </div>


                    <div class="widget-knob">
                        <span class="overall" style="position:relative" data-percent="25">
                            <span class="percent3"></span>
                        </span>
                    </div>
                    <div class="widget-def">
                        <b>Overall result</b>
                        <br>
                        <i>30KM/h avarage Result</i>
                    </div>
                </div>
            </div>
        </div>

        <div style="margin-top:0;" class="right-wrapper">
            <div class="row">
                <h3>
                    <span><i class="entypo-chat"></i>&nbsp;&nbsp;CHAT</span>
                </h3>
                <div class="col-sm-12">
                    <span class="label label-warning label-chat">Online</span>
                    <ul class="chat">
                        <li>
                            <a href="#">
                                <span>
                                    <img alt="" class="img-chat img-circle" src="http://api.randomuser.me/portraits/thumb/men/20.jpg">
                                </span><b>Dave Junior</b>
                                <br><i>Last seen : 08:00 PM</i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>
                                    <img alt="" class="img-chat img-circle" src="http://api.randomuser.me/portraits/thumb/men/21.jpg">
                                </span><b>Kenneth Lucas</b>
                                <br><i>Last seen : 07:21 PM</i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>
                                    <img alt="" class="img-chat img-circle" src="http://api.randomuser.me/portraits/thumb/men/22.jpg">
                                </span><b>Heidi Perez</b>
                                <br><i>Last seen : 05:43 PM</i>
                            </a>
                        </li>


                    </ul>

                    <span class="label label-chat">Offline</span>
                    <ul class="chat">
                        <li>
                            <a href="#">
                                <span>
                                    <img alt="" class="img-chat img-offline img-circle" src="http://api.randomuser.me/portraits/thumb/men/23.jpg">
                                </span><b>Dave Junior</b>
                                <br><i>Last seen : 08:00 PM</i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>
                                    <img alt="" class="img-chat img-offline img-circle" src="http://api.randomuser.me/portraits/thumb/women/24.jpg">
                                </span><b>Kenneth Lucas</b>
                                <br><i>Last seen : 07:21 PM</i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>
                                    <img alt="" class="img-chat img-offline img-circle" src="http://api.randomuser.me/portraits/thumb/men/25.jpg">
                                </span><b>Heidi Perez</b>
                                <br><i>Last seen : 05:43 PM</i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>
                                    <img alt="" class="img-chat img-offline img-circle" src="http://api.randomuser.me/portraits/thumb/women/25.jpg">
                                </span><b>Kenneth Lucas</b>
                                <br><i>Last seen : 07:21 PM</i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>
                                    <img alt="" class="img-chat img-offline img-circle" src="http://api.randomuser.me/portraits/thumb/men/26.jpg">
                                </span><b>Heidi Perez</b>
                                <br><i>Last seen : 05:43 PM</i>
                            </a>
                        </li>


                    </ul>
                </div>
            </div>
        </div>
    </div>-->

    <!-- END OF RIGHT SLIDER CONTENT-->

<!--  END RIGHT SLIDER CONTENT -->
<!-- FOOTER -->
 <!-- MAIN EFFECT -->
    <script type="text/javascript" src="/Public/Admin/js/preloader.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/bootstrap.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/app.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/load.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/main.js"></script>








    <!-- /MAIN EFFECT -->
    <!-- GAGE -->
    <script type="text/javascript" src="/Public/Admin/js/toggle_close.js"></script>
    <script src="/Public/Admin/js/footable/js/footable.js?v=2-0-1" type="text/javascript"></script>
    <script src="/Public/Admin/js/footable/js/footable.sort.js?v=2-0-1" type="text/javascript"></script>
    <script src="/Public/Admin/js/footable/js/footable.filter.js?v=2-0-1" type="text/javascript"></script>
    <script src="/Public/Admin/js/footable/js/footable.paginate.js?v=2-0-1" type="text/javascript"></script>
    <script src="/Public/Admin/js/common.js" type="text/javascript"></script>





    <script type="text/javascript">
    $(function() {
        $('.footable-res').footable();
    });
    </script>
    <script type="text/javascript">
    $(function() {
        $('#footable-res2').footable().bind('footable_filtering', function(e) {
            var selected = $('.filter-status').find(':selected').text();
            if (selected && selected.length > 0) {
                e.filter += (e.filter && e.filter.length > 0) ? ' ' + selected : selected;
                e.clear = !e.filter;
            }
        });

        $('.clear-filter').click(function(e) {
            e.preventDefault();
            $('.filter-status').val('');
            $('table.demo').trigger('footable_clear_filter');
        });

        $('.filter-status').change(function(e) {
            e.preventDefault();
            $('table.demo').trigger('footable_filter', {
                filter: $('#filter').val()
            });
        });

        $('.filter-api').click(function(e) {
            e.preventDefault();

            //get the footable filter object
            var footableFilter = $('table').data('footable-filter');

            alert('about to filter table by "tech"');
            //filter by 'tech'
            footableFilter.filter('tech');

            //clear the filter
            if (confirm('clear filter now?')) {
                footableFilter.clearFilter();
            }
        });
    });
    </script>
<!-- / END OF FOOTER -->
<!--  END OF PAPER WRAP -->




    <script type="text/javascript">
        $(function () {
            $('input[level=1]').click(function () {
                var inputs = $(this).parents('.app').find('input');
                $(this).prop('checked') ? inputs.prop('checked', 'checked').parent('span').addClass('checked') : inputs.prop('checked', false).parent('span').removeClass('checked');
            });
            $('input[level=2]').click(function () {
                var inputs = $(this).parents('.tab-pane').find('input');
                $(this).prop('checked') ? inputs.prop('checked', 'checked').parent('span').addClass('checked') : inputs.prop('checked', false).parent('span').removeClass('checked');
            });

        });
    </script>


</body>
</html>