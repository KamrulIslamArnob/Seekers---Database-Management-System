<?php

$tables_and_columns_names = array (
  'blogs' => 
  array (
    'name' => 'Blog',
    'columns' => 
    array (
      'blog_id' => 
      array (
        'columndisplay' => 'blog_id',
        'is_file' => 0,
        'columnvisible' => 0,
        'columninpreview' => 0,
        'fk' => 0,
        'primary' => 1,
        'auto' => 0,
      ),
      'blog_title' => 
      array (
        'columndisplay' => 'Ttile',
        'is_file' => 0,
        'columnvisible' => 1,
        'columninpreview' => 0,
        'fk' => 0,
        'primary' => 1,
        'auto' => 0,
      ),
      'blog_tagline' => 
      array (
        'columndisplay' => 'About',
        'is_file' => 0,
        'columnvisible' => 1,
        'columninpreview' => 0,
        'fk' => 0,
        'primary' => 1,
        'auto' => 0,
      ),
      'blog_text' => 
      array (
        'columndisplay' => 'Section',
        'is_file' => 0,
        'columnvisible' => 1,
        'columninpreview' => 0,
        'fk' => 0,
        'primary' => 1,
        'auto' => 0,
      ),
      'blog_genre' => 
      array (
        'columndisplay' => 'Genre',
        'is_file' => 0,
        'columnvisible' => 1,
        'columninpreview' => 0,
        'fk' => 0,
        'primary' => 1,
        'auto' => 0,
      ),
      'blog_cover' => 
      array (
        'columndisplay' => 'Cover Img',
        'is_file' => 1,
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
      'created_at' => 
      array (
        'columndisplay' => 'Created',
        'is_file' => 0,
        'columnvisible' => 1,
        'columninpreview' => 0,
        'fk' => 0,
        'primary' => 1,
        'auto' => 0,
      ),
      'updated_at' => 
      array (
        'columndisplay' => 'updated_at',
        'is_file' => 0,
        'columnvisible' => 0,
        'columninpreview' => 0,
        'fk' => 0,
        'primary' => 1,
        'auto' => 0,
      ),
    ),
  ),
);

?>