<!-- Faça uma função que receba como entrada 5 números e imprima o maior e o menor
número (dado que todos os números são diferentes). Obs.: Use arrays. -->

<?php
  function maiorEMenor($arg_1, $arg_2, $arg_3, $arg_4, $arg_5) {
    $args = array($arg_1, $arg_2, $arg_3, $arg_4, $arg_5);

    $maior = $args[0];
    $menor = $args[0];

    foreach ($args as $arg) {
      if($arg > $maior)
        $maior = $arg;
      else if($arg < $menor)
        $menor = $arg;
    }

    echo "Maior: $maior<br>Menor: $menor";
  }

  maiorEMenor(1,2,3,4,5);
?>
