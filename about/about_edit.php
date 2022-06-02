<?php
session_start();
require '../session_check.php';
require '../db.php';
require '../dashboard_includes/header.php';

$id = $_GET['id'];

$select_about = "SELECT * FROM abouts WHERE id=$id";
$select_about_result = mysqli_query($db_connect, $select_about);
$after_assoc_about = mysqli_fetch_assoc($select_about_result);

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
                            <form action="about_update.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?=$after_assoc_about['id']?>">
                                    <label for="" class="form-label-control">Title</label>
                                    <input value="<?=$after_assoc_about['about_title']?>" type="text" name="about_title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label-control">Description</label>
                                    <textarea name="description" class="form-control" cols="30" rows="5"><?=$after_assoc_about['description']?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label-control">Uploaded Photo</label>
                                    <br>
                                    <img width="500" src="../uploads/about/<?=$after_assoc_about['about_img']?>" alt="">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label-control">New Photo</label>
                                    <input type="file" name="about_img" class="form-control">
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

<?php if(isset($_SESSION['update_about'])){ ?>
  <script>
    Swal.fire({
    position: 'center',
    icon: 'success',
    title: '<?=$_SESSION['update_about']?>',
    showConfirmButton: false,
    timer: 1500
    })
  </script>
<?php } unset($_SESSION['update_about']); ?> 

<?php if(isset($_SESSION['file_size'])){ ?>
  <script>
    Swal.fire({
    position: 'center',
    icon: 'warning',
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
    icon: 'warning',
    title: '<?=$_SESSION['extension']?>',
    showConfirmButton: false,
    timer: 1500
    })
  </script>
<?php } unset($_SESSION['extension']); ?> 