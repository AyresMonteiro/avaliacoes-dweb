<!-- Crie uma agenda telefônica que contenha 10 contatos usando array (a chave
é o nome da pessoa e o valor o telefone). Crie uma função que receba a agenda
como parâmetro e salvo todos os dados em um arquivo .txt. Obs.: Use o foreach
para imprimir o nome e o telefone de cada contato no arquivo. -->

<?php
  $contatos = array (
    "Daniel" => "+55 99 9 9999-9991",
    "Barbara" => "+55 99 9 9999-9992",
    "Morais" => "+55 99 9 9999-9993",
    "JotaGordo" => "+55 99 9 9999-9993",
    "Eduardo" => "+55 99 9 9999-9995",
    "JotaSumido" => "+55 99 9 9999-9996",
    "Wendell" => "+55 99 9 9999-9997",
    "Laninha" => "+55 99 9 9999-9998",
    "Isabela" => "+55 99 9 9999-9999",
    "Hiltons" => "+55 99 9 9999-9990"
  );

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

  function salvarAgenda($agenda) {
    try {
      $arquivo = fopen("exec004.txt", "w");
      if($arquivo) {
        mudarCodificacaoParaUTF8($arquivo);
        foreach ($agenda as $contato => $numero) {
          fwrite($arquivo,
            "Nome do contato: $contato" . PHP_EOL .
            "Número do contato: $numero" . PHP_EOL .
            str_repeat("- ", 20) . PHP_EOL
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

  salvarAgenda($contatos);
?>
