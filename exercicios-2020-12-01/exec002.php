<!-- Crie uma matriz 4x2 que contenha como índice da linha o nome, e índices das
colunas, a idade e a cidade de cada pessoa. Em seguida, imprima todos os dados
na tela. Obs.: Use foreach. -->

<?php
  $matriz = array(
    "Daniel" => array(
      "Idade" => 18,
      "Cidade" => "LeleCity"
    ),
    "Barbara" => array(
      "Idade" => 16,
      "Cidade" => "KtáCity"
    ),
    "Wendell" => array(
      "Idade" => 16,
      "Cidade" => "Período Santanozóico"
    ),
    "Morais" => array(
      "Idade" => 16,
      "Cidade" => "Meio do Mato"
    )
  );

  foreach ($matriz as $pessoa => $dados) {
    echo "$pessoa:<br>";
    foreach ($dados as $coluna => $informacao) {
      echo "$coluna: $informacao<br>";
    }
    echo "<br>";
  }
?>
