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
    // Dialog
    var dialog = document.querySelector('dialog');
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
    $('select:not(.normal)').each(function () {
        $(this).select2({
            dropdownParent: $(this).parent()
        });
    });
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
});

