<?php

$tables_and_columns_names = array (
  'certifications' => 
  array (
    'name' => '',
    'columns' => 
    array (
      'certification_id' => 
      array (
        'columndisplay' => 'Certificate ID',
        'is_file' => 0,
        'columnvisible' => 1,
        'columninpreview' => 0,
        'fk' => 0,
        'primary' => 1,
        'auto' => 0,
      ),
      'certification_name' => 
      array (
        'columndisplay' => 'Name',
        'is_file' => 0,
        'columnvisible' => 1,
        'columninpreview' => 0,
        'fk' => 0,
        'primary' => 1,
        'auto' => 0,
      ),
      'issuing_authority' => 
      array (
        'columndisplay' => 'Issuing Authority',
        'is_file' => 1,
        'columnvisible' => 1,
        'columninpreview' => 0,
        'fk' => 0,
        'primary' => 1,
        'auto' => 0,
      ),
      'issue_date' => 
      array (
        'columndisplay' => 'Issue Date',
        'is_file' => 0,
        'columnvisible' => 1,
        'columninpreview' => 0,
        'fk' => 0,
        'primary' => 1,
        'auto' => 0,
      ),
      'expiration_date' => 
      array (
        'columndisplay' => 'Expiration Date',
        'is_file' => 0,
        'columnvisible' => 1,
        'columninpreview' => 0,
        'fk' => 0,
        'primary' => 1,
        'auto' => 0,
      ),
      'id' => 
      array (
        'columndisplay' => 'User ID',
        'is_file' => 0,
        'columnvisible' => 0,
        'columninpreview' => 0,
        'fk' => 1,
        'primary' => 1,
        'auto' => 0,
      ),
    ),
  ),
  'education' => 
  array (
    'name' => '',
    'columns' => 
    array (
      'id' => 
      array (
        'columndisplay' => 'User ID',
        'is_file' => 0,
        'columnvisible' => 0,
        'columninpreview' => 0,
        'fk' => 1,
        'primary' => 1,
        'auto' => 0,
      ),
      'name' => 
      array (
        'columndisplay' => 'Name',
        'is_file' => 0,
        'columnvisible' => 1,
        'columninpreview' => 0,
        'fk' => 0,
        'primary' => 1,
        'auto' => 0,
      ),
      'degree' => 
      array (
        'columndisplay' => 'Degree Name',
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
  'experience' => 
  array (
    'name' => '',
    'columns' => 
    array (
      'experience_id' => 
      array (
        'columndisplay' => 'Experience  Number',
        'is_file' => 0,
        'columnvisible' => 1,
        'columninpreview' => 0,
        'fk' => 0,
        'primary' => 1,
        'auto' => 1,
      ),
      'job_title' => 
      array (
        'columndisplay' => 'Title',
        'is_file' => 0,
        'columnvisible' => 1,
        'columninpreview' => 0,
        'fk' => 0,
        'primary' => 1,
        'auto' => 0,
      ),
      'company' => 
      array (
        'columndisplay' => 'Company/Organizations',
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
      'id' => 
      array (
        'columndisplay' => 'User ID',
        'is_file' => 0,
        'columnvisible' => 0,
        'columninpreview' => 0,
        'fk' => 1,
        'primary' => 1,
        'auto' => 0,
      ),
    ),
  ),
  'language_skills' => 
  array (
    'name' => '',
    'columns' => 
    array (
      'language_id' => 
      array (
        'columndisplay' => 'No.',
        'is_file' => 0,
        'columnvisible' => 1,
        'columninpreview' => 0,
        'fk' => 0,
        'primary' => 1,
        'auto' => 1,
      ),
      'language_name' => 
      array (
        'columndisplay' => 'Language',
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
    ),
  ),
  'projects' => 
  array (
    'name' => '',
    'columns' => 
    array (
      'project_id' => 
      array (
        'columndisplay' => 'No.',
        'is_file' => 0,
        'columnvisible' => 1,
        'columninpreview' => 0,
        'fk' => 0,
        'primary' => 1,
        'auto' => 1,
      ),
      'project_name' => 
      array (
        'columndisplay' => 'title',
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
    ),
  ),
  'services' => 
  array (
    'name' => '',
    'columns' => 
    array (
      'service_id' => 
      array (
        'columndisplay' => 'No.',
        'is_file' => 0,
        'columnvisible' => 1,
        'columninpreview' => 0,
        'fk' => 0,
        'primary' => 1,
        'auto' => 0,
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
      'service_name' => 
      array (
        'columndisplay' => 'Title',
        'is_file' => 0,
        'columnvisible' => 1,
        'columninpreview' => 0,
        'fk' => 0,
        'primary' => 1,
        'auto' => 0,
      ),
      'service_description' => 
      array (
        'columndisplay' => 'Description',
        'is_file' => 0,
        'columnvisible' => 1,
        'columninpreview' => 0,
        'fk' => 0,
        'primary' => 1,
        'auto' => 0,
      ),
      'service_taken' => 
      array (
        'columndisplay' => 'Orders',
        'is_file' => 0,
        'columnvisible' => 1,
        'columninpreview' => 0,
        'fk' => 0,
        'primary' => 1,
        'auto' => 0,
      ),
    ),
  ),
  'skills' => 
  array (
    'name' => '',
    'columns' => 
    array (
      'skill_id' => 
      array (
        'columndisplay' => 'No.',
        'is_file' => 0,
        'columnvisible' => 1,
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
      'skill_name' => 
      array (
        'columndisplay' => 'Name',
        'is_file' => 0,
        'columnvisible' => 1,
        'columninpreview' => 0,
        'fk' => 0,
        'primary' => 1,
        'auto' => 0,
      ),
      'skill_level' => 
      array (
        'columndisplay' => 'Proficiency',
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