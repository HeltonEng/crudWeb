<?php
session_start();
include_once('conexao.php');
// print_r($_SESSION);
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: index.php');
}
$logado = $_SESSION['email'];
if (!empty($_GET['search'])) {
    $data = $_GET['search'];
    $sql = "SELECT * FROM usuarios WHERE id LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%' ORDER BY id DESC";
} else {
    $sql = "SELECT * FROM usuarios ORDER BY id DESC";
}
$result = $conexao->query($sql);
?>

<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, PUT, DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Origin'); 

$tabela = "clientes";
$tb = "clientes";

$con = new mysqli('localhost', 'root', '', $tabela);

if($_SERVER['REQUEST_METHOD'] === 'GET'){
	//Pegando as informações do banco
		if(isset($_GET['busca'])){
			$busca = $_GET['busca'];
			//"SELECT * FROM tbdadospet WHERE nome LIKE '%$busca%' OR raca LIKE '%$busca%'"
			$sql = $con->query("SELECT * FROM {$tb} WHERE nome LIKE '%$busca%'");
			$data = $sql->fetch_assoc();
			exit("[".json_encode($data)."]");
		}else{
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$sql = $con->query("select * from {$tb} where id={$id}");
			$data = $sql->fetch_assoc();
			exit("[".json_encode($data)."]");
		}else{
			//Entra nesse, caso nao tenha passagem de ID via GET
			$data = array();
			$sql = $con->query("select * from {$tb} ORDER BY empresa"); //SELECT * FROM `clientes` ORDER BY id DESC;
			while($d = $sql->fetch_assoc()){
				$data[] = $d;
			}
		exit(json_encode($data));
		}
		}
		//exit("[".json_encode($data)."]");
	}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //gravar info
    $data = json_decode(file_get_contents("php://input"));
    // Trata Data
    $d = $data->datacontato;
    $dat = explode("/",$d);
    $dt = $dat[2]."/".$dat[1]."/".$dat[0];
    $sql = $con->query("INSERT INTO {$tb} VALUES ('','{$data->empresa}','{$data->site}','{$data->contato}','{$data->fone}','{$data->cidade}','{$dt}','{$data->email}','{$data->anotacoes}','{$data->status}')");
    //exit(json_encode($data));
    if($sql){
        //$data->id = $con->insert_id;
        exit(json_encode($data));
    }else{
        exit(json_encode(array('status' => 'Erro')));
    }
}

if($_SERVER['REQUEST_METHOD'] === 'PUT'){
    //Alterar informações
    $data = json_decode(file_get_contents("php://input"));
    // Trata Data
    $d = $data->datacontato;
    $dat = explode("/",$d);
    $dt = $dat[2]."/".$dat[1]."/".$dat[0];
    $sql = $con->query("UPDATE {$tb} SET empresa = '{$data->empresa}',site = '{$data->site}',contato = '{$data->contato}',fone = '{$data->fone}',cidade = '{$data->cidade}',datacontato = '{$dt}',email = '{$data->email}',anotacoes = '{$data->anotacoes}',status = '{$data->status}' WHERE id={$data->id}");
    if($sql){
        exit(json_encode(array('status' => 'Sucesso')));
    }else{
        exit(json_encode(array('status' => 'Erro')));
    }
}

if($_SERVER['REQUEST_METHOD'] === 'DELETE'){
    //apagar informações
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = $con->query("delete from {$tb} where id={$id}");
        if($sql){
            exit(json_encode(array('status' => 'Sucesso')));
        }else{
            exit(json_encode(array('status' => 'Erro')));
        }
    }		
}
