<?php 

    require_once('connection.php');
    session_start();
 
    $carid=$_GET['id'];
    
    $sql="select *from cars where CAR_ID='$carid'";
    $cname = mysqli_query($con,$sql);
    $email = mysqli_fetch_assoc($cname);
    
    $value = $_SESSION['email'];
    $sql="select * from users where email='$value'";
    $name = mysqli_query($con,$sql);
    $rows=mysqli_fetch_assoc($name);
    $uemail=$rows['email'];
    $carprice=$email['price'];
    if(isset($_POST['Booked'])){
//       
//        $dur=mysqli_real_escape_string($con,$_POST['duration']);
//        $phno=mysqli_real_escape_string($con,$_POST['ph']);
//        $des=mysqli_real_escape_string($con,$_POST['des']);
//        $rdate=date('Y-m-d',strtotime($_POST['rdate']));
//         
        if( empty($dur)||){
            echo '<script>alert("please fill the place")</script>';

        }
        else{
            $sql="insert into booking (CAR_ID,EMAIL,BOOK_PLACE,BOOK_DATE,DURATION,PHONE_NUMBER,DESTINATION,PRICE,RETURN_DATE) values($carid,'$uemail','$bplace','$bdate',$dur,$phno,'$des',$price,'$rdate')";
            $result = mysqli_query($con,$sql);
            
            if($result){
                
                $_SESSION['email'] =$uemail;
                header("Location: payment.php");
            }
            else{
                echo '<script>alert("please check the connection")</script>';
            }
        }
        else{
            echo  '<script>alert("please enter a correct rturn date")</script>';
        }
    
        }
    }
    
    ?>