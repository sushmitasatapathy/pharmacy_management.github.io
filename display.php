<?php

if(isset($_POST['search']))

{

  $valueToSearch = $_POST['valueToSearch'];

   // search data in all table columns

  $query = "SELECT * FROM `sells`

WHERE CONCAT(`Salesman`, `Address`, `Distributer`) LIKE

'%".$valueToSearch."%'";

  $search_result = filterTable($query);
}

 else {

  $query = "SELECT * FROM `sells`";

  $search_result = filterTable($query);

}

// connection to megatech database 

function filterTable($query)

{

  $connect =

mysqli_connect("localhost", "root", "","pms");

  $filter_Result = mysqli_query($connect,

$query);

  return $filter_Result;

}
?>



<!DOCTYPE html>
<html>
<head>
 <title>Sales data</title>
  
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  
  
<style>
.col-lg-12 {
    position: relative;
    width: 100%;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
    margin-top: 100px;
}
  
input.search-bar{
margin-bottom: 10px;
margin-left: 420px;
	border-radius: 20px;
  width: 20%;
  margin-top: 20px;
	border:2px solid #bbb; 
	transition: width 0.1s ease;
}
input.search-bar:focus{
outline: none;
border:2px solid #fd5a5e;
width:25%;
}
</style>
</head>
<body style="background-color: rgb(154, 18, 179); ">
<a href="index.php">
 <button class="btn text-white headerbutton" style="float: right;margin-top: 62px;margin-right: 20px; background-color: red;">  LogOut </button></a>
 	
 <div class="container">
 <div class="col-lg-12" method="post">
 <br><br>
<div class="header"> <h1 style="
	float: left;
	margin-top: 5px;color:yellow;" class="text-center" >
 	Employees Data
</h1> 


</div>
<form method="post">
<div >
      <input class="search-bar" type="text" name="valueToSearch" placeholder="Search Here..">

      <input class="btn-primary btn" type="submit" name="search" value="Filter">
      </div>
  
 
 <table  id="tabledata" class=" table table-striped table-hover table-bordered" class="text-center">
 
 <tr class="bg-dark text-white text-center">
  
                                        
                                        <th scope="col">Name</th>
                                        <th scope="col">Drug Licence</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">GST</th>
                                        <th scope="col">Salesman</th>

                                        <th scope="col">Tablet</th>
                                        <th scope="col">Syrup</th>
                                        <th scope="col">Drop</th>
                                        <th scope="col">INJ</th>   
                                         <td> <button class="btn-danger btn"> <a href='index.php?action=deleteDistributer&id=%s' class="text-white"> Delete </a>  </button> </td>
 <td> <button class="btn-success btn"> <a href='index.php?action=editDistributer&id=%s' class="text-white"> Update </a> </button> </td>
                                     
                                        
 <?php while($row = mysqli_fetch_array($search_result)):?>

<tr class="text-center" style="font-size: 20px;color:white;">

   
                                            <td><?php echo $row['Distributer'];?></td>
                                            <td><?php echo $row['DrugLicence'];?></td>
                                            <td><?php echo $row['email'];?></td>
                                            <td><?php echo $row['Address'];?></td>
                                            <td><?php echo $row['phone_no'];?></td>
                                            <td><?php echo $row['GST_No'];?></td>
                                            <td><?php echo $row['Salesman'];?></td>
                                            <td><?php echo $row['tablet'];?></td>
                                            <td><?php echo $row['syrup'];?></td>
                                                <td><?php echo $row['dropp'];?></td>
                                                 <td><?php echo $row['inj'];?></td>

                                        
                                            


</tr>

<?php endwhile;?>
 
 </table>
</form>
 </div>
 </div>
</body>
</html>