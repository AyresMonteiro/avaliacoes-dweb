<!-- Construa uma função que recebe 2 números como parâmetro e efetue sua
adição. Caso o valor somado seja maior que 20, este deverá impresso somando a
ele 8. Caso o valor somado seja menor ou igual a 20, este deverá impresso
subtraindo 5. Obs.: Use o if (comum) e a expressão condicional. -->

<?php
  function somaEspecial($arg_1, $arg_2) {
    $soma = $arg_1 + $arg_2;

    if($soma > 20)
      echo $soma + 8 . "<br>";
    else if ($soma <= 20)
      echo $soma - 5 . "<br>";
  }

  somaEspecial(37,22);
  somaEspecial(5,8);
?>
