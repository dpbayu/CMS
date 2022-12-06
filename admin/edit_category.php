<!-- Start PHP -->
<?php
session_start();
include_once "../includes/db.php";
if (isset($_GET['id'])) {
?>
<!DOCTYPE html>
<html lang="en">
<!-- Header Start -->
<?php include_once("head.php") ?>
<!-- Header End -->

<body id="page-top">
    <!-- Page Wrapper Start -->
    <div id="wrapper">
        <!-- Sidebar Start -->
        <?php include_once("menu.php") ?>
        <!-- Sidebar End -->
        <!-- Content Wrapper Start -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content End -->
            <div id="content">
                <!-- Topbar Start -->
                <?php include_once("topbar.php") ?>
                <!-- Topbar End -->
                <!-- Container Fluid Start -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Category</h1>
                    <!-- Form Edit Category Start -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Data Category</h6>
                        </div>
                        <div class="card-body">
                            <?php
                        $category_id = $_GET['id'];
                        $sql = "SELECT * FROM category WHERE category_id = '$category_id'";
                        $result = mysqli_query($db, $sql);
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <?php
                            if (isset($_GET['message'])) {
                                $msg = $_GET['message'];
                                echo '
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>'.$msg.'</strong>
                                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                                </div>';
                            }
                            ?>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="category">Name Category</label>
                                    <input type="text" class="form-control" id="category" name="category_name"
                                        value="<?php echo $row['category_name']; ?>">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                    <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                                </div>
                            </form>
                            <?php } ?>
                            <?php
                                if (isset($_POST['submit'])) {
                                    $category_name = mysqli_real_escape_string($db, $_POST['category_name']);
                                    if (empty($category_name)) {
                                        echo "<script>window.location = 'category.php?message=Please insert your data'</script>";
                                        exit();
                                    } else {
                                        $sql = "UPDATE category SET category_name = '$category_name' WHERE category_id = '$category_id'";
                                        if (mysqli_query($db, $sql)) {
                                            echo "<script>window.location = 'category.php?message=Data update success'</script>";
                                            exit();
                                        } else {
                                            echo "<script>window.location = 'category.php?message=Data update failed'</script>";
                                            exit();
                                        }
                                    }
                                }
                            ?>
                        </div>
                    </div>
                    <!-- Form Edit Category End -->
                </div>
                <!-- Container Fluid End -->
            </div>
            <!-- Main Content End -->
            <!-- Footer Start -->
            <?php include_once("footer.php") ?>
            <!-- Footer End -->
        </div>
        <!-- Content Wrapper End -->
    </div>
    <!-- Page Wrapper End -->

    <!-- Scroll to Top Button Start-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Scroll to Top Button End-->

    <!-- Logout Modal Start-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Logout Modal End-->

    <!-- JS Start -->
    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="assets/js/demo/datatables-demo.js"></script>
    <!-- JS End -->
</body>

</html>
<?php
}
?>
<!-- End PHP -->