<?php 
session_start();
require '../session_check.php';
require '../dashboard_includes/header.php'; 
?>

<?php 
require '../db.php';

$select_testimonials = "SELECT * FROM testimonials WHERE status=0";
$select_testimonials_result = mysqli_query($db_connect, $select_testimonials);

$select_trash_testimonials = "SELECT * FROM testimonials WHERE status=1";
$select_trash_testimonials_result = mysqli_query($db_connect, $select_trash_testimonials);

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
                            <h2 class="text-white">TESTIMONIAL INFORMATION </h2>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                    <th scope="col">SL No.</th>
                                    <th scope="col">Customer Photo</th>
                                    <th width="20%" scope="col">Customer Review</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Idea Head</th>
                                    <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($select_testimonials_result as $key=>$testimonial){ ?>
                                        <tr>
                                            <th scope="row"><?=$key+1 ?></th>
                                            <td>
                                                <img width="50" src="../uploads/testimonials/<?=$testimonial['photo'] ?>" alt="">
                                            </td>
                                            <td><?=$testimonial['review'] ?></td>
                                            <td><?=$testimonial['name'] ?></td>
                                            <td><?=$testimonial['head'] ?></td>
                                            <td>
                                                <?php if($_SESSION['role'] != 3){ ?>
                                                    <a href="testimonial_edit.php?id=<?=$testimonial['id'] ?>" class="btn btn-primary">Edit</a>
                                                <?php } ?>

                                                <?php if($_SESSION['role'] != 2 && $_SESSION['role'] != 3){  ?>
                                                    <a href="#" id="testimonial_soft_delete.php?id=<?=$testimonial['id'] ?>" class="btn btn-danger delete_testimonial">Delete</a>
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
            $('.delete_testimonial').click(function(){
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
        <?php if(isset($_SESSION['test_soft_del'])){ ?>
            <script>
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            </script>
        <?php } unset($_SESSION['test_soft_del']) ?>
        
    