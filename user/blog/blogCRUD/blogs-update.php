<?php
require_once('config.php');
require_once('helpers.php');
require_once('config-tables-columns.php');

session_start();
$userid = $_SESSION['user_id'];

// Processing form data when form is submitted
if (isset($_POST["blog_id"]) && !empty($_POST["blog_id"])) {
    // Get hidden input value
    $blog_id = $_POST["blog_id"];

    // Checking for upload fields
    $upload_results = array();
    $upload_errors = array();

    // Use the backup fields to look for submitted files, if any
    foreach ($_POST as $key => $value) {

        // Check for $_POST cruddiy_backup_xxx to determine $_FILES xxx
        // We don't loop through $_FILES directly to handle value backup more easily
        if (substr($key, 0, 15) === 'cruddiy_backup_') {
            $originalKey = substr($key, 15);
            // Check if a file was uploaded for this field
            if (isset($_FILES[$originalKey]) && $_FILES[$originalKey]['error'] == UPLOAD_ERR_OK) {
                // Handle the file upload
                $this_upload = handleFileUpload($_FILES[$originalKey]);
                $upload_results[] = $this_upload;

                // If the upload was successful, update $_POST
                if (!in_array(true, array_column($this_upload, 'error')) && !array_key_exists('error', $this_upload)) {
                    $_POST[$originalKey] = $this_upload['success'];

                    // And we can safely delete the previous file
                    unlink($upload_target_dir . $_POST['cruddiy_backup_' . $originalKey]);
                }
            } else {
                // No file uploaded, use the backup
                $_POST[$originalKey] = $value;
            }
        }


        // Check for cruddiy_delete_xxx and set corresponding $_POST['xxx'] to blank
        if (substr($key, 0, 15) === 'cruddiy_delete_') {
            $deleteKey = substr($key, 15);

            if (isset($_POST['cruddiy_delete_' . $deleteKey]) && $_POST['cruddiy_delete_' . $deleteKey]) {
                // Set the corresponding field to blank
                $_POST[$deleteKey] = '';

                // And we can safely delete the file
                @unlink($upload_target_dir . $_POST['cruddiy_backup_' . $deleteKey]);
            }
        }
    }

    $upload_errors = array();
    foreach ($upload_results as $result) {
        if (isset($result['error'])) {
            $upload_errors[] = $result['error'];
        }
    }

    // Check for regular fields
    if (!in_array(true, array_column($upload_results, 'error'))) {

        $blog_id = trim($_POST["blog_id"]);
        $blog_title = trim($_POST["blog_title"]);
        $blog_tagline = $_POST["blog_tagline"] == "" ? null : trim($_POST["blog_tagline"]);
        $blog_text = trim($_POST["blog_text"]);
        $blog_genre = trim($_POST["blog_genre"]);
        $blog_cover = $_POST["blog_cover"] == "" ? null : trim($_POST["blog_cover"]);
        $user_id = $userid;
        $updated_at = date("Y-m-d H:i:s");


        // Prepare an update statement

        $stmt = $link->prepare("UPDATE `blogs` SET `blog_id`=?,`blog_title`=?,`blog_tagline`=?,`blog_text`=?,`blog_genre`=?,`blog_cover`=?,`user_id`=?,`updated_at`=? WHERE `blog_id`=?");

        try {
            $stmt->execute([$blog_id, $blog_title, $blog_tagline, $blog_text, $blog_genre, $blog_cover, $user_id, $updated_at, $blog_id]);
        } catch (Exception $e) {
            error_log($e->getMessage());
            $error = $e->getMessage();
        }

        if (!isset($error)) {
            header("location: blogs-read.php?blog_id=$blog_id");
        } else {
            $uploaded_files = array();
            foreach ($upload_results as $result) {
                if (isset($result['success'])) {
                    // Delete the uploaded files if there were any error while saving postdata in DB
                    unlink($upload_target_dir . $result['success']);
                }
            }
        }

    }
}
// Check existence of id parameter before processing further
$_GET["blog_id"] = trim($_GET["blog_id"]);
if (isset($_GET["blog_id"]) && !empty($_GET["blog_id"])) {
    // Get URL parameter
    $blog_id = trim($_GET["blog_id"]);

    // Prepare a select statement
    $sql = "SELECT * FROM `blogs` WHERE `blog_id` = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        // Set parameters
        $param_id = $blog_id;

        // Bind variables to the prepared statement as parameters
        if (is_int($param_id))
            $__vartype = "i";
        elseif (is_string($param_id))
            $__vartype = "s";
        elseif (is_numeric($param_id))
            $__vartype = "d";
        else
            $__vartype = "b"; // blob
        mysqli_stmt_bind_param($stmt, $__vartype, $param_id);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) == 1) {
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                // Retrieve individual field value

                $blog_id = htmlspecialchars($row["blog_id"] ?? "");
                $blog_title = htmlspecialchars($row["blog_title"] ?? "");
                $blog_tagline = htmlspecialchars($row["blog_tagline"] ?? "");
                $blog_text = htmlspecialchars($row["blog_text"] ?? "");
                $blog_genre = htmlspecialchars($row["blog_genre"] ?? "");
                $blog_cover = htmlspecialchars($row["blog_cover"] ?? "");
                $user_id = htmlspecialchars($row["user_id"] ?? "");
                $created_at = htmlspecialchars($row["created_at"] ?? "");
                $updated_at = htmlspecialchars($row["updated_at"] ?? "");


            } else {
                // URL doesn't contain valid id. Redirect to error page
                header("location: error.php");
                exit();
            }

        } else {
            translate('stmt_error') . "<br>" . $stmt->error;
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);

} else {
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>
        <?php translate('Update Record') ?>
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <style>
        .custom-bg-color{
            background-color:#E6DFFC;
        }
        .custom-text-color{
            color:#815DF2;
        }
    </style>
</head>
<?php require_once('navbar.php'); ?>

<body>
    <section class="pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="page-header">
                        <h2>
                            <?php translate('Update Record') ?>
                        </h2>
                    </div>
                    <?php print_error_if_exists(@$upload_errors); ?>
                    <?php print_error_if_exists(@$error); ?>
                    <p>
                        <?php translate('update_record_instructions') ?>
                    </p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post"
                        enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="blog_id">blog_id*</label>
                            <input type="number" name="blog_id" id="blog_id" class="form-control"
                                value="<?php echo @$blog_id; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="blog_title">Ttile*</label>
                            <input type="text" name="blog_title" id="blog_title" maxlength="255" class="form-control"
                                value="<?php echo @$blog_title; ?>">
                        </div>
                        <div class="form-group">
                            <label for="blog_tagline">About</label>
                            <input type="text" name="blog_tagline" id="blog_tagline" maxlength="255"
                                class="form-control" value="<?php echo @$blog_tagline; ?>">
                        </div>
                        <div class="form-group">
                            <label for="blog_text">Section*</label>
                            <textarea name="blog_text" id="blog_text"
                                class="form-control"><?php echo @$blog_text; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="blog_genre">Genre*</label>
                            <input type="text" name="blog_genre" id="blog_genre" maxlength="255" class="form-control"
                                value="<?php echo @$blog_genre; ?>">
                        </div>
                        <div class="form-group">
                            <label for="blog_cover">Cover Img</label>

                            <input type="file" name="blog_cover" id="blog_cover" class="form-control">
                            <input type="hidden" name="cruddiy_backup_blog_cover" id="cruddiy_backup_blog_cover"
                                value="<?php echo @$blog_cover; ?>">
                            <?php if (isset($blog_cover) && !empty($blog_cover)): ?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="cruddiy_delete_blog_cover"
                                        name="cruddiy_delete_blog_cover" value="1">
                                    <label class="custom-control-label" for="cruddiy_delete_blog_cover">
                                        <?php translate("Delete:") ?>: <a href="uploads/<?php echo $blog_cover ?>"
                                            target="_blank">
                                            <?php echo $blog_cover ?>
                                        </a>
                                    </label>
                                </div>
                            <?php endif ?>

                        </div>
                        <div class="form-group">
                            <label for="user_id">user_id*</label>
                            <input type="text" name="user_id" id="user_id" maxlength="255" class="form-control"
                                value="<?php echo @$userid; ?>" readonly>


                        </div>

                        

                        <input type="hidden" name="blog_id" value="<?php echo $blog_id; ?>" />
                        <p>
                            <input type="submit" class="btn btn-primary" value="<?php translate('Edit') ?>">
                            <a href="javascript:history.back()" class="btn btn-secondary">
                                <?php translate('Cancel') ?>
                            </a>
                        </p>
                        <hr>
                        <p>
                            <a href="blogs-read.php?blog_id=<?php echo $_GET["blog_id"]; ?>" class="btn btn-info">
                                <?php translate('View Record') ?>
                            </a>
                            <a href="blogs-delete.php?blog_id=<?php echo $_GET["blog_id"]; ?>" class="btn btn-danger">
                                <?php translate('Delete Record') ?>
                            </a>
                            <a href="blogs-index.php" class="btn btn-primary">
                                <?php translate('Back to List') ?>
                            </a>
                        </p>
                        <p>
                            <?php translate('required_fiels_instructions') ?>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
    crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
</body>

</html>