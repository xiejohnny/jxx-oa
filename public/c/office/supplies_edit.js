define(['office', 'text!v/office/supplies_edit.html'], function(officeModel, pageHTML)
{
	return {
		render : function(){
			var id = window.$glbUrlParams.id;
            officeModel.getSuppliesInfo(id, function(data){
                //按钮权限
                var editBtn = check_action_power('supplies_edit');
                //渲染页面
                $glbTpl.html($glbArtTpl.render(pageHTML, {info:data, editBtn:editBtn}));
                //提交按钮
                $glbTpl.delegate('#js-submitBtn', 'click', function(){
                    var form = $(this).parents('form');
                    form.find('input[name="access_token"]').val($.cookie('access_token'));
                    officeModel.updateSuppliesInfo(new FormData(form[0]), function(updateRes){
                        alert_msg(updateRes.msg, '', '#!office/supplies_list');
                    });
                });
            });
		}
	};
});