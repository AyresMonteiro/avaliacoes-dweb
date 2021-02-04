<!--
Crie uma classe abstrata chamada Pessoa.
Atributos: nome, idade e sexo;
Métodos: fazerAniversario.

Em seguida, crie 3 classes que estendem Pessoa:

-	Visitante: nada a acrescentar.
- Aluno:
	-	Atributos: matricula e curso;
	- Métodos: pagarMensalidade.
- Professor:
	- Atributos: especialidade e salario;
	- Métodos: receberAumento.

Crie um objeto para cada classe não-abstrata e chame os métodos
fazerAniversario(), pagarMensalidade() e receberAumento().
-->

<?php
abstract class Pessoa {
	private $idade;
	private $nome;
	private $sexo;

	public function __construct($nome, $idade, $sexo){
		$this->setIdade($idade);
		$this->setNome($nome);
		$this->setSexo($sexo);
	}

	public function fazerAniversario() {
		echo $this->nome . " tinha " . $this->getIdade() . " anos.<br>";
		echo $this->nome . " fez aniversário e completou " .
			($this->getIdade() + 1) . " anos.<br>";
	}

	public function getIdade() {
		return $this->idade;
	}

	public function getNome() {
		return $this->nome;
	}

	public function getSexo() {
		return $this->sexo;
	}

	public function setIdade($idade) {
		$this->idade = $idade;
	}

	public function setNome($nome) {
		$this->nome = $nome;
	}

	public function setSexo($sexo) {
		$this->sexo = $sexo;
	}
}

class Visitante extends Pessoa {};

class Aluno extends Pessoa {
	private $matricula;
	private $curso;

	public function __construct($nome, $idade, $sexo, $matricula, $curso) {
		parent::__construct($nome, $idade, $sexo);

		$this->setMatricula($matricula);
		$this->setCurso($curso);
	}

	public function getCurso() {
		return $this->curso;
	}

	public function getMatricula() {
		return $this->matricula;
	}

	public function pagarMensalidade(){
		$genero = $this->getSexo() === 'Masculino' ? ' do aluno ' : ' da aluna ';
		echo 'A mensalidade' . $genero . $this->getNome() . ' foi paga!<br>';
	}

	public function setCurso($curso) {
		$this->curso = $curso;
	}

	public function setMatricula($matricula) {
		$this->matricula = $matricula;
	}
}

class Professor extends Pessoa {
	private $especialidade;
	private $salario;

	public function __construct($nome, $idade, $sexo, $especialidade, $salario) {
		parent::__construct($nome, $idade, $sexo);

		$this->especialidade = $especialidade;
		$this->salario = $salario;
	}

	public function getEspecialidade() {
		return $this->especialidade;
	}

	public function getSalario() {
		return $this->salario;
	}

	public function receberAumento($taxaDeAumento) {
		echo "O salário do professor " . $this->getNome() . " de "
			. $this->getEspecialidade() . " aumentou de R$"
			. number_format($this->getSalario(), 2, ',', '.');

		$this->salario = $this->salario * (1 + $taxaDeAumento);
		
		echo " para R$" . number_format($this->getSalario(), 2, ',', '.') . "!<br>";
	}

	public function setEspecialidade($especialidade) {
		$this->especialidade = $especialidade;
	}

	public function setSalario($salario) {
		$this->salario = $salario;
	}
}

$visitante = new Visitante("Ayres", 17, 'Masculino');
$visitante->fazerAniversario();

echo "<br>";

$aluno = new Aluno("William", 16, 'Masculino', "999987", "Informática");
$aluno->pagarMensalidade();

echo "<br>";

$professor = new Professor("Will", 37, 'Masculino', "Ciências da Computação", 15076.89);
$professor->receberAumento(0.25);
$professor->receberAumento(0.01);

?>
