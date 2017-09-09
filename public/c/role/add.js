define(['role', 'text!v/role/add.html'], function(roleModel, pageHTML)
{
	return {
		render : function(){
            //渲染页面
            $glbTpl.html($glbArtTpl.render(pageHTML));
            //提交按钮
            $glbTpl.delegate('#js-submitBtn', 'click', function(){
                var form = $(this).parents('form');
                roleModel.addRole(form.serializeObject(), function(res){
                    alert_msg(res.msg, '', '#!role/list');
                });
            });
		}
	};
});