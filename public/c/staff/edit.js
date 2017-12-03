define(['staff', 'role', 'text!v/staff/edit.html'], function(staffModel, roleModel, pageHTML)
{
	return {
		render : function(){
			var id = window.$glbUrlParams.id;
			staffModel.getStaffInfo(id, function(data){
                roleModel.getRoleList({pagesize:1000}, function(roleData){
                    var roleList = roleData.list;
                    //按钮权限
                    var editBtn = check_action_power('staff_edit');
                    //渲染页面
                    $glbTpl.html($glbArtTpl.render(pageHTML, {info:data, roleList:roleList, editBtn:editBtn}));
                });
                //提交按钮
                $glbTpl.delegate('#js-submitBtn', 'click', function(){
                    var form = $(this).parents('form');
                    form.find('input[name="access_token"]').val($.cookie('access_token'));
                    staffModel.updateStaffInfo(new FormData(form[0]), function(updateRes){
                        alert_msg(updateRes.msg, '', '#!staff/list');
                    });
                });
            });
            
            //头像预览图
            $glbTpl.delegate('input[name="avatar"]', 'change', function(){
                var $file = $(this);
                var fileObj = $file[0];
                var windowURL = window.URL || window.webkitURL;
                var dataURL;
                var $img = $('#avatar_img');
                if(fileObj && fileObj.files && fileObj.files[0]){
                    dataURL = windowURL.createObjectURL(fileObj.files[0]);
                    $img.attr('src',dataURL);
                }else{
                    dataURL = $file.val();
                    var imgObj = document.getElementById('avatar_img');
                    imgObj.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
                    imgObj.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = dataURL;
                }
                $img.show();
            });
		}
	};
});