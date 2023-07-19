// Get the modal
var modal = document.getElementById("myModal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    //modal.style.display = "none";
    document.location.reload();
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

function salvarForm() {
    if(document.getElementById('empresa').value != "" && document.getElementById('email').value != ""){
    cad = '{"id":"","empresa":"' + document.getElementById('empresa').value + '","site":"' + document.getElementById('site').value +
        '","contato":"' + document.getElementById('contato').value + '","fone":"' + document.getElementById('fone').value +
        '","cidade":"' + document.getElementById('cidade').value + '","datacontato":"' + document.getElementById('datacontato').value +
        '","email":"' + document.getElementById('email').value +'","anotacoes":"' + document.getElementById('anotacoes').value +
        '","status":"' + document.getElementById('status').value + '"}';
    console.log(cad);

    fetch('api.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: cad
    })
        .then(response => response.json());

    document.location.reload(true);
    }else{
        alert('Preencha todos os campos!!!');
    }
}

var cont=0;
function lerForm(numImages = cont + 20) {
    fetch('api.php?lista')
        .then(T => T.json())
        .then(data => {
            //console.log(data[0].nome);
            //console.log(data);
            //console.log(cont);
            //for (cont = 0; cont <= data.length; cont++) {
            while(cont < numImages){
                if (!data[cont].empresa) { } else {
                    let d = data[cont].datacontato.split('-');
                    let dt = d[2]+'/'+d[1]+'/'+d[0];
                    //console.log(data);
                    const newRow = document.createElement('tr');
                    newRow.innerHTML = `
                    <td>${data[cont].empresa}</td>
                    <td>${data[cont].site}</td>
                    <td>${data[cont].contato}</td>
                    <td>${data[cont].fone}</td>
                    <td>${data[cont].cidade}</td>
                    <td>${dt}</td>
                    <td>${data[cont].email}</td>
                    <td>${data[cont].status}</td>
                    <td>${data[cont].anotacoes}</td>
                    <td>
                        <button type="button" class="button green" onclick="editar(${cont},${data[cont].id})">Editar</button>
                        <button type="button" class="button red" onclick="deleta(${data[cont].id})">Excluir</button>
                    </td>
                    `;
                    document.querySelector('#tableClient>tbody').appendChild(newRow);
                }
            cont++;
            }
        });
}

// listen for scroll event and load more images if we reach the bottom of window
window.addEventListener('scroll',()=>{
    //console.log("scrolled", window.scrollY) //scrolled from top
    //console.log(window.innerHeight) //visible part of screen
    if(window.scrollY + window.innerHeight >= document.documentElement.scrollHeight){
        //alert('Scroll');
        lerForm();
    }
})

function closeForm() {
    document.location.reload();
}

function deleta(index) {
    if (confirm("Confirma exclusão do registro?")){
        //console.log(index);
        fetch('api.php?id=' + index, {
            method: 'DELETE'
        })
        .then(response => response.json());
        document.location.reload();
    }
}

function editar(index, id) {
    //console.log(index);
    let btn = document.getElementById('salvar');
    btn.innerHTML = 'Editar';
    let title = document.getElementById('tm');
    title.innerHTML = 'Editar';
    document.getElementById('salvar').onclick = function () {
        //console.log(index);
        cad = '{"id":' + id + ',"empresa":"' + document.getElementById('empresa').value + '","site":"' + document.getElementById('site').value +
        '","contato":"' + document.getElementById('contato').value + '","fone":"' + document.getElementById('fone').value +
        '","cidade":"' + document.getElementById('cidade').value + '","datacontato":"' + document.getElementById('datacontato').value +
        '","email":"' + document.getElementById('email').value +'","anotacoes":"' + document.getElementById('anotacoes').value +
        '","status":"' + document.getElementById('status').value + '"}';

        console.log(cad);
        fetch('api.php', {
            method: 'PUT',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: cad
        })
            .then(response => response.json());
        document.location.reload();
    };

    fetch('api.php?lista')
        .then(T => T.json())
        .then(data => {
            //console.log(data[0].nome);
            let d = data[index].datacontato.split('-');
            let dt = d[2]+'/'+d[1]+'/'+d[0];
            //console.log(dt);
            document.getElementById('empresa').value = data[index].empresa;
            document.getElementById('site').value = data[index].site;
            document.getElementById('contato').value = data[index].contato;
            document.getElementById('fone').value = data[index].fone;
            document.getElementById('cidade').value = data[index].cidade;
            document.getElementById('datacontato').value = dt;
            document.getElementById('email').value = data[index].email;
            document.getElementById('status').value = data[index].status;
            document.getElementById('anotacoes').value = data[index].anotacoes;
        });
    modal.style.display = "block";
}

function pesquisar(busca) {
    //console.log(index);
        fetch('api.php?busca='+ busca)
        .then(T => T.json())
        .then(data => {
            //console.log(data[0].nome);
            for (cont = 0; cont <= data.length; cont++) {
                if (!data[cont].nome) { } else {
                    const newRow = document.createElement('tr');
                    newRow.innerHTML = `
                    <td>${data[cont].empresa}</td>
                    <td>${data[cont].site}</td>
                    <td>${data[cont].contato}</td>
                    <td>${data[cont].fone}</td>
                    <td>${data[cont].cidade}</td>
                    <td>${data[cont].datacontato}</td>
                    <td>${data[cont].email}</td>
                    <td>${data[cont].status}</td>
                    <td>${data[cont].anotacoes}</td>
                    <td>
                        <button type="button" class="button green" onclick="editar(${cont},${data[cont].id})">Editar</button>
                        <button type="button" class="button red" onclick="deleta(${data[cont].id})">Excluir</button>
                    </td>
                    `;
                    document.querySelector('#result').appendChild(newRow);
                }
            }
        });
}
