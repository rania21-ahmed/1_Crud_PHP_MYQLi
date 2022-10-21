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
            <!-- msg -->
        <?php 
           if(isset($_GET['msg'])){
            $msg =$_GET['msg'];

            echo '<div class="alert container text-center alert-warning alert-dismissible fade show" role="alert">
            '.$msg.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
           }
        ?>

        <!-- header add -->
        <div class="container">
          <a href="add_new.php" class="btn btn-dark">New Member</a>

          <table class="table table-hover text-center my-3">
            <thead class="table table-dark">
                <tr>
                <th scope="col">ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Gender</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                
                    include "db_conn.php";

                    $sql="SELECT * FROM `members`";
                    $query = mysqli_query($conn,$sql);
                    $results = mysqli_fetch_all( $query,MYSQLI_ASSOC);
                    foreach($results as $result):
                        ?>
                        <tr>
                            <td scope="row"><?= $result['id']?></td>
                            <td scope="row"><?=$result['f_name']?></td>
                            <td scope="row"><?=$result['l_name']?></td>
                            <td scope="row"><?=$result['email']?></td>
                            <td scope="row"><?=$result['gender']?></td>
                            
                            <td>
                                <a href="edit.php?id=<?php echo $result['id']; ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                                <a href="delete.php?id=<?php echo $result['id']; ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
                            </td>
                        </tr>
                        <?php
                    endforeach;    
                ?>
                
            </tbody>
            </table>

        </div>



    <!-- Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>