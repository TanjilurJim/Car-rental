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
                        $name = $_SESSION['username'];
                        $sql = "SELECT id FROM users WHERE name='$name'";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        $userid = $row['id'];

                        $sql = "SELECT rent.id, rent.returndate, cars.name, users.name FROM rent INNER JOIN cars ON cars.id = rent.carid INNER JOIN users ON rent.userid = users.id WHERE userid='$userid'";
                        $result = $conn->query($sql);
                        $i=0;
                    ?>

                    <table style="background: #ffffff; padding: 25px;">
                    <thead>
                        <tr>
                            <th style="padding:10px;" width="10%" scope="col">Car No</th>
                            <th style="padding:10px;" width="25%" scope="col">Car Name</th>
                            <th style="padding:10px;" width="40%" scope="col">Return Date</th>
                            <th style="padding:10px;" width="25%" scope="col">Action</th>
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
                            <td style="padding:10px;"><?php echo $row['returndate'] ?></td>
                            <td style="padding: 10px;">
                                <span>
                                    <form action="carreturn.php" method="POST" style="width: 30px">
                                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                        <input type="submit" type="submit" value="Return">
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