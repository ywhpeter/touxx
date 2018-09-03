$(function () {
    $('#ul').on('click', '.remove', function () {
        var id = $(this).closest("li").attr('data-id');
        $.ajax({
            url: '/web/admin.php',
            data: {
                c:'news',
                m:'delete',
                id: id
            },
            success: function (data) {
                if (data == '1') {
                    alert('杀出成功');
                    location.reload();
                } else {
                    alert('杀出失败');
                    console.log(data)
                }
            }
        });

        // $(this).closest("li").remove();
    })


    $('#ul').on('blur', 'input', function () {
        var title = $(this).val();
        var id = $(this).closest("li").attr('data-id');

        $.ajax({
            url:'/web/admin.php',
            data:{
                c:'news',
                m:'update',
                id:id,
                title:title
            },
            success:function(data) {

            }
        })
    })

    $('#submit').on('click',function () {
            $.ajax({
                url:'/web/admin.php',
                data:{
                    c:'news',
                    m:'insert',
                    title:$('#title').val(),
                    dsc:$('#dsc').val(),
                    content:$('#content').val()
                },
                success:function(data){
                    if (data == '1') {
                        alert('杀出成功');
                        location.reload();
                    } else {
                        alert('杀出失败');
                    }
                }

            })
    })
});
