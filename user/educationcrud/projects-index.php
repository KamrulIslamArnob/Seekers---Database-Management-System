<?php

require_once('config.php');
require_once('config-tables-columns.php');
require_once('helpers.php');

session_start();
$user_id = $_SESSION['user_id'];

// Check if it's an export request
$isCsvExport = isset($_GET['export']) && $_GET['export'] == 'csv';


//Get current URL and parameters for correct pagination
$script   = $_SERVER['SCRIPT_NAME'];
$parameters   = $_GET ? $_SERVER['QUERY_STRING'] : "" ;
$currenturl = $domain. $script . '?' . $parameters;

//Pagination
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}

//$no_of_records_per_page is set on the index page. Default is 10.
$offset = ($pageno-1) * $no_of_records_per_page;

$total_pages_sql = "SELECT COUNT(*) FROM `projects`";
$result = mysqli_query($link,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

//Column sorting on column name
$columns = array('project_name', 'description', 'project_link', 'project_keyword', 'Languages', 'Client');
// Order by primary key on default
$order = 'project_id';
if (isset($_GET['order']) && in_array($_GET['order'], $columns)) {
    $order = $_GET['order'];
}

//Column sort order
$sortBy = array('asc', 'desc'); $sort = 'asc';
if (isset($_GET['sort']) && in_array($_GET['sort'], $sortBy)) {
        if($_GET['sort']=='asc') {
        $sort='asc';
        }
else {
    $sort='desc';
    }
}

//Generate WHERE statements for param
$where_columns = array_intersect_key($_GET, array_flip($columns));
$get_param = "";
$where_statement = " WHERE 1=1 ";
foreach ( $where_columns as $key => $val ) {
    $where_statement .= " AND `$key` = '" . mysqli_real_escape_string($link, $val) . "' ";
    $get_param .= "&$key=$val";
}

if (!empty($_GET['search'])) {
    $search = mysqli_real_escape_string($link, $_GET['search']);
    if (strpos('`projects`.`project_name`, `projects`.`description`, `projects`.`project_link`, `projects`.`project_keyword`, `projects`.`Languages`, `projects`.`Client`', ',')) {
        $where_statement .= " AND CONCAT_WS (`projects`.`project_name`, `projects`.`description`, `projects`.`project_link`, `projects`.`project_keyword`, `projects`.`Languages`, `projects`.`Client`) LIKE '%$search%'";
    } else {
        $where_statement .= " AND `projects`.`project_name`, `projects`.`description`, `projects`.`project_link`, `projects`.`project_keyword`, `projects`.`Languages`, `projects`.`Client` LIKE '%$search%'";
    }

} else {
    $search = "";
}

$order_clause = !empty($order) ? "ORDER BY `$order` $sort" : '';
$group_clause = !empty($order) && $order == 'project_id' ? "GROUP BY `projects`.`$order`" : '';

// Prepare SQL queries
$sql = "SELECT projects.*
FROM projects
LEFT JOIN users ON users.id = projects.id
WHERE users.id = $user_id -- Replace $user_id with the actual user ID
GROUP BY projects.project_id
ORDER BY project_id ASC
";

//echo $sql;

// Add pagination only if it's not a CSV export
if (!$isCsvExport) {
    $sql .= " LIMIT $offset, $no_of_records_per_page";
}

// Execute the main query
$result = mysqli_query($link, $sql);

// Stop further rendering for CSV export
if ($isCsvExport) {
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    exportAsCSV($data, $db_name, $tables_and_columns_names, 'projects', $link, false);
    exit;
}

$count_pages = "SELECT COUNT(*) AS count
                FROM `projects` 
			LEFT JOIN `users` AS `idusers` ON `idusers`.`id` = `projects`.`id`
                $where_statement";

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Seekers</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6b773fe9e4.js" crossorigin="anonymous"></script>
    <style type="text/css">
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 5px;
        }
        body {
            font-size: 14px;
        }
        .custom-bg-color{
            background-color:#E6DFFC;
        }
        .custom-text-color{
            color:#815DF2;
        }
    </style>
</head>
<body>
    <?php require_once('navbar.php'); ?>
    <section class="pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <?php
                        // Prevent crash if $str contains single quotes
                        $str = <<<'EOD'
                        Projects 
                        EOD;
                        ?>
                        <h2 class="float-left"><?php translate('%s Details', true, $str) ?></h2>
                        <a href="projects-create.php" class="btn btn-success float-right"><?php translate('Add New Record') ?></a>
                        <a href="projects-index.php" class="btn btn-info float-right mr-2"><?php translate('Reset View') ?></a>
                        <a href="projects-index.php?export=csv" class="btn btn-primary float-right mr-2"><?php translate('Export as CSV') ?></a>
                        <a href="javascript:history.back()" class="btn btn-secondary float-right mr-2"><?php translate('Back') ?></a>
                    </div>

                    <div class="form-row">
                        <form action="projects-index.php" method="get">
                            <div class="col"> <input type="text" class="form-control" placeholder="<?php translate('Search this table') ?>" name="search"></div>
                        </form>
                        <br>


                        <?php
                        if($result) :
                            if(mysqli_num_rows($result) > 0) :
                                $number_of_results = mysqli_fetch_assoc(mysqli_query($link, $count_pages))['count'];
                                $total_pages = ceil($number_of_results / $no_of_records_per_page);
                                translate('total_results', true, $number_of_results, $pageno, $total_pages);
                                ?>

                                <table class='table table-bordered table-striped'>
                                    <thead class='thead-light'>
                                        <tr>
                                            <?php 									$columnname = "project_name";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=project_name&sort=".$sort_link.">Title</a></th>";
									$columnname = "description";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=description&sort=".$sort_link.">Description</a></th>";
									$columnname = "project_link";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=project_link&sort=".$sort_link.">Project Link</a></th>";
									$columnname = "project_keyword";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=project_keyword&sort=".$sort_link.">Genre</a></th>";
									$columnname = "Languages";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=Languages&sort=".$sort_link.">Languages / Tools</a></th>";
									$columnname = "Client";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=Client&sort=".$sort_link.">Client</a></th>";
 ?>
                                            <th><?php translate('Actions'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($row = mysqli_fetch_array($result)): ?>
                                            <tr>
                                                <?php 											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['projects']["columns"]['project_name']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['projects']["columns"]['project_name']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['projects']["columns"]['project_name']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['project_name']) .'" target="_blank" class="uploaded_file" id="link_project_name">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['project_name'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['projects']["columns"]['description']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['projects']["columns"]['description']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['projects']["columns"]['description']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['description']) .'" target="_blank" class="uploaded_file" id="link_description">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['description'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['projects']["columns"]['project_link']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['projects']["columns"]['project_link']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['projects']["columns"]['project_link']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['project_link']) .'" target="_blank" class="uploaded_file" id="link_project_link">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['project_link'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['projects']["columns"]['project_keyword']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['projects']["columns"]['project_keyword']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['projects']["columns"]['project_keyword']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['project_keyword']) .'" target="_blank" class="uploaded_file" id="link_project_keyword">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['project_keyword'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['projects']["columns"]['Languages']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['projects']["columns"]['Languages']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['projects']["columns"]['Languages']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['Languages']) .'" target="_blank" class="uploaded_file" id="link_Languages">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['Languages'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['projects']["columns"]['Client']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['projects']["columns"]['Client']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['projects']["columns"]['Client']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['Client']) .'" target="_blank" class="uploaded_file" id="link_Client">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['Client'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t"; ?>
                                                <td>
                                                    <?php
                                                    $column_id = 'project_id';
                                                    if (!empty($column_id)): ?>
                                                        <a id='read-<?php echo $row['project_id']; ?>' href='projects-read.php?project_id=<?php echo $row['project_id']; ?>' title='<?php echo addslashes(translate('View Record', false)); ?>' data-toggle='tooltip' class='btn btn-sm btn-info'><i class='far fa-eye'></i></a>
                                                        <a id='update-<?php echo $row['project_id']; ?>' href='projects-update.php?project_id=<?php echo $row['project_id']; ?>' title='<?php echo addslashes(translate('Update Record', false)); ?>' data-toggle='tooltip' class='btn btn-sm btn-warning'><i class='far fa-edit'></i></a>
                                                        <a id='delete-<?php echo $row['project_id']; ?>' href='projects-delete.php?project_id=<?php echo $row['project_id']; ?>' title='<?php echo addslashes(translate('Delete Record', false)); ?>' data-toggle='tooltip' class='btn btn-sm btn-danger'><i class='far fa-trash-alt'></i></a>
                                                    <?php else: ?>
                                                        <?php echo addslashes(translate('unsupported_no_pk')); ?>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>


                                <ul class="pagination" align-right>
                                <?php
                                    $new_url = preg_replace('/&?pageno=[^&]*/', '', $currenturl);
                                    ?>
                                    <li class="page-item"><a class="page-link" href="<?php echo $new_url .'&pageno=1' ?>"><?php translate('First') ?></a></li>
                                    <li class="page-item <?php if($pageno <= 1){ echo 'disabled'; } ?>">
                                        <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo $new_url ."&pageno=".($pageno - 1); } ?>"><?php translate('Prev') ?></a>
                                    </li>
                                    <li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                                        <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo $new_url . "&pageno=".($pageno + 1); } ?>"><?php translate('Next') ?></a>
                                    </li>
                                    <li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                                        <a class="page-item"><a class="page-link" href="<?php echo $new_url .'&pageno=' . $total_pages; ?>"><?php translate('Last') ?></a>
                                    </li>
                                </ul>

                                <?php mysqli_free_result($result); ?>
                            <?php else: ?>
                            <p class='lead'><em><?php translate('No records were found.') ?></em></p>
                        <?php endif ?>

                    <?php else: ?>
                        <div class="alert alert-danger" role="alert">
                            ERROR: Could not able to execute <?php echo $sql. " " . mysqli_error($link); ?>
                        </div>
                    <?php endif ?>

                    <?php mysqli_close($link) ?>
                </div>
            </div>
        </div>
    </section>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>
</html>
