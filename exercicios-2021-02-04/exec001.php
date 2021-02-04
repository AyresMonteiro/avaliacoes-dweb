<!--
--- Enunciado ---

Crie uma classe chamada Imovel, que possui como atributos o endereço e o preco
(privados).

a) Crie uma classe chamada ImovelNovo, que herda Imovel e possui um atributo
adicionalNoPreco. Crie métodos de acesso e um método para impressão do preço
mais o valor adicional.

b) Crie uma classe chamada ImovelVelho, que herda Imovel e possui um atributo
descontoNoPreco. Crie métodos de acesso e um método para impressão do preço com
o desconto.

Obs.: É necessário usar o conceito de polimorfismo nesse exercício.
-->

<?php
  class Imovel {
    private $endereco;
    private $preco;

    //  Nota exec001_1:
    //  Uso do polimorfismo: a função construtora assumirá atuações diferentes
    //  em cada classe.
    public function __construct($endereco, $preco) {
      $this->setEndereco($endereco);
      $this->setPreco($preco);
    }

    public function getEndereco() {
      return $this->endereco;
    }

    public function getPreco() {
      return $this->preco;
    }

    public function setEndereco($endereco) {
      $this->endereco = $endereco;
    }

    public function setPreco($preco) {
      $this->preco = $preco;
    }

    public function imprimeEndereco() {
      echo 'Endereço do imóvel: ' . $this->getEndereco() . '.<br>';
    }

    //  Nota exec001_2:
    //  Uso do polimorfismo: a função imprimePreco assumirá atuações diferentes
    //  em cada classe.
    public function imprimePreco () {
      $this->imprimeEndereco();
      echo 'Preço do imóvel: ' . $this->getPreco() . '.<br>';
    }
  }

  class ImovelNovo extends Imovel {
    private $adicionalNoPreco;

    public function __construct($endereco, $preco, $adicionalNoPreco) {
      parent::__construct($endereco, $preco);
      
      $this->setAdicionalNoPreco($adicionalNoPreco);
    }

    public function getAdicionalNoPreco() {
      return $this->adicionalNoPreco;
    }

    public function setAdicionalNoPreco($adicionalNoPreco) {
      $this->adicionalNoPreco = $adicionalNoPreco;
    }

    //  Nota exec001_3:
    //  Não disseram se o adicional/desconto era pra ser em porcentagem ou em
    //  números definitivos. Usei porcentagem.
    public function imprimePreco() {
      $this->imprimeEndereco();
      echo 'O preço sem o adicional é R$' .
      number_format($this->getPreco(), 2, ',', '.') . '.<br>';
      echo 'O preço mais o adicional é R$' .
        number_format(
          $this->getPreco() * (1 + $this->getAdicionalNoPreco()), 2 , ',', '.'
        ) . '.<br>';
    }
  }

  class ImovelVelho extends Imovel {
    private $descontoNoPreco;

    public function __construct($endereco, $preco, $descontoNoPreco) {
      parent::__construct($endereco, $preco);
      
      $this->setDescontoNoPreco($descontoNoPreco);
    }

    public function getDescontoNoPreco() {
      return $this->descontoNoPreco;
    }

    public function setDescontoNoPreco($descontoNoPreco) {
      $this->descontoNoPreco = $descontoNoPreco;
    }

    //  Nota exec001_4:
    //  Checar nota exec001_3.
    public function imprimePreco() {
      $this->imprimeEndereco();
      echo 'O preço sem o desconto é R$' .
        number_format($this->getPreco(), 2, ',', '.') . '.<br>';
      echo 'O preço mais o desconto é R$' .
        number_format(
          $this->getPreco() * (1 - $this->getDescontoNoPreco()), 2, ',', '.'
        ) . '.<br>';
    }
  }

  $imovelX = new ImovelNovo("Sei lá", 12.99, 0.5);
  $imovelY = new ImovelVelho("Irineu você não sabe nem eu", 42.27, 0.9);

  $imovelX->imprimePreco();

  echo '<br>';
  
  $imovelY->imprimePreco();
?>
