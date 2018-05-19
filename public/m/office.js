define([], function()
{
    var office = (function(){
        return {
            /**
             * 获取用品列表
             * @param postData 参数
             * @param cbfn 回调函数
             * @author jxx 2018/5/1
             */
            getSuppliesList : function(postData, cbfn)
            {
                postData = $.extend(postData, {access_token:$.cookie('access_token')});
                $.doAjax('/office/getSuppliesList', postData, function(res){
                    if(res.code !== 20000){
                        alert_msg(res.msg);
                    }else{
                        cbfn(res.data);
                    }
                });
            },
            /**
             * 获取用品信息
             * @param id 员工ID
             * @param cbfn 回调函数
             * @author jxx 2018/5/19
             */
            getSuppliesInfo : function(id, cbfn)
            {
                $.doAjax('/office/getSuppliesInfo', {access_token:$.cookie('access_token'),id:id}, function(res){
                    if(res.code !== 20000){
                        alert_msg(res.msg);
                    }else{
                        cbfn(res.data);
                    }
                });
            },
            /**
             * 修改用品信息
             * @param postData 提交参数
             * @param cbfn 回调函数
             * @author jxx 2018/5/19
             */
            updateSuppliesInfo : function(postData, cbfn)
            {
                $.doAjax('/office/suppliesEdit', postData, function(res){
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
    
    return office;
});