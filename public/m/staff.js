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
             * 登录
             * @author jxx
             * @time 2017/6/17
             */
            doLogin : function()
            {
                this.doAjax('/user/login', $('#loginForm').serialize(), function(res){
                    if(res.code !== 20000){
                        alert_msg(res.msg);
                    }else{
                        $.cookie('access_token', res.data.access_token, {expires:30, path: '/'});
                        $.cookie('expires_time', res.data.expires_time, {expires:30, path: '/'});
                        alert_msg('登录成功','','/main.html');
                    }
                });
            },
            /**
             * 异步请求
             * @param url 请求地址
             * @param postData 请求参数
             * @param cb 回调函数
             * @param method 请求方法 默认POST
             * @author jxx
             * @time 2017/4/2
             */
            doAjax : function(url, postData, cb, method)
            {
                method = method || 'POST';
                $.ajax({
                    url: url,
                    type: method,
                    data: postData,
                    dataType: 'json',
                    success: function(res) {
                        cb(res);
                    }
                });
            },
            /**
             * 获取登录用户信息
             * @author jxx
             * @time 2017/6/17
             */
            getAccessTokenInfo : function()
            {
                this.doAjax('/user/getAccessTokenInfo', {access_token:$.cookie('access_token')}, function(res){
                    if(res.code !== 20000){
                        alert_msg(res.msg);
                    }else{
                        $('#my-hd-nickname').html(res.data.nickname);
                        var list = res.data.menu_list;
                        var html = '<li><a href="/main.html"><span class="am-icon-home"></span> 首页</a></li>';
                        for(var i in list){
                            html += '<li class="admin-parent">'
                                +'<a class="am-cf" data-am-collapse="{target: \'#collapse-nav'+i+'\'}"><span class="am-icon-table"></span> '+list[i].name+' <span class="am-icon-angle-right am-fr am-margin-right"></span></a>';
                            if(list[i].son){
                                html += '<ul class="am-list admin-sidebar-sub am-collapse" id="collapse-nav'+i+'" style="height: 0px;">';
                                for(var j in list[i].son){
                                    html += '<li><a href="/main.html#!'+list[i].son[j].url+'" class="am-cf"><span class="am-icon-th"></span> '+list[i].son[j].name+'</a></li></ul>';
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
             * @param cbfn 回调函数
             * @author jxx
             * @time 2017/6/18
             */
            getStaffList : function(cbfn)
            {
                this.doAjax('/staff/getList', {access_token:$.cookie('access_token')}, function(res){
                    if(res.code !== 20000){
                        alert_msg(res.msg);
                    }else{
                        cbfn(res.data);
                    }
                });
            }
        };
    })();
    
    return staff;
});