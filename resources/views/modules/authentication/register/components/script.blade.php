<script>
    $(document).ready(function () {
        var isPerson = document.querySelector('input[name="is_person"]');
        var firstName = document.querySelector('input[name="first_name"]');
        var lastName = document.querySelector('input[name="last_name"]');
        var companyTitle = document.querySelector('input[name="title"]');
        var companyTaxNumber = document.querySelector('input[name="tax_number"]');
        var companyIdentityNumber = document.querySelector('input[name="identity_number"]');
        var companyPhone = document.querySelector('input[name="phone"]');


        isPerson.addEventListener('change', function(){
            if(this.checked){
                firstName.disabled = false;
                lastName.disabled = false;
                companyTitle.disabled = true;
                companyTaxNumber.disabled = true;
                companyIdentityNumber.disabled = false;
            }else{
                firstName.disabled = true;
                lastName.disabled = true;
                companyTitle.disabled = false;
                companyTaxNumber.disabled = false;
                companyIdentityNumber.disabled = true;
                companyPhone.disabled = false;
            }
        });
    });
</script>
