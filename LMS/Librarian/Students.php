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
                <li><a href="javascript: avoid(0)">Students</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="col-sm-12">
            <h4 class="section-subtitle"><b>All Students</b></h4>
            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Student ID</th>
                                <th>Department</th>
                                <th>Email</th>
                                <th>User Name</th>
                                <th>Phone Number</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                               $result = mysqli_query(mysqli_connect('localhost','root','','lms'),"SELECT * FROM `students` ");
                             while ($row = mysqli_fetch_assoc($result)){
                                 ?>
                                 <tr>
                                     <td><?=ucwords( $row['first_name'] .' '.$row['last_name']) ?></td>
                                     <td><?= $row['student_id'] ?></td>
                                     <td><?= $row['department'] ?></td>
                                     <td><?= $row['email'] ?></td>
                                     <td><?= $row['user_name'] ?></td>
                                     <td><?= $row['phone_no'] ?></td>
                                     <td><img src="<?= $row['image'] ?>"></td>
                                     <td><?= $row['status']== 1 ? 'Active' : 'Inactive'?></td>
                                     <td>
                                         <?php
                                         if($row['status']==1){
                                            ?>
                                             <a href="status_inactive.php?id=<?= base64_encode($row['id']) ?>" class="btn btn-primary"><i class="fa fa-arrow-up"></i></a>
                                             <?php
                                         }else{
                                             ?><a href="status_active.php?id=<?= base64_encode($row['id']) ?>" class="btn btn-warning"><i class="fa fa-arrow-down"></i></a>
                                             <?php
                                         }
                                         ?>
                                     </td>
                                 </tr>
                                 <?php
                             }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<?php

require_once 'footer.php';
?>