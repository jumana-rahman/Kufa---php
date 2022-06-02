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
                        <h5>Add Service</h5>
                    </div>
                    <div class="card-body">
                        <form action="service_post.php" method="POST">
                            <div class="form-group">
                                <label for="">Icon</label>
                                <input type="text" class="form-control" name="icon">
                            </div>
                            <div class="form-group">
                                <label for="">Service Title</label>
                                <input type="text" class="form-control" name="service_title">
                            </div>
                            <div class="form-group">
                                <label for="">Service Description</label>
                                <textarea type="text" class="form-control" cols="30" rows="5" name="service_description"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add Service</button>
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

<?php if(isset($_SESSION['service_added'])){ ?>
    <script>
        Swal.fire({
        icon: 'success',
        title: 'Congrats!',
        text: '<?=$_SESSION['service_added']?>',
        })
    </script>
<?php } unset($_SESSION['service_added'])?>    