document.getElementById('verListado').addEventListener('click', function() {
    document.getElementById('home').classList.add('hidden');
    document.getElementById('listado').classList.remove('hidden');
});

document.getElementById('volver').addEventListener('click', function() {
    document.getElementById('listado').classList.add('hidden');
    document.getElementById('home').classList.remove('hidden');
});
