/**
 * 公共JS库
 */

/**
 * post异步请求
 * @param url 请求地址
 * @param postData 请求参数
 * @param cb 回调函数
 * @author jxx
 * @time 2017/4/2
 */
function ajax_post(url, postData, cb)
{
    ajax(url, 'POST', postData, cb);
}

/**
 * 异步请求
 * @param url 请求地址
 * @param method 请求方法
 * @param postData 请求参数
 * @param cb 回调函数
 * @author jxx
 * @time 2017/4/2
 */
function ajax(url, method, postData, cb)
{
    $.ajax({
        url: url,
        type: method,
        data: postData,
        dataType: 'json',
        success: function(res) {
            cb(res);
        }
    });
}

function setCookie(name, value, time)
{
    var strsec = getsec(time);
    var exp = new Date();
    exp.setTime(exp.getTime() + strsec*1);
    document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
}

function getsec(str)
{
    var str1 = str.substring(0, str.length-1)*1;
    var str2 = str.substring(str.length-1);
    if(!str2 || str2 == 's')
    {
        return str1*1000;
    }
    else if(str2 == 'h')
    {
        return str1*60*60*1000;
    }
    else if(str2 == 'd')
    {
        return str1*24*60*60*1000;
    }
}