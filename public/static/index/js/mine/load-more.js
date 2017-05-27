/**
 * Created by Administrator on 2017/5/27.
 */
$(function () {
    var maxHright = 0;
    for(var i = 0; i<$('#content p').length; i++){
        maxHright+=$('#content p').eq(i).height()
    }
    if(maxHright<800){
        $('.loadMore').hide();
    }
    $('.loadMore').click(function () {

        var height = $('#content').height();
        var _height = height + 800;
        if(_height>maxHright){

            $('#content').animate({
                'height':maxHright+'px'
            });
            $(this).hide();
        }else {
            $('#content').animate({
                'height':_height+'px'
            });
        }

    });
});