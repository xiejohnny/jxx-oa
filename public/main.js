require.config({
	paths:{
		'jquery':['/assets/js/jquery-3.2.1.min'],
		'jquery-cookie':['/assets/js/jquery.cookie'],
		'common':['/assets/js/common'],
		'text':['/assets/js/text'],
		'amazeui':['/assets/js/amazeui.min'],
		'template':['/assets/js/template-web'],
        
        'staff':['/m/staff']
	},
	shim:{
		'common':{
			deps:['jquery', 'jquery-cookie', 'amazeui']
		},
	}
});

requirejs.onError = function (err) {
	if (err.requireType === 'timeout') {
		console.log('modules: ' + err.requireModules);
	}else if (err.requireType === 'scripterror') {
		console.log('文件不存在：'+err.requireModules);
	}
	// throw err;
};

require(['jquery', 'jquery-cookie', 'template', 'common', 'staff'], function(jquery,cookie,template,common,staffModel)
{
    $(function() {
        var $fullText = $('.admin-fullText');
        $('#admin-fullscreen').on('click', function() {
            $.AMUI.fullscreen.toggle();
        });
        
        $(document).on($.AMUI.fullscreen.raw.fullscreenchange, function() {
            $fullText.text($.AMUI.fullscreen.isFullscreen ? '退出全屏' : '开启全屏');
        });
    });
    
    var compiled = {};
    $.fn.handlebars = function(template, data) {
        compiled[template] = Handlebars.compile(template);
        this.html(compiled[template](data));
    };
    
	$(window).on('hashchange', hashChange);
	$(window).trigger('hashchange', 1);
	//全局变量
	window.$glbTpl = $('#template');
	window.$glbArtTpl = template;

    staffModel.checkLogined();

	function hashChange()
	{
		var hash = window.location.hash;
		var directory = 'index/index';
		if(hash){
			directory = hash.replace(/#!(([^!]*)!)?/ig, '');
		}
		require(['c/' + directory], function(fn){
			$glbTpl.undelegate();
			$(window).scrollTop(0);
			fn.render();
		});
	}
});