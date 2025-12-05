window.onload = function() {
    var countryLookup = document.getElementById('lookup');
    var citiesLookup = document.getElementById('lookup-city');
    var searchInput = document.getElementById('country');
    var outputArea = document.getElementById('result');

    countryLookup.addEventListener('click', function() {
        var searchTerm = searchInput.value;
        var requestUrl = 'world.php?country=' + encodeURIComponent(searchTerm);

        var request = new XMLHttpRequest();

        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) {
                outputArea.innerHTML = request.responseText;
            }
        };

        request.open('GET', requestUrl, true);
        request.send();
    });

    citiesLookup.addEventListener('click', function() {
        var searchTerm = searchInput.value;
        var requestUrl = 'world.php?country=' + encodeURIComponent(searchTerm) + '&lookup=cities';

        var request = new XMLHttpRequest();

        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) {
                outputArea.innerHTML = request.responseText;
            }
        };

        request.open('GET', requestUrl, true);
        request.send();
    });
};