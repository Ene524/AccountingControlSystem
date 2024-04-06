<script>
    $(document).ready(function () {
        $('.deleteCompany').click(function () {
            event.preventDefault();

            let company_id = $(this).data('id');
            console.log(company_id);
        });
    });
</script>