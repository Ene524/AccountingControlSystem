<script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
<script>
    let is_person = document.querySelector('select[name="is_person"]');
    let identity_number = document.querySelector('input[name="identity_number"]');
    let tax_number = document.querySelector('input[name="tax_number"]');
    let first_name = document.querySelector('input[name="first_name"]');
    let last_name = document.querySelector('input[name="last_name"]');

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




    $('.select2').on('select2:select', function(e) {
        if (is_person.value == 1) {
            identity_number.disabled = false;
            tax_number.disabled = true;
            tax_number.value = '';
            first_name.disabled=false;
            last_name.disabled=false;
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
    $(document).ready(function() {
        GetCountries();
        GetCities();
        GetTowns();
        GetTaxOffices();
        $('.select2').select2();
    });

    function GetCountries() {
        let path = "{{ route('common.getCountries') }}";
        $('#country').typeahead({
            hint: true,
            highlight: true,
            minLength: 2,
            limit: Infinity,
            source: function(query, process) {
                return $.getJSON(
                    path, {
                        query: query
                    },
                    function(data) {
                        return process(data.map((x => x.name)));
                    });
            }

        });
    }

    function GetCities() {
        let path = "{{ route('common.getCities') }}";
        $('#city').typeahead({
            hint: true,
            highlight: true,
            minLength: 2,
            limit: Infinity,
            source: function(query, process) {
                return $.getJSON(
                    path, {
                        query: query
                    },
                    function(data) {
                        return process(data.map((x => x.name)));
                    });
            }

        });
    }

    function GetTowns() {
        let path = "{{ route('common.getTowns') }}";
        $('#town').typeahead({
            hint: true,
            highlight: true,
            minLength: 2,
            limit: Infinity,
            source: function(query, process) {
                return $.getJSON(
                    path, {
                        query: query
                    },
                    function(data) {
                        return process(data.map((x => x.name)));
                    });
            }

        });
    }

    function GetTaxOffices() {
        let path = "{{ route('common.getTaxOffices') }}";
        $('#tax_office').typeahead({
            hint: true,
            highlight: true,
            minLength: 2,
            limit: Infinity,
            source: function(query, process) {
                return $.getJSON(
                    path, {
                        query: query
                    },
                    function(data) {
                        return process(data.map((x => x.name)));
                    });
            }

        });
    }
</script>
