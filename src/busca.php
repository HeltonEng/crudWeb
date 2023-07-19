<?php
$conn  = mysqli_connect('localhost','root','','clientes');

$busca =  $_POST['busca'];

if(!$busca){}else{
$query = mysqli_query($conn, "SELECT * FROM clientes WHERE empresa LIKE '%$busca%' or status LIKE '%$busca%' or cidade LIKE '%$busca%'");
$num   = mysqli_num_rows($query);
if($num >0){
    $index = 0;
    while($row = mysqli_fetch_assoc($query)){
      //echo '<a href="animal.php?id='.$row['iddados'].'"> <img id="'.$row['iddados'].'" src = "data:image/png;base64,'.base64_encode($row['foto']).'" width = "150px" height = "150px"/></a>'.'<br>';
      echo '<tr>';
      echo '<td>'.$row['empresa'].'</td>';
      echo '<td>'.$row['site'].'</td>';
      echo '<td>'.$row['contato'].'</td>';
      echo '<td>'.$row['fone'].'</td>';      
      echo '<td>'.$row['cidade'].'</td>';
      echo '<td>'.$row['datacontato'].'</td>';
      echo '<td>'.$row['email'].'</td>';
      echo '<td>'.$row['status'].'</td>';
      echo '<td>'.$row['anotacoes'].'</td>';
      echo '
        <td>
          <button type="button" class="button green" onclick=editar('.$row['id'].')>Editar</button>
          <button type="button" class="button red" onclick="deleta('.$row['id'].')">Excluir</button>
        </td>
      ';
      echo '</tr>';
    }
}else{
  echo "Não Encontrado!";
}
}
?>
