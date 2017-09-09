define([], function()
{
    var role = (function(){
        return {
            /**
             * 获取角色列表
             * @param postData 参数
             * @param cbfn 回调函数
             * @author jxx
             * @time 2017/9/9
             */
            getRoleList : function(postData, cbfn)
            {
                postData = $.extend(postData, {access_token:$.cookie('access_token')});
                $.doAjax('/role/getList', postData, function(res){
                    if(res.code !== 20000){
                        alert_msg(res.msg);
                    }else{
                        cbfn(res.data);
                    }
                });
            },
            /**
             * 获取角色信息
             * @param id 角色ID
             * @param cbfn 回调函数
             * @author jxx
             * @time 2017/9/9
             */
            getRoleInfo : function(id, cbfn)
            {
                $.doAjax('/role/getInfo', {access_token:$.cookie('access_token'),id:id}, function(res){
                    if(res.code !== 20000){
                        alert_msg(res.msg);
                    }else{
                        cbfn(res.data);
                    }
                });
            },
            /**
             * 修改角色信息
             * @param postData 提交参数
             * @param cbfn 回调函数
             * @author jxx
             * @time 2017/9/9
             */
            updateRoleInfo : function(postData, cbfn)
            {
                postData = $.extend(postData, {access_token:$.cookie('access_token')});
                $.doAjax('/role/edit', postData, function(res){
                    if(res.code !== 20000){
                        alert_msg(res.msg);
                    }else{
                        cbfn(res);
                    }
                });
            },
            /**
             * 添加角色
             * @param postData 提交数据
             * @param cbfn 回调函数
             * @author jxx
             * @time 2017/9/9
             */
            addRole : function(postData, cbfn){
                postData = $.extend(postData, {access_token:$.cookie('access_token')});
                $.doAjax('/role/add', postData, function(res){
                    if(res.code !== 20000){
                        alert_msg(res.msg);
                    }else{
                        cbfn(res);
                    }
                });
            }
        };
    })();
    
    return role;
});