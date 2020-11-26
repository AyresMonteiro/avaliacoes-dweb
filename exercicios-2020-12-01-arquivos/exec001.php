<!-- Crie um código que crie um arquivo .txt e guarde 3 frases nele (utilizando
3 variáveis diferentes). Em seguida, feche o arquivo, abra-o novamente e imprima
na tela todo o conteúdo. Não se esqueça de fechá-lo novamente. -->

<?php
  //  Algumas considerações:
  //  Estou usando funções pois permitem antes de qualquer coisa, a garantia
  //  da interrupção da execução do código em caso de erro.
  //  Quanto ao try/catch, posso ter uma forma de melhor descrever onde ocorreu
  //  o erro e como ocorreu. Apesar disso, nenhuma desas estruturas é realmente
  //  necessária para a conclusão deste exercício. 

  function mudarCodificacaoParaUTF8($arquivo) {
    if ($arquivo) {
      fwrite($arquivo, "\xEF\xBB\xBF");
    } else {
      throw new Exception(
        "Erro: Não é possível mudar a codificação do arquivo para UTF-8!"
      );
    }
  }

  function tarefaDoExercicio() {
    try {
      $arquivo = fopen("exec001.txt", "w");

      if ($arquivo) {
        //  Explicação da linha abaixo:
        //  Devido ao fato de o arquivo não ler caracteres UTF-8 e estar com
        //  literalmente 0 bytes de conteúdo nesse ponto do códgio (eu fiz um
        //  hexdump dele pra checar), percebi que não haveria problemas se eu
        //  agregasse os três primeiros bytes que identificam um arquivo UTF-8
        //  (\xEF, \xBB, \xBF) ao início do arquivo para torná-lo um arquivo
        //  utf-8.

        mudarCodificacaoParaUTF8($arquivo);

        $frase1 = "No céu tem pão." . PHP_EOL;
        $frase2 = "Que viagem é essa vey?" . PHP_EOL;
        $frase3 = "E morreu." . PHP_EOL;

        fwrite($arquivo, $frase1);
        fwrite($arquivo, $frase2);
        fwrite($arquivo, $frase3);

        fclose($arquivo);
      } else {
        throw new Exception("Erro ao abrir o arquivo no modo de escrita!");
      }

      $arquivo = fopen("exec001.txt", "r");

      if($arquivo) {
        while(!feof($arquivo)) {
          //  Removendo o "\n" ou "PHP_EOL" do final da string e imprimindo.

          $linha = fgets($arquivo);
          $linha = substr($linha, 0, strlen($linha) - 2);

          echo $linha . "<br>";
        }
      } else {
        throw new Exception("Erro ao abrir o arquivo no modo de leitura!");
      }

      return 1;
    } catch (Exception $erro) {
      echo $erro->getMessage() . "<br>";
      return 0;
    }
  }

  tarefaDoExercicio();
?>
