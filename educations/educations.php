<?php 
session_start();
require '../session_check.php';
require '../dashboard_includes/header.php'; 
require '../db.php';

$select_edu = "SELECT * FROM educations WHERE status=0";
$select_edu_result = mysqli_query($db_connect, $select_edu);

$select_trash_edu = "SELECT * FROM educations WHERE status=1";
$select_trash_edu_result = mysqli_query($db_connect, $select_trash_edu);
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
                            <h2 class="text-white">EDUCATION INFORMATION </h2>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                    <th scope="col">SL No.</th>
                                    <th scope="col">Education Year</th>
                                    <th scope="col">Education Name</th>
                                    <th scope="col">Percentage</th>
                                    <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($select_edu_result as $key=>$education){ ?>
                                        <tr>
                                            <th scope="row"><?=$key+1 ?></th>
                                            <td><?=$education['edu_year'] ?></td>
                                            <td><?=$education['edu_name'] ?></td>
                                            <td><?=$education['percentage'] ?></td>
                                            <td>
                                                <?php if($_SESSION['role'] != 3){ ?>
                                                    <a href="education_edit.php?id=<?=$education['id'] ?>" class="btn btn-primary">Edit</a>
                                                <?php } ?>

                                                <?php if($_SESSION['role'] == 1){ ?>
                                                    <a href="#" id="soft_delete_edu.php?id=<?=$education['id'] ?>" class="btn btn-danger delete_edu">Delete</a>
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
            $('.delete_edu').click(function(){
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
        <?php if(isset($_SESSION['soft_del_edu'])){ ?>
            <script>
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            </script>
        <?php } unset($_SESSION['soft_del_edu']) ?>
        
    