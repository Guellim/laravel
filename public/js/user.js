$(document).ready(function(){

    $('#addUser').on('shown.bs.modal', function () {
    });
    ajaxLoad();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#addUser form ').on('submit', function (event) {

        event.preventDefault();
        var form = $(this);
        var data = new FormData($(this)[0]);
        console.log(data);

        var url = form.attr("action");
        console.log(url);

        $.ajax({
            type: form.attr('method'),
            url: url,
            data: data,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $('.is-invalid').removeClass('is-invalid');
                if (data.fail) {
                    for (control in data.errors) {
                        $('#' + control).addClass('is-invalid');
                        $('#error-' + control).html(data.errors[control]);
                    }
                } else {
                    $('#addUser').modal('toggle');
                    $('#user_table').DataTable().ajax.reload();

                }
            },
            error: function (xhr, textStatus, errorThrown) {
                alert("Error: " + errorThrown);
            }
        });
        // return false;
    });


    function ajaxDelete(filename, token, content) {
        content = typeof content !== 'undefined' ? content : 'content';
        $('.loading').show();
        $.ajax({
            type: 'POST',
            data: {_method: 'DELETE', _token: token},
            url: filename,
            success: function (data) {
                $("#" + content).html(data);
                $('.loading').hide();
            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    }



    $('#user_table').on('click', 'a.editor_edit', function (e) {
        e.preventDefault();

         alert($(this).closest('tr').children('td'));
    } );

    // Delete a record
    $('#user_table').on('click', 'a.editor_remove', function (e) {
        e.preventDefault();

        editor.remove( $(this).closest('tr'), {
            title: 'Delete record',
            message: 'Are you sure you wish to remove this record?',
            buttons: 'Delete'
        } );
    } );
    function ajaxLoad(){
    $('#user_table').DataTable({

        "processing": true,
        "serverSide": true,
        ajax: {
            url: $('#user_table').data( "url" ),
        },
        columns:[
            { "data": "id" },
            { "data": "name" },
            { "data": "email" },
            { "data": "firstName" },
            { "data": "lastName" },
            { "data": "mobile" },
            { "data": "birthday" },
            { "data": "gender" },
            { "data": "activation" },
            { "data": "role" },
            {
                data: null,
                className: "center",
                defaultContent: '<a href="" class="editor_edit">Edit</a> / <a href="" class="editor_remove">Delete</a>'
            }
        ],
        "createdRow": function ( row, data, index ) {
            var result = "";
            result += "<div class='datatable-action-buttons'><a  href='' data-id='"+data['id']+"' class='action-button btn btn-info btn-sm btn-info '><i class='fa fa-pencil-square' aria-hidden='true'></i> </a>";
            result +="<a  class='detachDoctorBtn action-button btn btn-info btn-sm btn-danger '  data-id='"+data['id']+"' data-toggle='confirmation' data-btn-ok-label='Détacher' data-btn-ok-icon='fa fa-remove' data-btn-ok-class='btn btn-sm btn-danger' data-btn-cancel-label='Annuler' data-btn-cancel-icon='fa fa-chevron-circle-left' data-btn-cancel-class='btn btn-sm btn-default' data-title='Êtes-vous sûr de vouloir détacher ce médecin ?' data-placement='left' data-singleton='true'> <i class='fa fa-trash-o'></i></a>";
            $('td', row).eq(10).empty().append(result);

        },


    });
    }




});