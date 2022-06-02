<?php
session_start();
require '../session_check.php';
require '../db.php';
require '../dashboard_includes/header.php';

$id = $_GET['id'];

$select_logo = "SELECT * FROM logos WHERE id=$id";
$select_logo_result = mysqli_query($db_connect, $select_logo);
$after_assoc_logo = mysqli_fetch_assoc($select_logo_result);

?>

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Dashboard</a>
        </nav>

        <div class="sl-pagebody">
            <div class="row">
                <div class="col-lg-9 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">EDIT BANNER</h3>
                        </div>
                        <div class="card-body">
                            <form action="logo_update.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?=$after_assoc_logo['id']?>">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label-control">Uploaded Logo</label>
                                    <br>
                                    <img width="500" src="../uploads/logos/<?=$after_assoc_logo['logo']?>" alt="">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label-control">New Logo</label>
                                    <input type="file" name="logo" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require '../dashboard_includes/footer.php'; ?>

<?php if(isset($_SESSION['update_logo'])){ ?>
  <script>
    Swal.fire({
    position: 'center',
    icon: 'success',
    title: '<?=$_SESSION['update_logo']?>',
    showConfirmButton: false,
    timer: 1500
    })
  </script>
<?php } unset($_SESSION['update_logo']); ?> 

<?php if(isset($_SESSION['file_size'])){ ?>
  <script>
    Swal.fire({
    position: 'center',
    icon: 'success',
    title: '<?=$_SESSION['file_size']?>',
    showConfirmButton: false,
    timer: 1500
    })
  </script>
<?php } unset($_SESSION['file_size']); ?> 

<?php if(isset($_SESSION['extension'])){ ?>
  <script>
    Swal.fire({
    position: 'center',
    icon: 'success',
    title: '<?=$_SESSION['extension']?>',
    showConfirmButton: false,
    timer: 1500
    })
  </script>
<?php } unset($_SESSION['extension']); ?> 