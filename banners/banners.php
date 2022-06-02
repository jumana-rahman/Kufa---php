<?php 
session_start();
require '../session_check.php';
require '../dashboard_includes/header.php'; 
?>

<?php 
require '../db.php';

$select_banners = "SELECT * FROM banners WHERE state=0";
$select_banners_result = mysqli_query($db_connect, $select_banners);

$select_trash_banners = "SELECT * FROM banners WHERE state=1";
$select_trash_banners_result = mysqli_query($db_connect, $select_trash_banners);

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
                            <h2 class="text-white">BANNERS INFORMATION </h2>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                    <th scope="col">SL No.</th>
                                    <th scope="col">Opening</th>
                                    <th scope="col">Title</th>
                                    <th width="20%" scope="col">Description</th>
                                    <th scope="col">Button Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($select_banners_result as $key=>$banner){ ?>
                                        <tr>
                                            <th scope="row"><?=$key+1 ?></th>
                                            <td><?=$banner['opening'] ?></td>
                                            <td><?=$banner['title'] ?></td>
                                            <td><?=$banner['description'] ?></td>
                                            <td>
                                                <img width="50" src="../uploads/banners/<?=$banner['image'] ?>" alt="">
                                            </td>
                                            <td><?=$banner['btn'] ?></td>
                                            <td>
                                                <?php if($banner['status'] == 1){ ?>
                                                    <a href="banner_status.php?id=<?=$banner['id']?>" class="btn btn-success">Active</a>
                                                <?php } else{ ?>
                                                    <a href="banner_status.php?id=<?=$banner['id']?>" class="btn btn-secondary">Deactive</a>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if($_SESSION['role'] != 3){ ?>
                                                    <a href="banner_edit.php?id=<?=$banner['id'] ?>" class="btn btn-primary">Edit</a>
                                                <?php } ?>

                                                <?php if($_SESSION['role'] != 2 && $_SESSION['role'] != 3){  ?>
                                                    <a href="#" id="banner_soft_delete.php?id=<?=$banner['id'] ?>" class="btn btn-danger delete_ban_btn">Delete</a>
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
            $('.delete_ban_btn').click(function(){
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
        <?php if(isset($_SESSION['ban_soft_del'])){ ?>
            <script>
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            </script>
        <?php } unset($_SESSION['ban_soft_del']) ?>
        
    