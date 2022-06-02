<?php
session_start();
require '../dashboard_includes/header.php';
require '../db.php';
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
                        <h5>Add Icon</h5>
                    </div>
                    <div class="card-body">
                        <form action="icon_post.php" method="POST">
                            <div class="form-group">
                                <label for="">Icon Name</label>
                                <input type="text" class="form-control" name="icon_name">
                            </div>
                            <div class="form-group">
                                <input type="hidden" value="<?php echo $_SESSION['user_id']?>" class="form-control" name="user_id">
                            </div>
                            <div class="form-group">
                                <label for="">Icon Class</label>
                                <input type="text" class="form-control" name="icon_class">
                            </div>
                            <div class="form-group">
                                <label for="">Icon Link</label>
                                <input type="text" class="form-control" name="icon_link">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add Icon</button>
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

<?php if(isset($_SESSION['icon_added'])){ ?>
    <script>
        Swal.fire({
        icon: 'success',
        title: 'Congrats!',
        text: '<?=$_SESSION['icon_added']?>',
        })
    </script>
<?php } unset($_SESSION['icon_added'])?>    