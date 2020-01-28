<?php
include '../../assets/includes/user_validation.php';
include '../../assets/includes/connect.php';

if(!empty($_POST['estrela'])){
	$estrela = $_POST['estrela'];
	$commit = $_POST['commit'];
	$iduser = $_SESSION['idlogin'];
  $idjogo = $_GET['gameid'];

	//Salvar no banco de dados
	$queryComment = sprintf("INSERT INTO comentario (idcomentario, descricao, data, estrelas, jogo_idjogo, usuario_idusuario) VALUES (DEFAULT, '$commit', CURRENT_TIME(), $estrela, $idjogo, $iduser)");
	$dadosComment = mysqli_query($conexao, $queryComment);

	$_SESSION['msg'] = "Avaliação cadastrada com sucesso";
	header("Location: ../../index.php?page=comment&gameid=".$idjogo."");
	} else {
	$_SESSION['msg'] = "Necessário selecionar pelo menos 1 estrela";
	header("Location: ../../index.php?page=comment&gameid=".$_GET['gameid']."");
}
