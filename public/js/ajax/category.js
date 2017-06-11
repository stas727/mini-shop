//добавление html вывода сообщений как результат аякс запросов
$(document).ready(function (){
   $(document).find('#panel').prepend('<li><div id="message" class="m-r-sm"></div></li>');
});

//при выборе категории вывод подкатегорий
token = $("input[name=_token]").val()
$("#selectCategory").change(function () {

    if ($(this).val() == '0') {
        category = "";
    } else {
        category = $(this).val();
    }
    if (category != "") {
        $.ajax({
            url: 'get/subCategory',
            type: 'POST',
            data: {category: category, _token: token},
            success: function (data) {
                if (data != "error") {
                    $('#subcategory').html("");
                    $('#subcategory').append(data);
                } else {
                    $('#subcategory').html(" <div class=\"ibox\"><div class=\"ibox-title\"><h5>Отправка сообщения...</h5></div><div class=\"ibox-content\"><div class=\"spiner - example\"><div class=\"sk-spinner sk-spinner-cube-grid\"><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div></div></div></div></div>");
                    setTimeout(function () {
                        $('#subcategory').html("<div class=\"mail-box-header\">Сообщение отправлено!</div><br><div class=\"mail-body\"><a href='http://webnote/admin/messages/filter/send' class=\"btn btn-warning\">Посмотреть отправленные</a><br><a href='http://webnote/admin/messages/writeMessage/' class=\"btn btn-info\">Написать новое</a></div>");
                    }, 1000);
                }
            },
            error: function (xhr, textStatus) {
                $('#subcategory').html("<div class='content-message'><i class='fa fa-exclamation-circle fa-4x'></i> <h2>Ошибка загрузки сообщения</h2> <p>Попробуйте обновить страницу.</p></div>");
                setTimeout(function () {
                    $('#subcategory').html("");
                }, 3000);
            }
        });
    } else {
        $('#subcategory').html("");
    }
});
//удаление подкатегории
$(document).on('click', '#delSubCut', function () {
    subcategory = $('#subcategory').val();
    $('#message').html("<div class=\"spiner - example\"><div class=\"sk-spinner sk-spinner-cube-grid\"><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div></div></div><h5>Обработка запроса...</h5>");
    if (typeof category != 'undefined') {
        $.ajax({
            url: 'delete/subcategory',
            type: 'POST',
            data: {category: category, subcategory: subcategory[0], _token: token},
            success: function (data) {
                if (data == "error") {
                    $('#message').html("<div class=\"mail-box-header alert-danger\">Категория не удалена!</div>");
                } else {
                    setTimeout(function () {
                        $('#message').html("<div class=\"mail-box-header alert-success\">Категория удалена!</div>");
                        $('#subcategory').html("");
                        $('#subcategory').append(data);
                    }, 1000);
                }
            },
            error: function (xhr, textStatus) {
                $('#message').html("<div class='content-message'><i class='fa fa-exclamation-circle fa-4x'></i> <h2>Ошибка</h2> <p>Попробуйте обновить страницу.</p></div>");
                setTimeout(function () {
                    $('#message').html("");
                }, 3000);
            }
        });
    } else {
        $('#selectCategory').css({border: "1px solid red"});
    }
})
//добавление подкатегории
$(document).on('click', '#addSubCut', function () {
    subcategory = $('#newSubCat').val();
    pattern = /^[\s]+$/;
    if (typeof category != 'undefined' && category != "") {
        if (!pattern.test(subcategory) && subcategory != "") {
            $('#newSubCat').css({border: "inherit"})
            $('#message').html("<div class=\"spiner - example\"><div class=\"sk-spinner sk-spinner-cube-grid\"><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div></div></div><h5>Обработка запроса...</h5>");
            $.ajax({
                url: 'add/subcategory',
                type: 'POST',
                data: {category: category, subcategory: subcategory, _token: token},
                success: function (data) {
                    if (data == "error") {
                        $('#message').html("<div class=\"mail-box-header alert-danger\">Категория не добавлена!</div>");
                    } else {
                        setTimeout(function () {
                            $('#message').html("<div class=\"mail-box-header alert-success\">Категория добавлена!</div>");
                            $('#subcategory').html("");
                            $('#newSubCat').val('');
                            $('#subcategory').append(data);
                        }, 1000);
                    }
                },
                error: function (xhr, textStatus) {
                    $('#message').html("<div class='content-message'><i class='fa fa-exclamation-circle fa-4x'></i> <h2>Ошибка</h2> <p>Попробуйте обновить страницу.</p></div>");
                    setTimeout(function () {
                        $('#message').html("");
                    }, 3000);
                }
            });
        } else {
            $('#newSubCat').css({border: "1px solid red"}).attr({placeholder: 'Введите название категории'})
            $('#message').html('Введите название категории');
        }
    } else {
        $('#selectCategory').css({border: "1px solid red"});
        $('#message').html('Выберете категорию');
    }
});
//добавление категории
$(document).on('click', '#addCut', function () {
    newcategory = $('#newCat').val();
    pattern = /^[\s]+$/;
    if (!pattern.test(newcategory) && newcategory != "") {
        $('#newCat').css({border: "inherit"})
        $('#message').html("<div class=\"spiner - example\"><div class=\"sk-spinner sk-spinner-cube-grid\"><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div></div></div><h5>Обработка запроса...</h5>");
        $.ajax({
            url: 'add/category',
            type: 'POST',
            data: {newcategory: newcategory, _token: token},
            success: function (data) {
                if (data == "error") {
                    $('#message').html("<div class=\"mail-box-header alert-danger\">Категория не добавлена!</div>");
                } else {
                    setTimeout(function () {
                        $('#message').html("<div class=\"mail-box-header alert-success\">Категория добавлена!</div>");
                        $('#categoryFirst').html("");
                        $('#newCat').val('');
                        $('#categoryFirst').append(data);
                    }, 1000);
                }
            },
            error: function (xhr, textStatus) {
                $('#message').html("<div class='content-message'><i class='fa fa-exclamation-circle fa-4x'></i> <h2>Ошибка</h2> <p>Попробуйте обновить страницу.</p></div>");
                setTimeout(function () {
                    $('#message').html("");
                }, 3000);
            }
        });
    } else {
        $('#newCat').css({border: "1px solid red"}).attr({placeholder: 'Введите название категории'})
        $('#message').html('Введите название категории');
    }
});
//удаление категории
$(document).on('click', '#delCut', function () {
    categoryFirst = $('#categoryFirst').val();
    if (typeof categoryFirst != 'undefined' && categoryFirst != "" && categoryFirst != null) {
        $('#message').html("<div class=\"spiner - example\"><div class=\"sk-spinner sk-spinner-cube-grid\"><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div><div class=\"sk-cube\"></div></div></div><h5>Обработка запроса...</h5>");
        $.ajax({
            url: 'delete/category',
            type: 'POST',
            data: {category: categoryFirst[0], _token: token},
            success: function (data) {
                if (data == "error") {
                    $('#message').html("<div class=\"mail-box-header alert-danger\">Категория не удалена!</div>");
                } else {
                    setTimeout(function () {
                        $('#message').html("<div class=\"mail-box-header alert-success\">Категория удалена!</div>");
                        $('#categoryFirst').html("");
                        $('#categoryFirst').append(data);
                    }, 1000);
                }
            },
            error: function (xhr, textStatus) {
                $('#message').html("<div class='content-message'><i class='fa fa-exclamation-circle fa-4x'></i> <h2>Ошибка</h2> <p>Попробуйте обновить страницу.</p></div>");
                setTimeout(function () {
                    $('#message').html("");
                }, 3000);
            }
        });
    } else {
        $('#categoryFirst').css({border: "1px solid red"});
        $('#message').html('Выберите категорию');
    }
})