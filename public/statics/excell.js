jQuery(function() {
     var $ = jQuery,
        $list = $('#fileList'),
        // 浼樺寲retina, 鍦╮etina涓嬭繖涓€兼槸2
        ratio = window.devicePixelRatio || 1,

        // Web Uploader瀹炰緥
        uploader;


    //创建Web Uploader实例
    // 初始化Web Uploader
    var uploader = WebUploader.create({
        //添加token的值
        formData: {
            _token: $('input[name=_token]').val(),
        },
        // 选完文件后，是否自动上传。
        auto: true,
        // swf文件路径(修改swf文件的真实路径)
        swf: '/statics/webuploader-0.1.5/Uploader.swf',
        // // 文件接收本地存储服务端。
        server: '/admin/uploader/webuploader',//本地存储
        // 文件接收七牛服务端。
        // server: '/admin/uploader/qiniu',//云存储

        // 选择文件的按钮。可选。
        // 内部根据当前运行是创建，可能是input元素，也可能是flash.
        pick: '#filePicker',
        // 只允许选择图片文件。
        // accept: {
        //     title: 'Images',
        //     extensions: 'xls,xlsx,csv',
        //     mimeTypes: 'image/*'
        // }
    });


    // 文件上传过程中创建进度条实时显示。
    uploader.on( 'uploadProgress', function( file, percentage ) {
        var $li = $( '#'+file.id ),
            $percent = $li.find('.progress span');

        // 避免重复创建
        if ( !$percent.length ) {
            $percent = $('<p class="progress"><span></span></p>')
                    .appendTo( $li )
                    .find('span');
        }

        $percent.css( 'width', percentage * 100 + '%' );
    });

    // 然后剩下的就是上传状态提示了，当文件上传过程中, 上传成功，上传失败，
    // 上传完成都分别对应uploadProgress, uploadSuccess, uploadError, uploadComplete事件。
    // 文件上传成功，给item添加成功class, 用样式标记上传成功。
    uploader.on( 'uploadSuccess', function( file,response) {
        $( '#'+file.id ).addClass('upload-state-done');
        // console.log(response);
        //将返回值中的path路径写到隐藏域中
        $('input[name=excelpath]').val(response.path);
    });

    // 文件上传失败，显示上传出错。
    uploader.on( 'uploadError', function( file ) {
        var $li = $( '#'+file.id ),
            $error = $li.find('div.error');

        // 避免重复创建
        if ( !$error.length ) {
            $error = $('<div class="error"></div>').appendTo( $li );
        }

        $error.text('上传失败');
    });

    // 完成上传完了，成功或者失败，先删除进度条。
    uploader.on( 'uploadComplete', function( file ) {
        $( '#'+file.id ).find('.progress').remove();
    });
});