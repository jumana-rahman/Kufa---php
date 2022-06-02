<?php 
session_start();
require '../session_check.php';
require '../dashboard_includes/header.php'; 
require '../db.php';

$id = $_GET['id'];

$select_users = "SELECT * FROM users WHERE id = $id";
$select_users_result = mysqli_query($db_connect, $select_users);
$after_assoc = mysqli_fetch_assoc($select_users_result);

?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
                <a class="breadcrumb-item" href="index.html">Dashboard</a>
        </nav>

        <div class="sl-pagebody">
            <div class="row">
                    <div class="col-lg-9 m-auto">
                        <div class="card border-primary">
                            <div class="card-header bg-primary text-center">
                                <h2 class="text-white">USERS INDIVIDUAL INFORMATION</h2>
                            </div>
                            <div class="card-body">
                                <table class="table table-success table-striped table-hover">
                                    <tbody>
                                        <tr>
                                            <td>Name:</td>
                                            <td><?=$after_assoc['name']?></td>
                                        </tr>
                                        <tr>
                                            <td>Email:</td>
                                            <td><?=$after_assoc['email']?></td>
                                        </tr>
                                        <tr>
                                            <td>Image:</td>
                                            <td><img width="100" src="../uploads/users/<?=$after_assoc['image'] ?>" alt=""></td>
                                        </tr>
                                        <tr>
                                            <td>Country:</td>
                                            <td><?=$after_assoc['country']?></td>
                                        </tr>
                                        <tr>
                                            <td>Role:</td>
                                            <td>
                                                <?php if($after_assoc['role'] == 1){ ?>
                                                    <span class="badge bg-success">Admin</span>
                                                <?php } 
                                                elseif($after_assoc['role'] == 2){ ?>
                                                    <span class="badge bg-warning">Moderator</span>
                                                <?php } 
                                                elseif($after_assoc['role'] == 3){ ?>
                                                    <span class="badge bg-info">Viewer</span>
                                                <?php } else{ ?>
                                                    <span class="badge bg-secondary">User</span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Created At:</td>
                                            <td><?=$after_assoc['created_at']?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
                
<?php require '../dashboard_includes/footer.php';  ?> 