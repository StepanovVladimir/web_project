$(window).on('load', onWindowLoaded);

function onWindowLoaded()
{
    $(".delete").on('click', deleteItem);
    $(".post_delete").on('click', deletePost);
    $(".change_role").on('click', changeRole);
    $("#submit_comment").on('click', validateComment);
    $("#submit_post").on('click', validatePost);
    $("#submit_category").on('click', validateCategory);
    $(".edit_comment").on('click', showEditComment);
    $(".cancellation_edit").on('click', closeEditComment);
}

function deleteItem()
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
}

function deletePost()
{
    if (!confirm("Вы действительно хотите удалить эту запись?"))
    {
        event.preventDefault();
    }
}

function changeRole()
{
    let route = $(this).attr("route");
    let token = $(this).attr("token");
    $.ajax(
    {
        type: "PUT",
        url: route,
        data: { _token: token },
        complete: function()
        {
            location.reload();
        }
    });
}

function validateComment()
{
    var required = CKEDITOR.instances.comment.getData();
    if (required == '')
    {
        event.preventDefault();
        alertify.error("Вы не написали комментарий");
    }
}

function validatePost()
{
    var required = $('.required');
    for (var i = 0; i < required.length; i++)
    {
        if (required[i].value == '')
        {
            event.preventDefault();
            alertify.error("Вы не заполнили все поля");
            return;
        }
    }
    
    var description = CKEDITOR.instances.description.getData();
    var content = CKEDITOR.instances.content.getData();
    if (description == '' || content == '')
    {
        event.preventDefault();
        alertify.error("Вы не заполнили все поля");
    }
}

function validateCategory()
{
    var required = $('#name');
    if (required.val() == '')
    {
        event.preventDefault();
        alertify.error("Вы не заполнили название катерогии");
    }
}

function showEditComment()
{
    let id = $(this).attr("rel");
    $('#comment_' + id).css('display', 'none');
    $('#edit_' + id).css('display', 'block');
}

function closeEditComment()
{
    let id = $(this).attr("rel");
    $('#edit_' + id).css('display', 'none');
    $('#comment_' + id).css('display', 'block');
}