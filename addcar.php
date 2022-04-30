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
                                   <input type="text" class="form-control" placeholder="Enter Carname" name="name" required>

                                   <input type="text" class="form-control" placeholder="Enter Price" name="price" required>

                                   <input type="file" class="form-control" placeholder="Enter Picture" name="picture" required>

                                   <textarea class="form-control" name="description" rows="5"></textarea>
                              </div>

                              <div class="col-md-4 col-sm-12">
                                   <input type="submit" class="form-control" name="send message" value="Add Car">
                              </div>
                         </form>
                    </div>

               </div>
          </div>
     </section>  

    <?php
    if (!empty($_POST)) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];

        $filename = $_FILES["picture"]["name"];
        $tempname = $_FILES["picture"]["tmp_name"];    
        $folder = "images/".$filename;

            $sql = "INSERT INTO cars (name,price,picture,description) VALUES('$name','$price','$filename','$description')";
            $conn->query($sql);
            move_uploaded_file($tempname, $folder);
            header("Location: http://localhost/carrental/addcar.php");
    } 
    ?>
</section>

<?php
     include("footer.php");
?>