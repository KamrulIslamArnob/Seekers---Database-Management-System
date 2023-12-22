<?php

$tables_and_columns_names = array (
  'education' => 
  array (
    'name' => 'Education',
    'columns' => 
    array (
      'edu_id' => 
      array (
        'columndisplay' => 'edu_id',
        'is_file' => 0,
        'columnvisible' => 0,
        'columninpreview' => 0,
        'fk' => 0,
        'primary' => 1,
        'auto' => 1,
      ),
      'user_id' => 
      array (
        'columndisplay' => 'user_id',
        'is_file' => 0,
        'columnvisible' => 0,
        'columninpreview' => 0,
        'fk' => 1,
        'primary' => 1,
        'auto' => 0,
      ),
      'name' => 
      array (
        'columndisplay' => 'Institute Name',
        'is_file' => 0,
        'columnvisible' => 1,
        'columninpreview' => 0,
        'fk' => 0,
        'primary' => 1,
        'auto' => 0,
      ),
      'degree' => 
      array (
        'columndisplay' => 'Degree ',
        'is_file' => 0,
        'columnvisible' => 1,
        'columninpreview' => 0,
        'fk' => 0,
        'primary' => 1,
        'auto' => 0,
      ),
      'city' => 
      array (
        'columndisplay' => 'City',
        'is_file' => 0,
        'columnvisible' => 1,
        'columninpreview' => 0,
        'fk' => 0,
        'primary' => 1,
        'auto' => 0,
      ),
      'start_date' => 
      array (
        'columndisplay' => 'Started',
        'is_file' => 0,
        'columnvisible' => 1,
        'columninpreview' => 0,
        'fk' => 0,
        'primary' => 1,
        'auto' => 0,
      ),
      'end_date' => 
      array (
        'columndisplay' => 'Ended',
        'is_file' => 0,
        'columnvisible' => 1,
        'columninpreview' => 0,
        'fk' => 0,
        'primary' => 1,
        'auto' => 0,
      ),
      'description' => 
      array (
        'columndisplay' => 'Description',
        'is_file' => 0,
        'columnvisible' => 1,
        'columninpreview' => 0,
        'fk' => 0,
        'primary' => 1,
        'auto' => 0,
      ),
    ),
  ),
  'projects' => 
  array (
    'name' => 'Projects ',
    'columns' => 
    array (
      'project_id' => 
      array (
        'columndisplay' => 'project_id',
        'is_file' => 0,
        'columnvisible' => 0,
        'columninpreview' => 0,
        'fk' => 0,
        'primary' => 1,
        'auto' => 1,
      ),
      'project_name' => 
      array (
        'columndisplay' => 'Title',
        'is_file' => 0,
        'columnvisible' => 1,
        'columninpreview' => 0,
        'fk' => 0,
        'primary' => 1,
        'auto' => 0,
      ),
      'description' => 
      array (
        'columndisplay' => 'Description',
        'is_file' => 0,
        'columnvisible' => 1,
        'columninpreview' => 0,
        'fk' => 0,
        'primary' => 1,
        'auto' => 0,
      ),
      'project_link' => 
      array (
        'columndisplay' => 'Project Link',
        'is_file' => 0,
        'columnvisible' => 1,
        'columninpreview' => 0,
        'fk' => 0,
        'primary' => 1,
        'auto' => 0,
      ),
      'id' => 
      array (
        'columndisplay' => 'id',
        'is_file' => 0,
        'columnvisible' => 0,
        'columninpreview' => 0,
        'fk' => 1,
        'primary' => 1,
        'auto' => 0,
      ),
      'project_keyword' => 
      array (
        'columndisplay' => 'Genre',
        'is_file' => 0,
        'columnvisible' => 1,
        'columninpreview' => 0,
        'fk' => 0,
        'primary' => 1,
        'auto' => 0,
      ),
      'Languages' => 
      array (
        'columndisplay' => 'Languages / Tools',
        'is_file' => 0,
        'columnvisible' => 1,
        'columninpreview' => 0,
        'fk' => 0,
        'primary' => 1,
        'auto' => 0,
      ),
      'Client' => 
      array (
        'columndisplay' => 'Client',
        'is_file' => 0,
        'columnvisible' => 1,
        'columninpreview' => 0,
        'fk' => 0,
        'primary' => 1,
        'auto' => 0,
      ),
    ),
  ),
);

?>