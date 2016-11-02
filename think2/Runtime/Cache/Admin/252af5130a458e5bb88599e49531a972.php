<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html class="sidebar_default  no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <title>Start - Admin Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="/Public/Admin/css/images/favicon.png">
        <!-- Le styles -->
        <link href="/Public/Admin/css/twitter/bootstrap.css" rel="stylesheet">
        <link href="/Public/Admin/css/base.css" rel="stylesheet">
        <link href="/Public/Admin/css/twitter/responsive.css" rel="stylesheet">
        <link href="/Public/Admin/css/jquery-ui-1.8.23.custom.css" rel="stylesheet">
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
                        <h2>Search</h2>
                        <form class="form-search">
                            <div class="input-append">
                                <input type="text" class=" search-query" placeholder="">
                                <button class="btn_search color_4">Search</button>
                            </div>
                        </form>
                    </div>
                    <ul id="sidebar_menu" class="navbar nav nav-list container full">
                        <li class="accordion-group active color_4"> <a class="dashboard " href="index.html"><img src="/Public/Admin/img/menu_icons/dashboard.png"><span>Dashboard</span></a> </li>
                        <li class="accordion-group color_7"> <a class="accordion-toggle widgets collapsed " data-toggle="collapse" data-parent="#sidebar_menu" href="#collapse1"> <img src="/Public/Admin/img/menu_icons/forms.png"><span>Form Elements</span></a>
                            <ul id="collapse1" class="accordion-body collapse">
                                <li><a href="forms_general.html">General</a></li>
                                <li><a href="forms_wizard.html">Wizards</a></li>
                                <li><a href="forms_validation.html">Validation</a></li>
                                <li><a href="forms_editor.html">Editor</a></li>
                            </ul>
                        </li>
                        <li class="accordion-group color_3"> <a class="accordion-toggle widgets collapsed" data-toggle="collapse" data-parent="#sidebar_menu" href="#collapse2"> <img src="/Public/Admin/img/menu_icons/widgets.png"><span>UI Widgets</span></a>
                            <ul id="collapse2" class="accordion-body collapse">
                                <li><a href="ui_buttons.html">Buttons</a></li>
                                <li><a href="ui_dialogs.html">Dialogs</a></li>
                                <li><a href="ui_icons.html">Icons</a></li>
                                <li><a href="ui_tabs.html">Tabs</a></li>
                                <li><a href="ui_accordion.html">Accordion</a></li>
                            </ul>
                        </li>
                        <li class="color_13"> <a class="widgets" href="calendar2.html"> <img src="/Public/Admin/img/menu_icons/calendar.png"><span>Calendar</span></a> </li>
                        <li class="color_10"> <a class="widgets"data-parent="#sidebar_menu" href="maps.html"> <img src="/Public/Admin/img/menu_icons/maps.png"><span>Maps</span></a> </li>
                        <li class="accordion-group color_12"> <a class="accordion-toggle widgets collapsed" data-toggle="collapse" data-parent="#sidebar_menu" href="#collapse3"> <img src="/Public/Admin/img/menu_icons/tables.png"><span>Tables</span></a>
                            <ul id="collapse3" class="accordion-body collapse">
                                <li><a href="tables_static.html">Static</a></li>
                                <li><a href="tables_dynamic.html">Dynamics</a></li>
                            </ul>
                        </li>
                        <li class="accordion-group color_19"> <a class="accordion-toggle widgets collapsed" data-toggle="collapse" data-parent="#sidebar_menu" href="#collapse4"> <img src="/Public/Admin/img/menu_icons/statistics.png"><span>Charts</span></a>
                            <ul id="collapse4" class="accordion-body collapse">
                                <li><a href="statistics.html">Statistics Elements</a></li>
                                <li><a href="charts.html">Charts</a></li>
                            </ul>
                        </li>
                        <li class="color_24"> <a class="widgets"data-parent="#sidebar_menu" href="grid.html"> <img src="/Public/Admin/img/menu_icons/grid.png"><span>Grid</span></a> </li>
                        <li class="color_8"> <a class="widgets"data-parent="#sidebar_menu" href="media.html"> <img src="/Public/Admin/img/menu_icons/gallery.png"><span>Media</span></a> </li>
                        <li class="color_4"> <a class="widgets"data-parent="#sidebar_menu" href="file_explorer.html"> <img src="/Public/Admin/img/menu_icons/explorer.png"><span>File Explorer</span> <!--  --></a> </li>
                        <li class="accordion-group color_25"> <a class="accordion-toggle widgets collapsed" data-toggle="collapse" data-parent="#sidebar_menu" href="#collapse5"> <img src="/Public/Admin/img/menu_icons/others.png"><span>Specific Pages</span></a>
                            <ul id="collapse5" class="accordion-body collapse">
                                <li><a href="profile.html">Profile</a></li>
                                <li><a href="search.html">Search</a></li>
                                <li><a href="index2.html">Login</a></li>
                                <li><a href="404.html">404 Error</a></li>
                                <li ><a href="blog.html">Blog</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="menu_states row-fluid container ">
                        <h2 class="pull-left">Menu Settings</h2>
                        <div class="options pull-right">
                            <button id="menu_state_1" class="color_4" rel="tooltip" data-state ="sidebar_icons" data-placement="top" data-original-title="Icon Menu">1</button>
                            <button id="menu_state_2" class="color_4 active" rel="tooltip" data-state ="sidebar_default" data-placement="top" data-original-title="Fixed Menu">2</button>
                            <button id="menu_state_3" class="color_4" rel="tooltip" data-placement="top" data-state ="sidebar_hover" data-original-title="Floating on Hover Menu">3</button>
                        </div>
                    </div>
                    <!-- End sidebar_box --> 

                </div>
            </div>
        </div>
        
        <!-- End .background_changer -->
    </div>
    <!-- /container --> 

    <!-- Le javascript
        ================================================== --> 
    <!-- General scripts --> 
    <script src="/Public/Admin/js/jquery.js" type="text/javascript"></script> 
    <!--[if !IE]> -->
    <!--[if !IE]> -->
    <script src="/Public/Admin/js/plugins/enquire.min.js" type="text/javascript"></script> 
    <!-- <![endif]-->
    <!-- <![endif]-->
    <!--[if lt IE 7]>
    <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE7.js"></script>
    <![endif]-->
    <script language="javascript" type="text/javascript" src="/Public/Admin/js/plugins/jquery.sparkline.min.js"></script> 
    <script src="/Public/Admin/js/plugins/excanvas.compiled.js"></script>
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

    <!-- Flot charts --> 
    <script language="javascript" type="text/javascript" src="/Public/Admin/js/plugins/flot/jquery.flot.js"></script> 
    <script language="javascript" type="text/javascript" src="/Public/Admin/js/plugins/flot/jquery.flot.resize.js"></script> 

    <!-- Data tables --> 
    <script type="text/javascript" language="javascript" src="/Public/Admin/js/plugins/datatables//Public/Admin/js/jquery.dataTables.js"></script> 

    <!-- Task plugin --> 
    <script language="javascript" type="text/javascript" src="/Public/Admin/js/plugins/knockout-2.0.0.js"></script> 

    <!-- Custom made scripts for this template --> 
    <script src="/Public/Admin/js/scripts.js" type="text/javascript"></script> 
    <script type="text/javascript">
/**** Specific JS for this page ****/
/* Todo Plugin */
var todo_data = [
    {id: 1, title: "<i class='gicon-gift icon-white'><\/i>Have tea with the Queen", isDone: false},
    {id: 2, title: "<i class='gicon-briefcase icon-white'><\/i>Steal  James Bond car", isDone: true},
    {id: 3, title: "<i class='gicon-heart icon-white'><\/i>Confirm that this template is awesome", isDone: false},
    {id: 4, title: "<i class='gicon-thumbs-up icon-white'><\/i>Nothing", isDone: false},
    {id: 5, title: "<i class='gicon-fire icon-white'><\/i>Play solitaire", isDone: false}
];


function Task(data) {
    this.title = ko.observable(data.title);
    this.isDone = ko.observable(data.isDone);
    this.isEditing = ko.observable(data.isEditing);

    this.startEdit = function (event) {
        console.log("editing");
        this.isEditing(true);
    }

    this.updateTask = function (task) {
        this.isEditing(false);
    }
}

function TaskListViewModel() {
    // Data
    var self = this;
    self.tasks = ko.observableArray([]);
    self.newTaskText = ko.observable();
    self.incompleteTasks = ko.computed(function () {
        return ko.utils.arrayFilter(self.tasks(),
                function (task) {
                    return !task.isDone() && !task._destroy;
                });
    });

    self.completeTasks = ko.computed(function () {
        return ko.utils.arrayFilter(self.tasks(),
                function (task) {
                    return task.isDone() && !task._destroy;
                });
    });

    // Operations
    self.addTask = function () {
        self.tasks.push(new Task({title: this.newTaskText(), isEditing: false}));

        self.newTaskText("");

    };
    self.removeTask = function (task) {
        self.tasks.destroy(task)
    };

    self.removeCompleted = function () {
        self.tasks.destroyAll(self.completeTasks());
    };

    /* Load the data */
    var mappedTasks = $.map(todo_data, function (item) {
        return new Task(item);
    });

    self.tasks(mappedTasks);
}

ko.applyBindings(new TaskListViewModel());
//End Todo Plugin

    </script><script type="text/javascript">

        //Chart - Campaigns
        $(function () {
            var data_campaigns = [[1, 10], [2, 9], [3, 8], [4, 6], [5, 5], [6, 3], [7, 9], [8, 10], [9, 12], [10, 14], [11, 15], [12, 13], [13, 11], [14, 10], [15, 9], [16, 8], [17, 12], [18, 14], [19, 16], [20, 19], [21, 20], [22, 20], [23, 19], [24, 17], [25, 15], [25, 14], [26, 12], [27, 10], [28, 8], [29, 10], [30, 12], [31, 10], [32, 9], [33, 8], [34, 6], [35, 5], [36, 3], [37, 9], [38, 10], [39, 12], [40, 14], [41, 15], [42, 13], [43, 11], [44, 10], [45, 9], [46, 8], [47, 12], [48, 14], [49, 16], [50, 12], [51, 10], [52, 9], [53, 8], [54, 6], [55, 5], [56, 3], [57, 9], [58, 10], [59, 12], [60, 14], [61, 15], [62, 13], [63, 11], [64, 10], [65, 9], [66, 8], [67, 12], [68, 14], [69, 16]];
            var data_campaigns2 = [[1, 12], [2, 10], [3, 9], [4, 8], [5, 8], [6, 8], [7, 8], [8, 8], [9, 9], [10, 9], [11, 10], [12, 11], [13, 12], [14, 11], [15, 10], [16, 10], [17, 9], [18, 10], [19, 11], [20, 11], [21, 12], [22, 13], [23, 14], [24, 13], [25, 12], [25, 12], [26, 11], [27, 10], [28, 9], [29, 8], [30, 7], [31, 7], [32, 8], [33, 8], [34, 7], [35, 6], [36, 6], [37, 7], [38, 8], [39, 8], [40, 9], [41, 10], [42, 11], [43, 11], [44, 12], [45, 12], [46, 11], [47, 10], [48, 9], [49, 8], [50, 8], [51, 9], [52, 10], [53, 11], [54, 12], [55, 12], [56, 12], [57, 13], [58, 13], [59, 12], [60, 11], [61, 10], [62, 9], [63, 8], [64, 7], [65, 7], [66, 6], [67, 5], [68, 4], [69, 3]];

            var plot = $.plot($("#placeholder"),
                    [{data: data_campaigns, color: "rgba(0,0,0,0.2)", shadowSize: 0,
                            bars: {
                                show: true,
                                lineWidth: 0,
                                fill: true,
                                fillColor: {colors: [{opacity: 1}, {opacity: 1}]}
                            }
                        },
                        {data: data_campaigns2,
                            color: "rgba(255,255,255, 0.4)",
                            shadowSize: 0,
                            lines: {show: true, fill: false}, points: {show: false},
                            bars: {show: false}
                        }
                    ],
                    {
                        series: {
                            bars: {show: true, barWidth: 0.6}
                        },
                        grid: {show: false, hoverable: true, clickable: false, autoHighlight: true, borderWidth: 0},
                        yaxis: {min: 0, max: 20}

                    });

            function showTooltip(x, y, contents) {
                $('<div id="tooltip"><div class="date">12 Nov 2012<\/div><div class="title text_color_3">' + x / 10 + '%<\/div> <div class="description text_color_3">CTR<\/div><div class="title ">' + x * 12 + '<\/div><div class="description">Impressions<\/div><\/div>').css({
                    position: 'absolute',
                    display: 'none',
                    top: y - 125,
                    left: x - 40,
                    border: '0px solid #ccc',
                    padding: '2px 6px',
                    'background-color': '#fff',
                    opacity: 10
                }).appendTo("body").fadeIn(200);
            }

            var previousPoint = null;
            $("#placeholder").bind("plothover", function (event, pos, item) {
                $("#x").text(pos.x.toFixed(2));
                $("#y").text(pos.y.toFixed(2));
                if (item) {
                    if (previousPoint != item.dataIndex) {
                        previousPoint = item.dataIndex;
                        $("#tooltip").remove();
                        var x = item.datapoint[0].toFixed(2),
                                y = item.datapoint[1].toFixed(2);
                        showTooltip(item.pageX, item.pageY,
                                x);
                    }
                }
            });

            //Fundraisers chart
            var data_fund = [[1, 10], [2, 9], [3, 8], [4, 6], [5, 5], [6, 3], [7, 9], [8, 10], [9, 12], [10, 14], [11, 15], [12, 13], [13, 11], [14, 10], [15, 9], [16, 8], [17, 12], [18, 14], [19, 16], [20, 19], [21, 20], [22, 20], [23, 19], [24, 17], [25, 15], [25, 14], [26, 12], [27, 10], [28, 8], [29, 10], [30, 12], [31, 10], [32, 9], [33, 8], [34, 6], [35, 5], [36, 3], ];
            $.plot($("#placeholder2"),
                    [{data: data_fund, color: "#fff", shadowSize: 0,
                            bars: {
                                show: true,
                                lineWidth: 0,
                                fill: true,
                                highlight: {
                                    opacity: 0.3
                                },
                                fillColor: {colors: [{opacity: 1}, {opacity: 1}]}
                            }
                        }
                    ],
                    {
                        series: {
                            bars: {show: true, barWidth: 0.6}
                        },
                        grid: {show: false, hoverable: true, clickable: false, autoHighlight: true, borderWidth: 0},
                        yaxis: {min: 0, max: 23}

                    });

            function showTooltip2(x, y, contents) {
                $('<div id="tooltip"><div class="title ">' + x * 2 + '</div><div class="description">Impressions</div></div>').css({
                    position: 'absolute',
                    display: 'none',
                    top: y - 58,
                    left: x - 40,
                    border: '0px solid #ccc',
                    padding: '2px 6px',
                    'background-color': '#fff',
                    opacity: 10
                }).appendTo("body").fadeIn(200);
            }

            var previousPoint = null;
            $("#placeholder2").bind("plothover", function (event, pos, item) {
                $("#x").text(pos.x.toFixed(2));
                $("#y").text(pos.y.toFixed(2));
                if (item) {
                    if (previousPoint != item.dataIndex) {
                        previousPoint = item.dataIndex;
                        $("#tooltip").remove();
                        var x = item.datapoint[0].toFixed(2),
                                y = item.datapoint[1].toFixed(2);
                        showTooltip2(item.pageX, item.pageY,
                                x);
                    }
                }
            });
            //Envato chart
            $.plot($("#placeholder3"),
                    [{data: data_fund, color: "rgba(0,0,0,0.2)", shadowSize: 0,
                            bars: {
                                lineWidth: 0,
                                fill: true,
                                fillColor: {colors: [{opacity: 1}, {opacity: 1}]}
                            },
                            lines: {show: false, fill: true}, points: {show: false}}
                    ],
                    {
                        series: {
                            bars: {show: true, barWidth: 0.6}
                        },
                        grid: {show: false, hoverable: true, clickable: false, autoHighlight: true, borderWidth: 0},
                        yaxis: {min: 0, max: 23}

                    });
            //Facebook chart
            $.plot($("#placeholder4"),
                    [{data: data_fund, color: "rgba(0,0,0,0.2)", shadowSize: 0,
                            bars: {
                                lineWidth: 0,
                                fill: true,
                                fillColor: {colors: [{opacity: 1}, {opacity: 1}]}
                            },
                            lines: {show: false, fill: true}, points: {show: false}
                        }
                    ],
                    {
                        series: {
                            bars: {show: true, barWidth: 0.6}
                        },
                        grid: {show: false, hoverable: true, clickable: false, autoHighlight: true, borderWidth: 0},
                        yaxis: {min: 0, max: 23}
                    });
            // End Fundraiser chart
        });




    </script>
</body>
</html>