                <?php
                $ids = [1, 2, 3, 4, 5, 6, 7, 8, 9];
                $hrefs = [
                    'haldi.php',
                    'ring_ceremony.php',
                    'mehndi.php',
                    'barat.php',
                    'sangeet.php',
                    'wedding.php',
                    'reception.php',
                    'bridal_entry.php',
                    'couple_entry.php'
                ];
                foreach ($ids as $key => $id) {
                    $sql = "SELECT * FROM all_category WHERE id = '$id'";
                    $result = mysqli_query($connection, $sql);
                    $row = mysqli_fetch_array($result);
                ?>
                <div class="glry-items">
                    <a class="img-link" href="<?php echo $hrefs[$key]; ?>">
                        <img src="<?php echo $row[3] ?>" alt="" />
                    </a>
                    <span><?php echo $row[1] ?></span>
                </div>
                <?php
                }
                ?>
