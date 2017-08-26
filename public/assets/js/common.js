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