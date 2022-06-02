<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início</title>
    <link rel = "stylesheet" href="style.css">
</head>
<body>
<?php
    REQUIRE '../dao/daodependente.php';
    REQUIRE 'dependente.php';
    REQUIRE '../dao/conexao.php';
    REQUIRE '../dao/daocadastro.php';
    REQUIRE '../modelo/cadastro.php';

    $nome = $_POST['nome'];
    $unome = $_POST['unome'];
    $idade = $_POST['idade'];
    $idcliente = $_POST['idcliente'];

    $daocadastro = new daocadastro();
    $daodependente = new daodependente();
    $cadastro = new dependente();

    $cadastro->setNome($nome);
    $cadastro->setUnome($unome);
    $cadastro->setIdade($idade);
    $cadastro->setCliente($daocadastro->listaporid($idcliente));

    $resultado = $daodependente->inclui($cadastro);
    if($resultado){
     ?>
     <script>alert("CADASTRADO")</script>
     <?php 
    }
    else{
      ?>
      <script>alert("ERRO")</script>
      <?php 
    }
  ?>
    <main>
    <h1 align="center">LISTA DE DADOS</h1>
  
  <table class="tabela">
    <tr>
      <th>ID</th>
      <th>NOME</th>
      <th>ÚLTIMO NOME</th>
      <th>IDADE</th>
      <th>NOME SUPERIOR</th>
    </tr>
    <?php

      $dc = new daodependente();
      $resultado = $dc->listaTodos();

      foreach ($resultado as $item){
        ?>
        <tr>
          <th><?php echo $item['id']?></th>
          <th><?php echo $item['nome']?></th>
          <th><?php echo $item['unome']?></th>
          <th><?php echo $item['idade']?></th>
          
        </tr>
        <?php
      }
    ?>
  </table>
    </main>
    <section class = "images">
        <img src = "assets\039-id card.svg" alt = "Cartão identificador">
        <div class = "circle"></div>
    </section>
    <a href="../index.php">Início</a>
</body>
</html>