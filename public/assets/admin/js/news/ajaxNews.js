/**
 * Created by stas_ on 26.03.2017.
 */
$(document).ready(function () {
    $("#addNews").on("submit", function (event) {
        event.preventDefault();
        form = $(this).serializeArray();
        $(this).addClass('disabled');
        /* id = $(this).parent().find('input[name=id]').val();

         parent = $(this).parent();*/
        if(form.title == ""){
            alert('empty value');
        }
        body = $('#ck-editor').val();
        if (!body) {
            body = CKEDITOR.instances['ck-editor'].getData();
        }
        if(body !== ""){
            if($('#name').val() !== ''){
                form.push({name: 'article', value: body});
                $.ajax({
                    url: 'news/add',
                    type: 'POST',
                    data: form,
                    success: function (data) {
                        data = jQuery.parseJSON(data);
                        $('#name').val('');
                        $('.cke_show_borders').val('');
                        console.log(data);
                        var str;
                        str = " <li class=\"warning-element"
                        id = "task"+data.id+"\">";
                        str += " <form action=\"/update\" method=\"post\">";
                        str += "<input type=\"hidden\" name=\"id\" value=\""+data.id+"\">";
                        str += "<input type=\"hidden\" name=\"_token\" value=\""+data._token+"\">";
                        str += "<div class=\"header\">";
                        str += "<strong>"+data.title+"</strong> </div>";
                        str += data.article
                        str += " <div class=\"switch pull-right\"><div class=\"onoffswitch\">"
                        str += " <input type=\"checkbox\" checked class=\"onoffswitch-checkbox\" id=\"news" + data.id + "\">";
                        str += "  <label class=\"onoffswitch-label\" for=\"news"+data.id+"\">";
                        str += "   <span class=\"onoffswitch-inner\"></span>"
                        str += "   <span class=\"onoffswitch-switch\"></span> </label> </div> </div>";
                        str += "<div class=\"agile-detail\">";
                        str += " <i class=\"fa fa-clock-o\"></i> " + data.date;
                        str += " </div>  <div class=\"pull-left\"> <a class=\"btn btn-xs btn-white edit\">edit </a> <a class=\"btn btn-xs btn-danger delete\">del</a> </div> </form> </li>";
                        $('#newsAll').prepend(str);
                        var error;
                        error = "  <div class=\"panel panel-success\"> <div class=\"panel-heading\"> <i class=\"fa fa-warning\"></i> Ошибка </div> <div class=\"panel-body\"> <p>Статья "+data.title+" успешно создана!</p> </div> </div>";
                        $('#messages').html("");
                        $('#messages').append(error);
                        setTimeout(function () {
                            $('#messages').html("");
                        }, 3000);

                    }
                })
            }else{
                var error;
                error = "  <div class=\"panel panel-warning\"> <div class=\"panel-heading\"> <i class=\"fa fa-warning\"></i> Ошибка </div> <div class=\"panel-body\"> <p>Введите название статьи</p> </div> </div>";
                $('#messages').html("");
                $('#messages').append(error);
                setTimeout(function () {
                    $('#messages').html("");
                }, 3000);
            }
        }else{
            var error;
            error = "  <div class=\"panel panel-warning\"> <div class=\"panel-heading\"> <i class=\"fa fa-warning\"></i> Ошибка </div> <div class=\"panel-body\"> <p>Введите статью</p> </div> </div>";
            $('#messages').html("");
            $('#messages').append(error);
            setTimeout(function () {
                $('#messages').html("");
            }, 3000);
        }

    });
    $('.edit').click(function (e) {
        e.preventDefault();
        //$(this).addClass('disabled');
        $('#runModal').click();
        var id = $(this).parent().find('input[type=hidden]').val();
        var new_name = $(this).parent().find("input[name=category]").val();
        $('#new_category').val(new_name).parent().find("input[type=hidden]").remove();
        $('#new_category').parent().append("<input type='hidden' value='" + id + "' name='id_cat'>");
    });
    $('.delete').click(function (e) {
        e.preventDefault();
        //$(this).addClass('disabled');
        var id, token;
       id = $(this).closest('form').find('input[name=id]').val();
        console.log(id);
       token = $(this).closest('form').find('input[name=_token]').val();
        console.log(token);
        $.ajax({
            url: 'news/delete',
            type: 'POST',
            data: {'id': id, '_token' : token},
            success: function (data) {
                var error;
                error = "<div class=\"panel panel-success\"> <div class=\"panel-heading\"> <i class=\"fa fa-warning\"></i> Готово </div> <div class=\"panel-body\"> <p>Статья "+data+" успешно удалена!</p> </div> </div>";
                $('#messages').html("");
                $('#messages').append(error);
                setTimeout(function () {
                    $('#messages').html("");
                }, 3000);

            }
        })
       $(this).closest('li').remove();
    });
})
$(document).on('click', '.onoffswitch-checkbox', function (e) {                                                          //Изменения статуса новости
    var check = $(this).prop("checked");
    var id = $(this).closest('form').find("input[name=id]").val();
    if (check) {
        check = "public";
    } else {
        check = 'save';
    }
    token = $("input[name=_token]").val()

    $.ajax({
        url: "news/status",
        data: {'id': id, 'status': check, '_token': token},
        type: 'POST',
        success: function () {

        },
        error: function (data) {
            $.post('url', data, function(response) {
                console.log(response);
            });
        }
    })
})