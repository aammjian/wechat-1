<?php
/**
 * @author: hxp
 * @Date: 16/8/2
 * @Time: 下午3:27
 */
use \yii\helpers\Url;
$this->title = Yii::t('app','后台模型管理');
$this->params['breadcrumbs'][] = '后台模型管理';
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title">后台模型管理<a href="<?=Url::to(['create'])?>" class="pull-right"><code>添加模型</code></a></div>
    </div>
    <div class="panel-body">
        <table class="table table-bordered text-center">
            <?php if(!empty($model)){?>
            <thead>
                <tr>
                    <th class="text-center" width="8%">序号</th>
                    <th class="text-center">角色名称</th>
                    <th class="text-center">状态</th>
                    <th class="text-center">操作</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($model as $k=>&$v){?>
                <tr>
                    <td><?=++$k?></td>
                    <td><?=$v->role_name?></td>
                    <td><?=$v->role_status==1?'开启':'禁用'?></td>
                    <td>
                        <a href="<?=Url::to(["role/update",'id'=>$v->role_id])?>"><i class="iconfont">&#xe600;</i></a>
                        <a href="<?=Url::to(["role/delete",'id'=>$v->role_id])?>" title="删除" aria-label="删除" data-confirm="您确定要删除此项吗？" data-method="post" data-pjax="0"><i class="iconfont">&#xe601;</i></a>
                    </td>
                </tr>
            <?php }?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="5">
                    <?php
                    echo \yii\widgets\LinkPager::widget([
                        'pagination' => $pages,
                        'nextPageLabel' => '下一页',
                        'prevPageLabel' => '上一页',
                        'firstPageLabel' => '首页',
                        'lastPageLabel' => '尾页',
                    ]);
                    ?>
                </td>
            </tr>
            <?php }else{?>
                <tr>
                    <td colspan="5">没有数据</td>
                </tr>
            <?php }?>
            </tfoot>
        </table>
    </div>
</div>
