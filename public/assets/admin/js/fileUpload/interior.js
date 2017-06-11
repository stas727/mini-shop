/**
 * Created by stasm on 06.04.2017.
 */
/**
 * Created by stasm on 06.04.2017.
 */


$(document).ready(function () {
    token = $(this).closest('form').find('input[name=_token]').val();

    $("#sortable").sortable(
        {
            cursor: 'move',
            update: function () {
                $.ajax({
                    url: '/admin/interior/images/sort', // ссылка на обработчик
                    type: "POST",
                    data: {images: $('#sortable').sortable("toArray", {attribute: 'id'}), _token: token},
                    success: function (data) {

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
            url: '/admin/interior/create/delete/image', // ссылка на обработчик
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



});

function addAlt(url , el) {

    token = $(el).closest('form').find('input[name=_token]').val();

    element = $(el).closest('.ui-sortable-handle')
    id = element.attr('id');
    thistextarea = element.find('textarea')
    alt = thistextarea.val();
    if(alt != ''){
        $.ajax({
            url: url, // ссылка на обработчик
            type: "POST",
            data: {'id': id, '_token': token, 'alt': alt},
            success: function (data) {
                thistextarea.css('background' , '#bedebe');
            },
            error: function (e) {
                // обработка если надо
            },
        });
    }else{
        alert('enter click')
    }
}
$("#sortable").sortable();
$("#sortable").disableSelection();

