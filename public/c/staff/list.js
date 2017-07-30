define(['staff', 'pagination', 'text!v/staff/list.html'], function(staffModel, pagination, pageHTML)
{
	return {
		render : function(){
            var page = $glbUrlParams['page'];
			staffModel.getStaffList({page:page}, function(data){
			    //渲染页面
                $glbTpl.html($glbArtTpl.render(pageHTML, {list:data.list, total:data.total}));
                //分页处理
                $('.am-pagination').page({
                    pages:Math.ceil(data.total / data.pagesize),
                    curr:page?page:1,
                    jump:'#!page=%page%!staff/list'
                })
            });
		}
	};
});