<!-- Crie uma função que receba como parâmetro três números naturais a, b e c e
verifica se eles formam um triângulo. (Testar: 5,9,10 e 1,9,17).

Dica: Para construir um triângulo é necessário que a medida de qualquer um dos
lados seja menor que a soma das medidas dos outros dois e maior que o valor
absoluto (módulo) da diferença entre essas medidas.

| b - c | < a < b + c
| a - c | < b < a + c
| a - b | < c < a + b

Obs.: Use a função abs() para o valor absoluto | |. -->

<?php
  function ehTriangulo($a, $b, $c) {
    if(
      !(abs($b - $c) < $a && $a < $b + $c) ||
      !(abs($a - $c) < $b && $b < $a + $c) ||
      !(abs($a - $b) < $c && $c < $a + $b)
    )
      return 0;
    
    return 1;
  }

  echo "É possível formar um triângulo com os números 5, 9 e 10? " .
    (ehTriangulo(5,9,10) ? "Sim" : "Não") . "<br>";
  echo "É possível formar um triângulo com os números 1, 9 e 17? " .
    (ehTriangulo(1,9,17) ? "Sim" : "Não") . "<br>";
?>
