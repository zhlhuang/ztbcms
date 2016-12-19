
                    <form method="post" enctype="multipart/form-data" target="_blank" id="form-order">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);"></td>
    
                                    <td class="text-right">
                                        <a href="javascript:sort('userid');">ID</a>
                                    </td>
                                    <td class="text-left">
                                        <a href="javascript:sort('username');">会员昵称</a>
                                    </td>
                                    <td class="text-left">
                                        <a href="javascript:sort('level');">会员等级</a>
                                    </td>
                                    <td class="text-left">
                                        <a href="javascript:sort('total_amount');">累计消费</a>
                                    </td>
                                    <td class="text-left">
                                        <a href="javascript:sort('email');">邮件地址</a>
                                    </td>
                                    
                                    <td class="text-left">
                                        <a href="javascript:void(0);">一级下线数</a>
                                    </td>
                                    <td class="text-left">
                                        <a href="javascript:void(0);">二级下线数</a>
                                    </td>
                                    <td class="text-left">
                                        <a href="javascript:void(0);">三级下线数</a>
                                    </td>                                    
                                    <td class="text-left">
                                        <a href="javascript:sort('mobile');">手机号码</a>
                                    </td>
                                    <td class="text-left">
                                        <a href="javascript:sort('user_money');">余额</a>
                                    </td>
                                    <td class="text-left">
                                        <a href="javascript:sort('pay_points');">积分</a>
                                    </td>
                                    <td class="text-left">
                                        <a href="javascript:sort('reg_time');">注册日期</a>
                                    </td>
                                    <td class="text-right">操作</td>
                                </tr>
                                </thead>
                                <tbody>
                                <volist name="userList" id="list">
                                    <tr>
                                        <td class="text-center">
                                            <input type="checkbox" name="selected[]" value="{$list['userid']}">
                                            <input type="hidden" name="shipping_code[]" value="flat.flat">
                                        </td>
                                        <td class="text-right">{$list.userid}</td>
                                        <td class="text-left">{$list.nickname}</td>
                                        <td class="text-left">{$level[$list[level]]}</td>
                                        <td class="text-left">{$list.total_amount}</td>
                                        <td class="text-left">{$list.email}
                                            <if condition="($list['email_validated'] eq 0) AND ($list['email'])">
                                                (未验证)
                                            </if>
                                        </td>
                                        <td class="text-left">{$first_leader[$list[userid]]['count']|default="0"}</td>
                                        <td class="text-left">{$second_leader[$list[userid]]['count']|default="0"}</td>
                                        <td class="text-left">{$third_leader[$list[userid]]['count']|default="0"}</td>
                                        <td class="text-left">{$list.mobile}
                                            <if condition="($list['mobile_validated'] eq 0) AND ($list['mobile'])">
                                                (未验证)
                                            </if>
                                        </td>
                                        <td class="text-left">{$list.user_money}</td>
                                        <td class="text-left">{$list.pay_points}</td>
                                        <td class="text-left">{$list.reg_time|date='Y-m-d H:i',###}</td>
                                        <td class="text-right">
                                            <a href="{:U('Shop/User/detail',array('id'=>$list['userid']))}" data-toggle="tooltip" title="" class="btn btn-info" data-original-title="查看详情"><i class="fa fa-eye"></i></a>
                                            <a href="{:U('Shop/User/address',array('id'=>$list['userid']))}" data-toggle="tooltip" title="" class="btn btn-info" data-original-title="收货地址"><i class="fa fa-home"></i></a>
                                            <!--<a href="{:U('Admin/order/index',array('userid'=>$list['userid']))}" data-toggle="tooltip" title="" class="btn btn-info" data-original-title="订单查看"><i class="fa fa-shopping-cart"></i></a>-->
                                            <a href="{:U('Shop/User/account_log',array('id'=>$list['userid']))}" data-toggle="tooltip" title="" class="btn btn-info" data-original-title="账户"><i class="glyphicon glyphicon-yen"></i></a>
                                            <!--<a href="{:U('Shop/User/delete',array('id'=>$list['userid']))}" id="button-delete6" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="删除"><i class="fa fa-trash-o"></i></a>-->
                                        </td>
                                    </tr>
                                </volist>
                                </tbody>
                            </table>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-sm-3 text-left">
                        </div>
                        <div class="col-sm-6 text-right">{$page}</div>
                    </div>
<script>
    $(".pagination  a").click(function(){
        var page = $(this).data('p');
        ajax_get_table('search-form2',page);
    });
</script>