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
                        $id = $_POST['id'];
                        $sql = "SELECT * FROM contact WHERE id='$id'";
                        $result = $conn->query($sql);
                    ?>

                    <?php
                        if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col-md-8 col-sm-12">
                         <form id="contact-form" role="form" action="editcarconfirm.php" method="post">
                              <div class="col-md-12 col-sm-12">

                                   <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                    
                                   <h4 style="padding: 20px 0px 10px 0px">User Name</h4>
                                   <input type="text" class="form-control" value="<?php echo $row['name'] ?>" name="name" disabled>

                                   <h4 style="padding: 20px 0px 10px 0px">User Gmail</h4>
                                   <input type="text" class="form-control" value="<?php echo $row['gmail'] ?>" name="gmail" disabled>

                                   <h4 style="padding: 20px 0px 10px 0px">Message</h4>
                                   <textarea class="form-control" name="description" rows="6" cols="39" disabled><?php echo $row['message'] ?></textarea>

                              </div>
                         </form>

                         <span>
                                <a href="mailto:<?php echo $row['gmail'] ?>" class="btn btn-primary btn-success" style="margin-top: 20px;">Reply</a>
                         </span>

                         <span>
                            <form action="deletecontact.php" method="POST" style="width: 30px; padding-top: 20px;">
                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                <input type="submit" type="submit" class="btn btn-primary btn-info" onclick="return confirm('Are you sure to delete!');" value="Delete">
                            </form>
                         </span>

                    </div>  
                    <?php } } ?>
               </div>
          </div>
     </section>   

</section>

<?php
     include("footer.php");
?>