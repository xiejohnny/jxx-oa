define(['staff', 'text!v/staff/add.html'], function(staffModel, pageHTML)
{
	return {
		render : function(){
            //渲染页面
            $glbTpl.html($glbArtTpl.render(pageHTML));
            //提交按钮
            $glbTpl.delegate('#js-submitBtn', 'click', function(){
                var form = $(this).parents('form');
                if(form.find('input[name="password"]').val() != form.find('input[name="password_confirm"]').val()){
                    alert_msg('密码和确认密码不一致');
                    return false;
                }
                var arr = form.serializeArray();
                var postData = {
                    gender : $('#input-gender .am-active').find('input[name="gender"]').val()
                };
                for(var i in arr){
                    postData[arr[i].name] = arr[i].value;
                }
                staffModel.addStaff(postData, function(res){
                    alert_msg(res.msg, '', '#!staff/list');
                });
            });
		}
	};
});