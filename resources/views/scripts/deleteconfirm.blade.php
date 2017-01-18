<script>
    $('#modal-delete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        id = button.data('id');
    });

    $("#deleteConfirmed").on('click', function () {
        $('#delete_'+id).submit();
    })
</script>