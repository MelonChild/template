function setImageCropper(type, w, h, file) {
    if (type) {
        $(".upLoadType").val(type);
    }
    if (w) {
        $("#dataSizeW").val(w);
    }
    if (h) {
        $("#dataSizeH").val(h);
    }
    if (file) {
        $("input[name='imgfile']").val(file);
        changeFileName(file);
    }

    //获取上传类型
    var upLoadtype = $(".upLoadType").val();
    if (upLoadtype == 'one') {
        $(".uoload_one").show();
    }
    if (upLoadtype == 'many') {
        $(".uoload_many").show();
    }
    if (upLoadtype == 'all') {
        $(".uoload_one").show();
        $(".uoload_many").show();
    }
}
$(function () {
//    //图片上传类型：one单张图片many多张图片all都上传
//    $(".upLoadType").val("all");
//    //默认裁剪形成的图片宽高
//    $("#dataSizeW").val(500);
//    $("#dataSizeH").val(500);
//    //图片保存的文件夹
//    $("input[name='imgfile']").val("Images");
//    changeFileName("Images");

//    //获取上传类型
//    var upLoadtype = $(".upLoadType").val();
//    if (upLoadtype == 'one') {
//        $(".uoload_one").show();
//    }
//    if (upLoadtype == 'many') {
//        $(".uoload_many").show();
//    }
//    if (upLoadtype == 'all') {
//        $(".uoload_one").show();
//        $(".uoload_many").show();
//    }

    //上传多图
    $('#test').diyUpload({
        url: up_pic_url_more,
        success: function (data) {
            console.info(data);
        },
        error: function (err) {
            console.info(err);
        },
        buttonText: '上传多张图片',
        chunked: true,
        // 分片大小
        chunkSize: 512 * 1024,
        //最大上传的文件数量, 总文件大小,单个文件大小(单位字节);
        fileNumLimit: 50,
        fileSizeLimit: 500000 * 1024,
        fileSingleSizeLimit: 50000 * 1024,
        accept: {}
    });

    //打开上传单张图片按钮
    $(".uppic").click(function () {
        $("#inputImage").click();
    });

    //图片保存，表单提交到 php方法经行图片裁剪
    $('#inputImage').on("change", function () {
        var imgfile = $("input[name='imgfile']").val();//图片保存文件夹
        $(".cropType").val("one"); //设置裁剪图片的类型
        $.ajaxFileUpload({
            url: up_pic_url_one,
            secureuri: false,
            fileElementId: 'inputImage',
            type: 'POST',
            data: {imgfile: imgfile, },
            dataType: 'eval',
            success: function (data) {
                $('#inputImage').val("");
                if (data !== "false") {
                    if (!$("#oldImgUrl").val()) {
                        $("#oldImgUrl").val(data);
                    }
                    ;
                    $("#imgurl").val(data);
                    dialogOpen();
                }
            }
        });
    });

    //原图保存
    $("#btn_save_before").click(function () {
        var oldUrl = $("#oldImgUrl").val();
        var src = $("#imgurl").val();
        var cropType = $(".cropType").val();
        if (oldUrl && (oldUrl !== src)) {
            deleteImage(oldUrl);
            $("#oldImgUrl").val(src);
        }
        dialogClose();
        if (cropType == 'one') {
            $(".imgshow").show();
            $(".picurl").attr("value", src);
            $(".imgshow").attr("src", src);
        }
    })

    //截图保存
    $("#btn_save_crop").click(function () {
        var x = $("#dataX").val();
        var y = $("#dataY").val();
        var w = $("#dataWidth").val();
        var h = $("#dataHeight").val();
        var targw = $("#dataSizeW").val();
        var targh = $("#dataSizeH").val();
        var src = $("#imgurl").val();
        var oldUrl = $("#oldImgUrl").val();
        var cropType = $(".cropType").val();
        var cropPicId = $(".manyPicId").val();

        $.ajax({
            url: imgcrop_url,
            type: 'POST',
            data: {x: x, y: y, w: w, h: h, src: src, targw: targw, targh: targh},
            dataType: 'json',
            success: function (data) {
                if (data !== "false") {
                    dialogClose();
                    if (cropType == 'one') {
                        if (oldUrl && (oldUrl !== src)) { //删除原图
                            deleteImage(oldUrl);
                            $("#oldImgUrl").val(data);
                        }
                        $("#imgurl").val(data);
                        $(".imgshow").show();
                        $(".picurl").attr("value", data);
                        $(".imgshow").attr("src", data);
                    }
                    if (cropType == 'many') {
                        $(".imgMany_" + cropPicId).attr("src", data);
                        $(".picurl_" + cropPicId).attr("value", data);
                    }
                }
            }
        });
    })

    //上传取消
    $("#btn_cancel").click(function () {
        $(".image-dialog-close").click();
        var imgurl = $("#imgurl").val();//上传后的图片路径
        var cropType = $(".cropType").val();
        if (cropType == 'one') {
            deleteImage(imgurl);
        }
    });

    //多图上传
    $("#test").click(function () {
        $("#oldImgUrl").val("");
        $("#imgurl").val("");
    })
});
//打开截图窗口
function dialogOpen() {
    if ($("#image-crop").css('display') == "none") {
        $(".image-dialog-open").click();
    }
}
//关闭截图窗口
function dialogClose() {
    if ($("#image-crop").css('display') == "block") {
        $(".image-dialog-open").click();
    }
}

//删除图片
function deleteImage(imgurl) {
    $.ajax({
        url: imgdel_url,
        type: 'POST',
        data: {imgurl: imgurl},
        dataType: 'json',
        success: function (data) {

        }});
}

//多图截图显示
function moreImgCrop(id) {
    $(".cropType").val("many"); //设置裁剪图片的类型
    $(".manyPicId").val(id); //设置裁剪图片的id
    var _this = $(this);
    var imgUrl = $(".picurl_" + id).attr("value");

    // Import image
    $('.img-container > img').cropper('reset', true).cropper('replace', imgUrl);
    $("#imgurl").val(imgUrl);
    dialogOpen();
}

//多图截图删除图片
function moreImgDel(id) {
    var imgUrl = $(".picurl_" + id).attr("value");
    if (imgUrl) {
        deleteImage(imgUrl);
        $('#fileBox_' + id).remove();
    }
}