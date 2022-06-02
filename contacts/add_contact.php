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
                        <h5>Add Contact</h5>
                    </div>
                    <div class="card-body">
                        <form action="contact_post.php" method="POST">
                            <div class="form-group">
                                <label for="">Office Place</label>
                                <input type="text" class="form-control" name="office">
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" class="form-control" name="address">
                            </div>
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text" class="form-control" name="phone">
                            </div>
                            <div class="form-group">
                                <label for="">E-mail</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label for="">Contact Information</label>
                                <textarea name="contact_info" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add Contact</button>
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
