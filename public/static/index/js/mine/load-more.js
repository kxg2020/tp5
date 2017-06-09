/**
 * Created by Administrator on 2017/5/27.
 */
$(function () {
    var maxHright = 0;
    for(var i = 0; i<$('#contents p').length; i++){
        maxHright+=$('#contents p').eq(i).height()
    }
    if(maxHright<800){
        $('.loadMore').hide();
    }
    $('.loadMore').click(function () {

        var height = $('#contents').height();
        var _height = height + 800;
        if(_height>maxHright){

            $('#contents').animate({
                'height':maxHright+'px'
            });
            $(this).hide();
        }else {
            $('#contents').animate({
                'height':_height+'px'
            });
        }

    });
});