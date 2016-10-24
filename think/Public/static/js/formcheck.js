/*检测表单填写字段
 * str为表单中填写的值
 * 
 */
function checkIsEmpty(val) {
    if (val == "") {
        return false;
    } else {
        return true;
    }
}
//匹配正整数
function checkNumber(str) {
    var pattern = /^\d+$/g;
    if (!pattern.test(str)) {
        return false;
    } else {
        return true;
    }
}
//验证普通座机电话
function checkPhonePublic(val) {
    var patrn = /^[+]{0,1}(\d){1,3}[ ]?([-]?((\d)|[ ]){1,12})+$/;
    if (!patrn.test(val)) {
        return false;
    } else {
        return true;
    }
}
//验证手机号码
function checkPhone(val) {
    var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
    if (!myreg.test(val)) {
        return false;
    } else {
        return true;
    }
}

//中英文字符验证 
function checkCharacter(val) {
    var pattern = /^[\u4e00-\u9fa5a-zA-Z]+$/;
    if (!pattern.test(val)) {
        return false;
    } else {
        return true;
    }

}

//QQ号验证
function checkQQ(val) {
    var re = /^[1-9][0-9]{4,}$/;
    if (!re.test(val)) {
        return false;
    } else {
        return true;
    }
}
//验证密码
//只能输入6-20个字母、数字、下划线
function checkPasswordPublic(val) {
    var patrn = /^(\w){6,20}$/;
    if (patrn.test(val)) {
        return true;
    } else {
        return false;
    }
}

//检测邮箱
function checkEmail(str) {
    var re = /\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}/;
    if (str) {
        if (re.test(str)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }

}
//用户名验证,应包括字母、数字和下划线，以字母开头
function checkUsername(val) {
    var strRegex = /^[a-zA-Z]{1}[0-9a-zA-Z_]{1,}$/;
    if (!strRegex.test(val)) {
        return false;
    } else {
        return true;
    }
}



//验证密码的长度
function checkpasswordlength(val) {
    if ((val.length < 8) || (val.length > 20))
    {
        return false;
        tag_pwd = 2;
    } else {
        tag_pwd = 1;
        return true;
    }
}

//验证密码的强度
function checkPasswordStrength() {
    if ($("#password_verify").hasClass("error")) {
        $("#password_verify").removeClass("error");
        $("#password_verify").prev().removeClass("icon_error");
    }
    $("#password_verify").addClass("succ");
    $("#password_verify").prev().addClass("icon_succ");
    var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
    var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
    if (strongRegex.test($("#password").val())) {
        $("#password_verify").html("密码强度，高");
    } else if (mediumRegex.test($("#password").val())) {
        $("#password_verify").html("密码强度，中");
    } else {
        $("#password_verify").html("密码强度，低");
    }

    return true;
}

//验证两次密码的正确性
function checkSecondPassword(pwd1, pwd2) {
    if ((pwd1 !== '') && (pwd2 !== '')) {
        if (pwd1 == pwd2) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }

}

//身份提示信息
function userRoleVerify() {
    if ($("#user_role").val() == "#") {
        $("#user_role_verify").html("请选择身份信息");
        $("#user_role_verify").addClass("error");
        $("#user_role_verify").prev().addClass("icon_error");
        $("#user_role_verify").parent().css("display", "block");
        $("#user_role_verify").parent().prev().css("display", "none")
    } else {
        $("#user_role_verify").parent().css("display", "none");
        $("#user_role_verify").parent().prev().css("display", "block")
    }
}

function userMobileVerify() {
    if (checkMobile($("#user_mobile").val())) {
        return "1";
    } else {
        return "2";
    }
}

//密码提示信息
function passwordVerify() {
    if (checkpasswordlength($("#password").val())) {
        checkPasswordStrength();
    } else {
        if ($("#password_verify").hasClass("succ")) {
            $("#password_verify").removeClass("succ");
            $("#password_verify").prev().removeClass("icon_succ");
        }
        $("#password_verify").addClass("error");
        $("#password_verify").prev().addClass("icon_error");
        $("#password_verify").html("密码较短，最短支持6个字符");
        $("#password_verify").parent().css("display", "block");
        $("#password_verify").parent().prev().css("display", "none");
    }
}

//地区联动
function area(t, n) {
    var id = $("#" + t).val();
    $.ajax({
        url: "/Manage/Base/ajaxArea",
        data: {id: id},
        type: "post",
        dataType: "json",
        async: false,
        success: function (result) {
            $("#" + n).children().remove();
            if (result.length > 0) {
                $.each(result, function (i, e) {
                    $("#" + n).append("<option value='" + e.id + "'>" + e.name + "</option>");
                })
            } else {
                $("#" + n).append("<option value='#'>请选择...</option>");
            }

        }
    });
}
/*检测文件类型
 * extArray为文件类型的数组 如：extArray = new Array(".gif", ".jpg", ".png");//文件格式限制
 * file为input的file上传文件值
 */
function LimitAttach(extArray, file) {
    //格式判断
    var allowSubmit = false;
    if (!file) {
        alert("请选择文件上传！");
        return false;
    }

    while (file.indexOf("\\") != - 1)
        file = file.slice(file.indexOf("\\") + 1);
    ext = file.slice(file.indexOf(".")).toLowerCase();
    for (var i = 0; i < extArray.length; i++) {
        if (extArray[i] == ext) {
            allowSubmit = true;
            break;
        }
    }
    if (allowSubmit) {
        return true;
    } else {
        alert("对不起，只能上传以下格式的文件:  "
                + (extArray.join("  ")) + "\n请重新选择符合条件的文件"
                + "再上传.");
        return false;
    }
}

//检测手机号码+座机号码  《不建议使用》 可以使用checkPhonePublic
function checkMobile(str) {
    var re = /^(\d{11})|^((\d{7,8})|(\d{4}|\d{3})-(\d{7,8})|(\d{4}|\d{3})-(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1})|(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1}))$/;
    if (re.test(str)) {
        return true;
    } else {
        return false;
    }
}

//提示信息
function alertMsg(msg, type) {
    type = type ? type : 1;
    switch (type) {
        case 1:
            layer.msg(msg);
            break;
        case 2:
            layer.msg(msg, {icon: 6});
            break;
        case 3:
            layer.msg(msg, {icon: 5});
            break;
        case 4:
            layer.msg(msg, function () {
            });
            break;
        default:
            break;
    }
}
