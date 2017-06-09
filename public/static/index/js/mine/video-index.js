/**
 * Created by Administrator on 2017/6/6.
 */
$(function () {

    $('body').on('click','img',function () {

        $(this).parent().children('a').children('video').attr({'controls':'controls'}).get(0).play();
        $(this).hide();
    });
});