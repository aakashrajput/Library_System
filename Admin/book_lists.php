<?php include("./includes/header.php");?>
<?php include("./includes/no_bar.php"); ?>

<div class="row mt-5">
  <div class="col-xl-12 mb-5 mb-xl-0">
    <div class="card shadow">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Books list</h3>
          </div>
          <div class="col text-right">
            <a href="#!" class="btn btn-sm btn-primary">See all</a>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <?php
        $query = "SELECT * FROM books ORDER BY id ASC";
        $run = mysqli_query($link,$query);
        if(mysqli_num_rows($run) > 0){
         ?>
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Book Title</th>
              <th scope="col">Book Author</th>
              <th scope="col">Added On</th>
            </tr>
          </thead>
          <tbody>
            <?php
                       while($row = mysqli_fetch_array($run)){
                         $id = $row['id'];
                         $title = ucfirst($row['book_title']);
                         $author = ucfirst($row['book_author']);
                         $date = $row['reg_date'];
                      ?>
            <tr>
              <th scope="row">
                <?php echo $id; ?>
              </th>
              <td>
                <?php echo $title; ?>
              </td>
              <td>
                <?php echo $author; ?>
              </td>
              <td><?php echo $date; ?></td>
            </tr>
 <?php } ?>
          </tbody>
          <?php
                   }else {
                     echo "<center><h2>No users Available</h2><br><hr></center>";
                   }
                ?>
        </table>
      </div>
    </div>
  </div>
</div>
<?php include("./includes/footer.php"); ?>
