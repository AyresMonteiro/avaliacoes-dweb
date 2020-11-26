<!-- Uma agência bancária possui dois tipos de investimentos, conforme o quadro
abaixo. Crie 3 vetores com 5 posições cada para armazenar o tipo de
investimento, seu valor e a quantidade de meses. Em seguida, crie uma função que
receba os 3 vetores e calcule o valor corrigido, de acordo com o tipo de
investimento, armazenando o resultado em outro vetor. Salves os novos valores
em um arquivo .txt. -->

<!-- Quadro:
  Tipo: 1;
  Descrição: Poupança;
  Rendimento mensal: 3%;

  Tipo: 2;
  Descrição: Fundos de renda fixa;
  Rendimento mensal: 4%;
-->

<?php
  $tipos = array();
  $valores = array();
  $meses = array();
  $correcoes = array();

  function corrigirValores($tipos, $valores, $meses){
    global $correcoes;
    for ($i = 0; $i < 5; $i++) {
      $taxa = $tipos[$i] === 1 ? 0.03 : 0.04;
      $valorCorrigido = $valores[$i] * (1 + $meses[$i] * $taxa);
      array_push($correcoes, $valorCorrigido);
    }
  }

  //  Para entender o propósito dessa função e do try/catch na função seguinte,
  //  cheque o primeiro exercício desta lista.
  function mudarCodificacaoParaUTF8($arquivo) {
    if ($arquivo) {
      fwrite($arquivo, "\xEF\xBB\xBF");
    } else {
      throw new Exception(
        "Erro: Não é possível mudar a codificação do arquivo para UTF-8!"
      );
    }
  }

  function salvarValores($tipos, $valores, $meses, $correcoes) {
    try {
      $arquivo = fopen("exec003.txt", "w");
      if($arquivo) {
        mudarCodificacaoParaUTF8($arquivo);
        for ($i = 0; $i < 5; $i++) {
          $investimento = number_format($valores[$i], 2);
          $correcao = number_format($correcoes[$i], 2);

          fwrite($arquivo,
            "Tipo do investimento: $tipos[$i]" . PHP_EOL .
            "Valor do investimento: R$ $investimento" . PHP_EOL .
            "Duração: $meses[$i]" . PHP_EOL .
            "Correção do valor: R$ $correcao" . PHP_EOL .
            str_repeat("- ", 40) . PHP_EOL
          );
        }

        fclose($arquivo);
      } else {
        throw new Exception("Erro: Falha ao ler arquivo.");
      }
    } catch(Exception $erro) {
      echo $erro->getMessage() . "<br>";
    }
  }

  //  Fiquei com preguiça de definir valores então usei a função mt_rand() e um
  //  for para gerar números aleatórios
  for ($i = 0; $i < 5; $i++){
    array_push($tipos, mt_rand(1,2));
    array_push($valores,
      ((float) mt_rand() / (float) getrandmax()) * 1000.00);
    array_push($meses, mt_rand(1, 36));
  }

  corrigirValores($tipos, $valores, $meses);
  salvarValores($tipos, $valores, $meses, $correcoes);
?>
