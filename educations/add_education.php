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
                        <h5>Add Education</h5>
                    </div>
                    <div class="card-body">
                        <form action="education_post.php" method="POST">
                            <div class="form-group">
                                <label for="">Education Year</label>
                                <input type="text" class="form-control" name="edu_year">
                            </div>
                            <div class="form-group">
                                <label for="">Education Name</label>
                                <input type="text" class="form-control" name="edu_name">
                            </div>
                            <div class="form-group">
                                <label for="">Education Percentage</label>
                                <input type="text" class="form-control" name="percentage">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add Education</button>
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

<?php if(isset($_SESSION['edu_added'])){ ?>
    <script>
        Swal.fire({
        icon: 'success',
        title: 'Congrats!',
        text: '<?=$_SESSION['edu_added']?>',
        })
    </script>
<?php } unset($_SESSION['edu_added'])?>    