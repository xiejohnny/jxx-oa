define([], function()
{
    var staff = (function(){
        return {
            /**
             * 检查是否已登录
             * @author jxx
             * @time 2017/6/17
             */
            checkLogined : function()
            {
                if(!$.cookie('access_token') && window.location.pathname != '/login.html')
                {
                    alert_msg('请先登录','','/login.html');
                }else if(window.location.pathname != '/login.html'){
                    this.getAccessTokenInfo();
                }
            },
            /**
             * 获取登录用户信息
             * @author jxx
             * @time 2017/6/17
             */
            getAccessTokenInfo : function()
            {
                $.doAjax('/user/getAccessTokenInfo', {access_token:$.cookie('access_token')}, function(res){
                    if(res.code !== 20000){
                        alert_msg(res.msg);
                    }else{
                        window.$glbTokenInfo = res.data;
                        $('#my-hd-nickname').html(res.data.nickname);
                        var list = res.data.menu_list;
                        var html = '<li><a href="/index.html"><span class="am-icon-home"></span> 首页</a></li>';
                        for(var i in list){
                            html += '<li class="admin-parent">'
                                +'<a class="am-cf" data-am-collapse="{target: \'#collapse-nav'+i+'\'}"><span class="am-icon-table"></span> '+list[i].name+' <span class="am-icon-angle-right am-fr am-margin-right"></span></a>';
                            if(list[i].son){
                                html += '<ul class="am-list admin-sidebar-sub am-collapse" id="collapse-nav'+i+'" style="height: 0px;">';
                                for(var j in list[i].son){
                                    html += '<li><a href="/index.html#!'+list[i].son[j].url+'" class="am-cf"><span class="am-icon-th"></span> '+list[i].son[j].name+'</a></li></ul>';
                                }
                            }
                            html += '</li>';
                        }
                        $('#admin-offcanvas .admin-sidebar-list').html(html);
                    }
                });
            },
            /**
             * 获取员工列表
             * @param postData 参数
             * @param cbfn 回调函数
             * @author jxx
             * @time 2017/6/18
             */
            getStaffList : function(postData, cbfn)
            {
                postData = $.extend(postData, {access_token:$.cookie('access_token')});
                $.doAjax('/staff/getList', postData, function(res){
                    if(res.code !== 20000){
                        alert_msg(res.msg);
                    }else{
                        cbfn(res.data);
                    }
                });
            },
            /**
             * 获取员工信息
             * @param id 员工ID
             * @param cbfn 回调函数
             * @author jxx
             * @time 2017/7/29
             */
            getStaffInfo : function(id, cbfn)
            {
                $.doAjax('/staff/getInfo', {access_token:$.cookie('access_token'),id:id}, function(res){
                    if(res.code !== 20000){
                        alert_msg(res.msg);
                    }else{
                        cbfn(res.data);
                    }
                });
            },
            /**
             * 修改员工信息
             * @param postData 提交参数
             * @param cbfn 回调函数
             * @author jxx
             * @time 2017/7/29
             */
            updateStaffInfo : function(postData, cbfn)
            {
                $.doAjax('/staff/edit', postData, function(res){
                    if(res.code !== 20000){
                        alert_msg(res.msg);
                    }else{
                        cbfn(res);
                    }
                }, 'POST', {processData : false,cache: false,contentType: false});
            },
            /**
             * 添加员工
             * @param postData 提交数据
             * @param cbfn 回调函数
             * @author jxx
             * @time 2017/8/26
             */
            addStaff : function(postData, cbfn){
                $.doAjax('/staff/add', postData, function(res){
                    if(res.code !== 20000){
                        alert_msg(res.msg);
                    }else{
                        cbfn(res);
                    }
                }, 'POST', {processData : false,cache: false,contentType: false});
            }
        };
    })();
    
    return staff;
});