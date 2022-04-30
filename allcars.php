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

                    <?php
                        $sql = "SELECT * FROM cars";
                        $result = $conn->query($sql);
                        $i=0;
                    ?>

                    <table style="background: #ffffff; padding: 25px;">
                    <thead>
                        <tr>
                            <th style="padding:10px;" width="10%" scope="col">Car no</th>
                            <th style="padding:10px;" width="18%" scope="col">Name</th>
                            <th style="padding:10px;" width="58%" scope="col">Description</th>
                            <th style="padding:10px;" width="14%" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($row = $result->fetch_assoc()) {
                            
                        ?>
                            <tr>
                            <td style="padding:10px;" scope="row"><?php echo ++$i; ?></td>
                            <td style="padding:10px;"><?php echo $row['name'] ?></td>
                            <td style="padding:10px;">
                                <?php $text = $row['description'];
                                if (strlen($text) > 200) {
                                    $text = substr($text, 0, 200);
                                    echo $text;
                                } else {
                                    echo $text;
                                } ?>
                            </td>
                            <td style="padding: 10px;">
                            <?php if($_SESSION["level"]==1){ ?>
                                <span>
                                    <form action="editcar.php" method="POST" style="width: 30px">
                                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                        <input type="submit" type="submit" value="Edit">
                                    </form>
                                </span>
                                <span>
                                    <form action="deletecar.php" method="POST" style="width: 30px">
                                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                        <input type="submit" onclick="return confirm('Are you sure to delete!');" type="submit" value="Delete">
                                    </form>
                                </span>
                            <?php }
                            else{
                                ?> 
                                    Not Permited
                                <?php
                            } ?>
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