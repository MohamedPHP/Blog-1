$(document).ready(function() {

    $(document).on('click', '#addCat', function(event) {
        event.preventDefault();
        var inputname = $('#cat_name');
        var catname = inputname.val();

        $.ajax({
            method: 'POST',
            url: addroute,
            data: {
                name: catname,
                _token: token,
            },
            success: function (response) {
                inputname.val("");
                $('table tbody').append(response);
                alert('The Categoury Added Successfully');
            },
            error: function (xhr) {
                var errors = xhr.responseJSON;
                alert(errors.name);
            }
        });
    });
    var name;
    $(document).on('click', '.edit', function(event) {
        event.preventDefault();
        var nametr = $(this).parent().siblings('.name');
            name = nametr.text();
        nametr.html('<input type="text" value="'+name+'" /> <button class="btn btn-info save">Save</button> <button class="btn btn-danger cancel">Cancel</button>');
    });

    $(document).on('click', '.cancel', function(event) {
        event.preventDefault();
        $(this).parent().html(name);
    });
    $(document).on('click', '.save', function(event) {
        event.preventDefault();
        var btn = $(this);
        var editedname = $(this).parent().children('input').val();
        var idedit = $(this).parent().data('idedit');
        $.ajax({
            method: 'POST',
            url: editroute,
            data: {
                id: idedit,
                name: editedname,
                _token: token,
            },
            success: function (response) {
                btn.parent().html("").text(response.name);
            },
            error: function (xhr) {
                var errors = xhr.responseJSON;
                alert(errors.name);
            }
        });
    });
});
