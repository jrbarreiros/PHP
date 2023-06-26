
<!DOCTYPE html>
<html lang="pt-br">
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <title>Web Calculator</title>
</head>
<body class="bg-dark">
    <div class="container card  mx-auto mt-5 col-6">
    <div class="card card-header text-center">Web Calculator</div>
    <div class="card-body">
      <form action="webcalc.php" method="POST" id="calcform">
        <div class="form-group">
          <div class="form-group">
            <label for="n1">
              Digite o primeiro número
              <input type="text" class="form-control" name="n1" placeholder="Digite o número aqui" value="<?php echo is_numeric($_GET["total"]) ? null : $_GET["n1"]; ?>" required>

            </label>
            <label for="n2">
              Digite o segundo número
              <input type="text" class="form-control" name="n2" placeholder="Digite o número aqui" value="<?php echo is_numeric($_GET["total"]) ? null : $_GET["n2"]; ?>" required>

            </label>
          </div>
          <br>
          <label for="opcao">
            Selecione a operação:
          </label>
            <select name="opcao" id="opcao"  class="form-control" form="calcform" required>
              <option selected>Escolha a operação desejada</option>
              <option value="somar">Somar</option>
              <option value="subtrair">Subtrair</option>
              <option value="dividir">Dividir</option>
              <option value="multiplicar">Multiplicar</option>
            </select>
        </div>
        <br>
        <button class="btn btn-success btn-block">Calcular</button>
      </form>
      <div class="result">
        <br>
        <br>
        Resultado da operação: 
        <?php if (isset($_GET["total"])) {
            $total = $_GET["total"];
        } else {
            $total = 'erro no calculo';
        } ?>
        <input type="text" name="result" class="form-control" value="<?php echo $total;?>" <?php echo is_numeric($_GET["total"]) ? 'style="color:blue";' : 'style="color:red";'; ?> readonly>
  
      </div>
  
    </div>
  </div>

</body>
</html>