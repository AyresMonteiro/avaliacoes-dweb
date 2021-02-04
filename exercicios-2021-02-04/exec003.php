<!--
Crie uma interface chamada Colaborador que possui uma constante
valorBaseHora = 10 e os métodos obterSalario() e cargaHoraria().

Crie duas classes Estagiario e Funcionario, que implementa a interface
Colaborador.
-->

<?php
  interface Colaborador {
    const valorBaseHora = 10;

    public function obterSalario();
    public function cargaHoraria();
  }

  class Estagiario implements Colaborador {
    private $carga;

    public function __construct($carga) {
      $this->carga = $carga;
    }

    public function obterSalario() {
      // Nota exec003_1:
      // Exercício muito vago. Vou só multiplicar tudo por 20 dias.
      // (Dias úteis arredondados)
      return $this->cargaHoraria() * Colaborador::valorBaseHora * 20;
    }

    public function cargaHoraria() {
      return $this->carga;
    }
  }

  class Funcionario implements Colaborador {
    private $adicionalNaHora;
    private $carga;

    public function __construct($adicionalNaHora, $carga) {
      $this->adicionalNaHora = $adicionalNaHora;
      $this->carga = $carga;
    }

    public function obterSalario() {
      // Nota exec003_2:
      // Cheque a nota exec003_1.
      return $this->cargaHoraria() *
        (Colaborador::valorBaseHora + $this->adicionalNaHora) * 20;
    }

    public function cargaHoraria() {
      return $this->carga;
    }
  }

  $estagiario = new Estagiario(6);
  $funcionario = new Funcionario(15, 6);

  echo "O estagiário ganha R$" .
    number_format($estagiario->obterSalario(), 2, ',', '.') . " por mês.<br>";

  echo '<br>';

  echo "O funcionário ganha R$" .
    number_format($funcionario->obterSalario(), 2, ',', '.') . " por mês.<br>";
?>
