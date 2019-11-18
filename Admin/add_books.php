<?php include("./includes/header.php");?>
<?php include("./includes/no_bar.php"); ?>

<div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Add Book</h4>
            </div>
            <div class="card-body">
              <form name="form1" class="form-horizontal" method="POST" enctype="multipart/form-data">
                  <?php
                  if(isset($_POST['submit'])){
                    //$author = $_POST['author'];
                    $book_title = $_POST['book_title'];
                    $book_author = $_POST['book_author'];
                    $book_cover = $_POST['book_cover'];
                    /*$book_about = $_POST['book_about'];
                    $book_cover = $_POST['book_cover'];*/
                    $reg_date = date("Y/m/d");
                            if(empty($book_title)){
                              $error_msg = "Title Field is blank";
                            } else {
                              $query = "INSERT INTO `books` (`book_title`, `book_author`, `book_cover`, `reg_date`) VALUES ('$book_title', '$book_author', '$book_cover', '$reg_date')";
                              if(mysqli_query($link,$query)){
                                $msg = "Book Added";
                                //$category = "";
                              } else {
                                $error_msg = "Failed to Add";
                                //print_r($errors);
                              }
                            }
                            }
                      ?>
                <div class="row">
                  <label class="col-sm-2 col-form-label">Book Title</label>
                  <div class="col-sm-10">
                    <div class="form-group">
                      <input type="text" class="form-control" name="book_title">
                      <span class="form-text">A Valid name that can describe what type of Book you are adding.</span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">Book Author</label>
                  <div class="col-sm-10">
                    <div class="form-group">
                      <input type="text" class="form-control" name="book_author">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">Book Cover Image URL</label>
                  <div class="col-sm-10">
                    <div class="form-group">
                      <input type="text" class="form-control" name="book_cover">
                    </div>
                  </div>
                </div>

                <div class="col-xs-8">
                 <input type="submit" name="submit" class="btn btn-primary" value="submit">
                 <?php if(isset($error_msg)){
                              echo "<span style='color:red;' class='pull-right'>$error_msg</span>";
                            }else if(isset($msg)) {
                               echo "<span style='color:green;' class='pull-right'>$msg</span>";
                            }
                 ?>
               </div>
              </form>
            </div>
          </div>
        </div>
<?php include("./includes/footer.php"); ?>
