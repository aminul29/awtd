<?php
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  $prefix = 'cs_slide_options';

  CSF::createMetabox( $prefix, array(
    'title'     => 'Slide Options',
    'post_type' => 'slide',

  ) );

  CSF::createSection( $prefix, array(
    'title'  => 'Button Settings',
    'fields' => array(
      array(
        'id'    => 'slide_button_text',
        'type'  => 'text',
        'title' => 'Button Text',
        'default' => 'Learn More',
      ),
      array(
        'id'    => 'slide_button_url',
        'type'  => 'text',
        'title' => 'Button URL',
        'default' => '#',
      ),
      array(
          'id'    => 'slide_button_target',
          'type'  => 'checkbox',
          'title' => 'Open Link in New Tab?',
          'label' => 'Check to open the link in a new browser tab.',
          'desc'  => 'If checked, the button link will open in a new tab (_blank).',
      ),
    )
  ) );

}
