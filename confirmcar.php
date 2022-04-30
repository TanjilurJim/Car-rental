<?php
     include("connection.php");
     include("header.php");
?>

<section id="home">
    <?php
    if (!isset($_SESSION['login']) || empty($_POST)) {
        header("Location: http://localhost/carrental");
    }
    ?>

    <section id="contact">
          <div class="container">
               <h1>Return Car</h1>
               <div class="row">
                    <div class="col-md-4 col-sm-12">
                    <?php
                        include("sidebar.php");
                    ?>
                    </div>

                    <?php
                        $id = $_POST['id'];

                        $sql = "SELECT * FROM confirm WHERE id='$id'";
                        $result = $conn->query($sql);

                        $sql = "SELECT users.name FROM users INNER JOIN confirm ON users.id = confirm.userid WHERE confirm.id='$id'";
                        $result2 = $conn->query($sql);
                        $row = $result2->fetch_assoc();
                        $username = $row['name'];

                        $sql = "SELECT cars.name,cars.price FROM cars INNER JOIN confirm ON cars.id = confirm.userid WHERE confirm.id='$id'";
                        $result3 = $conn->query($sql);
                        $row = $result3->fetch_assoc();
                        $carname = $row['name'];
                        $carprice = $row['price'];
                    ?>

                    <?php
                         if ($result->num_rows > 0) {
                         while ($row = $result->fetch_assoc()) {

                    ?>
                    <div class="col-md-4 col-sm-12">
                         <form id="contact-form" role="form" action="processingconfirm.php" method="post" enctype="multipart/form-data">
                              <div class="col-md-12 col-sm-12">

                                   <input type="hidden" class="form-control" name="id" value="<?php echo $row['id'] ?>" >

                                   <h4>Car Name</h4>
                                   <input type="text" class="form-control" value="<?php echo $carname ?>" disabled>

                                   <h4>User Name</h4>
                                   <input type="text" class="form-control" value="<?php echo $username ?>" disabled>

                                   <h4>Rent Per Week</h4>
                                   <input type="text" class="form-control" value="$<?php echo $carprice ?>" disabled>

                                   <h4>Rent Paid</h4>
                                   <input type="text" class="form-control" value="$<?php echo $row['rent'] ?>" disabled>

                                   <h4>Approximate Return Date</h4>
                                   <input type="text" class="form-control" value="<?php echo $row['approximatereturndate'] ?>" name="price" disabled>

                                   <h4>Actual Return Date</h4>
                                   <input type="text" class="form-control" value="<?php echo $row['actualreturndate'] ?>" name="price" disabled>

                              </div>

                              <div class="col-md-6 col-sm-12">
                                   <input type="submit" class="form-control" name="send message" value="Confirm Return">
                              </div>
                         </form>

                    </div>

                    <div class="col-md-4 col-sm-12">
                         <div class="contact-image" style="margin: auto;">
                              <h4>User Uploaded Picture</h4>
                              <img src="images/<?php echo $row['picture'] ?>" class="img-responsive" style="border-radius: 50px; max-width: 350px; max-height: 350px;" alt="">
                         </div>
                    </div>    

                    <?php } } ?>

               </div>
          </div>
     </section>   

</section>

<?php
     include("footer.php");
?>