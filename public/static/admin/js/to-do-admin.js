
	
	$('body').on('click', '#sortable-todo li input',function(e) {
		
		if($(this).is(":checked"))
		{
			$("#sortable-todo li.todo-list-active").removeClass('todo-list-active');
			$(this).closest('li').addClass('todo-list-active');
			$(this).closest('li').wrap("<strike>");
		}
		else
		{
			$(this).closest('li').removeClass('todo-list-active');
			$(this).closest('li').unwrap();
		}
		
	});
	$('body').on('click','.todo-remove', function(e) {

		id = $(this).attr('data-id');
		//>> 删除数据
		$.ajax({
			'type':'post',
			'dataType':'json',
			'url':location.protocol+'//'+window.location.host+'/Article/delete',
			'data':{'id':id},
			success:function (e) {

               if(e.status == 1){

                   $(this).closest('li').remove();
			   }
            }.bind(this)
		});

	});
	$(document).ready(function(){
		$('.todo-list-active').wrap("<strike>");
		$('#sortable-todo li input[type="checkbox"]').prop("checked", false);
		$('.todo-list-active input[type="checkbox"]').prop("checked", true);
		
	});