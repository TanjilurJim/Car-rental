<?php
     include("connection.php");
     include("header.php");
?>

<section id="home">
    <?php
    if (isset($_SESSION['login'])) {
        header("Location: http://localhost/carrental");
    }
    ?>

        <section id="contact">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-12">
                         <form id="contact-form" role="form" action="" method="post" enctype="multipart/form-data">
                              <div class="col-md-12 col-sm-12">
                                   <input type="text" class="form-control" placeholder="Enter Username" name="uname" required>

                                   <input type="email" class="form-control" placeholder="Enter email address" name="ename" required>

                                   <input type="password" class="form-control" placeholder="Enter Password" name="psw" required>

                                   <input type="file" class="form-control" placeholder="Enter Picture" name="picture" required>
                              </div>

                              <div class="col-md-4 col-sm-12">
                                   <input type="submit" class="form-control" name="send message" value="Signup">
                              </div>
                              

                         </form>
                    </div>

                    <div class="col-md-6 col-sm-12">
                         <div class="contact-image">
                              <img src="images/contact-1-600x400.jpg" class="img-responsive" alt="">
                         </div>
                    </div>

               </div>
          </div>
     </section>  

    <?php
    if (!empty($_POST)) {
        $username2 = $_POST['uname'];
        $gmail = $_POST['ename'];
        $password2 = md5($_POST['psw']);

        $filename = $_FILES["picture"]["name"];
        $tempname = $_FILES["picture"]["tmp_name"];    
        $folder = "images/".$filename;

        $sql = "SELECT * FROM users WHERE name='$username2' OR gmail='$gmail'";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
            $sql2 = "INSERT INTO users (name,password,gmail,level,picture) VALUES('$username2','$password2','$gmail','2','$filename')";
            $result = $conn->query($sql2);
            $_SESSION['login'] = true;
            $_SESSION['gmail'] = $gmail;
            $_SESSION['username'] = $username2;
            $_SESSION['level'] = 2;
            $_SESSION['password'] = $password;
            move_uploaded_file($tempname, $folder);
            header("Location: http://localhost/carrental");
        } else {
    ?><p class="text-white">User Already Registerted</p>
    <?php }
    } ?>
</section>

<?php
     include("footer.php");
?>