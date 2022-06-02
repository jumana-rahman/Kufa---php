<?php
session_start();
require 'session_check.php';
require 'db.php';
require 'dashboard_includes/header.php'; 
?>

<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel bg-white">
        <nav class="breadcrumb sl-breadcrumb bg-gray">
                <a class="breadcrumb-item" href="index.html">Dashboard</a>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title text-center">
                <h1>WELCOME TO KUFA ADMIN PANEL</h1>
            </div>
            <div class="gif text-center">
                <img height="500" src="uploads/gif/welcome.gif" alt="">
            </div>
        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

<?php require 'dashboard_includes/footer.php'; ?>

<?php if(isset($_SESSION['logged_in'])){ ?>
    <script>
        Swal.fire({
        position: 'bottom-end',
        icon: 'success',
        title: '<?=$_SESSION['logged_in']?>',
        showConfirmButton: false,
        timer: 1500
        })
    </script>
<?php } unset($_SESSION['logged_in']) ?>