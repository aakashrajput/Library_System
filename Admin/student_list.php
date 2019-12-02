<?php include("./includes/header.php");?>
<?php include("./includes/no_bar.php"); ?>

<div class="row mt-5">
  <div class="col-xl-12 mb-5 mb-xl-0">
    <div class="card shadow">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Registered Student list</h3>
          </div>
          <div class="col text-right">
            <a href="#!" class="btn btn-sm btn-primary">See all</a>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <?php
        $query = "SELECT * FROM user_reg ORDER BY id ASC";
        $run = mysqli_query($link,$query);
        if(mysqli_num_rows($run) > 0){
         ?>
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">USN</th>
              <th scope="col">EMAIL</th>
              <th scope="col">REGISTERED ON</th>
            </tr>
          </thead>
          <tbody>
            <?php
                       while($row = mysqli_fetch_array($run)){
                         $id = $row['id'];
                         $usn = ucfirst($row['username']);
                         $email = ucfirst($row['email']);
                         $date = $row['reg_date'];
                      ?>
            <tr>
              <th scope="row">
                <?php echo $id; ?>
              </th>
              <td>
                <?php echo $usn; ?>
              </td>
              <td>
                <?php echo $email; ?>
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
