<?php $__env->startSection("content"); ?>

    <script src="<?php echo e(asset('resources/cms/uploadify/jquery.uploadify.min.js')); ?>" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('resources/cms/uploadify/uploadify.css')); ?>">

    <style>
        .uploadify{display:inline-block;}
        .uploadify-button{border:none; border-radius:5px; margin-top:8px;}
        table.add_tab tr td span.uploadify-button-text{color: #FFF; margin:0;}
    </style>
    <div class="panel panel-default text-c">
        <div class="panel-header ">上传文件</div>
        <div class="panel-body">

                            <p>
                                <img class="radius" id="picture" width=140  src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTEwYmJhZjQzYSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1MTBiYmFmNDNhIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA1NDY4NzUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4="> 
                                 
                            </p>
                            <p>
                                <button type="file"  multiple="true" id="file" class="btn btn-secondary radius size-MINI">上传图片</button>
                            </p> 
                            <div class="text-r">
                                <button type="button"  ondblclick="closeSonWindow();" class="btn btn-secondary radius size-MINI">关闭</button>
                            </div>
        </div>
    </div>

    <script type="text/javascript">

//获取窗口索引
var index = parent.layer.getFrameIndex(window.name); 

//给父页面传值
function closeSonWindow(){
    parent.$('.<?php echo e($id); ?>').attr('src',$('#picture').attr('src'));
    parent.$('input[name=<?php echo e($id); ?>]').val($('#picture').attr('src'));
    parent.layer.close(index);
    parent.layer.tips('这就是你上传的图片', '#<?php echo e($id); ?>', {time: 3000});
}

        <?php $timestamp = time();?>
        $(function() {
            $('#file').uploadify({
                'uploadLimit' : 5,
                'buttonText' : '上传图片',
                'buttonClass':'btn btn-secondary radius size-MINI',
                'formData'     : {
                    'timestamp' : '<?php echo $timestamp;?>',
                    '_token'     : "<?php echo e(csrf_token()); ?>",
                },
                'swf'      : "<?php echo e(asset('resources/cms/uploadify/uploadify.swf')); ?>",
                'uploader' : "<?php echo e(url('cms/upload')); ?>",
                'onUploadSuccess' : function(file, data, response) {

                    $('input[name=picRight]').val(data);
                     if(response)
                         $('#picture').attr('class','radius').attr('src','/'+data);
                     else
                          Huimodal_alert('上传失败！请重新上传。',2000);
                },

                'onUploadError' : function(file, errorCode, errorMsg, errorString) {
                    Huimodal_alert('上传失败！请重新上传。',2000);
                }


            });
        });
    </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make("cms.layouts.admin", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>