function alert_msg(title, content, href)
{
    $('#alert-modal .row-title').html(title || '');
    $('#alert-modal .row-content').html(content || '');
    $('#alert-modal').modal();
    if(href){
        $('#alert-modal').on('closed.modal.amui', function(){
            window.location.href = href;
        });
    }
}

/**
 * 检查按钮权限
 * @param code 权限码
 * @return bool true有权限 false没有权限
 * @auhtor jxx 2017/10/7
 */
function check_action_power(code)
{
    var roleInfo = window.$glbTokenInfo.role_info;
    if(typeof roleInfo.menu_code == 'object'){
        if($.inArray(code, roleInfo.menu_code) !== -1 || $.inArray('ALL', roleInfo.menu_code) !== -1){
            return true;
        }
    }
    return false;
}