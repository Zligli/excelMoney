<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
    $('select').select2({
        placeholder: "Select categories"
    });

    $search_select = $('#search_select').select2({
        placeholder: "Select categories"
    });

    $('#search_clear').click(function () {
        $('#filter input').val('');
        $search_select.val(null).trigger("change");
    })
</script>