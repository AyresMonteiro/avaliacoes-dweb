<!--
Implemente em PHP a interface e as classes:

Interface FormaGeometrica
  - area()
  - comprimento()

Classe Circulo implementa FormaGeometrica:
  - raio

Classe Quadrado implementa FormaGeometrica:
  - lado

Em seguida, instancie um objeto de cada classe e exiba a área e o comprimento do
círculo e do quadrado.
-->

<?php
  interface FormaGeometrica {
    public function area();
    public function comprimento();
  }

  class Circulo implements FormaGeometrica {
    private $raio;

    public function __construct($raio) {
      $this->raio = $raio;
    }

    public function area() {
      return pow($this->raio, 2) * pi();
    }

    public function comprimento() {
      return 2 * $this->raio * pi();
    }
  }

  class Quadrado implements FormaGeometrica {
    private $lado;

    public function __construct($lado) {
      $this->lado = $lado;
    }

    public function area() {
      return pow($this->lado, 2);
    }

    public function comprimento() {
      return $this->lado * 4;
    }
  }

  $circulo = new Circulo(5);
  $quadrado = new Quadrado(5);

  echo "A área do círculo é " . number_format($circulo->area(), 2, ',') .
    " metros e seu comprimento é "
    . number_format($circulo->comprimento(), 2, ',', '.') . " metros.<br>";

  echo '<br>';

  echo "A área do quadrado é " . number_format($quadrado->area(), 2, ',') .
    " metros e seu comprimento é "
    . number_format($quadrado->comprimento(), 2, ',', '.') . " metros.<br>";
?>
