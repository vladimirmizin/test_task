
$(document).ready(function(){
    $('.submit_form').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/comment/add',
            data: $(this).serialize(),
            success: function(result){
                $('#comment_body').val("")
                $('#comments').html(result);
            }
        });
    });
    $('.showbutton').on('click', function () {
        console.log('123')
        $(this).siblings(".showblock").toggle("slow");
    });
});