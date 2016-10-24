//引入外部js
function include(path) {
    var a = document.createElement("script");
    a.type = "text/javascript";
    a.src = path;
    var head = document.getElementsByTagName("head")[0];
    head.prepend(a);
}

//引入layer
//include("/Public/static/layer/layer.js");
$(function () {
//表单提交
    $(".btn-submit").click(function () {
        var _this = $(this);
        var form = _this.data('for');
        var str = _this.data('verify');
        var data = $("." + form).serializeArray();
        var len = data.length;
        var submit = true;
        if (str) {
            if (str == 'all') {
                for (var i = 0; i < len; i++) {
                    if (!data[i]['value']) {
                        submit = false;
                        break;
                    }
                }
            } else {
                var datas = new Array();
                datas = str.split(",");
                for (i = 0; i < datas.length; i++)
                {
                    if (datas[i] && !data[datas[i]]['value']) {
                        submit = false;
                        break;
                    }
                }
            }
        }

        if (submit) {
            if (_this.hasClass('ajax-post')) {
                $.ajax({
                    url: $("." + form).attr('action'),
                    data: data,
                    type: 'post',
                    dataType: 'json',
                    success: function (data) {
                        layer.msg(data['info']);
                        data['url'] && setTimeout("location.href = '" + data['url'] + "'", 2000);
                    }
                })
            } else {
                $("." + form).submit();
            }

        } else {
            layer.msg("有数据未完善，请填写完整再提交！");
        }
    })

    //全选的实现
    $(".check-all").click(function () {
        this.checked ? $(".ids").parent('span').addClass('checked') : $(".ids").parent('span').removeClass('checked');
        $(".ids").prop("checked", this.checked);
    });
    $(".ids").click(function () {
        var option = $(".ids");
        option.each(function (i) {
            if (!this.checked) {
                $(".check-all").prop("checked", false);
                $(".check-all").parent('span').removeClass('checked')
                return false;
            } else {
                $(".check-all").prop("checked", true);
                $(".check-all").parent('span').addClass('checked')
            }
        });
    });

    //全部删除
    $('.delete-all').click(function () {
        var url = $(this).attr('url');
        var ids = $('.ids:checked');
        var param = '';
        if (ids.length > 0) {
            var str = new Array();
            ids.each(function () {
                str.push($(this).val());
            });
            param = str.join(',');
        }

        if (url != undefined && url != '' && param != '') {
            window.location.href = url + '?id=' + param;
        }
    });

})