define(['staff', 'role', 'text!v/staff/add.html'], function(staffModel, roleModel, pageHTML)
{
	return {
		render : function(){
		    roleModel.getRoleList({pagesize:1000}, function(roleData){
		        var roleList = roleData.list;
                //渲染页面
                $glbTpl.html($glbArtTpl.render(pageHTML, {roleList:roleList}));
            });
            //提交按钮
            $glbTpl.delegate('#js-submitBtn', 'click', function(){
                var form = $(this).parents('form');
                if(form.find('input[name="password"]').val() != form.find('input[name="password_confirm"]').val()){
                    alert_msg('密码和确认密码不一致');
                    return false;
                }
                form.find('input[name="access_token"]').val($.cookie('access_token'));
                staffModel.addStaff(new FormData(form[0]), function(res){
                    alert_msg(res.msg, '', '#!staff/list');
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