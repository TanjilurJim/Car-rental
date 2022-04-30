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

                        $sql = "SELECT rent.*, cars.name FROM rent INNER JOIN cars ON rent.carid = cars.id";
                        $result = $conn->query($sql);

                        $sql2 = "SELECT users.name,users.id FROM rent INNER JOIN users ON rent.userid = users.id";
                        $result2 = $conn->query($sql2);

                        $i=0;
                    ?>

                    <table style="background: #ffffff; padding: 25px;">
                    <thead>
                        <tr>
                            <th style="padding:10px;" width="10%" scope="col">Car No</th>
                            <th style="padding:10px;" width="27%" scope="col">Car Name</th>
                            <th style="padding:10px;" width="28%" scope="col">User Name</th>
                            <th style="padding:10px;" width="35%" scope="col">Estimated return Date</th>
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
                            <td style="padding:10px;">
                                <?php 
                                    while ($row2 = $result2->fetch_assoc()) {
                                        if($row2['id'] == $row['userid']){
                                            echo $row2['name'];
                                        }
                                    }
                                ?>
                            </td>
                            <td style="padding:10px;"><?php echo $row['returndate'] ?></td>
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