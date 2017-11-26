function alert_msg(title, content, href)
{
    $('#alert-modal .row-title').html(title || '');
    $('#alert-modal .row-content').html(content || '');
    var $confirm = $('#alert-modal');
    var confirm = $confirm.data('amui.modal');
    var onConfirm = function() {
        if(href){
            window.location.href = href;
        }
    };
    var onCancel = function() {
        if(href){
            window.location.href = href;
        }
    };
    //每次重新绑定，解决 onConfirm/onCancel 会保存第一次运行 Modal 时候的数据，导致在某些场景不能按照预期工作
    if (confirm) {
        confirm.options.onConfirm = onConfirm;
        confirm.toggle(this);
    } else {
        $confirm.modal({
            closeViaDimmer: false,
            relatedElement: this,
            onConfirm: onConfirm
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