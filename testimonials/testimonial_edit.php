<?php
session_start();
require '../session_check.php';
require '../db.php';
require '../dashboard_includes/header.php';

$id = $_GET['id'];

$select_testimonial = "SELECT * FROM testimonials WHERE id=$id";
$select_testimonial_result = mysqli_query($db_connect, $select_testimonial);
$after_assoc = mysqli_fetch_assoc($select_testimonial_result);

?>

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Dashboard</a>
        </nav>

        <div class="sl-pagebody">
            <div class="row">
                <div class="col-lg-8 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">EDIT TESTIMONIAL</h3>
                        </div>
                        <div class="card-body">
                            <form action="testimonial_update.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?=$after_assoc['id']?>">
                                    <label for="" class="form-label-control">Uploaded Photo</label>
                                    <br>
                                    <img width="100" src="../uploads/testimonials/<?=$after_assoc['photo']?>" alt="">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label-control">New Photo</label>
                                    <input type="file" name="photo" class="form-control">
                                </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label-control">Customer Review</label>
                                    <textarea name="review" class="form-control" cols="30" rows="5"><?=$after_assoc['review']?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label-control">Customer Name</label>
                                    <input value="<?=$after_assoc['name']?>" type="text" name="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label-control">Idea Head</label>
                                    <input value="<?=$after_assoc['head']?>" type="text" name="head" class="form-control">
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

<?php if(isset($_SESSION['update_testimonial'])){ ?>
  <script>
    Swal.fire({
    position: 'center',
    icon: 'success',
    title: '<?=$_SESSION['update_testimonial']?>',
    showConfirmButton: false,
    timer: 1500
    })
  </script>
<?php } unset($_SESSION['update_testimonial']); ?> 

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