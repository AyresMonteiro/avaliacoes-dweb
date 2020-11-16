<!-- Dado um número inteiro positivo n, calcular a soma dos n primeiros números
inteiros positivos. Ao final, transforme o valor da soma para uma variável do
tipo double. -->

<?php
  function somatorio($n){
    return (double)($n+1)*$n/2;
  }

  echo "Somatorio de 5:<br>";
  echo somatorio(5) . "<br>";
  echo "Somatorio de 1000000000000000000000000:<br>";
  echo somatorio(1000000000000000000000000) . "<br>";
?>
