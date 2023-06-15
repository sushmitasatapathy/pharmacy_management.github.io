<?php
include "config.php";
/*$tb="SELECT SUM(total) total FROM sells WHERE TYPE='TABLET';";
$tab=mysqli_query($connection,$tb);
$data = mysqli_fetch_num( $tab );


$sp="SELECT SUM(total) total FROM sells WHERE TYPE='SYRUP';";
$syrup=mysqli_query($connection,$sp);
$data1 = mysqli_fetch_num( $syrup );


$dp="SELECT SUM(total) total FROM sells WHERE TYPE='drop';";
$dropp=mysqli_query($connection,$dp);
$data2 = mysqli_fetch_num( $dropp );


$ij="SELECT SUM(total) total FROM sells WHERE TYPE='inj';";
$inj=mysqli_query($connection,$ij);
$data3 = mysqli_fetch_num( $inj );


$ck="SELECT SUM(total) total FROM sells WHERE TYPE='co-kit';";
$cokit=mysqli_query($connection,$ck);
$data4 = mysqli_fetch_num( $cokit );




//update time
$utb="UPDATE `report` SET `sale`='$data' WHERE `Product`='Tablet';";
$utab=mysqli_query($connection,$utb);
$usp="UPDATE `report` SET `sale`='$data1' WHERE `Product`='Syrup';";
$usyrup=mysqli_query($connection,$usp);
$udp="UPDATE `report` SET `sale`='$data2' WHERE `Product`='dropp';";
$udropp=mysqli_query($connection,$udp);
$uij="UPDATE `report` SET `sale`='$data3' WHERE `Product`='INJ';";
$uinj=mysqli_query($connection,$uij);
$uck="UPDATE `report` SET `sale`='$data4' WHERE `Product`='Covid-kit';";
$ucokit=mysqli_query($connection,$uck);


*/

$query="SELECT `Product`, `sale` FROM `report`";
$res=mysqli_query($connection,$query);
$product=array();
while ($result=mysqli_fetch_assoc($res)) {
  $product[]="['".$result['Product']."',".$result['sale']."],";
}
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php

          foreach($product as $product){
            echo $product;
          }
          ?>
         /* ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]*/
        ]);

        var options = {
          title: 'Project PieChart Representation',
          is3D: true,
          height: 700,
          width:1000,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body style="padding-left:300px" >
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
  </body>
</html>