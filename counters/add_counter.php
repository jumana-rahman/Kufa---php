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
                        <h5>Add Counter</h5>
                    </div>
                    <div class="card-body">
                        <form action="counter_post.php" method="POST">
                            <div class="form-group">
                                <label for="">Icon</label>
                                <input type="text" class="form-control" name="counter_icon">
                            </div>
                            <div class="form-group">
                                <label for="">Count Number</label>
                                <input type="number" class="form-control" name="counter_num">
                            </div>
                            <div class="form-group">
                                <label for="">Counter Title</label>
                                <input type="text" class="form-control" name="counter_title">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add Counter</button>
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