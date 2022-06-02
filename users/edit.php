<?php
session_start();
require '../session_check.php';
require '../dashboard_includes/header.php'; 
require '../db.php';

$id = $_GET['id'];

$select_user = "SELECT * FROM users WHERE id=$id";
$select_user_result = mysqli_query($db_connect, $select_user);
$after_assoc = mysqli_fetch_assoc($select_user_result);

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
                        <h2 class="text-white">EDIT USER'S INFORMATION</h2>
                      </div>
                      <div class="card-body">
                        <form action="update.php" method="POST" enctype="multipart/form-data"> 
                          <div class="mb-3">
                            <input type="hidden" name="id" value="<?=$after_assoc['id']?>">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" value="<?=$after_assoc['name']?>" name="name" class="form-control">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">E-mail</label>
                            <input type="email" value="<?=$after_assoc['email']?>" name="email" class="form-control">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Your Country</label>
                             <select name="country" class="form-control">
                               <option value="">--- Select Your Country ---</option>
                               <option value="Bangladesh" <?=($after_assoc['country']) == 'Bangladesh'? 'selected': ''?>>Bangladesh</option>
                               <option value="Saudi Arabia" <?=($after_assoc['country']) == 'Saudi Arabia'? 'selected': ''?>>Saudi Arabia</option>
                               <option value="USA" <?=($after_assoc['country']) == 'USA'? 'selected': ''?>>USA</option>
                               <option value="Canada" <?=($after_assoc['country']) == 'Canada'? 'selected': ''?>>Canada</option>
                             </select>
                          </div>
                          <div class="mb-3">
                            <label class="d-block tx-11 tx-uppercase tx-medium tx-spacing-1">Role</label>
                            <select class="form-control" name="role" data-placeholder="Month">
                                <option value="">-- Select Role --</option>
                                <option value="1" <?=($after_assoc['role']) == '1'? 'selected': ''?>>Admin</option>
                                <option value="2" <?=($after_assoc['role']) == '2'? 'selected': ''?>>Moderator</option>
                                <option value="3" <?=($after_assoc['role']) == '3'? 'selected': ''?>>Viewer</option>
                                <option value="0" <?=($after_assoc['role']) == '0'? 'selected': ''?>>User</option>
                            </select>
                            <?php if(isset($_SESSION['errors']['role'])){ ?>
                                <div class="alert alert-danger mt-2">
                                    <?=$_SESSION['errors']['role']?>
                                </div>
                            <?php } unset($_SESSION['errors']['role']) ?>
                          </div>
                          <div class="mb-3">
                            <img width="100" src="../uploads/users/<?=$after_assoc['image']?>" alt="">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Image</label>
                            <input type="file" name="image" class="form-control">
                          </div>
                          <?php if(isset($_SESSION['extension'])){ ?>
                            <div class="alert alert-warning">
                                <?php echo $_SESSION['extension']; ?>
                            </div>
                          <?php } unset($_SESSION['extension']); ?> 

                          <?php if(isset($_SESSION['file_size'])){ ?>
                            <div class="alert alert-warning">
                                <?php echo $_SESSION['file_size']; ?>
                            </div>
                          <?php } unset($_SESSION['file_size']); ?> 
                          
                          <button type="submit" class="btn btn-primary">Submit</button>

                        </form>
                      </div>
                    </div>
                </div>
            </div>
        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
<?php require '../dashboard_includes/footer.php';  ?>

<?php if(isset($_SESSION['update_user'])){ ?>
            <script>
                Swal.fire(
                'Updated!',
                'Your file has been updated.',
                'success'
                )
            </script>
        <?php } unset($_SESSION['update_user']) ?>
