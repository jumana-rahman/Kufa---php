<?php
session_start();
require '../session_check.php';
require '../dashboard_includes/header.php';
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
                        <h5>Add Testimonial</h5>
                    </div>
                    <div class="card-body">
                        <form action="testimonial_post.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="">Customer Photo</label>
                                <input type="file" class="form-control" name="photo">
                            </div>
                            <div class="form-group">
                                <label for="">Customer Review</label>
                                <textarea type="text" class="form-control" name="review" cols="30" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Customer Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label for="">Idea Head</label>
                                <input type="text" class="form-control" name="head">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add Testimonial</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require '../dashboard_includes/footer.php';
?>

<?php if(isset($_SESSION['invalid_extension'])){ ?>
    <script>
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '<?=$_SESSION['invalid_extension']?>',
        })
    </script>
<?php } unset($_SESSION['invalid_extension'])?>

<?php if(isset($_SESSION['size'])){ ?>
    <script>
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '<?=$_SESSION['size']?>',
        })
    </script>
<?php } unset($_SESSION['size'])?>

<?php if(isset($_SESSION['success'])){ ?>
  <script>
    Swal.fire({
    position: 'center',
    icon: 'success',
    title: '<?=$_SESSION['success']?>',
    showConfirmButton: false,
    timer: 1500
    })
  </script>
<?php } unset($_SESSION['success']); ?>   