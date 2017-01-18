<script>
    $('.edit-button').on('click', function () {
        var id = $(this).data('id');
        edit_id = id;
        var td = $(this).parent();
        var tr = td.parent();

        $('.edit-transaction').removeClass('hidden');
        $('.new-transaction').addClass('hidden');

        //Add warning class to tr and btn-primary to clicked button
        $('tr').removeClass('warning');
        tr.addClass('warning');
        $('.edit-button').removeClass('btn-primary').addClass('btn-warning');
        $(this).removeClass('btn-warning').addClass('btn-primary');

        //Get data from tr
        var date = tr.find("[data-date]").attr('data-date');
        var price = tr.find("[data-price]").attr('data-price');
        var category = tr.find("[data-category]").attr('data-category');
        var description = tr.find("[data-description]").attr('data-description');

        //Set data from tr to form
        $("#edit-date").val(date);
        $("#edit-price").val(price);
        $("#edit-category_id").val(category);
        $("#edit-description").val(description);

    });

    $('#edit-submit').on('click', function (event) {
        event.preventDefault();
        var form = $(".edit-transaction");
        var action = form.attr('action');

        //Add id to update route
        form.attr('action', action+'/'+edit_id);
        form.submit();
    })
</script>
