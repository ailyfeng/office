
<?php $__env->startSection("content"); ?>

    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">商品管理</a> &raquo; 添加商品
    </div>
    <!--面包屑导航 结束-->

	<!--结果页快捷搜索框 开始-->
	<div class="search_wrap">
        <form action="" method="post">
            <table class="search_tab">
                <tr>
                    <th width="120">库存类别:</th>
                    <td>
                        <select name="type">
                            <option value="">全部</option>
                            <option value="23">常备</option>
                            <option value="343">客户专备</option>
                        </select>
                    </td>

                    <th width="120">产品类别:</th>
                    <td>
                        <select name="type">
                            <option value="">全部</option>
                            <option value="lg">大类</option>
                            <option value="md">中类</option>
                            <option value="sm">小类</option>
                        </select>
                    </td>
                    <th width="70">关键字:</th>
                    <td><input type="text" name="keywords" placeholder="关键字"></td>
                    <td><input type="submit" name="sub" value="查询"></td>
                </tr>
            </table>
        </form>
    </div>
    <!--结果页快捷搜索框 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="<?php echo e(url('cms/product_add')); ?>"><i class="fa fa-plus"></i>新增产品</a>
                    <a href="#" onclick="deleteAction(1)"><i class="fa fa-recycle"></i>批量删除</a>
                <a href="javascript:void();" onclick="location.reload();"><i class="fa fa-refresh"></i>更新网页</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc" width="5%"><input type="checkbox" name=""></th>
                        <th class="tc">排序</th>
                        <th class="tc">品牌</th>
                        <th>品名</th>
                        <th>货号</th>
                        <th>颜色</th>
                        <th>发布人</th>
                        <th>更新时间</th>
                        <th>评论</th>
                        <th>操作</th>
                    </tr>
                    <tr>
                        <td class="tc"><input type="checkbox" name="id[]" value="59"></td>
                        <td class="tc">
                            <input type="text" name="ord[]" value="0">
                        </td>
                        <td class="tc">Gambol</td>
                        <td>
                            <a href="#">得力 高品质纤维笔头白板笔 蓝色</a>
                        </td>
                        <td>df-34-34</td>
                        <td>黑色</td>
                        <td>admin</td>
                        <td>2016-09-06 21:11:01</td>
                        <td></td>
                        <td>
                            <a href="#">修改</a>
                            <a href="#" onclick="deleteAction(1)">删除</a>
                        </td>
                    </tr>

                    <tr>
                        <td class="tc"><input type="checkbox" name="id[]" value="59"></td>
                        <td class="tc">
                            <input type="text" name="ord[]" value="0">
                        </td>
                        <td class="tc">Gambol</td>
                        <td>
                            <a href="#">多功能电脑桌</a>
                        </td>
                        <td>df-34-34</td>
                        <td>黑色</td>
                        <td>admin</td>
                        <td>2016-09-06 21:11:01</td>
                        <td></td>
                        <td>
                            <a href="#">修改</a>
                            <a href="#" onclick="deleteAction(1)">删除</a>
                        </td>
                    </tr>

                    <tr>
                        <td class="tc"><input type="checkbox" name="id[]" value="59"></td>
                        <td class="tc">
                            <input type="text" name="ord[]" value="0">
                        </td>
                        <td class="tc">Gambol</td>
                        <td>
                            <a href="#">5354票据夹</a>
                        </td>
                        <td>df-34-34</td>
                        <td>黑色</td>
                        <td>admin</td>
                        <td>2016-09-06 21:11:01</td>
                        <td></td>
                        <td>
                            <a href="#">修改</a>
                            <a href="#" onclick="deleteAction(1)">删除</a>
                        </td>
                    </tr>
                </table>


<div class="page_nav">
<div>
<a class="first" href="/wysls/index.php/Admin/Tag/index/p/1.html">第一页</a>
<a class="prev" href="/wysls/index.php/Admin/Tag/index/p/7.html">上一页</a>
<a class="num" href="/wysls/index.php/Admin/Tag/index/p/6.html">6</a>
<a class="num" href="/wysls/index.php/Admin/Tag/index/p/7.html">7</a>
<span class="current">8</span>
<a class="num" href="/wysls/index.php/Admin/Tag/index/p/9.html">9</a>
<a class="num" href="/wysls/index.php/Admin/Tag/index/p/10.html">10</a>
<a class="next" href="/wysls/index.php/Admin/Tag/index/p/9.html">下一页</a>
<a class="end" href="/wysls/index.php/Admin/Tag/index/p/11.html">最后一页</a>
<span class="rows">11 条记录</span>
</div>
</div>



                <div class="page_list">
                    <ul>
                        <li class="disabled"><a href="#">&laquo;</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->


    <script type="text/javascript">
        function deleteAction(ids){
            layer.confirm("请确认是否要删除选择的项？", {
              btn: ["确认","取消"] //按钮
            }, function(){
              layer.msg("删除成功", {icon: 1});
              layer.msg("删除失败。。", {icon: 5});
            });

        }
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("officecms.layout.cms", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>