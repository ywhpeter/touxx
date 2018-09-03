$(function () {

    let spinner=$('#spinner');
    $(document) .ajaxStart(function(){
        spinner.show()
    });

    $(document) .ajaxComplete(function(){
        spinner.hide()
    });


    $('#tbody').on('click', '.remove', function () {
        let id = $(this).closest('tr').attr('data-id');
        $.ajax({
            url: '/web/admin.php?c=news&m=delete&id=' + id,
            success: function (data) {
                if (data == 1) {
                    location.reload();
                } else {
                    alert('error')
                }
            }
        })

    });


    $('#tbody').on('blur', '.form-control', function () {

        let id=$(this).closest('tr').attr('data-id');
        let k=$(this).attr('data-type');
        let v=$(this).val();
        $.ajax({
            url: 'admin.php?c=news&m=update',
            data:{
                id:id,
                k:k,
                v:v
            }
    })

    })

    let add = $('#adda');

    add.on('click', function () {
        $.ajax({
            url: '/web/admin.php?c=news&m=insert',
            success: function (data) {
                if (data == 1) {
                    location.reload();
                } else {
                    alert('error')
                }
            }

        })
    });

    let progress = $('#progress');

})