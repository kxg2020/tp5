/**
 * Created by Administrator on 2017/5/26.
 */
$(function () {

    /**
     * 点击切换
     */
    $('.captcha').click(function () {

        var src = $(this).attr('src');
        $(this).attr({'src':src+'?id='+Math.random()});
    });


    $('.button').click(function () {

        var username = $('input[name = username]').val();
        var password = $('input[name = password]').val();
        var captcha = $('input[name = captcha]').val();
        var remember = $('input[name = remember]:checked').val();

        if(username === ''){

            layer.tips('用户不能为空','input[name = username]',{tips:[2,'#916843']});return false;

        }
        if(password === ''){

            layer.tips('密码不能为空','input[name = password]',{tips:[2,'#916843']});return false;

        }
        if(captcha === ''){

            layer.tips('验证码不能为空','.captcha',{tips:[2,'#916843']});return false;

        }
        $.ajax({'type':'post','dataType':'json','url':location.protocol+'//'+window.location.host+'/login/check',
            'data':{'username':username,'password':password,'captcha':captcha,'remember':remember},
            success:function (e) {
              if(e.status === 0){layer.msg(e.msg,{time:500})}else {
                  location.href = location.protocol+'//'+window.location.host+'/index/index'
              }
            }
        });
    });
});