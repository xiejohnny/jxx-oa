define(['staff', 'pagination', 'text!v/staff/list.html'], function(staffModel, pagination, pageHTML)
{

	return {
		render : function(){
            
            function pageInit()
            {
                var page = $glbUrlParams['page'] ? $glbUrlParams['page'] : 1;
                var keyword = $glbUrlParams['keyword'] || '';
                staffModel.getStaffList({page:page,keyword:keyword}, function(data){
                    //渲染页面
                    $glbTpl.html($glbArtTpl.render(pageHTML, {list:data.list, total:data.total}));
                    //分页处理
                    $('.am-pagination').page({
                        pages:Math.ceil(data.total / data.pagesize),
                        curr:page,
                        jump:'#!page=%page%&keyword=' + keyword + '!staff/list'
                    });
                    $('.input-search').val(keyword);
                });
            }
            pageInit();
            
            /**
             * 搜索
             * @author jxx
             * @time 2017/9/9
             */
            $(document).on('click', '.btn-search', function(){
                var keyword = $('.input-search').val();
                window.location.href = '#!keyword=' + keyword + '!staff/list';
            });
		}
	};
});