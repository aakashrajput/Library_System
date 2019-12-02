<?php include("./includes/header.php");?>
<?php include("./includes/no_bar.php"); ?>

<div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Send a Book Issue Request to Teacher</h4>
            </div>
            <div class="card-body">
              <form name="form1" class="form-horizontal" method="POST" enctype="multipart/form-data">
                  <?php
                  if(isset($_POST['submit'])){
                    //$author = $_POST['author'];
                    $book_title = $_POST['book_title'];
                    $by_student = $_SESSION['username'];
                    $req_date = date("Y/m/d");
                    /*$book_about = $_POST['book_about'];*/
                    $reg_date = date("Y/m/d");
                            if(empty($book_title)){
                              $error_msg = "Title Field is blank";
                            } else {
                              $query = "INSERT INTO `book_issue` (`book_title`, `by_student`, `req_date`, `issue_status`) VALUES ('$book_title', '$by_student', '$req_date', 'Not Approved')";
                              //$query2 = "CREATE TRIGGER `books_insert` AFTER INSERT ON `books`FOR EACH ROW INSERT INTO `books_data` (`id`,`img`,`desc`, `category`) VALUES (new.id, $book_cover,'test','test')";
                              if(mysqli_query($link,$query)){
                                $msg = "Book Issue Request Send to Admin";
                                //$category = "";
                              } else {
                                $error_msg = "Failed to Add";
                                //print_r($errors);
                              }
                            }
                            }
                      ?>
                <div class="row">
                  <label class="col-sm-2 col-form-label">Select Book Title</label>
                  <div class="col-sm-10">
                    <div class="form-group">
                      <select type="text" class="form-control" name="book_title">
                        <?php
                            $res = mysqli_query($link,"select * from books");
                            while($row=mysqli_fetch_array($res))
                            {
                            echo"<option value=".$row['book_title'].">";echo $row["book_title"]; echo"</option>";
                            }
                        ?>
                      </select>
                      <span class="form-text">Select the book you want to issue</span>
                    </div>
                  </div>
                </div>
                <div class="col-xs-8">
                 <input type="submit" name="submit" class="btn btn-primary" value="Send Request">
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
