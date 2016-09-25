$(document).ready(function () {
    $(document).on('click', '#uploadAvatar', function(){
        $("input:file").trigger('click');
    });
    $(document).on('click', '.subord', function () {
        var elem = $(this);
        var subId = elem.data('id');
        var childrenBlock = $('#'+subId);
        if(!childrenBlock.has('a').length > 0){
            $.ajax({
                url: "/subordinates/" + subId,
                success: function(data){
                    childrenBlock.append(data['html']);
                }
            });
        }else {
            childrenBlock.html(null);
        }
    });
    $(document).on('click', '#deleteEmployee', function(){
        var employee = $(this).data('id');
        var token = $(this).data('token');
        $.ajax({
            url: laroute.route('employee.delete', { employee : employee }),
            type: 'DELETE',
            data: {
                _token: token
            },
            success: function(data){
                console.log(data);
                if(data = true){
                 window.location.href = "/employees"
                 }
            }
        })

    });

        $('#search-button').click(function(){
            $.ajax({
                url: "/employees/search/" + $('#search-input').val(),
                success: function(data){
                    $('.list-group-root').html(data['html']);
                }
            })
        });


});