<?php
     include("connection.php");
     include("header.php");
?>

<section id="home">
    <?php
    if (!isset($_SESSION['login'])) {
        header("Location: http://localhost/carrental");
    }
    ?>

    <section id="contact">
          <div class="container">
               <h1>Update Profile</h1>
               <div class="row">
                    <div class="col-md-4 col-sm-12">
                    <?php
                        include("sidebar.php");
                    ?>
                    </div>

                    <?php
                        $gmail = $_SESSION['gmail'];
                        $password = $_SESSION['password'];
                        $sql = "SELECT * FROM users WHERE gmail = '$gmail' AND password='$password'";
                        $result = $conn->query($sql);
                    ?>

                    <?php
                        if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col-md-4 col-sm-12">
                         <form id="contact-form" role="form" action="" method="post">
                              <div class="col-md-12 col-sm-12">
                    
                                   <input type="text" class="form-control" value="<?php echo $row['name'] ?>" name="uname" required>

                                   <input type="email" class="form-control" value="<?php echo $row['gmail'] ?>" name="ename" required>

                                   <input type="hidden" value="<?php echo $row['id'] ?>" name="id">

                                   <input type="password" class="form-control" placeholder="Enter Old Password" name="psw" required>

                                   <input type="password" class="form-control" placeholder="Enter New Password" name="psw2" required>

                              </div>

                              <div class="col-md-4 col-sm-12">
                                   <input type="submit" class="form-control" name="send message" value="Update">
                              </div>

                         </form>
                    </div>
                    
                    

                    <div class="col-md-4 col-sm-12">
                         <div class="contact-image" style="margin: auto;">
                              <img src="images/<?php echo $row['picture'] ?>" class="img-responsive" style="border-radius: 50px; max-width: 350px; max-height: 350px;" alt="">
                         </div>
                    </div>    

                    <?php } } ?>

               </div>
          </div>
     </section>   

    <?php
    if (!empty($_POST)) {
        $id = $_POST['id'];
        $username2 = $_POST['uname'];
        $gmail = $_POST['ename'];
        $password = md5($_POST['psw']);
        $password2 = md5($_POST['psw2']);

        $sql = "UPDATE users SET name = '$username2', gmail= '$gmail', password ='$password2' WHERE id = '$id' AND password = '$password'";

        $result = $conn->query($sql);
        if ($result) {
            $_SESSION['gmail'] = $gmail;
            $_SESSION['username'] = $username2;
            $_SESSION['password'] = $password2;
            header("Location: http://localhost/carrental/dashboard.php");
        } else { ?>
            <p class="text-white">Cannnot Update Profile</p>
    <?php }
    } ?>

</section>

<?php
     include("footer.php");
?>