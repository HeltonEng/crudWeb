// Get the modal
var modal = document.getElementById("myModal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

$("#busca").keyup(function () {
  var busca = $("#busca").val();
  $.post('busca.php', { busca: busca }, function (data) {
    $("#tableClient>tbody").html(data);
  });
});

//$("#busca").focusout(function(){
//    $("#result").html("Pesquisar!");
//})

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

function editar(id) {
  //console.log(id);
  let btn = document.getElementById('salvar');
  btn.innerHTML = 'Editar';
  document.getElementById('salvar').onclick = function () {
    //console.log(index);
    cad = '{"id":' + id + ',"empresa":"' + document.getElementById('empresa').value + '","site":"' + document.getElementById('site').value +
        '","contato":"' + document.getElementById('contato').value + '","fone":"' + document.getElementById('fone').value +
        '","cidade":"' + document.getElementById('cidade').value + '","datacontato":"' + document.getElementById('datacontato').value +
        '","email":"' + document.getElementById('email').value +'","anotacoes":"' + document.getElementById('anotacoes').value + '"}';
    //console.log(cad);
    fetch('api.php', {
      method: 'PUT',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: cad
    })
    //.then(response => response.json());  
    .then(response => {  
      limpaTabela();
      atualiza(id);
      modal.style.display = "none";
    });
  };

  fetch('api.php?id='+ id)
    .then(T => T.json())
    .then(data => {
      //console.log(data);
      let d = data[0].datacontato.split('-');
      let dt = d[2]+'/'+d[1]+'/'+d[0];
      //console.log(dt);
      document.getElementById('empresa').value = data[0].empresa;
      document.getElementById('site').value = data[0].site;
      document.getElementById('contato').value = data[0].contato;
      document.getElementById('fone').value = data[0].fone;
      document.getElementById('cidade').value = data[0].cidade;
      document.getElementById('datacontato').value = dt;
      document.getElementById('email').value = data[0].email;
      document.getElementById('anotacoes').value = data[0].anotacoes;
    });
  modal.style.display = "block";
}

function limpaTabela(){
  const table = document.getElementById('tableClient');
  while (table.rows.length > 0){ 
    table.deleteRow(0); 
  }
}

function atualiza(id) {
  //console.log(index);
  fetch('api.php?id='+ id)
  .then(T => T.json())
  .then(data => {
      console.log(data[0].nome);
      for (cont = 0; cont <= data.length; cont++) {
        if (!data[cont].empresa) { } else {
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
        <td>${data[cont].empresa}</td>
        <td>${data[cont].site}</td>
        <td>${data[cont].contato}</td>
        <td>${data[cont].fone}</td>
        <td>${data[cont].cidade}</td>
        <td>${data[cont].datacontato}</td>
        <td>${data[cont].email}</td>
        <td>${data[cont].anotacoes}</td>
          <td>
              <button type="button" class="button green" onclick="editar(${cont},${data[cont].id})">Editar</button>
              <button type="button" class="button red" onclick="deleta(${data[cont].id})">Excluir</button>
          </td>
      `;
              document.querySelector('#tableClient>tbody').appendChild(newRow);
          }
      }
  });
}

function closeForm() {
  document.location.reload();
}