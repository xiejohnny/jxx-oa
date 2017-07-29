define(['text!login.html'], function(loginHTML)
{
	return {
		render : function(){
			$glbTpl.html(loginHTML);
		}
	};
});