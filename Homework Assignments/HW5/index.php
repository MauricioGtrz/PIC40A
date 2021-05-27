#!/usr/local/bin/php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>TABLE OF HAILSTONE SEQUENCE VALUES</title>
</head>
<body>
  <table>
    <thead>
      <tr>
        <th>Iteration</th>
        <th>x</th>
      </tr>
    </thead>
    <tbody>
      <?php 
    $x = $_GET['x'];
    $i = 0;
    function hailstoneSequence($n, $iteration) {
      if ($n === 1) {?>
        <tr> <td><?php echo $iteration?></td> <td><?php echo $n?></td> </tr>
        <?php
        return;
      }
      ?>
      <tr> <td><?php echo $iteration?></td> <td><?php echo $n?></td> </tr>
      <?php
      $iteration++;
      if ($n % 2 === 0) {
        hailstoneSequence($n / 2, $iteration);
      } else {
        hailstoneSequence(3 * $n + 1, $iteration);
      }
    }

    hailstoneSequence($x, $i);
  ?>
    </tbody>
  </table>
</body>
</html>