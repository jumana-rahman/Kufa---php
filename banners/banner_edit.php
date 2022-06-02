<?php
session_start();
require '../session_check.php';
require '../db.php';
require '../dashboard_includes/header.php';

$id = $_GET['id'];

$select_banner = "SELECT * FROM banners WHERE id=$id";
$select_banner_result = mysqli_query($db_connect, $select_banner);
$after_assoc = mysqli_fetch_assoc($select_banner_result);

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
                            <form action="banner_update.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?=$after_assoc['id']?>">
                                    <label for="" class="form-label-control">Banner Opening Line</label>
                                    <input value="<?=$after_assoc['opening']?>" type="text" name="opening" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label-control">Title</label>
                                    <input value="<?=$after_assoc['title']?>" type="text" name="title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label-control">Description</label>
                                    <textarea name="description" class="form-control" cols="30" rows="5"><?=$after_assoc['description']?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label-control">Button Name</label>
                                    <input value="<?=$after_assoc['btn']?>" type="text" name="btn" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label-control">Uploaded Photo</label>
                                    <br>
                                    <img width="500" src="../uploads/banners/<?=$after_assoc['image']?>" alt="">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label-control">New Photo</label>
                                    <input type="file" name="image" class="form-control">

                                    <?php if(isset($_SESSION['file_size'])){ ?>
                                        <div class="alert alert-warning">
                                            <?=$_SESSION['file_size']?>
                                        </div>
                                    <?php } unset($_SESSION['file_size']) ?>

                                    <?php if(isset($_SESSION['extension'])){ ?>
                                        <div class="alert alert-warning">
                                            <?=$_SESSION['extension']?>
                                        </div>
                                    <?php } unset($_SESSION['extension']) ?>
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

<?php if(isset($_SESSION['update_banner'])){ ?>
  <script>
    Swal.fire({
    position: 'center',
    icon: 'success',
    title: '<?=$_SESSION['update_banner']?>',
    showConfirmButton: false,
    timer: 1500
    })
  </script>
<?php } unset($_SESSION['update_banner']); ?> 