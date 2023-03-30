<!-- USE UIkit For lightBOX to work -->
<div class="uk-child-width-1-3@m glry-imgs" uk-grid uk-lightbox="animation: slide">
        <?php
        $displayquery = "SELECT * FROM mehndi_gallery LIMIT $start, $rows_per_page";
        $query = mysqli_query($connection, $displayquery);
        $num_rows = mysqli_num_rows($query);
        if ($num_rows > 0) {
          while ($result = mysqli_fetch_assoc($query)) {
        ?>
            <div>
              <a class="uk-inline" href="<?php echo $result['image'] ?>">
                <img src="<?php echo $result['image'] ?>" width="1800" height="1200" alt="" />
              </a>
            </div>
        <?php }
        } ?>
</div>
