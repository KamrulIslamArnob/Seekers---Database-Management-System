<?php require_once('config-tables-columns.php'); ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand nav-link" href="index.php">aasdwed</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php translate('Select Page') ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a href="applications-index.php" class="dropdown-item">aasd</a> 
	
        	<a class="dropdown-item" href="users-index.php"><?php echo (!empty($tables_and_columns_names["users"]["name"])) ? $tables_and_columns_names["users"]["name"] : "users" ?></a>
	<!-- TABLE_BUTTONS -->
        </div>
      </li>
    </ul>
  </div>
</nav>