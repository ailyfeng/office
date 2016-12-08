@extends('cms.layouts.admin')
@section('content')


<script type="text/javascript">

//保存成功好提示消息，并关闭对话框
$(window).ready(function(){
    var index = parent.layer.getFrameIndex(window.name);
    @if($url)
    	parent.layer.msg('{{$mes}}');
    	window.location.href='{{$url}}';
    @else
    	parent.location.reload();
    	parent.layer.msg('{{$mes}}');
    	parent.layer.close(index);
    @endif
});

</script>

@endsection