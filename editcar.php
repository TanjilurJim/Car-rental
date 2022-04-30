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
                        $id2 = $_POST['id'];
                        $sql = "SELECT * FROM cars WHERE id=$id2;";
                        $result = $conn->query($sql);
                    ?>

                    <?php
                        if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col-md-4 col-sm-12">
                         <form id="contact-form" role="form" action="editcarconfirm.php" method="post">
                              <div class="col-md-12 col-sm-12">

                                   <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                    
                                   <h4 style="padding: 20px 0px 10px 0px">Car Name</h4>
                                   <input type="text" class="form-control" value="<?php echo $row['name'] ?>" name="name" required>

                                   <h4 style="padding: 20px 0px 10px 0px">Price</h4>
                                   <input type="number" class="form-control" value="<?php echo $row['price'] ?>" name="price" required>

                                   <h4 style="padding: 20px 0px 10px 0px">Description</h4>
                                   <textarea class="form-control" name="description" rows="6" cols="39" ><?php echo $row['description'] ?></textarea>

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

</section>

<?php
     include("footer.php");
?>