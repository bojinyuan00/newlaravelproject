<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/admin/lib/html5shiv.js"></script>
<script type="text/javascript" src="/admin/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="/admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>点播管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 点播管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c">
		<form class="Huiform" method="post" action="" target="_self">
			<input type="text" class="input-text" style="width:250px" placeholder="点播名称" id="" name="">
			<button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜点播节点</button>
		</form>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;" onclick="admin_permission_add('添加点播节点','/admin/auth/add','','400')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加点播节点</a></span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="9">点播节点</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="40">ID</th>
				<th width="80">点播名称</th>
				<th width="80">所属课程</th>
				<th width="80">视频时长(s)</th>
				<th width="150">视频地址</th>
				<th width="50">状态</th>
				<th width="50">添加时间</th>
				<th width="80">操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $val)
				<tr class="text-c">
					<td><input type="checkbox" value="{{$val->id}}" name=""></td>
					<td>{{$val->id}}</td>
					<td>{{$val->lesson_name}}</td>
					<td>{{$val->course->course_name}}</td>
					<td>
						{{$val->video_time}}
					</td>
					<td>
						<a href="javascript:;" onclick="video_play('{{$val->lesson_name}}','/admin/lesson/play?id={{$val->id}}','','400')" class="btn btn-primary radius">
							<i class="Hui-iconfont">&#xe6e6;</i>播放视频
						</a>
					</td>
					<td class="td-status">
						@if($val->status=='1')
						<span class="label label-danger radius">已停用</span>
						@else
						<span class="label label-success radius">已启用</span>
						@endif
					</td>
					<td>
						{{$val->created_at}}
					</td>
					<td><a title="编辑" href="javascript:;" onclick="admin_permission_edit('角色编辑','admin-permission-add.html','1','','310')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" href="javascript:;" onclick="admin_permission_del(this,{{$val->id}})" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
				</tr>
			@endforeach
			<!--csrf隐藏域-->
			{{csrf_field()}}
		</tbody>
	</table>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript">
//实例化datetables插件
$('table').dataTable({
	//禁用掉第一列的排序
	"aoColumnDefs":[{"bSortable":false,"aTargets":[0]}],
	//默认在初始化的时候按照哪一列进行排序
	"aaSorting":[[1,"asc"]],
});
/*
	参数解释：
	title	标题
	url		请求的url
	id		需要操作的数据id
	w		弹出层宽度（缺省调默认值）
	h		弹出层高度（缺省调默认值）
*/
/*管理员-点播-添加*/
function admin_permission_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*视频播放*/
function video_play(title,url,w,h){
	layer_show(title,url,w,h);
}
/*管理员-点播-编辑*/
function admin_permission_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}

/*管理员-点播-删除*/
function admin_permission_del(obj,id){
	// alert(id);return false;
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: "{{ url('/admin/auth/del') }}",
			dataType: 'json',
			data: {"id": id,'_token':'{{csrf_token()}}'},
			success: function(data){
				
				if(data == '1'){
					// $(obj).parents("tr").remove();
					layer.msg('删除成功!',{icon:1,time:1000},function(){
						window.location.reload();
					});
					
				}else{
					layer.msg('删除失败!',{icon:2,time:1000});
				}
			},
			error:function(data) {
				layer.msg('参数错误!',{icon:2,time:1000});
			},
		});		
	});
}
</script>
</body>
</html>