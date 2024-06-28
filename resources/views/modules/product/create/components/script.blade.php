<script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

<script>
    $('.select2').select2();
    let is_witholding = $('#is_witholding');
    let witholding_id = $('#witholding_id');
    is_witholding.on('change', function () {
        if ($(this).is(':checked')) {
            witholding_id.prop('disabled', false);
        } else {
            witholding_id.prop('disabled', true);
        }
    });
</script>



