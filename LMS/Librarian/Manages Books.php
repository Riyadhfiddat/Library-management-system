<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<?php

require_once 'header.php';
?>

    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                <li><a href="javascript:avoid(0)">Manages Books</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="col-sm-12">
            <h4 class="section-subtitle"><b>Books</b></h4>
            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                        <table id="basic-table" class=" data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Book Name</th>
                                <th>Book Image</th>
                                <th>Book Author Name</th>
                                <th>Publication Name</th>
                                <th>Purchase Date</th>
                                <th>Book Price</th>
                                <th>Book Quantity</th>
                                <th>Available Quantity</th>
                                <th>Librarian Name</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $result = mysqli_query(mysqli_connect('localhost','root','','lms'),"SELECT * FROM `books` ");
                            while ($row = mysqli_fetch_assoc($result)){
                                ?>
                                <tr>
                                    <td><?= $row['book_name']?></td>
                                    <td><img  style="width:80px " src="../images/Books/<?= $row['book_image']?>" alt=""></td>
                                    <td><?= $row['book_author_name']?></td>
                                    <td><?= $row['book_publication_name']?></td>
                                    <td><?= $row['book_purchase_date']?></td>
                                    <td><?= $row['book_price']?></td><td><?= $row['book_qty']?></td>
                                    <td><?= $row['available_qty']?></td>
                                    <td><?= $row['librarian_username']?></td>
                                    <td>
                                        <a href="javascript:avoid(0)"class="btn btn-info" data-toggle="modal" data-target="#book-<?= $row['id']?>"><i class="fa fa-eye"></i></a>
                                        <a href="" class="btn btn-warning" data-toggle="modal" data-target="#book-update-<?= $row['id']?>" ><i class="fa fa-pencil"></i></a>
                                        <a href="delete.php?bookdelete=<?=base64_encode($row['id'])?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                    $result = mysqli_query(mysqli_connect('localhost','root','','lms'),"SELECT * FROM `books` ");
                    while ($row = mysqli_fetch_assoc($result)){
                    ?>
                    <!-- Modal -->
                    <div class="modal fade" id="book-<?= $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="modal-primary-label">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header state modal-primary">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="modal-primary-label"><i class="fa fa-book"></i>Books Information</h4>
                                </div>
                                <div class="modal-body">
                                      <table class="table table-bordered">
                                          <tr>
                                              <th> Book Name</th>
                                              <td><?= $row['book_name']?></td>

                                          </tr>
                                          <tr>
                                              <th>Book Image</th>
                                              <td><img  style="width:80px " src="../images/Books/<?= $row['book_image']?>" alt=""></td>

                                          </tr>
                                          <tr>
                                              <th>Book Author Name</th>
                                              <td><?= $row['book_author_name']?></td>

                                          </tr>
                                          <tr>
                                              <th>Publication Name</th>
                                              <td><?= $row['book_publication_name']?></td>
                                          </tr>
                                          <tr>
                                              <th>Purchase Date</th>
                                              <td><?= $row['book_purchase_date']?></td>
                                          </tr>
                                          <tr>
                                              <th>Book Price</th>
                                              <td><?= $row['book_price']?></td>

                                          </tr>
                                          <tr>
                                              <th>Book Quantity</th>
                                              <td><?= $row['book_qty']?></td>

                                          </tr>
                                          <tr>
                                              <th>Available Quantity</th>
                                              <td><?= $row['available_qty']?></td>
                                          </tr>
                                          <tr>
                                              <th>Librarian Name</th>
                                              <td><?= $row['librarian_username']?></td>
                                          </tr>
                                      </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <?php
                    $result = mysqli_query(mysqli_connect('localhost','root','','lms'),"SELECT * FROM `books` ");
                    while ($row = mysqli_fetch_assoc($result)){
                        $id = $row['id'];
                        $book_info= mysqli_query(mysqli_connect('localhost','root','','lms'),"SELECT * FROM `books` where `id`='$id' ");
                        $book_info_row = mysqli_fetch_assoc($book_info);
                    ?>
                    <!-- Modal -->
                    <div class="modal fade" id="book-update-<?= $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="modal-primary-label">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header state modal-primary">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="modal-primary-label"><i class="fa fa-book"></i> Update Books Information</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="panel">
                                        <div class="panel-content">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form method="post" action="">
                                                        <div class="form-group">
                                                            <label for="book_name" >Book Name</label>
                                                                <input type="text" class="form-control" id="book_name" name="book_name" placeholder="Book Name"  value="<?= $book_info_row['book_name']?>" required >
                                                                 <br>
                                                            <label for="book_name" >Book ID</label>
                                                            <input type="text" class="form-control" id="book_name" name="id"   value="<?= $book_info_row['id']?>" readonly>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="book_author_name">Book Author Name</label>
                                                                <input type="text" class="form-control" id="book_author_name" name="book_author_name" placeholder="Book Author Name" value="<?= $book_info_row['book_author_name']?>" required>

                                                        </div>
                                                        <div class="form-group">
                                                            <label for="book_publication_name"> Publication Name</label>
                                                                <input type="text" class="form-control" id="book_publication_name" name="book_publication_name" placeholder="Book Publication Name"  value="<?= $book_info_row['book_publication_name']?>"required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="book_purchase_date">Purchase Date</label>
                                                                <input type="date" class="form-control" id="book_purchase_date" name="book_purchase_date" placeholder="Book Purchase Date"value="<?= $book_info_row['book_purchase_date']?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="book_price">Book Price</label>
                                                                <input type="number" class="form-control" id="book_price"  name="book_price" placeholder="Book Price"value="<?= $book_info_row['book_price']?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="book_qty">Book Quantity</label>
                                                                <input type="number" class="form-control" id="book_qty"  name="book_qty" placeholder="Book Quantity"value="<?= $book_info_row['book_qty']?>" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="available_qty">Available Quantity</label>
                                                                <input type="number" class="form-control" id="available_qty"  name="available_qty" placeholder=" Available Quantity"value="<?= $book_info_row['available_qty']?>" required>
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <button type="submit"name="update-book" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        </div>
    </div>
  <?php
  }
  //require_once 'header.php';
  if (isset($_POST['update-book'])) {
      $id = $_POST['id'];
      $book_name = $_POST['book_name'];
      $book_author_name = $_POST['book_author_name'];
      $book_publication_name = $_POST['book_publication_name'];
      $book_purchase_date = $_POST['book_purchase_date'];
      $book_price = $_POST['book_price'];
      $book_qty = $_POST['book_qty'];
      $available_qty = $_POST['available_qty'];
      $librarian_username = $_SESSION[' librarian_username'];


      $result = mysqli_query(mysqli_connect('localhost', 'root', '', 'lms'), "UPDATE `books` SET `book_name`= '$book_name',`book_author_name`= '$book_author_name',`book_publication_name`='$book_publication_name',`book_purchase_date`='$book_purchase_date',`book_price`='$book_price',`book_qty`='$book_qty',`available_qty`='$available_qty',`librarian_username`='$librarian_username' WHERE `id`='$id'");
      if ($result) {
  ?>
<script type="text/javascript">
    alert('Book Update Successfully');
    javascript:history.go(-1);
</script>
<?php
}
else{
?>
<script type="text/javascript">
    alert(' Update Error');
</script>
<?php
}


  }
  ?>
<?php require_once 'footer.php';?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>
</html>