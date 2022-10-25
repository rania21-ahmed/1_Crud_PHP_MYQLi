<?php
    include "db_conn.php";
    if(isset($_POST['submit'])){
        $fname = $_POST['first_name'];
        $lname = $_POST['last_name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $id =$_GET['id'];
                
        if(!empty($_FILES['file']['name'])){
            $imgname = $_FILES['file']['name'];
            $tmp = $_FILES['file']['tmp_name'];
            move_uploaded_file($tmp,"upload/".$imgname);
            $extra =  ", `img` = '$imgname'";
        }else{
            $extra = "";
        }
        

        $sql="UPDATE `members` SET  `f_name`='$fname', `l_name`='$lname', `email`='$email', `gender`='$gender'  $extra WHERE `id` = '$id'";
        $result = mysqli_query($conn,$sql);

        if($result){
            header("Location:index.php?msg=Update Record successful");
        }else{
            echo "Fail " . mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boostrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>PHP CRUD Aplication</title>
</head>
<body>  
    <!-- navbar -->
        <nav class="navbar navbar-light justify-content-center fs-3 mb-5 " style="background-color:#00ff5573">PHP Complete CRUD Application</nav>

        <!-- header add -->
        <div class="container">
            <div class="text-center mb-4">
                <h3>Update User</h3>
                <p class="text-muted">Complete the form below to add anew user</p>
            </div>
        </div>
        <?php 
            $id=$_GET['id'];
            $sqll = "SELECT * FROM members WHERE id=$id";
            $queryy=mysqli_query($conn,$sqll);
            $row=mysqli_fetch_assoc($queryy);
           
        ?>
        <!--Form Add  -->
        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;" enctype="multipart/form-data">
            <input type="hidden" value="<?= $row['id']?>" >
                <div class="row">
                    <div class="col">
                        <label class="from-label"> First Name : </label>
                        <input type="text" class="form-control" name="first_name" value="<?= $row['f_name']?>" >
                    </div>

                    <div class="col mb-3">
                        <label class="from-label"> Last Name : </label>
                        <input type="text" class="form-control" name="last_name" value="<?= $row['l_name']?>">
                    </div>

                    <div class="mb-3">
                        <label class="from-label"> Email: </label>
                        <input type="text" class="form-control" name="email" value="<?= $row['email']?>">
                    </div>

                    <div class="mb-3">
                        <label class="from-label"> Upload img: </label>
                    
                        <input type="file" class="form-control"  name="file" >
                    </div>

                    <div class="from-group mb-3">
                        <label >Gender : </label>
                        <input class="form-check-input" type="radio" name="gender" value="male" id="male" <?php if($row['gender']=="male") echo "checked"?>  >
                        <label class="form-check-label" for="male">
                            Mele
                        </label>

                        <input class="form-check-input" type="radio" name="gender" value="female" id="female" <?php if($row['gender']=="female") echo "checked"?>   >
                        <label class="form-check-label" for="female">
                            Female
                        </label>
                    </div>
                    
                    <div>
                        <button type="submit" class="btn btn-success" name="submit">Update</button>
                        <a href="index.php"class="btn btn-danger" >Cancel </a>
                    </div>
                </div>
            </form>
        </div>

    <!-- Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>