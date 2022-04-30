<?php
     include("connection.php");
     include("header.php");
?>


     <section>
          <div class="container">
               <div class="text-center">
                    <h1>Our cars</h1>

                    <br>

                    <p class="lead"> </p>
               </div>
          </div>
     </section>

     <section class="section-background">
          <div class="container">
               <div class="row">
                    
                         <?php
                              $sql = "SELECT * FROM cars where status='1'";
                              $result = $conn->query($sql);
                              if ($result->num_rows > 0) {
                              while ($row = $result->fetch_assoc()) {
                              ?>

                                   <div class="col-md-4 col-sm-6">
                                        <div class="courses-thumb courses-thumb-secondary">
                                             <div class="courses-top">
                                                  <div class="courses-image">
                                                       <img src="images/<?php echo $row["picture"] ?>" class="img-responsive" alt="">
                                                  </div>
                                             </div>
                                             <div class="courses-detail">
                                                  <h3><?php echo $row["name"] ?></h3>

                                                  <p class="lead"><small>from</small> <strong>$<?php echo $row["price"] ?></strong> <small>per weekend</small></p>

                                                  <span><?php echo $row["description"] ?></span>
                                             </div>
                                             <div class="team-thumb-actions">
                                             <form action="confrmbook.php" method="post">
                                                  <input type="hidden" name="id" value="<?php echo $row["id"] ?>">
                                                  <input type="submit" onclick="return confirm('Are you sure to book!');" class="form-control" value="Book Now">
                                             </form> 
                                             </div>
                                        </div>
                                   </div>

                              <?php
                              }
                         }
                         ?>
               </div>
          </div>
     </section>

     <?php
     include("footer.php");
?>