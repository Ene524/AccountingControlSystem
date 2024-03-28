<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>

{!! JsValidator::formRequest('App\Http\Requests\Web\CompanyController\CreateRequest') !!}

<script>
    var is_person = document.querySelector('select[name="is_person"]');
    var identity_number = document.querySelector('input[name="identity_number"]');
    var tax_number = document.querySelector('input[name="tax_number"]');
    var first_name = document.querySelector('input[name="first_name"]');
    var last_name = document.querySelector('input[name="last_name"]');


    is_person.addEventListener('change', function () {
        if (is_person.value == 1) {
            identity_number.disabled = false;
            tax_number.disabled = true;
            tax_number.value = '';
        } else {
            tax_number.disabled = false;
            identity_number.disabled = true;
            first_name.disabled = true;
            last_name.disabled = true;

            first_name.value = '';
            last_name.value = '';
            identity_number.value = '';


        }
    });


</script>

<script>
    $(document).ready(function () {
        getCountries();
        getCitiesByCountryId();
    });


    function getCountries() {
        $.ajax({
            async: false,
            url: '{{route('common.getCountries')}}',
            type: "GET",
            dataType: "json",
            success: function (data) {
                var country = document.querySelector('select[name="country_id"]');
                country.innerHTML = '';
                data.forEach(element => {
                    country.innerHTML += '<option value="' + element.id + '">' + element.name + '</option>';
                });
            }
        });
    }


    function getCitiesByCountryId() {
        $('#country_id').on('change', function (e) {
            var country_id = $("#country_id").val();

            $.ajax({
                async: false,
                url: '{{route('common.getCitiesByCountryId')}}',
                type: "GET",
                data: {
                    country_id: country_id
                },
                dataType: "json",
                success: function (data) {
                    var city = document.querySelector('select[name="city_id"]');
                    city.innerHTML = '';
                    data.forEach(element => {
                        city.innerHTML += '<option value="'+element.id+'">'+element.name+'</option>';
                    });
                }
            });
        });


    }
</script>

