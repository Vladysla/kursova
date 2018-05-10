$(document).ready(function () {
    $('#btn-serch-val').click(function () {
        var text = $('#inp-hidden-genre').val();
        if(text !== ''){
            $.ajax({
                url: "../../components/ajax/ganres_pick.php",
                method: "post",
                data: {search:text},
                dataType: "text",
                beforeSend: function() {
                    $('.actors-list').html('');
                    $('.mdl-spinner').addClass('is-active');
                },
                complete: function() {
                    $('.mdl-spinner').removeClass('is-active');
                },
                success: function (data) {
                    $('.row.actors-list').append(data);
                }
            });
        }else {
            $(".row.actors-list").html('<h2>Актеров нету!</h2>');
        }
    });

    $('#btn-serch-val-impresario').click(function () {
        var text = $('#inp-hidden-impresario').val();
        if(text !== ''){
            $.ajax({
                url: "../../components/ajax/impresario_pick.php",
                method: "post",
                data: {searchImpresario:text},
                dataType: "text",
                beforeSend: function() {
                    $('.actors-list-impresario').html('');
                    $('.mdl-spinner').addClass('is-active');
                },
                complete: function() {
                    $('.mdl-spinner').removeClass('is-active');
                },
                success: function (data) {
                    console.log(data);
                    $('.row.actors-list-impresario').append(data);
                }
            });
        }else {
            $(".row.actors-list-impresario").html('<h2>Актеров нету!</h2>');
        }
    });

    $('.actors-list').on('click','button',function () {
        $(this).siblings().toggleClass('is-visible');
    });
    $('.actors-list-impresario').on('click','button',function () {
        $(this).siblings().toggleClass('is-visible');
    });
    // Dialog
    var dialog = document.querySelector('dialog');
    if(dialog){
        var showDialogButton = document.querySelector('#btn-add-some');
        if (! dialog.showModal) {
            dialogPolyfill.registerDialog(dialog);
        }
        showDialogButton.addEventListener('click', function() {
            dialog.showModal();
        });
        dialog.querySelector('.close').addEventListener('click', function() {
            dialog.close();
        });
    }
    $('#ganers:not(.normal)').each(function () {
        $(this).select2({
            dropdownParent: $(this).parent()
        });
    });
    $('#impresario:not(.normal)').each(function () {
        $(this).select2({
            dropdownParent: $(this).parent()
        });
    });
    $("#ganers-update").select2();
    $("#impresario-update").select2();
    //Delete actor
    $(".act-list").on('click', '.delete-actor', function () {
        var $id = $(this).attr('id-actor');
        var el = $(this).parent().parent().parent().parent().parent().parent();
        var snackbarContainer = document.querySelector('#demo-toast-example');
        $.ajax({
            url: "../../components/ajax/actor_delete.php",
            method: "post",
            data: {actor_id:$id},
            dataType: "text",
            success: function () {
                snackbarContainer.MaterialSnackbar.showSnackbar({message: 'Актер был удален'});
                el.fadeOut().remove();
            }
        });
    });
    //=======  BUILDINGS  ============//
    $("#all-buildings").on('click', 'button', function () {
        $(this).siblings().toggleClass('is-visible');
    });
    // SELECT BUILDINGS BY TYPES
    $("#building-cinema-types").hide();
    $("#bld-type").change(function () {
        if ($("#building-type").val() === "cinema"){
            $("#building-cinema-types").show();
        }else {
            $("#building-cinema-types").hide();
        }
    });
    $("#bld-screen, #bld-holes, #bld-image").change(function () {
        var $type = $("#building-type").val();
        var $size = $("#building-screen").val();
        var $holes = $("#building-holes").val();
        var $3d = $("#building-image").val();
        $.ajax({
            url: "../../components/ajax/building_pick.php",
            method: "post",
            data: {screen_size:$size, bld_type: $type, bld_holes: $holes, support_3d: $3d},
            dataType: "text",
            beforeSend: function() {
                $('.buildings-by-types-list').html('');
                $('.mdl-spinner').addClass('is-active');
            },
            complete: function() {
                $('.mdl-spinner').removeClass('is-active');
            },
            success: function (data) {
                $(".buildings-by-types-list").append(data)
            }
        });
    })
});

