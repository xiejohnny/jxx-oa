define(['role', 'text!v/role/edit.html'], function(roleModel, pageHTML)
{
	return {
		render : function(){
			var id = window.$glbUrlParams.id;
			roleModel.getRoleInfo(id, function(data){
			    //渲染页面
                $glbTpl.html($glbArtTpl.render(pageHTML, {info:data}));
            });
			
            //提交按钮
            $glbTpl.delegate('#js-submitBtn', 'click', function(){
                var form = $(this).parents('form');
                roleModel.updateRoleInfo(form.serializeObject(), function(updateRes){
                    alert_msg(updateRes.msg, '', '#!role/list');
                });
            });
		}
	};
});