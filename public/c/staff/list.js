define(['staff', 'text!v/staff/list.html'], function(staffModel, pageHTML)
{
	return {
		render : function(){
			staffModel.getStaffList(function(data){
                $glbTpl.html($glbArtTpl.render(pageHTML, {list:data.list, total:data.total}));
            });
		}
	};
});