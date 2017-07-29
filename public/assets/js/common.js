function alert_msg(title, content, href)
{
    $('#alert-modal').html($('#alert-modal').html().replace('{{title}}', title||'').replace('{{content}}', content||''));
    $('#alert-modal').modal();
    if(href){
        $('#alert-modal').on('closed.modal.amui', function(){
            window.location.href = href;
        });
    }
}