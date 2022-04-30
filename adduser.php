<?php
     include("connection.php");
     include("header.php");
?>

<section id="home">
    <?php
    if (!isset($_SESSION['login']) && $_SESSION['level'] == 1) {
        header("Location: http://localhost/carrental");
    }
    ?>

        <section id="contact">
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-12">
                    <?php
                        include("sidebar.php");
                    ?>
                    </div>

                    <div class="col-md-8 col-sm-12">
                         <form id="contact-form" role="form" action="" method="post" enctype="multipart/form-data">
                              <div class="col-md-12 col-sm-12">
                                   <input type="text" class="form-control" placeholder="Enter Name" name="name" required>

                                   <input type="email" class="form-control" placeholder="Enter Gmail" name="gmail" required>

                                   <input type="password" class="form-control" placeholder="Enter Password" name="password" required>

                                   <select class="form-control" name="level">
                                    <option value="2">Customer</option>
                                    <option value="1">Admin</option>
                                   </select>

                                   <input type="file" class="form-control" placeholder="Picture" name="picture" required>

                              </div>

                              <div class="col-md-4 col-sm-12">
                                   <input type="submit" class="form-control" name="send message" value="Add User">
                              </div>
                         </form>
                    </div>

               </div>
          </div>
     </section>  

    <?php
    if (!empty($_POST)) {
        $username = $_POST['name'];
        $gmail = $_POST['gmail'];
        $password = md5($_POST['password']);
        $level = $_POST['level'];

        $filename = $_FILES["picture"]["name"];
        $tempname = $_FILES["picture"]["tmp_name"];    
        $folder = "images/".$filename;

        $sql = "INSERT INTO users (name,gmail,picture,level,password) VALUES('$username','$gmail','$filename','$level','$password')";
        $result = $conn->query($sql);
        move_uploaded_file($tempname, $folder);
        if (!$result) {
            ?>
                <p class="text-white">Cannnot Update Profile</p>
            <?php 
        } 
    } 
    ?>
</section>

<?php
     include("footer.php");
?>