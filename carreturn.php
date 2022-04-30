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
                        $sql = "SELECT carid FROM rent WHERE id='$id'";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        $id = $row['carid'];
                        $sql = "SELECT cars.*,rent.returndate FROM cars INNER JOIN rent ON cars.id = rent.carid WHERE cars.id = '$id'";
                        $result = $conn->query($sql);
                    ?>

                    <?php
                         if ($result->num_rows > 0) {
                         while ($row = $result->fetch_assoc()) {

                         $returndate =  $row['returndate'];

                         $currentdate = date("Y-m-d");

                         $price = NULL;
                         if($returndate >= $currentdate){
                              $price = $row['price'];
                         }
                         else{
                              $difference = abs(strtotime($currentdate) - strtotime($returndate));
                              $difference = ($difference/(24*60*60*7));
                              $price = $row['price'] + ($difference*$row['price']*1.5);
                         }

                    ?>
                    <div class="col-md-4 col-sm-12">
                         <form id="contact-form" role="form" action="confirmcarreturn.php" method="post" enctype="multipart/form-data">
                              <div class="col-md-12 col-sm-12">
                                   <input type="hidden" class="form-control" value="<?php echo $row['id'] ?>" name="carid">
                                   <input type="hidden" class="form-control" value="<?php echo $returndate ?>" name="approximatereturndate">
                                   <input type="hidden" class="form-control" value="<?php echo $currentdate ?>" name="actualreturndate">
                                   <input type="hidden" class="form-control" value="<?php echo $price ?>" name="price">

                                   <h4>Car Name</h4>
                                   <input type="text" class="form-control" value="<?php echo $row['name'] ?>" name="name" disabled>

                                   <h4>Rent Per Week</h4>
                                   <input type="text" class="form-control" value="$<?php echo $row['price'] ?>" disabled>

                                   <h4>Approximate Return Date</h4>
                                   <input type="text" class="form-control" value="$<?php echo $row['returndate'] ?>" disabled>

                                   <h4>Current Rent On Return</h4>
                                   <input type="text" class="form-control" value="$<?php echo $price ?>" name="price" disabled>

                                   <h4>Upload a Current Picture of The Car</h4>
                                   <input type="file" class="form-control" placeholder="Enter Picture" name="picture" required>

                              </div>

                              <div class="col-md-4 col-sm-12">
                                   <input type="submit" class="form-control" onclick="return confirm('Are you sure to return!');" name="send message" value="Return Car">
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