<?php
session_start();
require '../session_check.php';
require '../db.php';
require '../dashboard_includes/header.php';

$id = $_GET['id'];

$select_brand = "SELECT * FROM brands WHERE id=$id";
$select_brand_result = mysqli_query($db_connect, $select_brand);
$after_assoc_brand = mysqli_fetch_assoc($select_brand_result);

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
                            <h3 class="text-center">EDIT BRAND</h3>
                        </div>
                        <div class="card-body">
                            <form action="brand_update.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?=$after_assoc_brand['id']?>">
                                    <label for="" class="form-label-control">Uploaded Photo</label>
                                    <br>
                                    <img width="500" src="../uploads/brands/<?=$after_assoc_brand['brand_photo']?>" alt="">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label-control">New Photo</label>
                                    <input type="file" name="brand_photo" class="form-control">
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

<?php if(isset($_SESSION['update_brand'])){ ?>
  <script>
    Swal.fire({
    position: 'center',
    icon: 'success',
    title: '<?=$_SESSION['update_brand']?>',
    showConfirmButton: false,
    timer: 1500
    })
  </script>
<?php } unset($_SESSION['update_brand']); ?>

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