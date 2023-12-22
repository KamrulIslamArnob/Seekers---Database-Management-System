<?php require_once('config-tables-columns.php'); ?>
<nav class="navbar navbar-expand-lg navbar-light custom-bg-color">
  <a class="navbar-brand nav-link" href="../dashboard-user.php"><span class="custom-text-color">Seekers</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand nav-link" href="index.php"><span class="custom-text-color">PortfolioCRUD</span></a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php translate('Select Page') ?>
        </a>
        <div class="dropdown-menu " aria-labelledby="navbarDropdown">
        <a href="certifications-index.php" class="dropdown-item">certifications</a> 

		<a class="dropdown-item" href="experience-index.php"><?php echo (!empty($tables_and_columns_names["experience"]["name"])) ? $tables_and_columns_names["experience"]["name"] : "experience" ?></a>
		<a class="dropdown-item" href="language_skills-index.php"><?php echo (!empty($tables_and_columns_names["language_skills"]["name"])) ? $tables_and_columns_names["language_skills"]["name"] : "language_skills" ?></a>
		
		<a class="dropdown-item" href="services-index.php"><?php echo (!empty($tables_and_columns_names["services"]["name"])) ? $tables_and_columns_names["services"]["name"] : "services" ?></a>
		<a class="dropdown-item" href="skills-index.php"><?php echo (!empty($tables_and_columns_names["skills"]["name"])) ? $tables_and_columns_names["skills"]["name"] : "skills" ?></a>
	<!-- TABLE_BUTTONS -->
        </div>
      </li>
    </ul>
  </div>
</nav>