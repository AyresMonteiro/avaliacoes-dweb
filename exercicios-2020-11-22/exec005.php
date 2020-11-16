<!-- Crie duas variáveis a e b que contenham os valores 5 e 0. Use as funções
isset() e empty() para verificar o conteúdo de cada variável. -->

<?php
  $a = 5;
  $b = 0;

  echo "\$a = $a<br>";
  echo "\$b = $b<br>";
  echo "isset(\$a): ";
  var_dump(isset($a));
  echo "<br>";
  echo "isset(\$b): ";
  var_dump(isset($b));
  echo "<br>";
  echo "empty(\$a): ";
  var_dump(empty($a));
  echo "<br>";
  echo "empty(\$b): ";
  var_dump(empty($b));
  echo "<br>";
?>
