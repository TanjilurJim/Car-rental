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
               <div class="row">

                    <div class="col-md-4 col-sm-12">
                    <?php
                        include("sidebar.php");
                    ?>
                    </div>

                    <div class="col-md-8 col-sm-12">
                         <form id="contact-form" role="form" action="" method="post">
                              <div class="col-md-12 col-sm-12">

                                   <h4>Enter Your Name</h4>
                                   <input type="text" class="form-control" placeholder="Enter Name" name="title" required>

                                   <h4>Rating</h4>
                                   <select class="form-control" name="rating">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5" selected>5</option>
                                   </select>

                                   <h4>Review</h4>
                                   <textarea class="form-control" name="description" placeholder="Review..." rows="5"></textarea>

                              </div>

                              <div class="col-md-4 col-sm-12">
                                   <input type="submit" class="form-control" name="send message" value="Submit">
                              </div>
                         </form>
                    </div>

               </div>
          </div>
     </section>  

    <?php
    if (!empty($_POST)) {
        $title = $_POST['title'];
        $review = $_POST['description'];
        $username = $_SESSION['username'];
        $rating = $_POST['rating'];

        $sql = "INSERT INTO review (username,title,rating,description) VALUES('$username','$title','$rating','$review')";
        $result = $conn->query($sql);
        if (!$result) {
            ?>
                <p class="text-white">Cannnot Add Review</p>
            <?php 
        } 
        else {
            header("Location: http://localhost/carrental/dashboard.php");
        }
    } 
    ?>
</section>

<?php
     include("footer.php");
?>