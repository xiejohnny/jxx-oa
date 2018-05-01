require.config({
	paths:{
		'jquery':['/assets/js/jquery-3.2.1.min'],
		'jquery-cookie':['/assets/js/jquery.cookie'],
		'common':['/assets/js/common'],
		'text':['/assets/js/text'],
		'amazeui':['/assets/js/amazeui.min'],
		'template':['/assets/js/template-web'],
        
        'staff':['/m/staff'],
        'role':['/m/role'],
        'menu':['/m/menu'],
        'office':['/m/office'],
        'pagination':['/assets/js/amazeui.page'],
        'ztree':['/assets/js/jquery.ztree.all.min']
	},
	shim:{
		'common':{
			deps:['jquery', 'jquery-cookie', 'amazeui']
		},
		'ztree':{
			deps:['jquery']
		}
	}
});

requirejs.onError = function (err) {
	if (err.requireType === 'timeout') {
		console.log('modules: ' + err.requireModules);
	}else if (err.requireType === 'scripterror') {
		console.log('文件不存在：'+err.requireModules);
	}
	throw err;
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
    
    $.prototype.serializeObject = function() {
        var a, o, h, i, e;
        a = this.serializeArray();
        o = {};
        h = o.hasOwnProperty;
        for (i = 0; i < a.length; i++) {
            e = a[i];
            if (!h.call(o, e.name)) {
                o[e.name] = e.value;
            }
        }
        return o;
    };
    
    //JQ扩展方法
    $.extend({
        /**
         * 异步请求
         * @param url 请求地址
         * @param postData 请求参数
         * @param cbfn 回调函数
         * @param method 请求方法 默认POST
         * @param ext 扩展AJAX参数
         * @author jxx
         * @time 2017/4/2
         */
        doAjax : function (url, postData, cbfn, method, ext) {
            method = method || 'POST';
            var params = {
                url: url,
                type: method,
                data: postData,
                dataType: 'json',
                success: function (res) {
                    cbfn(res);
                }
            };
            if(ext){
                params = $.extend(params, ext);
            }
            $.ajax(params);
        }
    });
    
	$(window).on('hashchange', hashChange);
	$(window).trigger('hashchange', 1);
	//全局变量
	window.$glbTpl = $('#template');
	window.$glbArtTpl = template;
	window.$glbTokenInfo = null;

    staffModel.checkLogined();

	function hashChange()
	{
		var hash = window.location.hash;
		var directory = 'index/index';
		if(hash){
			directory = hash.replace(/#!(([^!]*)!)?/ig, '');
		}
		//获取url参数
        window.$glbUrlParams = {};
		var tmp = window.location.hash.match(/#![^!]*!/);
		if(tmp && tmp[0]){
            var paramsStr = tmp[0].substring(2, tmp[0].length-1);
            if(paramsStr){
                var paramsArr = paramsStr.split('&');
                var params = {};
                for(var i in paramsArr){
                    var t = paramsArr[i].split('=');
                    params[t[0]] = t[1];
                }
                if(params){
                    window.$glbUrlParams = params;
                }
            }
        }
		require(['c/' + directory], function(fn){
			$glbTpl.undelegate();
			$(window).scrollTop(0);
			fn.render();
		});
	}
});