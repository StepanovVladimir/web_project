$(function()
{
    $(".delete").on('click', function()
    {
        if (confirm("Вы действительно хотите удалить эту запись?"))
        {
            let id = $(this).attr("rel");
            let route = $(this).attr("route");
            let token = $(this).attr("token");
            $.ajax(
            {
                type: "DELETE",
                url: route,
                data: { _token: token, id: id },
                complete: function()
                {
                    location.reload();
                }
            });
        }
    });
});