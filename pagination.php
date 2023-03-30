<!-- Counting -->

$stmt = mysqli_prepare($connection, "SELECT * FROM mehndi_gallery");
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$num_rows = mysqli_num_rows($result);

$pages = ceil($num_rows / 9);
$start = 0;
$rows_per_page = 9;

if (isset($_GET['page-nr'])) {
  if (is_numeric($_GET['page-nr']) && ($_GET['page-nr'] < $pages) && ($_GET['page-nr'] > 0)) {
    $page = $_GET['page-nr'] - 1;
    $start = $page * $rows_per_page;
  } else {
    if ($page = (int)$_GET['page-nr'] > $pages || ($_GET['page-nr'] <= 0)) {
      $page = 1;
    } else {
      $page = (int)$_GET['page-nr'] - 1;
      $start = $page * $rows_per_page;
    }
  }
}
<!--                                                      Main Pagination (Use bootstrap CDN)-->
    <div class="num-btns">
        <?php
        if (isset($_GET['page-nr'])) {
          if (is_numeric($_GET['page-nr']) && ($_GET['page-nr'] <= $pages) && ($_GET['page-nr'] > 0)) {
            $page = $_GET['page-nr'];
            $start = $page * $rows_per_page;
          } else {
            if ($page = (int)$_GET['page-nr'] > $pages || ($_GET['page-nr'] <= 0)) {
              $page = 1;
              $start = $page * $rows_per_page;
            } else {
              $page = (int)$_GET['page-nr'] - 1;
              $start = $page * $rows_per_page;
            }
          }
        }
        ?>
        <h5>Showing <?php echo (isset($_GET['page-nr'])) ? ($page) : (1); ?> of
          <?php echo $pages; ?></h5>
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item"><a class="page-link" href="?page-nr=1">First</a>

              <?php if (isset($_GET['page-nr']) && is_numeric($_GET['page-nr']) && $_GET['page-nr'] > 1) { ?>

            <li class="page-item"><a class="page-link" href="?page-nr=<?php echo $page - 1 ?>">Previous</a>
            </li>

          <?php } else { ?>

            <li class="page-item"><a class="page-link">Previous</a></li>

          <?php } ?>

          <?php for ($i = 1; $i <= $pages; $i++) { ?>

            <li class="page-item"><a class="page-link" href="?page-nr=<?php echo $i ?>"><?php echo $i; ?></a></li>

          <?php } ?>

          <?php if (!isset($_GET['page-nr'])) { ?>

            <li class="page-item"><a class="page-link" href="?page-nr=2">Next</a></li>

          <?php } elseif (is_numeric($_GET['page-nr']) && $_GET['page-nr'] >= $pages) { ?>

            <li class="page-item"><a class="page-link">Next</a></li>

          <?php } else { ?>

            <li class="page-item"><a class="page-link" href="?page-nr=<?php echo $page + 1 ?>">Next</a>
            </li>

          <?php } ?>

          <li class="page-item"><a class="page-link" href="?page-nr=<?php echo $pages ?>">Last</a>
          </li>
          </ul>
        </nav>
      </div>
