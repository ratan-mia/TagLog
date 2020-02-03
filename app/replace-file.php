<script>
    function initEmployerAddress() {
        var input = document.getElementById('employer-address');

        var autocomplete = new google.maps.places.Autocomplete(input);

        autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();
            // document.getElementById('address').value = place.formatted_address;
            document.getElementById('employer_latitude').value = place.geometry.location.lat();
            document.getElementById('employer_longitude').value = place.geometry.location.lng();
        });
    }
</script>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD33mG6FBa2qlnMV7VnASFAdgBg2EQeDZ8&libraries=places&callback=initEmployerAddress"
    async defer></script>
