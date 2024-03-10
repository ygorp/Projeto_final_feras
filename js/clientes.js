const search = document.getElementById('pesquisa');

search.addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
        searchClients();
    }
});

function searchClients() {
  window.location.href = '../pages/clientes.php?search=' + search.value;
}