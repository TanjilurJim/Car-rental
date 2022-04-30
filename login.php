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
                         <form id="contact-form" role="form" action="" method="post">
                              <div class="col-md-12 col-sm-12">
                    
                                   <input type="email" class="form-control" placeholder="Enter email address" name="gmail" required>

                                   <input type="password" class="form-control" placeholder="Enter Password" name="psw" required>
                              </div>

                              <div class="col-md-4 col-sm-12">
                                   <input type="submit" class="form-control" name="send message" value="Login">
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
        $gmail2 = $_POST['gmail'];
        $password2 = md5($_POST['psw']);
        $sql = "SELECT * FROM users WHERE gmail='$gmail2' AND password='$password2'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            while ($row = $result->fetch_assoc()) {
                if (!isset($_SESSION['login'])) {
                    $_SESSION['login'] = true;
                    $_SESSION['gmail'] = $gmail2;
                    $_SESSION['username'] = $row['name'];
                    $_SESSION['level'] = $row['level'];
                    $_SESSION['password'] = $password2;
                    header("Location: http://localhost/carrental");
                }
            }
        } else {
    ?>
            <p class="text-white">User Haven't Registered Yet</p>
    <?php }
    } ?>
</section>

<?php
     include("footer.php");
?>