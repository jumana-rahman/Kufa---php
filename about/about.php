<?php 
session_start();
require '../session_check.php';
require '../dashboard_includes/header.php'; 
?>

<?php 
require '../db.php';

$select_about = "SELECT * FROM abouts WHERE status=0";
$select_about_result = mysqli_query($db_connect, $select_about);

$select_trash_about = "SELECT * FROM abouts WHERE status=1";
$select_trash_about_result = mysqli_query($db_connect, $select_trash_about);

?>

    <!-- ########## START: MAIN PANEL ########## -->
    <?php if($_SESSION['role'] != 0){ ?>

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
                <a class="breadcrumb-item" href="index.html">Dashboard</a>
        </nav>

        <div class="sl-pagebody">
            <div class="row">
                <div class="col-lg-12 m-auto">
                    <div class="card border-primary">
                        <div class="card-header bg-primary text-center">
                            <h2 class="text-white">ABOUT INFORMATION </h2>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                    <th scope="col">SL No.</th>
                                    <th scope="col">Title</th>
                                    <th width="50%" scope="col">Description</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($select_about_result as $key=>$about){ ?>
                                        <tr>
                                            <th scope="row"><?=$key+1 ?></th>
                                            <td><?=$about['about_title'] ?></td>
                                            <td><?=$about['description'] ?></td>
                                            <td>
                                                <img width="50" src="../uploads/about/<?=$about['about_img'] ?>" alt="">
                                            </td>
                                            <td>
                                                <?php if($about['active_status'] == 1){ ?>
                                                    <a href="about_active_status.php?id=<?=$about['id']?>" class="btn btn-success">Active</a>
                                                <?php } else{ ?>
                                                    <a href="about_active_status.php?id=<?=$about['id']?>" class="btn btn-secondary">Deactive</a>
                                                <?php } ?>

                                                <?php if($_SESSION['role'] != 3){ ?>
                                                    <a href="about_edit.php?id=<?=$about['id'] ?>" class="btn btn-primary">Edit</a>
                                                <?php } ?>

                                                <?php if($_SESSION['role'] != 2 && $_SESSION['role'] != 3){  ?>
                                                    <a href="#" id="about_soft_delete.php?id=<?=$about['id'] ?>" class="btn btn-danger delete_abt">Delete</a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->

    <?php } ?>
    <!-- ########## END: MAIN PANEL ########## -->

<?php require '../dashboard_includes/footer.php'; ?>

        <script>
            $('.delete_abt').click(function(){
                Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href=$(this).attr('id');
                }
                })
            })
        </script>
        <?php if(isset($_SESSION['abt_soft_del'])){ ?>
            <script>
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            </script>
        <?php } unset($_SESSION['abt_soft_del']) ?>
        
    