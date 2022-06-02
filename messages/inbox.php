<?php
session_start();
require '../db.php';
require '../dashboard_includes/header.php';

$select_message = "SELECT * FROM messages";
$select_message_result = mysqli_query($db_connect, $select_message);
?>

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
                <a class="breadcrumb-item" href="index.html">Dashboard</a>
        </nav>

        <div class="sl-pagebody">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Messages</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Sl No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach($select_message_result as $key=>$message){ ?>
                        <tr>
                            <td><?=$key+1?></td>
                            <td><?=$message['name']?></td>
                            <td><?=$message['email']?></td>
                            <td><?=$message['message']?></td>
                            <td>
                                <a href="#" data-bs-toggle="modal" id="delete.php?id=<?=$message['id'] ?>" class="btn btn-danger permanent_del">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>



<?php
require '../dashboard_includes/footer.php';
?>

<script>
    $('.permanent_del').click(function(){
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
<?php if(isset($_SESSION['delete_message'])){ ?>
    <script>
        Swal.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
        )
    </script>
<?php } unset($_SESSION['delete_message']) ?>