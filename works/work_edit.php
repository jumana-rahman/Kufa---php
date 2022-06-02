<?php
session_start();
require '../session_check.php';
require '../db.php';
require '../dashboard_includes/header.php';

$id = $_GET['id'];

$select_work = "SELECT * FROM works WHERE id=$id";
$select_work_result = mysqli_query($db_connect, $select_work);
$after_assoc_work = mysqli_fetch_assoc($select_work_result);

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
                            <h3 class="text-center">EDIT WORK</h3>
                        </div>
                        <div class="card-body">
                            <form action="work_update.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?=$after_assoc_work['id']?>">
                                    <input type="hidden" name="user_id" value="<?=$_SESSION['user_id']?>">
                                    <label for="" class="form-label-control">Category</label>
                                    <input value="<?=$after_assoc_work['category']?>" type="text" name="category" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label-control">Title</label>
                                    <input value="<?=$after_assoc_work['title']?>" type="text" name="title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label-control">Button</label>
                                    <input value="<?=$after_assoc_work['button']?>" type="text" name="button" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label-control">Description</label>
                                    <textarea name="description" class="form-control" cols="30" rows="5"><?=$after_assoc_work['description']?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label-control">Uploaded Photo</label>
                                    <br>
                                    <img width="500" src="../uploads/works/<?=$after_assoc_work['image']?>" alt="">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label-control">New Photo</label>
                                    <input type="file" name="image" class="form-control">
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

<?php if(isset($_SESSION['update_work'])){ ?>
  <script>
    Swal.fire({
    position: 'center',
    icon: 'success',
    title: '<?=$_SESSION['update_work']?>',
    showConfirmButton: false,
    timer: 1500
    })
  </script>
<?php } unset($_SESSION['update_work']); ?> 

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