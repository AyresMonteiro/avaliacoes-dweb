<!-- Crie um vetor que contenha o nome de 5 matérias preferidas. Crie uma função
que receba como parâmetro esse vetor e salve em um arquivo .txt. Chame a função
2 vezes. Obs.: Você deve criar e fechar o arquivo fora da função. Em seguida,
copie os nomes para outro arquivo e exclua o arquivo original. -->

<?php
  $materias = array(
    "Matemática",
    "Programação",
    "Eletrônica",
    "Física",
    "Filosofia"
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

  function escreverMateriasFavoritas($materias, $arquivo, $primeiraVez = false) {
    try {
      if($arquivo) {
        if($primeiraVez)
          mudarCodificacaoParaUTF8($arquivo);

        foreach ($materias as $materia) {
          fwrite($arquivo, $materia . PHP_EOL);
        }
      } else {
        throw new Exception("Erro: O arquivo não foi aberto corretamente!");
      }
    } catch (Exception $erro) {
      echo $erro->getMessage() . "<br>";
    }
  }

  //  Notas sobre a execução do código:
  //  É dito no enunciado do exercício que a função deve ser chamada duas vezes,
  //  então considerei usar o modo de inclusão de texto, "a".
  //  Além disso, é pedido que a cópia ocorra após a duas chamadas da função,
  //  então copiei o conteúdo do primeiro arquivo para um segundo e apaguei o
  //  arquivo de origem.

  $arquivo = fopen("exec002-origem.txt", "a");

  escreverMateriasFavoritas($materias, $arquivo, true);
  escreverMateriasFavoritas($materias, $arquivo);

  fclose($arquivo);

  copy("exec002-origem.txt", "exec002-destino.txt");
  unlink("exec002-origem.txt");
?>
