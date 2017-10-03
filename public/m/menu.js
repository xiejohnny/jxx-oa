define([], function()
{
    var menu = (function(){
        return {
            /**
             * 获取菜单列表
             * @param postData 参数
             * @param cbfn 回调函数
             * @author jxx
             * @time 2017/10/2
             */
            getMenuList : function(postData, cbfn)
            {
                postData = $.extend(postData, {access_token:$.cookie('access_token')});
                $.doAjax('/menu/getList', postData, function(res){
                    if(res.code !== 20000){
                        alert_msg(res.msg);
                    }else{
                        cbfn(res.data);
                    }
                });
            },
            /**
             * 获取菜单信息
             * @param id 角色ID
             * @param cbfn 回调函数
             * @author jxx
             * @time 2017/10/2
             */
            getMenuInfo : function(id, cbfn)
            {
                $.doAjax('/menu/getInfo', {access_token:$.cookie('access_token'),id:id}, function(res){
                    if(res.code !== 20000){
                        alert_msg(res.msg);
                    }else{
                        cbfn(res.data);
                    }
                });
            }
        };
    })();
    
    return menu;
});