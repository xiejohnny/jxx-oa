define(['staff', 'role', 'text!v/staff/edit.html'], function(staffModel, roleModel, pageHTML)
{
	return {
		render : function(){
			var id = window.$glbUrlParams.id;
			staffModel.getStaffInfo(id, function(data){
                roleModel.getRoleList({pagesize:1000}, function(roleData){
                    var roleList = roleData.list;
                    //渲染页面
                    $glbTpl.html($glbArtTpl.render(pageHTML, {info:data, roleList:roleList}));
                });
                //提交按钮
                $glbTpl.delegate('#js-submitBtn', 'click', function(){
                    var form = $(this).parents('form');
                    var arr = form.serializeArray();
                    var postData = {
                        gender : $('#input-gender .am-active').find('input[name="gender"]').val(),
                        is_freeze : $('#input-is_freeze .am-active').find('input[name="is_freeze"]').val()
                    };
                    for(var i in arr){
                        postData[arr[i].name] = arr[i].value;
                    }
                    staffModel.updateStaffInfo(postData, function(updateRes){
                        alert_msg(updateRes.msg, '', '#!staff/list');
                    });
                });
            });
		}
	};
});