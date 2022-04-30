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
                        $sql = "SELECT cars.name,confirm.rent,confirm.id FROM cars INNER JOIN confirm ON cars.id = confirm.carid";
                        $result = $conn->query($sql);
                        $i=0;
                    ?>

                    <table style="background: #ffffff; padding: 25px;">
                    <thead>
                        <tr>
                            <th style="padding:10px;" width="15%" scope="col">Serial no</th>
                            <th style="padding:10px;" width="27%" scope="col">Car Name</th>
                            <th style="padding:10px;" width="28%" scope="col">Rent Paid</th>
                            <th style="padding:10px;" width="30%" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                            
                        ?>
                            <tr>
                            <td style="padding:10px;" scope="row"><?php echo ++$i; ?></td>
                            <td style="padding:10px;"><?php echo $row['name'] ?></td>
                            <td style="padding:10px;">$<?php echo $row['rent'] ?></td>
                            <td style="padding: 10px;">
                                <span>
                                    <form action="confirmcar.php" method="POST" style="width: 30px">
                                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                        <input type="submit" type="submit" value="Details">
                                    </form>
                                </span>
                            </td>
                            </tr>
                        <?php } } ?>
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