<!-- Crie uma agenda telefônica que contenha 6 contatos usando array (a chave é
o nome da pessoa e o valor o telefone). Depois, use o foreach para imprimir o
nome e o telefone de cada contato. -->

<?php
  $contatos = array (
    "Daniel" => "+55 99 9 9999-9991",
    "Barbara" => "+55 99 9 9999-9992",
    "Morais" => "+55 99 9 9999-9993",
    "JoaoG" => "+55 99 9 9999-9993",
    "Eduardo" => "+55 99 9 9999-9995",
    "JoaoM" => "+55 99 9 9999-9996"
  );

  foreach ($contatos as $contato => $numero) {
    echo $contato . ": <br>" . $numero . "<br><br>";
  }

?>
