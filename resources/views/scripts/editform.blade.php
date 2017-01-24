<script>
    $('.edit-button').on('click', function () {
        var id = $(this).data('id');
        edit_id = id;
        var td = $(this).parent();
        var tr = td.parent();

        $("html, body").animate({ scrollTop: 0 }, "slow");

        $('.edit-form').removeClass('hidden');
        $('.new-form').addClass('hidden');

        $('.form-group').removeClass('has-error');

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
        var name = tr.find("[data-name]").attr('data-name');
        var type = tr.find("[data-type]").attr('data-type');
        var main_category_id = tr.find("[data-main_category_id]").attr('data-main_category_id');

        //Set data from tr to form
        $("#edit-date").val(date);
        $("#edit-price").val(price);
        $("#edit-category_id").val(category);
        $("#edit-description").val(description);
        $("#edit-name").val(name);
        $("#edit-type").val(type);
        $("#edit-main_category_id").val(main_category_id);
    });

    $('#edit-submit').on('click', function (event) {
        event.preventDefault();
        var form = $(".edit-form");
        console.log(form)
        var action = form.attr('action');

        //Add id to update route
        form.attr('action', action + '/' + edit_id);
        form.submit();
    });

    $('.cancel-edit').on('click', function () {
        $('.new-form').removeClass('hidden');
        $('.edit-form').addClass('hidden');

        $('tr').removeClass('warning');
        $('.edit-button').removeClass('btn-primary').addClass('btn-warning');

        $('.form-group').removeClass('has-error');
    })
</script>
