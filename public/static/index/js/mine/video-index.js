/**
 * Created by Administrator on 2017/6/6.
 */
$(function () {

    var flag = false;
    $('body').on('click','.video',function () {

        if(flag){
            $(this).children('video').attr({'controls':'controls'}).get(0).pause();
            $(this).children('img').show();
            flag = false;

        }else {
            $(this).children('video').attr({'controls':'controls'}).get(0).play();
            $(this).children('img').hide();
            flag = true;
        }

    });
});