<?php
    session_start();
    $sessionId = $_SESSION['id'] ?? '';
    $sessionRole = $_SESSION['role'] ?? '';
    echo "$sessionId $sessionRole";
    if ( !$sessionId && !$sessionRole ) {
        header( "location:login.php" );
        die();
    }

    ob_start();

    include_once "config.php";
    $connection = new mysqli($servername, $username, $password, $dbname);
    if ( !$connection ) {
        echo mysqli_error( $connection );
        throw new Exception( "Database cannot Connect" );
    }

    $id = $_REQUEST['id'] ?? 'dashboard';
    $action = $_REQUEST['action'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1024">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Dashboard</title>
    <script src="//code.tidio.co/s5bb4rq8c9q3ndypqkl0ne1mfauq31fc.js" async></script>
</head>

<body>
    <!--------------------------------- Secondary Navber -------------------------------->
    <section class="topber">
        <div class="topber__title">
            <span class="topber__title--text">
                <?php
                    if ( 'dashboard' == $id ) {
                        echo "DashBoard";
                    } elseif ( 'addManager' == $id ) {
                        echo "Add Manager";
                    } elseif ( 'allManager' == $id ) {
                        echo "Managers";
                    } elseif ( 'addPharmacist' == $id ) {
                        echo "Add Pharmacist";
                    } elseif ( 'allPharmacist' == $id ) {
                        echo "Pharmacists";
                    } elseif ( 'addSalesman' == $id ) {
                        echo "Add Salesman";
                    } elseif ( 'allSalesman' == $id ) {
                        echo "Salesmans";
                    } elseif ( 'userProfile' == $id ) {
                        echo "Your Profile";
                    } elseif ( 'editManager' == $action ) {
                        echo "Edit Manager";
                    } elseif ( 'editPharmacist' == $action ) {
                        echo "Edit Pharmacist";
                    } elseif ( 'editSalesman' == $action ) {
                        echo "Edit Salesman";
                    }elseif ( 'addDistributer' == $id ) {
                        echo "Add Distributer";
                    } elseif ( 'allDistributer' == $id ) {
                        echo "Distributer";
                    } elseif ( 'addSells' == $id ) {
                        echo "Add Purchase";
                    } elseif ( 'allSells' == $id ) {
                        echo "Purchase Data";
                    } elseif ( 'editSells' == $action ) {
                        echo "Edit purchase";
                    }elseif ( 'editDistributer' == $action ) {
                        echo "Edit Distributer";
                    }
                ?>

            </span>
        </div>

        <div class="topber__profile">
            <?php
                $query = "SELECT fname,lname,role,avatar FROM {$sessionRole}s WHERE id='$sessionId'";
                $result = mysqli_query( $connection, $query );

                if ( $data = mysqli_fetch_assoc( $result ) ) {
                    $fname = $data['fname'];
                    $lname = $data['lname'];
                    $role = $data['role'];
                    $avatar = $data['avatar'];
                ?>
                <img src="assets/img/<?php echo "$avatar"; ?>" height="25" width="25" class="rounded-circle" alt="profile">
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php
                        echo "$fname $lname (" . ucwords( $role ) . " )";
                        }
                    ?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="index.php">Dashboard</a>
                        <a class="dropdown-item" href="index.php?id=userProfile">Profile</a>
                        <a class="dropdown-item" href="logout.php">Log Out</a>
                    </div>
                </div>
        </div>
    </section>
    <!--------------------------------- Secondary Navber -------------------------------->


    <!--------------------------------- Sideber -------------------------------->
    <section id="sideber" class="sideber">
        <ul class="sideber__ber">
            <h3 class="sideber__panel"><i id="left" class="fas fa-laugh-wink"></i>Pharmacy Management</h3>
            <li id="left" class="sideber__item<?php if ( 'dashboard' == $id ) {
                                                  echo " active";
                                              }?>">
                <a href="index.php?id=dashboard"><i id="left" class="fas fa-tachometer-alt"></i>Dashboard</a>
            </li>
            <?php if ( 'admin' == $sessionRole ) {?>
                <!-- Only For Admin -->
                <li id="left" class="sideber__item sideber__item--modify<?php if ( 'addManager' == $id ) {
                                                                            echo " active";
                                                                        }?>">
                    <a href="index.php?id=addManager"><i id="left" class="fas fa-user-plus"></i></i>Add Manager</a>
                </li><?php }?>
            <li id="left" class="sideber__item<?php if ( 'allManager' == $id ) {
    echo " active";
}?>">
                <a href="index.php?id=allManager"><i id="left" class="fa fa-users"></i>All Manager</a>
            </li>
            <?php if ( 'admin' == $sessionRole || 'manager' == $sessionRole ) {?>
                <!-- For Admin, Manager -->
                <li id="left" class="sideber__item sideber__item--modify<?php if ( 'addPharmacist' == $id ) {
                                                                            echo " active";
                                                                        }?>">
                    <a href="index.php?id=addPharmacist"><i id="left" class="fas fa-user-plus"></i></i>Add
                        Pharmacist</a>
                </li><?php }?>
            <li id="left" class="sideber__item<?php if ( 'allPharmacist' == $id ) {
    echo " active";
}?>">
                <a href="index.php?id=allPharmacist"><i id="left" class="fa fa-users"></i>All Pharmacist</a>
            </li>


            <?php if ( 'admin' == $sessionRole || 'manager' == $sessionRole || 'pharmacist' == $sessionRole ) {?>
                <!-- For Admin, Manager, Pharmacist-->
                <li id="left" class="sideber__item sideber__item--modify<?php if ( 'addSalesman' == $id ) {
                                                                            echo " active";
                                                                        }?>">
                    <a href="index.php?id=addSalesman"><i id="left" class="fas fa-user-plus"></i>Add Salesman</a>
                </li><?php }?>
            <li id="left" class="sideber__item<?php if ( 'allSalesman' == $id ) {
    echo " active";
}?>">
                <a href="index.php?id=allSalesman"><i id="left" class="fa fa-users"></i>All Salesman</a>
            </li>

<?php if ( 'admin' == $sessionRole || 'manager' == $sessionRole ) {?>
                <!-- Only For Admin -->
                <li id="left" class="sideber__item sideber__item--modify<?php if ( 'addDistributer' == $id ) {
                                                                            echo " active";
                                                                        }?>">
                    <a href="index.php?id=addDistributer"><i id="left" class="fas fa-h-square"></i></i>Add Distributer</a>
                </li><?php }?>
                <li id="left" class="sideber__item<?php if ( 'allDistributer' == $id ) {
    echo " active";
}?>">
                <a href="index.php?id=allDistributer"><i id="left" class="fas fa-database"></i>All Distributer</a>
            </li>       
<?php if ( 'admin' == $sessionRole || 'manager' == $sessionRole) {?>
                <!-- Only For Admin -->
                <li id="left" class="sideber__item sideber__item--modify<?php if ( 'addSells' == $id ) {
                                                                            echo " active";
                                                                        }?>">
                    <a href="index.php?id=addSells"><i id="left" class="fas fa-h-square"></i></i>Add purchase</a>
                </li><?php }?>
                <li id="left" class="sideber__item<?php if ( 'allSells' == $id ) {
    echo " active";
}?>">
                <a href="index.php?id=allSells"><i id="left" class="fas fa-database"></i>All purchase</a>
            </li>
        
        

        </ul>
        
    </section>
    <!--------------------------------- #Sideber -------------------------------->




    <!--------------------------------- Main section -------------------------------->
    <section class="main">
        <div class="container">

            <!-- ---------------------- DashBoard ------------------------ -->
            <?php if ( 'dashboard' == $id ) {?>
                <div class="dashboard p-5">
                    <div class="total">
                        <div class="row">
                            
                            <div class="col-3" style="padding-left: 30px;">
                                <div class="total__box text-center">
                                    <h1>
                                        <?php
                                            $query = "SELECT COUNT(*) totalManager FROM managers;";
                                                $result = mysqli_query( $connection, $query );
                                                $totalManager = mysqli_fetch_assoc( $result );
                                                echo $totalManager['totalManager'];
                                            ?>
                                    </h1>
                                    <h2>Manager</h2>
                                </div>
                            </div>
                            <div class="col-3" >
                                <div class="total__box text-center">
                                    <h1>
                                        <?php
                                            $query = "SELECT COUNT(*) totalPharmacist FROM pharmacists;";
                                                $result = mysqli_query( $connection, $query );
                                                $totalPharmacist = mysqli_fetch_assoc( $result );
                                                echo $totalPharmacist['totalPharmacist'];
                                            ?>

                                    </h1>
                                    <h2>Pharmacist</h2>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="total__box text-center">
                                    <h1>
                                        <?php
                                            $query = "SELECT COUNT(*) totalDistributer FROM distributer;";
                                                $result = mysqli_query( $connection, $query );
                                                $totalDistributer = mysqli_fetch_assoc( $result );
                                                echo $totalDistributer['totalDistributer'];
                                            ?>
                                    </h1>
                                    <h2>Distributer</h2>
                                </div>
                            </div>
                            <div class="col-3" style="padding-right: 30px;">
                                <div class="total__box text-center">
                                    <h1><?php
                                            $query = "SELECT COUNT(*) totalSalesman FROM salesmans;";
                                                $result = mysqli_query( $connection, $query );
                                                $totalSalesman = mysqli_fetch_assoc( $result );
                                            echo $totalSalesman['totalSalesman'];
                                            ?></h1>
                                    <h2>Salesman</h2>
                                </div>
                            </div>
                            <div class="col"  style="padding-top: 50px;padding-left: 30px;">
                                <div class="total__box text-center">
                                    <h1><?php
                                            $query = "SELECT SUM(Sells) total FROM sells WHERE TYPE='TABLET';";
                                                $result = mysqli_query( $connection, $query );
                                                $totalSalesman = mysqli_fetch_assoc( $result );
                                            echo $totalSalesman['total'];
                                            ?></h1>
                                    <h2>Tablet</h2>
                                </div>
                            </div>
                            <div class="col"  style="padding-top: 50px;">
                                <div class="total__box text-center">
                                    <h1><?php
                                            $query = " SELECT SUM(Sells) total FROM sells WHERE TYPE='SYRUP';";
                                                $result = mysqli_query( $connection, $query );
                                                $totalSalesman = mysqli_fetch_assoc( $result );
                                            echo $totalSalesman['total'];
                                            ?></h1>
                                    <h2>SYRUP</h2>
                                </div>
                            </div>
                            <div class="col"  style="padding-top: 50px;">
                                <div class="total__box text-center">
                                    <h1><?php
                                            $query = " SELECT SUM(Sells) total FROM sells WHERE TYPE='drop';";
                                                $result = mysqli_query( $connection, $query );
                                                $totalSalesman = mysqli_fetch_assoc( $result );
                                            echo $totalSalesman['total'];
                                            ?></h1>
                                    <h2>DROP</h2>
                                </div>
                            </div>
                            <div class="col"  style="padding-top: 50px;">
                                <div class="total__box text-center">
                                    <h1><?php
                                            $query = " SELECT SUM(Sells) total FROM sells WHERE TYPE='inj';";
                                                $result = mysqli_query( $connection, $query );
                                                $totalSalesman = mysqli_fetch_assoc( $result );
                                            echo $totalSalesman['total'];
                                            ?></h1>
                                    <h2>INJ</h2>
                                </div>
                            </div>
                            <div class="col"  style="padding-top: 50px;padding-right: 30px;">
                                <div class="total__box text-center">
                                    <h1><?php
                                            $query = " SELECT SUM(Sells) total FROM sells WHERE TYPE='co-kit';";
                                                $result = mysqli_query( $connection, $query );
                                                $totalSalesman = mysqli_fetch_assoc( $result );
                                            echo $totalSalesman['total'];
                                            ?></h1>
                                    <h2>CO-Kit</h2>
                                </div>
                            </div>


                            
                        </div>
                    </div>


                    <div class="col"  style="padding-top: 50px;">
                                <div class="total__box text-center">
                                    <h1><?php
                                            $query = " SELECT SUM(total) total FROM sells;";
                                                $result = mysqli_query( $connection, $query );
                                                $totalSalesman = mysqli_fetch_assoc( $result );
                                            echo $totalSalesman['total'];
                                            ?></h1>
                                    <h2>Sale</h2>
                                </div>
                            </div>
                   
                            <div class="col"  style="padding-top: 50px;">
                                <div class="total__box text-center">
                                    <h1><?php
                                            $query = " SELECT SUM(Free) total FROM sells;";
                                                $result = mysqli_query( $connection, $query );
                                                $totalSalesman = mysqli_fetch_assoc( $result );
                                            echo $totalSalesman['total'];
                                            ?></h1>
                                    <h2>Free</h2>
                                </div>
                            </div>
                    <a href="report.php">
                    <button style="margin-top:60px;margin-left: 420px; padding:25px;" class="btn btn-success" type="submit" name="rip"> VIEW REPORT </button></a>
                </div>
            <?php }?>
            <!-- ---------------------- DashBoard ------------------------ -->

            <!-- ---------------------- Manager ------------------------ -->
            <div class="manager">
                <?php if ( 'allManager' == $id ) {?>
                    <div class="allManager">
                        <div class="main__table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Avater</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        
                                        
                                        <th scope="col">Phone</th>
                                        <?php if ( 'admin' == $sessionRole ) {?>
                                            <!-- Only For Admin -->
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        <?php }?>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        $getManagers = "SELECT * FROM managers";
                                            $result = mysqli_query( $connection, $getManagers );

                                        while ( $manager = mysqli_fetch_assoc( $result ) ) {?>

                                        <tr>
                                            <td>
                                                <center><img class="rounded-circle" width="40" height="40" src="assets/img/<?php echo $manager['avatar']; ?>" alt=""></center>
                                            </td>
                                            <td><?php printf( "%s %s", $manager['fname'], $manager['lname'] );?></td>
                                            <td><?php printf( "%s", $manager['email'] );?></td>
                                            
                                            <td><?php printf( "%s", $manager['phone'] );?></td>
                                            <?php if ( 'admin' == $sessionRole ) {?>
                                                <!-- Only For Admin -->
                                                <td><?php printf( "<a href='index.php?action=editManager&id=%s'><i class='fas fa-edit'></i></a>", $manager['id'] )?></td>
                                                <td><?php printf( "<a class='delete' href='index.php?action=deleteManager&id=%s'><i class='fas fa-trash'></i></a>", $manager['id'] )?></td>
                                            <?php }?>
                                        </tr>

                                    <?php }?>

                                </tbody>
                            </table>


                        </div>
                    </div>
                <?php }?>

                <?php if ( 'addManager' == $id ) {?>
                    <div class="addManager">
                        <div class="main__form">
                            <div class="main__form--title text-center">Add New Manager</div>
                            <form action="add.php" method="POST">
                                <div class="form-row">
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="fname" placeholder="First name" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="lname" placeholder="Last Name" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-envelope"></i>
                                            <input type="email" name="email" placeholder="Email" required>
                                        </label>
                                    </div>
                                     
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-phone-alt"></i>
                                            <input type="text" name="phone" placeholder="Phone" minlength="10" maxlength="10" required>
                                        </label>
                
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-key"></i>
                                            <input id="pwdinput" type="password" name="password" placeholder="Password" required>
                                            <i id="pwd" class="fas fa-eye right"></i>
                                        </label>
                                    </div>
                                    <input type="hidden" name="action" value="addManager">
                                    <div class="col col-12">
                                        <input type="submit" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                <?php }?>

                <?php if ( 'editManager' == $action ) {
                        $managerId = $_REQUEST['id'];
                        $selectManagers = "SELECT * FROM managers WHERE id='{$managerId}'";
                        $result = mysqli_query( $connection, $selectManagers );

                    $manager = mysqli_fetch_assoc( $result );?>
                    <div class="addManager">
                        <div class="main__form">
                            <div class="main__form--title text-center">Update Manager</div>
                            <form action="add.php" method="POST">
                                <div class="form-row">
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="fname" placeholder="First name" value="<?php echo $manager['fname']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="lname" placeholder="Last Name" value="<?php echo $manager['lname']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-envelope"></i>
                                            <input type="email" name="email" placeholder="Email" value="<?php echo $manager['email']; ?>" required>
                                        </label>
                                    </div>
                                   
                        
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-phone-alt"></i>
                                            <input type="text" name="phone" placeholder="Phone" value="<?php echo $manager['phone']; ?>"  minlength="10" maxlength="10" required>
                                        </label>
                                    </div>
                                    <input type="hidden" name="action" value="updateManager">
                                    <input type="hidden" name="id" value="<?php echo $managerId; ?>">
                                    <div class="col col-12">
                                        <input type="submit" value="Update">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php }?>

                <?php if ( 'deleteManager' == $action ) {
                        $managerId = $_REQUEST['id'];
                        $deleteManager = "DELETE FROM managers WHERE id ='{$managerId}'";
                        $result = mysqli_query( $connection, $deleteManager );
                        header( "location:index.php?id=allManager" );
                }?>
            </div>
            <!-- ---------------------- Manager ------------------------ -->

            <!-- ---------------------- Pharmacist ------------------------ -->
            <div class="pharmacist">
                <?php if ( 'allPharmacist' == $id ) {?>
                    <div class="allPharmacist">
                        <div class="main__table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Avatar</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">district</th>
                                        <th scope="col">Phone</th>
                                        <?php if ( 'admin' == $sessionRole || 'manager' == $sessionRole ) {?>
                                            <!-- For Admin, Manager -->
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        <?php }?>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        $getPharmacist = "SELECT * FROM pharmacists";
                                            $result = mysqli_query( $connection, $getPharmacist );

                                        while ( $pharmacist = mysqli_fetch_assoc( $result ) ) {?>

                                        <tr>
                                            <td>
                                                <center><img class="rounded-circle" width="40" height="40" src="assets/img/<?php echo $pharmacist['avatar']; ?>" alt=""></center>
                                            </td>
                                            <td><?php printf( "%s %s", $pharmacist['fname'], $pharmacist['lname'] );?></td>
                                            <td><?php printf( "%s", $pharmacist['email'] );?></td>
                                            <td><?php printf( "%s", $pharmacist['district'] );?></td>
                                            <td><?php printf( "%s", $pharmacist['phone'] );?></td>
                                            <?php if ( 'admin' == $sessionRole || 'manager' == $sessionRole ) {?>
                                                <!-- For Admin, Manager -->
                                                <td><?php printf( "<a href='index.php?action=editPharmacist&id=%s'><i class='fas fa-edit'></i></a>", $pharmacist['id'] )?></td>
                                                <td><?php printf( "<a class='delete' href='index.php?action=deletePharmacist&id=%s'><i class='fas fa-trash'></i></a>", $pharmacist['id'] )?></td>
                                            <?php }?>
                                        </tr>

                                    <?php }?>

                                </tbody>
                            </table>


                        </div>
                    </div>
                <?php }?>

                <?php if ( 'addPharmacist' == $id ) {?>
                    <div class="addPharmacist">
                        <div class="main__form">
                            <div class="main__form--title text-center">Add New Pharmacist</div>
                            <form action="add.php" method="POST">
                                <div class="form-row">
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="fname" placeholder="First name" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="lname" placeholder="Last Name" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-envelope"></i>
                                            <input type="email" name="email" placeholder="Email" required>
                                        </label>
                                        
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-chart-area"></i>
                                            <input type="text" name="district" placeholder="district" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-phone-alt"></i>
                                            <input type="text" name="phone" placeholder="Phone"  minlength="10" maxlength="10" required>
                                        </label>
                                    </div>
                                    
                                    <input type="hidden" name="action" value="addPharmacist">
                                    <div class="col col-12">
                                        <input type="submit" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                <?php }?>

                <?php if ( 'editPharmacist' == $action ) {
                        $pharmacistID = $_REQUEST['id'];
                        $selectPharmacist = "SELECT * FROM pharmacists WHERE id='{$pharmacistID}'";
                        $result = mysqli_query( $connection, $selectPharmacist );

                    $pharmacist = mysqli_fetch_assoc( $result );?>
                    <div class="addManager">
                        <div class="main__form">
                            <div class="main__form--title text-center">Update Pharmacist</div>
                            <form action="add.php" method="POST">
                                <div class="form-row">
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="fname" placeholder="First name" value="<?php echo $pharmacist['fname']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="lname" placeholder="Last Name" value="<?php echo $pharmacist['lname']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-envelope"></i>
                                            <input type="email" name="email" placeholder="Email" value="<?php echo $pharmacist['email']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-chart-area"></i>
                                            <input type="text" name="district" placeholder="district" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-phone-alt"></i>
                                            <input type="text" name="phone" placeholder="Phone" value="<?php echo $pharmacist['phone']; ?>"  minlength="10" maxlength="10" required>
                                        </label>
                                    </div>
                                    <input type="hidden" name="action" value="updatePharmacist">
                                    <input type="hidden" name="id" value="<?php echo $pharmacistID; ?>">
                                    <div class="col col-12">
                                        <input type="submit" value="Update">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php }?>

                <?php if ( 'deletePharmacist' == $action ) {
                        $pharmacistID = $_REQUEST['id'];
                        $deletePharmacist = "DELETE FROM pharmacists WHERE id ='{$pharmacistID}'";
                        $result = mysqli_query( $connection, $deletePharmacist );
                        header( "location:index.php?id=allPharmacist" );
                }?>
            </div>
            <!-- ---------------------- Pharmacist ------------------------ -->

            <!-- ---------------------- Salesman ------------------------ -->
            <div class="salesman">
                <?php if ( 'allSalesman' == $id ) {?>
                    <div class="allSalesman">
                        <div class="main__table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Avatar</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">SOLD</th>
                                        <th scope="col">Phone</th>
                                        <?php if ( 'admin' == $sessionRole || 'manager' == $sessionRole || 'pharmacist' == $sessionRole ) {?>
                                            <!-- For Admin, Manager, Pharmacist-->
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        <?php }?>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        $getSalesman = "SELECT * FROM salesmans";
                                            $result = mysqli_query( $connection, $getSalesman );

                                        while ( $salesman = mysqli_fetch_assoc( $result ) ) {?>

                                        <tr>
                                             <td>
                                                <center><img class="rounded-circle" width="40" height="40" src="assets/img/<?php echo $salesman['avatar']; ?>" alt=""></center>
                                            </td>
                                            <td><?php printf( "%s %s", $salesman['fname'], $salesman['lname'] );?></td>
                                            <td><?php printf( "%s", $salesman['email'] );?></td>
                                            <td><?php printf( "%s", $salesman['SOLD'] );?></td>
                                            <td><?php printf( "%s", $salesman['phone'] );?></td>
                                            <?php if ( 'admin' == $sessionRole || 'manager' == $sessionRole || 'pharmacist' == $sessionRole ) {?>
                                                <!-- For Admin, Manager, Pharmacist-->
                                                <td><?php printf( "<a href='index.php?action=editSalesman&id=%s'><i class='fas fa-edit'></i></a>", $salesman['id'] )?></td>
                                                <td><?php printf( "<a class='delete' href='index.php?action=deleteSalesman&id=%s'><i class='fas fa-trash'></i></a>", $salesman['id'] )?></td>
                                            <?php }?>
                                        </tr>

                                    <?php }?>

                                </tbody>
                            </table>


                        </div>
                    </div>
                <?php }?>

                <?php if ( 'addSalesman' == $id ) {?>
                    <div class="addSalesman">
                        <div class="main__form">
                            <div class="main__form--title text-center">Add New Salesman</div>
                            <form action="add.php" method="POST">
                                <div class="form-row">
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="fname" placeholder="First name" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="lname" placeholder="Last Name" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-envelope"></i>
                                            <input type="email" name="email" placeholder="Email" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-phone-alt"></i>
                                            <input type="text" name="phone" placeholder="Phone"  minlength="10" maxlength="10" required>
                                        </label>
                                    </div>
                                   
                                    <input type="hidden" name="action" value="addSalesman">
                                    <div class="col col-12">
                                        <input type="submit" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                <?php }?>

                <?php if ( 'editSalesman' == $action ) {
                        $salesmanID = $_REQUEST['id'];
                        $selectSalesman = "SELECT * FROM salesmans WHERE id='{$salesmanID}'";
                        $result = mysqli_query( $connection, $selectSalesman );

                    $salesman = mysqli_fetch_assoc( $result );?>
                    <div class="addManager">
                        <div class="main__form">
                            <div class="main__form--title text-center">Update Salesman</div>
                            <form action="add.php" method="POST">
                                <div class="form-row">
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="fname" placeholder="First name" value="<?php echo $salesman['fname']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="lname" placeholder="Last Name" value="<?php echo $salesman['lname']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-envelope"></i>
                                            <input type="email" name="email" placeholder="Email" value="<?php echo $salesman['email']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-envelope"></i>
                                            <input type="number_format" name="SOLD" placeholder="SOlD" value="<?php echo $salesman['SOLD']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-phone-alt"></i>
                                            <input type="text" name="phone" placeholder="Phone" value="<?php echo $salesman['phone']; ?>"  minlength="10" maxlength="10" required>
                                        </label>
                                    </div>
                                    
                                    
                                    <input type="hidden" name="action" value="updateSalesman">
                                    <input type="hidden" name="id" value="<?php echo $salesmanID; ?>">
                                    <div class="col col-12">
                                        <input type="submit" value="Update">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php }?>

                <?php if ( 'deleteSalesman' == $action ) {
                        $salesmanID = $_REQUEST['id'];
                        $deleteSalesman = "DELETE FROM salesmans WHERE id ='{$salesmanID}'";
                        $result = mysqli_query( $connection, $deleteSalesman );
                        header( "location:index.php?id=allSalesman" );
                        ob_end_flush();
                }?>
            </div>
            <!-- ---------------------- Salesman ------------------------ -->

          




            <!-- ---------------------- Distributer ------------------------ -->



<div class="distributer">
                <?php if ( 'allDistributer' == $id ) {?>
                    <div class="allDistributer" style="width:1650px;padding-left: 0px;">

                        <div class="main__table">

                            <table class="table">
                                <thead>
                                    <tr>
                                        
                                        <th scope="col">Name</th>
                                        <th scope="col">Drug Licence</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">GST</th>
                                        <th scope="col">Salesman</th>

                                        <?php if ( 'admin' == $sessionRole || 'manager' == $sessionRole ) {?>
                                            <!-- For Admin, Manager -->
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        <?php }?>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        $getDistributer = "SELECT * FROM distributer";
                                            $result = mysqli_query( $connection, $getDistributer );

                                        while ( $distributer = mysqli_fetch_assoc( $result ) ) {?>

                                        <tr>
                                            
                                            <td><?php printf( "%s", $distributer['Name']);?></td>
                                            <td><?php printf( "%s", $distributer['DrugLicence']);?></td>
                                            <td><?php printf( "%s", $distributer['email'] );?></td>
                                            <td><?php printf( "%s", $distributer['Address'] );?></td>
                                            <td><?php printf( "%s", $distributer['phone_no'] );?></td>
                                            <td><?php printf( "%s", $distributer['GST_No'] );?></td>
                                            <td><?php printf( "%s", $distributer['Salesman'] );?></td>
                                        
                                            <?php if ( 'admin' == $sessionRole || 'manager' == $sessionRole ) {?>
                                                <!-- For Admin, Manager -->
                                                <td><?php printf( "<a href='index.php?action=editDistributer&id=%s'><i class='fas fa-edit'></i></a>", $distributer['id'] )?></td>
                                                <td><?php printf( "<a class='delete' href='index.php?action=deleteDistributer&id=%s'><i class='fas fa-trash'></i></a>", $distributer['id'] )?></td>
                                            <?php }?>
                                        </tr>

                                    <?php }?>

                                </tbody>
                            </table>


                        </div>
                    </div>
                <?php }?>

                <?php if ( 'addDistributer' == $id ) {?>
                    <div class="addDistributer">
                        <div class="main__form">
                            <div class="main__form--title text-center">Add New Distributor</div>
                            <form action="add.php" method="POST">
                                <div class="form-row">
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="Name" placeholder="Name" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="DrugLicence" placeholder="Drug Licence" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-envelope"></i>
                                            <input type="email" name="email" placeholder="Email" required>
                                        </label>
                                        
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-chart-area"></i>
                                            <input type="text" name="Address" placeholder="Address" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-phone-alt"></i>
                                            <input type="text" name="phone_no" placeholder="Phone"  minlength="10" maxlength="10" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="GST_No" placeholder="GST NO" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="Salesman" placeholder="Salesman Name" required>
                                        </label>
                                    </div>
                                    <input type="hidden" name="action" value="addDistributer">
                                    <div class="col col-12">
                                        <input type="submit" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                <?php }?>

                <?php if ( 'editDistributer' == $action ) {
                        $distributerID = $_REQUEST['id'];
                        $selectDistributer = "SELECT * FROM distributer WHERE id='{$distributerID}'";
                        $result = mysqli_query( $connection, $selectDistributer );

                    $distributer = mysqli_fetch_assoc( $result );?>
                    <div class="addDistributer">
                        <div class="main__form">
                            <div class="main__form--title text-center">Update Distributer</div>
                            <form action="add.php" method="POST">
                                <div class="form-row">
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="Name" placeholder="Name" value="<?php echo $distributer['Name']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="DrugLicence" placeholder="Drug Licence" value="<?php echo $distributer['DrugLicence']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-envelope"></i>
                                            <input type="email" name="email" placeholder="Email" value="<?php echo $distributer['email']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-chart-area"></i>
                                            <input type="text" name="Address" placeholder="Address" value="<?php echo $distributer['Address']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-phone-alt"></i>
                                            <input type="text" name="phone_no" placeholder="Phone" value="<?php echo $distributer['phone_no']; ?>"  minlength="10" maxlength="10" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="GST_No" placeholder="GST NO" value="<?php echo $distributer['GST_No']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="Salesman" placeholder="Salesman Name" value="<?php echo $distributer['Salesman']; ?>" required>
                                        </label>
                                    </div>

                              <!--      
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="number_format" name="dropp" placeholder="Drops" value="<?php echo $distributer['dropp']; ?>" required>
                                        </label>
                                    </div>
                                    
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="number_format" name="syrup" placeholder="Syrup" value="<?php echo $distributer['syrup']; ?>" required>
                                        </label>
                                    </div>
                                    
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i> 
                                            <input type="number_format" name="inj" placeholder="INJ" value="<?php echo $distributer['inj']; ?>" required>
                                        </label>
                                    </div>
                                    
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="number_format" name="tab" placeholder="Tablets" value="<?php echo $distributer['tablet']; ?>" required>
                                        </label>
                                    </div>
                                  -->  
                                    <input type="hidden" name="action" value="updateDistributer">
                                    <input type="hidden" name="id" value="<?php echo $distributerID; ?>">
                                    <div class="col col-12">
                                        <input type="submit" value="Update">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php }?>

                <?php if ( 'deleteDistributer' == $action ) {
                        $distributerID = $_REQUEST['id'];
                        $deleteDistributer = "DELETE FROM distributer WHERE id ='{$distributerID}'";
                        $result = mysqli_query( $connection, $deleteDistributer );
                        header( "location:index.php?id=allDistributer" );
                }?>
            </div>
            <!-- ---------------------- Distributer ------------------------ -->



















           <!-- ---------------------- Sells ------------------------ -->
            <div class="sells">
                <?php if ( 'allSells' == $id ) {?>
                    <div class="allSells" style="width:1220px;">
                        <div class="main__table">
                            <table class="table">
                                <thead>
                                    <tr>
                                         <th scope="col">Invoice No:</th>
                                        <th scope="col">Distributer</th>
                                        <th scope="col">Medicine Name</th>

                                       

                                        <th scope="col">TYPE</th>
                                        <th scope="col">Batch No:</th>                                      
                                        <th scope="col">MFG Date</th>
                                        <th scope="col">EXP Date</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Free</th>
                                        <th scope="col">Date</th>
                                        <?php if ( 'admin' == $sessionRole || 'manager' == $sessionRole ) {?>
                                            <!-- For Admin, Manager -->
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        <?php }?>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        $getSells = "SELECT * FROM Sells";
                                            $result = mysqli_query( $connection, $getSells );

                                        while ( $sells = mysqli_fetch_assoc( $result ) ) {?>

                                        <tr>
                                            <td><?php printf( "%s", $sells['InvoiceNo'] );?></td>
                                            <td><?php printf( "%s", $sells['Distributer'] );?></td>
                                            <td><?php printf( "%s", $sells['MedicineName'] );?></td>
                                            
                                            <td><?php printf( "%s", $sells['TYPE'] );?></td>
                                            
                                            <td><?php printf( "%s", $sells['BatchNo'] );?></td>
                                            <td><?php printf( "%s", $sells['MFGDate'] );?></td>
                                            <td><?php printf( "%s", $sells['EXPDate'] );?></td>
                                            <td><?php printf( "%s", $sells['Sells'] );?></td>
                                            <td><?php printf( "%s", $sells['Free'] );?></td>
                                            <td><?php printf( "%s", $sells['Date'] );?></td>

                                            <?php if ( 'admin' == $sessionRole || 'manager' == $sessionRole ) {?>
                                                <!-- For Admin, Manager -->
                                                <td><?php printf( "<a href='index.php?action=editSells&id=%s'><i class='fas fa-edit'></i></a>", $sells['id'] )?></td>
                                                <td><?php printf( "<a class='delete' href='index.php?action=deleteSells&id=%s'><i class='fas fa-trash'></i></a>", $sells['id'] )?></td>
                                            <?php }?>
                                        </tr>

                                    <?php }?>

                                </tbody>
                            </table>


                        </div>
                    </div>
                <?php }?>

                <?php if ( 'addSells' == $id ) {?>
                    <div class="addSells">
                        <div class="main__form">
                            <div class="main__form--title text-center">Add New Sales</div>
                            <form action="add.php" method="POST">
                                <div class="form-row">
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-file-invoice"></i>
                                            <input type="text" name="InvoiceNo" placeholder="Invoice No" required>
                                        </label>
                                    </div>

                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fa fa-medkit"></i>
                                            <input type="text" name="MedicineName" placeholder="MedicineName" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-file-invoice"></i>
                                            <select name="TYPE" id="TYPE" >
                                    <option value="tablet">TABLET</option>
                                    <option value="syrup">SYRUP</option>
                                    <option value="drop">DROP</option>
                                    <option value="co-kit">CO-Kit</option>
                                    <option value="inj">__INJ__</option>
                                </select>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-file-invoice"></i>
                                            <input type="text" name="BatchNo" placeholder="Batch No" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fab fa-medium-m"></i>
                                            <input type="date" name="MFGDate" placeholder="MFGDate" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fab fa-etsy"></i>
                                            <input type="date" name="EXPDate" placeholder="EXPDate" required>
                                        </label>
                                        
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fa fa-ambulance"></i>
                                            <input type="number_format" name="Sells" placeholder="Quantity" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fa fa-ambulance"></i>
                                            <input type="number_format" name="Free" placeholder="Free" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="Distributer" placeholder="Distributer Name"  required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="far fa-calendar-alt"></i>
                                            <input id="date" type="datetime-local" name="date" placeholder="Date" required>
                                            
                                        </label>
                                    </div>
                                    
                                    <input type="hidden" name="action" value="addSells">
                                    <div class="col col-12">
                                        <input type="submit" value="Submit">
                                    </div>
                                </div>
                            </form>
                            <?php
                            $var ="";

                              ?>
                        </div>

                    </div>
                <?php }?>

                <?php if ( 'editSells' == $action ) {
                        $sellsID = $_REQUEST['id'];
                        $selectSells = "SELECT * FROM sells WHERE id='{$sellsID}'";
                        $result = mysqli_query( $connection, $selectSells );

                    $sells = mysqli_fetch_assoc( $result );?>
                    <div class="addSells">
                        <div class="main__form">
                            <div class="main__form--title text-center">Update Sells</div>
                           <form action="add.php" method="POST">
                                <div class="form-row">
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fa fa-medkit"></i>
                                            <input type="text" name="MedicineName" placeholder="MedicineName"  value="<?php echo $sells['MedicineName']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-file-invoice"></i>
                                            <input id="InvoiceNo" type="text" name="InvoiceNo" placeholder="Invoice No" value="<?php echo $sells ['InvoiceNo']; ?>" required>
                                        </label>
                                    </div>
                                                                        <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-file-invoice"></i>
                                            <select name="TYPE" id="TYPE" >
                                    <option value="TABLET">TABLET</option>
                                    <option value="SYRUP">SYRUP</option>
                                    <option value="DROP">DROP</option>
                                    <option value="INJ">INJ</option>
                                </select>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-file-invoice"></i>
                                            <input type="text" name="BatchNo" placeholder="Batch No" value="<?php echo $sells['BatchNo']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fab fa-medium-m"></i>
                                            <input type="date" name="MFGDate" placeholder="MFGDate" value="<?php echo $sells['MFGDate']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fab fa-etsy"></i>
                                            <input type="date" name="EXPDate" placeholder="EXPDate" value="<?php echo $sells['EXPDate']; ?>" required>
                                        </label>
                                        
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fa fa-ambulance"></i>
                                            <input type="number_format" name="Sells" placeholder="Quantity" value="<?php echo $sells['Sells']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fa fa-ambulance"></i>
                                            <input type="number_format" name="Free" placeholder="Free" value="<?php echo $sells['Free']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="Distributer" placeholder="Distributer" value="<?php echo $sells['Distributer']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="far fa-calendar-alt"></i>
                                            <input id="Date" type="datetime-local"  name="Date" placeholder="Date" value="<?php echo $sells['Date']; ?>" required>
                                            
                                        </label>
                                    </div>

                                    
                                    <input type="hidden" name="action" value="updateSells">
                                    <input type="hidden" name="id" value="<?php echo $sellsID; ?>">
                                    <div class="col col-12">
                                        <input type="submit" value="Update">
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                <?php }?>

                <?php if ( 'deleteSells' == $action ) {
                        $sellsID = $_REQUEST['id'];
                        $deleteSells = "DELETE FROM sells WHERE id ='{$sellsID}'";
                        $result = mysqli_query( $connection, $deleteSells );
                        header( "location:index.php?id=allSells" );
                }?>
            </div>
            <!-- ---------------------- Sells------------------------ -->





























            <!-- ---------------------- User Profile ------------------------ -->
            <?php if ( 'userProfile' == $id ) {
                    $query = "SELECT * FROM {$sessionRole}s WHERE id='$sessionId'";
                    $result = mysqli_query( $connection, $query );
                    $data = mysqli_fetch_assoc( $result )
                ?>
                <div class="userProfile">
                    <div class="main__form myProfile">
                        <form action="index.php">
                            <div class="main__form--title myProfile__title text-center">My Profile</div>
                            <div class="form-row text-center">
                                <div class="col col-12 text-center pb-3">
                                    <img src="assets/img/<?php echo $data['avatar']; ?>" class="img-fluid rounded-circle" alt="">
                                </div>
                                <div class="col col-12">
                                    <h4><b>Full Name : </b><?php printf( "%s %s", $data['fname'], $data['lname'] );?></h4>
                                </div>
                                <div class="col col-12">
                                    <h4><b>Email : </b><?php printf( "%s", $data['email'] );?></h4>
                                </div>
                                <div class="col col-12">
                                    <h4><b>Phone : </b><?php printf( "%s", $data['phone'] );?></h4>
                                </div>
                                <input type="hidden" name="id" value="userProfileEdit">
                                <div class="col col-12">
                                    <input class="updateMyProfile" type="submit" value="Update Profile">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php }?>

            <?php if ( 'userProfileEdit' == $id ) {
                    $query = "SELECT * FROM {$sessionRole}s WHERE id='$sessionId'";
                    $result = mysqli_query( $connection, $query );
                    $data = mysqli_fetch_assoc( $result )
                ?>


                <div class="userProfileEdit">
                    <div class="main__form">
                        <div class="main__form--title text-center">Update My Profile</div>
                        <form enctype="multipart/form-data" action="add.php" method="POST">
                            <div class="form-row">
                                <div class="col col-12 text-center pb-3">
                                    <img id="pimg" src="assets/img/<?php echo $data['avatar']; ?>" class="img-fluid rounded-circle" alt="">
                                    <i class="fas fa-pen pimgedit"></i>
                                    <input onchange="document.getElementById('pimg').src = window.URL.createObjectURL(this.files[0])" id="pimgi" style="display: none;" type="file" name="avatar">
                                </div>
                                <div class="col col-12">
                                <?php if ( isset( $_REQUEST['avatarError'] ) ) {
                                            echo "<p style='color:red;' class='text-center'>Please make sure this file is jpg, png or jpeg</p>";
                                    }?>
                                </div>
                                <div class="col col-12">
                                    <label class="input">
                                        <i id="left" class="fas fa-user-circle"></i>
                                        <input type="text" name="fname" placeholder="First name" value="<?php echo $data['fname']; ?>" required>
                                    </label>
                                </div>
                                <div class="col col-12">
                                    <label class="input">
                                        <i id="left" class="fas fa-user-circle"></i>
                                        <input type="text" name="lname" placeholder="Last Name" value="<?php echo $data['lname']; ?>" required>
                                    </label>
                                </div>
                                <div class="col col-12">
                                    <label class="input">
                                        <i id="left" class="fas fa-envelope"></i>
                                        <input type="email" name="email" placeholder="Email" value="<?php echo $data['email']; ?>" required>
                                    </label>
                                </div>
                                <div class="col col-12">
                                    <label class="input">
                                        <i id="left" class="fas fa-phone-alt"></i>
                                        <input type="text" name="phone" placeholder="Phone" value="<?php echo $data['phone']; ?>"  minlength="10" maxlength="10" required>
                                    </label>
                                </div>
                                <div class="col col-12">
                                    <label class="input">
                                        <i id="left" class="fas fa-key"></i>
                                        <input id="pwdinput" type="password" name="oldPassword" placeholder="Old Password" required>
                                        <i id="pwd" class="fas fa-eye right"></i>
                                    </label>
                                </div>
                                <div class="col col-12">
                                    <label class="input">
                                        <i id="left" class="fas fa-key"></i>
                                        <input id="pwdinput" type="password" name="newPassword" placeholder="New Password" required>
                                        <p>Type Old Password if you don't want to change</p>
                                        <i id="pwd" class="fas fa-eye right"></i>
                                    </label>
                                </div>
                                <input type="hidden" name="action" value="updateProfile">
                                <div class="col col-12">
                                    <input type="submit" value="Update">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php }?>
            <!-- ---------------------- User Profile ------------------------ -->

        </div>

    </section>

    <!--------------------------------- #Main section -------------------------------->



    <!-- Optional JavaScript -->
    <script src="assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Custom Js -->
    <script src="./assets/js/app.js"></script>
</body>



</html>