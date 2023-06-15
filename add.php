<?php
session_start();
include_once "config.php";
 $connection = new mysqli($servername, $username, $password, $dbname);
if ( !$connection ) {
    echo mysqli_error( $connection );
    throw new Exception( "Database cannot Connect" );
} else {
    $action = $_REQUEST['action'] ?? '';

    if ( 'addManager' == $action ) {
        $fname = $_REQUEST['fname'] ?? '';
        $lname = $_REQUEST['lname'] ?? '';
        $email = $_REQUEST['email'] ?? '';
        $phone = $_REQUEST['phone'] ?? '';
        $password = $_REQUEST['password'] ?? '';

        if ( $fname && $lname && $lname && $phone && $password ) {
            $hashPassword = password_hash( $password, PASSWORD_BCRYPT );
            $query = "INSERT INTO managers(fname,lname,email,phone,password) VALUES ('{$fname}','$lname','$email','$phone','$hashPassword')";
            mysqli_query( $connection, $query );
            header( "location:index.php?id=allManager" );
        }

    } elseif ( 'updateManager' == $action ) {
        $id = $_REQUEST['id'] ?? '';
        $fname = $_REQUEST['fname'] ?? '';
        $lname = $_REQUEST['lname'] ?? '';
        $email = $_REQUEST['email'] ?? '';
        $phone = $_REQUEST['phone'] ?? '';
        

        if ( $fname && $lname && $lname && $phone ) {
            $query = "UPDATE managers SET fname='{$fname}', lname='{$lname}', email='$email', phone='$phone' WHERE id='{$id}'";
            mysqli_query( $connection, $query );
            header( "location:index.php?id=allManager" );
        }
    } elseif ( 'addPharmacist' == $action ) {
        $fname = $_REQUEST['fname'] ?? '';
        $lname = $_REQUEST['lname'] ?? '';
        $email = $_REQUEST['email'] ?? '';
        $phone = $_REQUEST['phone'] ?? '';
        $district = $_REQUEST['district'] ?? '';

        if ( $fname && $lname && $district && $phone && $email ) {
            
            $query = "INSERT INTO pharmacists(fname,lname,email,phone,district) VALUES ('{$fname}','$lname','$email','$phone','$district')";
            mysqli_query( $connection, $query );
            header( "location:index.php?id=allPharmacist" );
        }
    } elseif ( 'updatePharmacist' == $action ) {
        $id = $_REQUEST['id'] ?? '';
        $fname = $_REQUEST['fname'] ?? '';
        $lname = $_REQUEST['lname'] ?? '';
        $email = $_REQUEST['email'] ?? '';
        $phone = $_REQUEST['phone'] ?? '';
        $district = $_REQUEST['district'] ?? '';
        if ( $fname && $lname && $email && $phone && $district) {
            $query = "UPDATE pharmacists SET fname='{$fname}', lname='{$lname}', email='$email', phone='$phone', district='$district' WHERE id='{$id}'";
            mysqli_query( $connection, $query );
            header( "location:index.php?id=allPharmacist" );
        }
    }







     elseif ( 'addDistributer' == $action ) {
        $dname = $_REQUEST['Name'] ?? '';
        $dl = $_REQUEST['DrugLicence'] ?? '';
        $gst = $_REQUEST['GST_No'] ?? '';
        $salsman = $_REQUEST['Salesman'] ?? '';

        $email = $_REQUEST['email'] ?? '';
        $phone = $_REQUEST['phone_no'] ?? '';
        $address = $_REQUEST['Address'] ?? '';
$dd="SELECT Name FROM distributer WHERE Name='$dname'";
$dq=mysqli_query($connection,$dd);
if(mysqli_num_rows($dq)>=1){
echo '<script>alert("Distributer already exists⚠")</script>';
}else{
        if ( $dname && $dl && $salsman && $phone && $address && $gst && $email) {
            
            $query = "INSERT INTO `distributer`(`Name`, `DrugLicence`, `Address`, `GST_No`, `phone_no`, `email`, `Salesman`) VALUES ('$dname','$dl','$address','$gst','$phone','$email','$salsman')";
            mysqli_query( $connection, $query );
            header( "location:index.php?id=allDistributer" );
        }}
    } elseif ( 'updateDistributer' == $action ) {
        $id = $_REQUEST['id'] ?? '';
       $dname = $_REQUEST['Name'] ?? '';
        $dli = $_REQUEST['DrugLicence'] ?? '';
        $gst = $_REQUEST['GST_No'] ?? '';
        $salsman = $_REQUEST['Salesman'] ?? '';

        $email = $_REQUEST['email'] ?? '';
        $phone = $_REQUEST['phone_no'] ?? '';
        $address = $_REQUEST['Address'] ?? '';



        if ($dname && $dli && $salsman && $phone && $address && $gst && $email)  {
            $query = "UPDATE `distributer` SET `Name`='$dname',`DrugLicence`='$dli',`Address`='$address',`GST_No`='$gst',`phone_no`='$phone',`email`='$email',`Salesman`='$salsman' WHERE id='{$id}'";
            mysqli_query( $connection, $query );
            header( "location:index.php?id=allDistributer" );
        }
    } 





     elseif ( 'addSalesman' == $action ) {
        $fname = $_REQUEST['fname'] ?? '';
        $lname = $_REQUEST['lname'] ?? '';
        $email = $_REQUEST['email'] ?? '';
        $phone = $_REQUEST['phone'] ?? '';

        if ( $fname && $lname && $email && $phone ) {
            
            $query = "INSERT INTO salesmans(fname,lname,email,phone) VALUES ('{$fname}','$lname','$email','$phone')";
            mysqli_query( $connection, $query );
            header( "location:index.php?id=allSalesman" );
        }
    } elseif ( 'updateSalesman' == $action ) {
        $id = $_REQUEST['id'] ?? '';
        $fname = $_REQUEST['fname'] ?? '';
        $lname = $_REQUEST['lname'] ?? '';
        $SOLD = $_REQUEST['SOLD'] ?? '';
        $email = $_REQUEST['email'] ?? '';
        $phone = $_REQUEST['phone'] ?? '';

        if ( $fname && $lname && $email && $SOLD && $phone ) {
            $query = "UPDATE salesmans SET fname='{$fname}', lname='{$lname}', email='$email', SOLD='$SOLD' , phone='$phone' WHERE id='{$id}'";
            mysqli_query( $connection, $query );
            header( "location:index.php?id=allSalesman" );
        }
    }
    elseif ( 'addSells' == $action ) {
        $MedicineName = $_REQUEST['MedicineName'] ?? '';
        $InvoiceNo = $_REQUEST['InvoiceNo'] ?? '';
        $BatchNo = $_REQUEST['BatchNo'] ?? '';
        $MFGDate = $_REQUEST['MFGDate'] ?? '';
        $EXPDate = $_REQUEST['EXPDate'] ?? '';
        $Sells = $_REQUEST['Sells'] ?? '';
        $Distributer = $_REQUEST['Distributer'] ?? '';

        $Type = $_REQUEST['TYPE'] ?? '';
        $Free = $_REQUEST['Free'] ?? '';
        $Date = $_REQUEST['date'] ?? '';
        $total= $Free + $Sells;
$chk="SELECT InvoiceNo FROM sells WHERE InvoiceNo='$InvoiceNo'";
$inn =mysqli_query( $connection, $chk );
if(mysqli_num_rows($inn)<=0)
{
$dchk="SELECT Name FROM distributer WHERE Name='$Distributer'";
$innn=mysqli_query($connection,$dchk);
if (mysqli_num_rows($innn)>=1) {
    

        if ( $MedicineName && $MFGDate && $EXPDate && $Sells && $Distributer && $Date && $InvoiceNo && $Free && $BatchNo && $total && $Type ) {
            
            $query = "INSERT INTO `sells`(`MedicineName`, `MFGDate`, `EXPDate`, `Sells`, `Distributer`, `Date`, `InvoiceNo`, `BatchNo`,`Free`,`total`,`TYPE`) VALUES ('$MedicineName','$MFGDate','$EXPDate','$Sells','$Distributer','$Date','$InvoiceNo','$BatchNo','$Free','$total','$Type')";
            mysqli_query( $connection, $query );
            header( "location:index.php?id=allSells" );
        }
    }else{
     echo '<script>alert("No Distributer Found⚠")</script>';
   
    }
}else
    {
        echo '<script>alert("Invoice  No already exists⚠")</script>';

    }
} elseif ( 'updateSells' == $action ) {
        $id = $_REQUEST['id'] ?? '';
        $MedicineName = $_REQUEST['MedicineName'] ?? '';
        $InvoiceNo = $_REQUEST['InvoiceNo'] ?? '';
        $BatchNo = $_REQUEST['BatchNo'] ?? '';
        $MFGDate = $_REQUEST['MFGDate'] ?? '';
        $EXPDate = $_REQUEST['EXPDate'] ?? '';
        $Sells = $_REQUEST['Sells'] ?? '';
        $Distributer = $_REQUEST['Distributer'] ?? '';
        $Free = $_REQUEST['Free'] ?? '';
        $Date = $_REQUEST['Date'] ?? '';
        $Type = $_REQUEST['TYPE'] ?? '';
         $total= $Free + $Sells;
        
        if ( $MedicineName && $Free && $MFGDate &&$EXPDate && $Sells && $Distributer && $Date && $InvoiceNo && $BatchNo && $total && $Type) {
            
            $query = "UPDATE sells SET MedicineName ='$MedicineName',MFGDate='$MFGDate' ,EXPDate='$EXPDate',Sells='$Sells',Distributer='$Distributer',InvoiceNo='$InvoiceNo',BatchNo='$BatchNo',Date='$Date',Free='$Free',total='$total',TYPE='$Type'WHERE id='{$id}'";
            mysqli_query( $connection, $query );
            header( "location:index.php?id=allSells" );
        }

        
        
    } elseif ( 'updateProfile' == $action ) {

        $fname = $_REQUEST['fname'] ?? '';
        $lname = $_REQUEST['lname'] ?? '';
        $email = $_REQUEST['email'] ?? '';
        $phone = $_REQUEST['phone'] ?? '';
        $oldPassword = $_REQUEST['oldPassword'] ?? '';
        $newPassword = $_REQUEST['newPassword'] ?? '';
        $sessionId = $_SESSION['id'] ?? '';
        $sessionRole = $_SESSION['role'] ?? '';
        $avatar = $_FILES['avatar']['name'] ?? "";

        if ( $fname && $lname && $email && $phone && $oldPassword && $newPassword ) {
            $query = "SELECT password,avatar FROM {$sessionRole}s WHERE id='$sessionId'";
            $result = mysqli_query( $connection, $query );

            if ( $data = mysqli_fetch_assoc( $result ) ) {
                $_password = $data['password'];
                $_avatar = $data['avatar'];
                $avatarName = '';
                if ( $_FILES['avatar']['name'] !== "" ) {
                    $allowType = array(
                        'image/png',
                        'image/jpg',
                        'image/jpeg'
                    );
                    if ( in_array( $_FILES['avatar']['type'], $allowType ) !== false ) {
                        $avatarName = $_FILES['avatar']['name'];
                        $avatarTmpName = $_FILES['avatar']['tmp_name'];
                        move_uploaded_file( $avatarTmpName, "assets/img/$avatar" );
                    } else {
                        header( "location:index.php?id=userProfileEdit&avatarError" );
                        return;
                    }
                } else {
                    $avatarName = $_avatar;
                }
                if ( password_verify( $oldPassword, $_password ) ) {
                    $hashPassword = password_hash( $newPassword, PASSWORD_BCRYPT );
                    $updateQuery = "UPDATE {$sessionRole}s SET fname='{$fname}', lname='{$lname}', email='{$email}', phone='{$phone}', password='{$hashPassword}', avatar='{$avatarName}' WHERE id='{$sessionId}'";
                    mysqli_query( $connection, $updateQuery );

                    header( "location:index.php?id=userProfile" );
                }

            }

        } else {
            echo mysqli_error( $connection );
        }

    }

}
