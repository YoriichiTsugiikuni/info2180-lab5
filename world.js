window.onload = function() {
    var lookupButton = document.getElementById('lookup');
    var countryInput = document.getElementById('country');
    var resultDiv = document.getElementById('result');

    lookupButton.addEventListener('click', function() {
        var country = countryInput.value;
        var url = 'world.php?country=' + encodeURIComponent(country);

        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resultDiv.innerHTML = xhr.responseText;
            }
        };

        xhr.open('GET', url, true);
        xhr.send();
    });
};