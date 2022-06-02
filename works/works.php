<?php 
session_start();
require '../session_check.php';
require '../dashboard_includes/header.php'; 
?>

<?php 
require '../db.php';

$select_works = "SELECT * FROM works WHERE status=0";
$select_works_result = mysqli_query($db_connect, $select_works);

$select_trash_works = "SELECT * FROM works WHERE status=1";
$select_trash_works_result = mysqli_query($db_connect, $select_trash_works);

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
                            <h2 class="text-white">WORK INFORMATION </h2>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">SL No.</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Button</th>
                                        <th width="20%" scope="col">Description</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($select_works_result as $key=>$work){ ?>
                                        <tr>
                                            <th scope="row"><?=$key+1 ?></th>
                                            <td><?=$work['category'] ?></td>
                                            <td><?=$work['title'] ?></td>
                                            <td><?=$work['button'] ?></td>
                                            <td><?=substr($work['description'], 0, 150).'...' ?></td>
                                            <td>
                                                <img width="50" src="../uploads/works/<?=$work['image'] ?>" alt="">
                                            </td>
                                            <td>
                                                <?php if($work['active_status'] == 1){ ?>
                                                    <a href="work_active_status.php?id=<?=$work['id']?>" class="btn btn-success">Active</a>
                                                <?php } else{ ?>
                                                    <a href="work_active_status.php?id=<?=$work['id']?>" class="btn btn-secondary">Active</a>
                                                <?php } ?>

                                                <?php if($_SESSION['role'] != 3){ ?>
                                                    <a href="work_edit.php?id=<?=$work['id'] ?>" class="btn btn-primary">Edit</a>
                                                <?php } ?>

                                                <?php if($_SESSION['role'] != 2 && $_SESSION['role'] != 3){  ?>
                                                    <a href="#" id="work_soft_delete.php?id=<?=$work['id'] ?>" class="btn btn-danger delete_work">Delete</a>
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
            $('.delete_work').click(function(){
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
        <?php if(isset($_SESSION['work_soft_del'])){ ?>
            <script>
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            </script>
        <?php } unset($_SESSION['work_soft_del']) ?>

        <?php if(isset($_SESSION['limit'])){ ?>
            <script>
                Swal.fire({
                position: 'center',
                icon: 'success',
                title: '<?=$_SESSION['limit']?>',
                showConfirmButton: false,
                timer: 1500
                })
            </script>
        <?php } unset($_SESSION['limit']); ?> 
        
    