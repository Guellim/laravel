$(document).ready(function(){

    $('.add').click(function(){
        $('#formpost').trigger("reset");
        $('#addPost').removeAttr( "data-id" );
        $('#addPost').modal('show');
    });

    //display modal form for product EDIT ***************************
    //$(document).on('click','.edit',function(){
    $( "#tablepost" ).on('click', 'tr .edit', function( event ) {
        var id = $(this).closest('tr').data( "id" );

        // Populate Data in Edit Modal Form
        $.ajax({
            type: "GET",
            url: 'post/' + id,
            success: function (data) {
                console.log(data);
                // $('#id').val(data.id);
                $('#title').val(data.title);
                $('#body').val(data.body);
                //$('#btn-save').val("update");
                $('#addPost').modal('show');
                $("#addPost form").attr('action','editPost') ;
                $('#addPost').attr('data-id',id);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });



    $( "#addPost form" ).submit(function( event ) {
        //$( "#addPost" ).on('click', '[data-target="#addPost"]', function( event ) {
        event.preventDefault();
        var url = $(this).attr('action');
        var formData = new FormData($('#addPost form')[0]);
        var id = $("#addPost").attr('data-id');
        console.log(id);
        if (id !== ''){
        formData.append('id', id);
        }

        $.ajax({

            type: 'POST',
            url: url,
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (data) {
                console.log('success');
                $('#addPost').modal('toggle');
                link = $('.pagination .page-item:last-child a').attr('href');
                getPosts(link);
            },
            error: function () {
                console.log('error');
            }
        });

        // stop the form from submitting the normal way and refreshing the page

    });


    $( "#tablepost" ).on('click', 'tr .delete', function( event ) {
        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();

        var id = $(this).closest('tr').data( "id" );
        var url = $(this).closest('form').attr('action');

        console.log(id);

        $.ajax({

            type: 'POST',
            url: url,
            data: {
                'id': id
            },
            success: function () {
                $(".post"+ id ).remove();
                console.log('success');


            },
            error: function () {
                console.log('error');
            }
        });

    });

    $(document).on('click', '.pagination a', function (e) {
        e.preventDefault();
        link = $(this).attr('href');
        getPosts(link);
    });
    function getPosts(link) {
        $('#hello-world').load(link+' #hello-world');
    }


});



