<?php
     include("connection.php");
     include("header.php");
?>

<section id="home">
    <?php
    $level = $_SESSION['level'];
    if (!isset($_SESSION['login']) && $level == 1) {
        header("Location: http://localhost/carrental");
    }
    ?>

    <?php
        if (!empty($_POST)) {
        $id = $_POST['id'];
        $status = $_POST['status'];

        $sql = "UPDATE cars SET status = '$status' WHERE id = '$id'";
        $result = $conn->query($sql);
        if (!$result) {
            ?>
                <p class="text-white">Cannnot Update Car Status</p>
            <?php 
        } 
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

                    <form action="" method="post">
                    <table style="background: #ffffff; padding: 25px;">
                    <thead>
                        <tr>
                            <th style="padding:10px;" width="10%" scope="col">Car no</th>
                            <th style="padding:10px;" width="18%" scope="col">Name</th>
                            <th style="padding:10px;" width="50%" scope="col">Description</th>
                            <th style="padding:10px;" width="22%" scope="col">Status</th>
                            <th style="padding:10px;" width="14%" scope="col">Confirmation</th>
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
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>" />
                            <td style="padding: 10px;">
                                <select class="form-control" name="status">
                                    <option value="1" <?php if($row['status'] == "1") { ?> selected <?php } ?>>Avilable</option>
                                    <option value="2" <?php if($row['status'] == "2") { ?> selected <?php } ?>>Rented</option>
                                    <option value="3" <?php if($row['status'] == "3") { ?> selected <?php } ?>>Awaiting Confirmation</option>
                                </select>
                            </td>
                            <td style="padding: 10px;">
                                <input type="submit" class="form-control" value="Update">
                            </td>
                            </form>
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