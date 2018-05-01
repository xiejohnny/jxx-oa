define(['office', 'pagination', 'text!v/office/supplies_list.html'], function(officeModel, pagination, pageHTML)
{

	return {
		render : function(){
            
            function pageInit()
            {
                var page = $glbUrlParams['page'] ? $glbUrlParams['page'] : 1;
                var keyword = $glbUrlParams['keyword'] || '';
                if(keyword) keyword = decodeURI(keyword);
                officeModel.getSuppliesList({page:page,keyword:keyword}, function(data){
                    //按钮权限
                    var editBtn = check_action_power('supplies_edit');
                    //渲染页面
                    $glbTpl.html($glbArtTpl.render(pageHTML, {list:data.list, total:data.total, editBtn:editBtn}));
                    //分页处理
                    $('.am-pagination').page({
                        pages:Math.ceil(data.total / data.pagesize),
                        curr:page,
                        jump:'#!page=%page%&keyword=' + keyword + '!office/supplies_list'
                    });
                    $('.input-search').val(keyword);
                });
            }
            pageInit();
            
            /**
             * 搜索
             * @author jxx
             * @time 2018/5/1
             */
            $glbTpl.delegate('.btn-search', 'click', function(){
                var keyword = $('.input-search').val();
                window.location.href = '#!keyword=' + keyword + '!office/supplies_list';
            });
		}
	};
});