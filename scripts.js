const tlacidlo = document.querySelector('#submit');
tlacidlo.addEventListener('click',() =>{
    let forma = new FormData(document.querySelector('#data'));
    let cesta = '/files/stranka.php';
    let method = new Request(cesta,{
        method:'POST',
        body: forma
    });
    fetch(method)
        .then(response => response.json())
        .then(data => {console.log(data);})
});