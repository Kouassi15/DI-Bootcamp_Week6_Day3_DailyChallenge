<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body><br>
<div class="row">
        <div class="col-md-4"></div>
       <div class="col-md-4">
           <!--<h1>Facture de l'electricité</h1>-->
            <form action="" method="post">
                <label for="nombre">Entrer le nombre</label>
                <input type="number" name="units" class="form-control mb-3 col-md-3 " placeholder="Veuillez entrer prix unités">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form><br>
    <?php
      $result_str = $result = '';
      if (isset($_POST['submit'])) {
          $units = $_POST['units'];
          if (!empty($units)) {
              $result = calculer_facture($units) ;
              $result_str = "Montant total de $units est:"  . ' ' . $result;
          }
      }
      /**
       * calcul la facture d'électricité selon le coût unitaire
       */
      function calculer_facture($units) {
          $unit1 = 3.50;
          $unit2 = 4.00;
          $unit3= 5.20;
          $unit4 = 6.50;
      
          if($units <= 50) {
              $facture = $units * $unit1;
          }
          else if($units > 50 && $units <= 100) {
              $temp = 50 * $unit1;
              $units_restantes = $units - 50;
              $facture = $temp + ($units_restantes * $unit2);
          }
          else if($units > 100 && $units <= 200) {
              $temp = (50 * 3.5) + (100 * $unit2);
              $units_restantes = $units - 150;
              $facture = $temp + ($units_restantes * $unit3);
          }
          else {
              $temp = (50 * 3.5) + (100 * $unit2) + (100 * $unit3);
              $units_restantes = $units - 250;
              $facture = $temp + ($units_restantes * $unit4);
          }
          return number_format((float)$facture, 2, '.', '');
      }
    ?>
    </div>
    <?php echo '<br />' . $result_str; ?>
</div>
</div>
</body>
</html>