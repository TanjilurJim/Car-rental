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

                    <?php
                        $sql = "SELECT * FROM contact";
                        $result = $conn->query($sql);
                        $i=0;
                    ?>

                    <table style="background: #ffffff; padding: 25px;">
                    <thead>
                        <tr>
                            <th style="padding:10px;" width="20%" scope="col">Contact no</th>
                            <th style="padding:10px;" width="25%" scope="col">User Name</th>
                            <th style="padding:10px;" width="35%" scope="col">User Gmail</th>
                            <th style="padding:10px;" width="20%" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($row = $result->fetch_assoc()) {
                            
                        ?>
                            <tr>
                            <td style="padding:10px;" scope="row"><?php echo ++$i; ?></td>
                            <td style="padding:10px;"><?php echo $row['name'] ?></td>
                            <td style="padding:10px;"><?php echo $row['gmail'] ?></td>
                            <td style="padding: 10px;">
                                <span>
                                    <form action="showcontact.php" method="POST" style="width: 30px">
                                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                        <input type="submit" type="submit" value="Details">
                                    </form>
                                </span>
                            </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    </table>

                    </div>

               </div>
          </div>
     </section>  
</section>

<?php
     include("footer.php");
?>