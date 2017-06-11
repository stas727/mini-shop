/**
 * Created by stasm on 06.04.2017.
 */
$(document).ready(function () {

    $('.imageUpload').on('change', function (e) {

        var
            f = e.target.files[0], // Первый выбранный файл
            reader = new FileReader,
            div = document.createElement('div');
        place = document.createElement('img');
        reader.readAsDataURL(f);
        reader.onload = function (e) { // Как только картинка загрузится
            place.src = e.target.result;
            /*place.style.cssText = 'width:70px;height:70px;';*/

            /*   $('.imageSet').prepend(place)*/
        }

        /*  if (window.File && window.FileReader && window.FileList && window.Blob) {
         document.querySelector("input[type=file]").addEventListener("change", onFileSelect, false);
         } else {
         console.warn("Ваш браузер не поддерживает FileAPI")
         }*/

        /*  $(document).ready(function () {
         $(".btn-pref .btn").click(function () {
         $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
         // $(".tab").addClass("active"); // instead of this do the below
         $(this).removeClass("btn-default").addClass("btn-primary");
         });
         });*/
        fd = new FormData();
        /*      console.log(this.files);*/
        fd.append("image", this.files[0]);
        box = $(this).closest('box');
        row = box.parent();
        if (fd) {
            $.ajax({
                url: '/admin/main/upload',
                type: "POST",
                data: fd,
                processData: false,
                contentType: false,
                beforeSend: function () {
                    /* $(".box").css("opacity", "0.2");*/
                    $("#message").html("<i id='spinner' class='fa fa-refresh fa-spin fa-5x' style='color: black; position: absolute; top: 50%; left: 50%;'></i>");
                },
                success: function (data) {

                    div = document.createElement('div')
                    div2 = document.createElement('div');
                    id = Math.random();
                    div.id =id;
                    div.className = 'ui-state-default ui-sortable-handle';
                    //-------------------alt

                    textarea = document.createElement('textarea');
                    textarea.type = 'text';

                    button =  document.createElement('button');
                    button.type = 'button'
                    button.id = id;
                    button.textContent = 'add';
                    button.className = 'btn btn-warning';
                    //---------------------


                    div2.appendChild(place)
                    div2.appendChild(textarea)
                    div2.appendChild(button)
                    div.appendChild(div2)
                    $('.imageSet').prepend(div)

                    //  var  newbox = box.clone();
                    box.remove();
                    // row.append(newbox);

                    /*    $("#spinner").css("display", "none");
                     $(".well").css("opacity", "1");
                     $("#form").trigger('reset');
                     $("#message").html(data);*/
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
                    url: '/admin/news/images/sort', // ссылка на обработчик
                    type: "POST",
                    data: {images: $('#sortable').sortable("toArray", {attribute: 'id'}), _token: token},
                    success: function (data) {
                        console.log($('#sortable').sortable("toArray"));
                    },
                    error: function () {
                        // обработка если надо
                    },
                });
            }
        });
    $("#dropzoneForm").disableSelection();
});


$("#sortable").sortable();
$("#sortable").disableSelection();
