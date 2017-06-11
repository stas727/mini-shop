/**
 * Created by stasm on 10.04.2017.
 */

$(document).ready(function () {
    $('.imageUpload').on('change', function (e) {
        var f = e.target.files[0], // Первый выбранный файл
            reader = new FileReader,
            div = document.createElement('div');
        place = document.createElement('img');
        reader.readAsDataURL(f);
        reader.onload = function (e) { // Как только картинка загрузится
            place.src = e.target.result;
        };
        fd = new FormData();
        fd.append("image", this.files[0]);
        array = fd.getAll('image')
        box = $(this).closest('box');
        row = box.parent();
        if (fd) {
            $.ajax({
                url: '/admin/farsonova/upload/image',
                type: "POST",
                data: fd,
                processData: false,
                contentType: false,
                beforeSend: function () {
                    /* $(".box").css("opacity", "0.2");*/
                    $("#message").html("<i id='spinner' class='fa fa-refresh fa-spin fa-5x' style='color: black; position: absolute; top: 50%; left: 50%;'></i>");
                },
                success: function (data) {
                    data = jQuery.parseJSON(data);
                    console.log(data.src)
                    var div, button, buttonDel, textarea, div2, input;
                    div = document.createElement('div')
                    div2 = document.createElement('div')
                    id = data.id;
                    div.id = id;
                    div.className = 'ui-state-default ui-sortable-handle';
                    //-------------------alt
                    div.id = data.id;
                    textarea = document.createElement('textarea');
                    textarea.type = 'text';
                    textarea.className = 'alt';
                  /*  input = document.createElement('input');
                    input.type = 'text';
                    input.className = 'alt';*/
                    /*  textarea.style.opacity = '0.2';*/

                    button = document.createElement('button');
                    button.type = 'button'
                    button.id = id;
                    button.textContent = 'add alt';
                    button.className = 'btn btn-warning add';
                    button.onclick = function addAlt() {
                        token = $('#sortable').find('input[name=_token]').val();
                        element = $(this).closest('.ui-sortable-handle')
                        id = element.attr('id');
                        textarea = element.find('textarea')
                        alt = textarea.val();
                        $.ajax({
                            url: '/admin/farsonova/add/alt', // ссылка на обработчик
                            type: "POST",
                            data: {'id': id, '_token': token, 'alt': alt},
                            success: function (data) {
                                console.log('esfe')
                                textarea.css('background' , 'green');
                            },
                            error: function (e) {
                                // обработка если надо
                            },
                        });
                    }
                    /*   button.style.opacity = '0.2';*/
                    //---------------------
                    buttonDel = document.createElement('button');
                    buttonDel.type = 'button'
                    buttonDel.id = id;
                    buttonDel.textContent = 'delete';
                    buttonDel.className = 'btn btn-danger delete';
                    buttonDel.onclick = function deleteElement() {
                        token = $('#sortable').find('input[name=_token]').val();
                        element = $(this).closest('.ui-sortable-handle')
                        $.ajax({
                            url: '/admin/farsonova/delete/image', // ссылка на обработчик
                            type: "POST",
                            data: {'id': data.id, '_token': token, 'src': data.src},
                            success: function () {
                                element.remove();
                            },
                            error: function (e) {
                                // обработка если надо
                            },
                        });
                    }
                    div2.appendChild(place)
                    /*div2.appendChild(input)*/
                    div2.appendChild(textarea)
                    div2.appendChild(button)
                    div2.appendChild(buttonDel)
                    div.appendChild(div2)
                    $('.imageSet').prepend(div)
                }
            });
        }
    });


});
$(document).ready(function () {
    token = $(this).closest('form').find('input[name=_token]').val();

    $("#sortable").sortable(
        {
            cursor: 'move',
            update: function () {
                $.ajax({
                    url: '/admin/farsonova/images/sort', // ссылка на обработчик
                    type: "POST",
                    data: {images: $('#sortable').sortable("toArray", {attribute: 'id'}), _token: token},
                    success: function (data) {
                      /*  $('#sortable div:first-child' ).css('border', '2px solid green');*/
                    },
                    error: function () {
                        // обработка если надо
                    },
                });
            }
        });
    $("#dropzoneForm").disableSelection();


    $('.delete').on('click', function () {
        token = $(this).closest('form').find('input[name=_token]').val();

        element = $(this).closest('.ui-sortable-handle')
        id = element.attr('id');
        src = element.find('img').attr('src');
        $.ajax({
            url: '/admin/farsonova/delete/image', // ссылка на обработчик
            type: "POST",
            data: {'id': id, '_token': token, 'src': src},
            success: function (data) {
                element.remove();
            },
            error: function (e) {
                // обработка если надо
            },
        });
    });
    $('.add').on('click', function () {
        token = $(this).closest('form').find('input[name=_token]').val();

        element = $(this).closest('.ui-sortable-handle')
        id = element.attr('id');
        alt = element.find('textarea').val();
        $.ajax({
            url: '/admin/farsonova/add/alt', // ссылка на обработчик
            type: "POST",
            data: {'id': id, '_token': token, 'alt': alt},
            success: function (data) {
                /*   element.remove();*/
            },
            error: function (e) {
                // обработка если надо
            },
        });
    });
});


$("#sortable").sortable();
$("#sortable").disableSelection();

