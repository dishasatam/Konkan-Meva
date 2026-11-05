<section>
            
<div class="img-gall">               
            <?php
            include('connection.php');
            $query = "SELECT * FROM fruits";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>  
                        <div class="fruit">
                        <a href="webproduct.php?category=<?php echo $row['id'] ?>">
                        <img src="./admin/uploads/Fruits/<?php echo $row['id']; ?>/<?php echo $row['fruits_image']; ?>"alt="Avatar" class="image" style="width:100%"" draggable="false">
                            <div class="middle">
                                <div class="text"><?php echo $row['fruits_name'] ?></div>
                            </div>
                            </a> 
                        </div>
            <?php } ?>
</div>

</section>

