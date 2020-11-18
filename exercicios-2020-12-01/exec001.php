<!-- Crie e inicialize uma matriz 3x3 com valores inteiros. Em seguida, imprima
cada posição da matriz somando 2. Obs.: Use foreach. -->

<?php
  $matriz = array(
    array(1,2,3),
    array(4,5,6),
    array(7,8,9)
  );

  foreach ($matriz as $posicaoDoVetor => $vetor) {
    foreach($vetor as $posicaoDoValor => $valor) {
      echo "[$posicaoDoVetor][$posicaoDoValor]: " . ($valor + 2) . "<br>";
    }
  }
?>
