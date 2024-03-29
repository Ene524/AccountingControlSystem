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

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>


<script>
    $(document).ready(function () {
        GetCountries();
        GetCities();
        GetTowns();
    });

    function GetCountries() {
        var path = "{{ route('common.getCountries') }}";
        $('#country').typeahead({
            hint: true,
            highlight: true,
            minLength: 2,
            limit: Infinity,
            source: function (query, process) {
                return $.getJSON(
                    path,
                    {query: query},
                    function (data) {
                        return process(data.map((x => x.name)));
                    });
            }

        });
    }

    function GetCities() {
        var path = "{{ route('common.getCities') }}";
        $('#city').typeahead({
            hint: true,
            highlight: true,
            minLength: 2,
            limit: Infinity,
            source: function (query, process) {
                return $.getJSON(
                    path,
                    {query: query},
                    function (data) {
                        return process(data.map((x => x.name)));
                    });
            }

        });
    }

    function GetTowns() {
        var path = "{{ route('common.getTowns') }}";
        $('#town').typeahead({
            hint: true,
            highlight: true,
            minLength: 2,
            limit: Infinity,
            source: function (query, process) {
                return $.getJSON(
                    path,
                    {query: query},
                    function (data) {
                        return process(data.map((x => x.name)));
                    });
            }

        });
    }

    function GetTaxOffices() {
        var path = "{{ route('common.getTowns') }}";
        $('#town').typeahead({
            hint: true,
            highlight: true,
            minLength: 2,
            limit: Infinity,
            source: function (query, process) {
                return $.getJSON(
                    path,
                    {query: query},
                    function (data) {
                        return process(data.map((x => x.name)));
                    });
            }

        });
    }
</script>



