

var element = document.getElementById('nbrP');
var forms = document.getElementById('personData');

element.addEventListener('change', (e) => {
    var v = e.target.value;
    console.log(v);
    forms.innerHTML = "";
    for (let i = 1 ; i < v ; i++ ){

        forms.innerHTML += `      
        <h1 class="text-center display-4">Info Personne Num° ${i+1}</h1>
        <br>
        <input type="text" name="nomP${i+1}" placeholder="Nom personne Num° ${i+1}" class="form-control">
        <br>
        <input type="text" name="prenomP${i+1}" placeholder="Prénom personne Num° ${i+1}" class="form-control">
        <br>
        <input type="text" name="agep${i+1}" placeholder="Age personne Num° ${i+1}" class="form-control">
        <br>
`;
    }
});

