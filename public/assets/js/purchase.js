document.getElementById('generate-link').addEventListener('click', function(e) {
    e.preventDefault();

    // Make an AJAX request to the generate route
    axios.get('{{ route('generate') }}').then(function(response) {
        // Update the value of the purchaseid input field
        document.getElementById('purchaseid').value = response.data;
    }).catch(function(error) {
        console.error(error);
    });
});
