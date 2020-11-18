<!-- Crie e imprima as variáveis em cada escopo (local, global, estática e
superglobal). -->

<?php
  $x = 8;
  $z = 20;

  //  Apesar de o exercício pedir a "criação de uma super global, não é possível
  //  criar uma superglobal no php, pois são variáveis pré-definidas pela
  //  própria linguagem. Sendo assim, é dedutível que esse pedido se refira à
  //  forma de chamar uma variável global através da superglobal "$GLOBALS".

  function imprimir() {
    $x = 9;
    static $y = 1;
    global $z;
    $lineSeparator = "<b>" . str_repeat("- ", 40) . "</b><br>";
    
    echo "Estática: $y<br>";
    echo "Local: $x<br>";
    echo "Global (uso do prefixo \"global\"): ". $z . "<br>";
    echo "Global (uso da superglobal \"\$GLOBALS\"): " . $GLOBALS["x"] . "<br>";
    echo $lineSeparator;
    $y++;
  }

  imprimir();
  imprimir();
?>
