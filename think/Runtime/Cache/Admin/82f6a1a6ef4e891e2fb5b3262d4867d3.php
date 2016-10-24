<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html class="sidebar_default  no-js" lang="en">
    <head>
      <meta charset="utf-8">
<title><?php echo ($title); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="/Public/Admin/css/images/favicon.png">
<!-- Le styles -->
<link href="/Public/Admin/js/plugins/chosen/chosen/chosen.css" rel="stylesheet">
<link href="/Public/Admin/css/twitter/bootstrap.css" rel="stylesheet">
<link href="/Public/Admin/css/base.css" rel="stylesheet">
<link href="/Public/Admin/css/twitter/responsive.css" rel="stylesheet">
<link href="/Public/Admin/css/jquery-ui-1.8.23.custom.css" rel="stylesheet">
<link href="/Public/Admin/css/font-awesome.min.css" rel="stylesheet">
<link href="/Public/Admin/css/common.css" rel="stylesheet">
<script src="/Public/Admin/js/plugins/modernizr.custom.32549.js"></script>
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->
      

    </head>

    <body>
        <div id="loading"><img src="/Public/Admin/img/ajax-loader.gif"></div>
        <div id="responsive_part">
            <div class="logo"> <a href="index.html"><span>Start</span><span class="icon"></span></a> </div>
            <ul class="nav responsive">
                <li>
                    <button class="btn responsive_menu icon_item" data-toggle="collapse" data-target=".overview"> <i class="icon-reorder"></i> </button>
                </li>
            </ul>
        </div>
        <!-- Responsive part -->

        <!--左边栏-->
    
        <div id="sidebar" class="">
    <div class="scrollbar">
        <div class="track">
            <div class="thumb">
                <div class="end"></div>
            </div>
        </div>
    </div>
    <div class="viewport ">
        <div class="overview collapse">
            <div class="search row-fluid container">
                <h2>搜索</h2>
                <form class="form-search">
                    <div class="input-append">
                        <input type="text" class=" search-query" placeholder="">
                        <button class="btn_search color_4">查找</button>
                    </div>
                </form>
            </div>
            <ul id="sidebar_menu" class="navbar nav nav-list container full">
                <!--backmenu start-->
                <?php if(is_array($menus)): foreach($menus as $key=>$menu): ?><li class="accordion-group <?php if($this_menu == $menu[url]): ?>active<?php endif; ?> <?php echo ((isset($menu['class']) && ($menu['class'] !== ""))?($menu['class']):'color_4'); ?>">
                        <a <?php if(!empty($menu[child])): ?>class="accordion-toggle widgets collapsed " data-toggle="collapse" data-parent="#sidebar_menu" href="#collapse<?php echo ($menu['id']); ?>"<?php else: ?>class="dashboard"<?php endif; ?> href="/Admin/<?php echo ($menu[url]); ?>">
                            <img src="/Public/Admin/img/menu_icons/<?php echo ($menu[icon]); ?>"><span><?php echo ($menu[name]); ?></span>
                        </a>
                    <?php if(!empty($menu[child])): ?><ul id="collapse<?php echo ($menu['id']); ?>" class="accordion-body <?php if($this_menu == $menu[url]): ?>in<?php endif; ?> collapse">
                            <?php if(is_array($menu[child])): foreach($menu[child] as $key=>$childmenu): ?><li <?php if($this_child_menu == $childmenu[url]): ?>class="active"<?php endif; ?>><a href="/Admin/<?php echo ($childmenu["url"]); ?>"><?php echo ($childmenu["name"]); ?></a></li><?php endforeach; endif; ?>
                        </ul><?php endif; ?>
                    </li><?php endforeach; endif; ?>
                <!--backmenu end-->
            </ul>
            
            <div class="menu_states row-fluid container ">
                <h2 class="pull-left">菜单设置</h2>
                <div class="options pull-right">
                    <button id="menu_state_1" class="color_4" rel="tooltip" data-state ="sidebar_icons" data-placement="top" data-original-title="菜单图标">1</button>
                    <button id="menu_state_2" class="color_4 active" rel="tooltip" data-state ="sidebar_default" data-placement="top" data-original-title="固定菜单">2</button>
                    <button id="menu_state_3" class="color_4" rel="tooltip" data-placement="top" data-state ="sidebar_hover" data-original-title="菜单浮动">3</button>
                </div>
            </div>
            <!-- End sidebar_box --> 

        </div>
    </div>
</div>
    

    <!--body-->
    <div id="main">
        <div class="container">
            
                  <div class="header row-fluid">
    <div class="logo"> <a href="/Admin"><span>首页</span><span class="icon"></span></a> </div>
    <div class="top_right">
        <ul class="nav nav_menu">
            <li class="dropdown"> <a class="dropdown-toggle administrator" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
                    <div class="title"><span class="name">George</span><span class="subtitle">Future Buyer</span></div>
                    <span class="icon"><img src="img/thumbnail_george.jpg"></span></a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                    <li><a href="profile.html"><i class=" icon-user"></i> My Profile</a></li>
                    <li><a href="forms_general.html"><i class=" icon-cog"></i>Settings</a></li>
                    <li><a href="<?php echo U('Login/logout');?>"><i class=" icon-unlock"></i>Log Out</a></li>
                    <li><a href="search.html"><i class=" icon-flag"></i>Help</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- End top-right --> 
</div>
            
            
    <div id="main_container">
        <div class="row-fluid ">
            <div class="span12">
                <div class="box paint color_18">
                    <div class="title">
                        <h4> <i class="icon-bar-chart"></i><span><?php echo ($title); ?></span> </h4>
                    </div>
                    <!-- End .title -->
                    <div class="content top">
                        <form name="listForm">
                            <table id="datatable_example" class="responsive table table-striped table-bordered" style="width:100%;margin-bottom:0; ">
                                <thead>
                                    <tr>
                                        <th>用户ID</th>
                                        <th>用户名</th>
                                        <th>登陆次数</th>
                                        <th>登陆时间</th>
                                        <th>是否锁定</th>
                                        <th>用户角色</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--list contents start-->
                                <?php if(!empty($list)): if(is_array($list)): foreach($list as $key=>$user): ?><tr>
                                            <td>[<?php echo ($user["id"]); ?>]</td>
                                            <td><?php echo ($user["username"]); ?></td>
                                            <td><?php echo ($user["logins"]); ?></td>
                                            <td><?php echo (date('y-m-d H:i',$user["last_login"])); ?></td>
                                            <td>
                                        <?php if($user["is_active"] == 1): ?>[启用]
                                            <?php else: ?>[锁定]<?php endif; ?>
                                        </td>
                                        <td>
                                            <ul>
                                                <?php if($user['username'] == C('RBAC_SUPERADMIN')): ?>系统管理员
                                                    <?php else: ?>         
                                                    <?php if(is_array($user["roles"])): foreach($user["roles"] as $key=>$role): ?><li>
                                                            <?php echo ($role["name"]); ?>(<?php echo ($role["remark"]); ?>)
                                                        </li><?php endforeach; endif; endif; ?>
                                            </ul>
                                        </td>
                                        <td class="ms">
                                         <?php if($user['username'] != C('RBAC_SUPERADMIN')): ?><div class="btn-group"> 
                                                <?php if($user["is_active"] == 1): ?><a class="btn btn-small" rel="tooltip" data-placement="left" data-original-title=" 锁定 "  href="<?php echo U('Admin/Rbac/setActive',array('id'=>$user['id'],'value'=>0));?>"><i class="gicon-edit"></i></a>
                                                    <?php else: ?> 
                                                    <a class="btn btn-small" rel="tooltip" data-placement="left" data-original-title=" 启用 "  href="<?php echo U('Admin/Rbac/setActive',array('id'=>$user['id'],'value'=>1));?>"><i class="gicon-edit"></i></a><?php endif; ?>
                                                <a class="btn btn-small" rel="tooltip" data-placement="left" data-original-title=" 编辑 " href="<?php echo U('Admin/Rbac/editUser',array('id'=>$user['id']));?>"><i class="gicon-edit"></i></a> 
                                                <a class="btn  btn-small" rel="tooltip" data-placement="bottom" data-original-title="删除"  onclick="return confirm('是否确定要删除?');" href="<?php echo U('Admin/Rbac/deleteUser',array('id'=>$user['id']));?>"><i class="gicon-remove "></i></a> 
                                            </div><?php endif; ?>
                                        </td>
                                        </tr><?php endforeach; endif; ?>

                                    <?php else: ?>
                                    <tr>
                                        <td cols="7">暂无数据</td>
                                    </tr><?php endif; ?>
                                <!--list contents end-->
                                </tbody>
                            </table>
                        </form>
                        <div class="row-fluid  control-group mt15">
                            <div class="pull-left span6 visible-desktop" action="#">
                                <div class="row-fluid fluid ">
                                    <a class="btn" href="<?php echo U('addUser');?>">新 增</a>
                                </div>
                            </div>
                            <div class="span6">
                                <div class="pagination pull-right ">
                                    <?php echo ($page); ?>
                                </div >
                            </div>
                        </div>
                    </div>
                    <!-- End row-fluid --> 
                </div>
                <!-- End .content --> 
            </div>
            <!-- End box --> 
        </div>
        <!-- End .span12 --> 
    </div>

        </div>
    </div>
    <div class="background_changer dropdown">
  <div class="dropdown" id="colors_pallete"> <a data-toggle="dropdown" data-target="drop4" class="change_color"></a>
    <ul  class="dropdown-menu pull-left" role="menu" aria-labelledby="drop4">
      <li><a data-color="color_0" class="color_0" tabindex="-1">1</a></li>
      <li><a data-color="color_1" class="color_1" tabindex="-1">1</a></li>
      <li><a data-color="color_2" class="color_2" tabindex="-1">2</a></li>
      <li><a data-color="color_3" class="color_3" tabindex="-1">3</a></li>
      <li><a data-color="color_4" class="color_4" tabindex="-1">4</a></li>
      <li><a data-color="color_5" class="color_5" tabindex="-1">5</a></li>
      <li><a data-color="color_6" class="color_6" tabindex="-1">6</a></li>
      <li><a data-color="color_7" class="color_7" tabindex="-1">7</a></li>
      <li><a data-color="color_8" class="color_8" tabindex="-1">8</a></li>
      <li><a data-color="color_9" class="color_9" tabindex="-1">9</a></li>
      <li><a data-color="color_10" class="color_10" tabindex="-1">10</a></li>
      <li><a data-color="color_11" class="color_11" tabindex="-1">10</a></li>
      <li><a data-color="color_12" class="color_12" tabindex="-1">12</a></li>
      <li><a data-color="color_13" class="color_13" tabindex="-1">13</a></li>
      <li><a data-color="color_14" class="color_14" tabindex="-1">14</a></li>
      <li><a data-color="color_15" class="color_15" tabindex="-1">15</a></li>
      <li><a data-color="color_16" class="color_16" tabindex="-1">16</a></li>
      <li><a data-color="color_17" class="color_17" tabindex="-1">17</a></li>
      <li><a data-color="color_18" class="color_18" tabindex="-1">18</a></li>
      <li><a data-color="color_19" class="color_19" tabindex="-1">19</a></li>
      <li><a data-color="color_20" class="color_20" tabindex="-1">20</a></li>
      <li><a data-color="color_21" class="color_21" tabindex="-1">21</a></li>
      <li><a data-color="color_22" class="color_22" tabindex="-1">22</a></li>
      <li><a data-color="color_23" class="color_23" tabindex="-1">23</a></li>
      <li><a data-color="color_24" class="color_24" tabindex="-1">24</a></li>
      <li><a data-color="color_25" class="color_25" tabindex="-1">25</a></li>
    </ul>
  </div>
</div>
     <!-- General scripts --> 
<script src="/Public/Admin/js/jquery.js" type="text/javascript"></script> 
<!--[if !IE]> -->
<script src="/Public/Admin/js/plugins/enquire.min.js" type="text/javascript"></script> 
<!-- <![endif]-->
<!-- <![endif]-->
<!--[if lt IE 7]>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE7.js"></script>
<![endif]-->
<script language="javascript" type="text/javascript" src="/Public/Admin/js/plugins/jquery.sparkline.min.js"></script> 
<script src="/Public/Admin/js/plugins/excanvas.compiled.js" type="text/javascript"></script> 

<!-- Modal Concept --> 
<script language="javascript" type="text/javascript" src="/Public/Admin/js/plugins/avgrund.js"></script> 
<script src="/Public/Admin/js/bootstrap-transition.js" type="text/javascript"></script> 
<script src="/Public/Admin/js/bootstrap-alert.js" type="text/javascript"></script> 
<script src="/Public/Admin/js/bootstrap-modal.js" type="text/javascript"></script> 
<script src="/Public/Admin/js/bootstrap-dropdown.js" type="text/javascript"></script> 
<script src="/Public/Admin/js/bootstrap-scrollspy.js" type="text/javascript"></script> 
<script src="/Public/Admin/js/bootstrap-tab.js" type="text/javascript"></script> 
<script src="/Public/Admin/js/bootstrap-tooltip.js" type="text/javascript"></script> 
<script src="/Public/Admin/js/bootstrap-popover.js" type="text/javascript"></script> 
<script src="/Public/Admin/js/bootstrap-button.js" type="text/javascript"></script> 
<script src="/Public/Admin/js/bootstrap-collapse.js" type="text/javascript"></script> 
<script src="/Public/Admin/js/bootstrap-carousel.js" type="text/javascript"></script> 
<script src="/Public/Admin/js/bootstrap-typeahead.js" type="text/javascript"></script> 
<script src="/Public/Admin/js/bootstrap-affix.js" type="text/javascript"></script> 
<script src="/Public/Admin/js/fileinput.jquery.js" type="text/javascript"></script> 
<script src="/Public/Admin/js/jquery-ui-1.8.23.custom.min.js" type="text/javascript"></script> 
<script src="/Public/Admin/js/jquery.touchdown.js" type="text/javascript"></script> 
<script language="javascript" type="text/javascript" src="/Public/Admin/js/plugins/jquery.uniform.min.js"></script> 
<script language="javascript" type="text/javascript" src="/Public/Admin/js/plugins/jquery.tinyscrollbar.min.js"></script> 
<script language="javascript" type="text/javascript" src="/Public/Admin/js/jnavigate.jquery.min.js"></script> 
<script language="javascript" type="text/javascript" src="/Public/Admin/js/jquery.touchSwipe.min.js"></script> 
<script language="javascript" type="text/javascript" src="/Public/Admin/js/plugins/jquery.peity.min.js"></script> 
<script language="javascript" type="text/javascript" src="/Public/Admin/js/plugins/chosen/chosen/chosen.jquery.min.js"></script> 


<!-- Flot charts --> 
<script language="javascript" type="text/javascript" src="/Public/Admin/js/plugins/flot/jquery.flot.js"></script> 
<script language="javascript" type="text/javascript" src="/Public/Admin/js/plugins/flot/jquery.flot.resize.js"></script> 

<!-- Data tables --> 
<script type="text/javascript" language="javascript" src="/Public/Admin/js/plugins/datatables/js/jquery.dataTables.js"></script> 

<!-- Task plugin --> 
<!--<script language="javascript" type="text/javascript" src="/Public/Admin/js/plugins/knockout-2.0.0.js"></script> -->

<!-- Custom made scripts for this template --> 
<script src="/Public/Admin/js/scripts.js" type="text/javascript"></script> 
<script src="/Public/Admin/js/admin.js" type="text/javascript"></script> 
<script src="/Public/Admin/js/common.js" type="text/javascript"></script>
<!-- End .background_changer -->
    
</body>
</html>