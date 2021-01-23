<?php
define( 'ATTACHMENTS_SETTINGS_SCREEN', false );
add_filter( 'attachments_default_instance', '__return_false' );
function eventoo_events_attachments($attachments ){
  $post_id = null;
      if(isset($_REQUEST['post'])||isset($_REQUEST['post_ID'])){
          $post_id = empty($_REQUEST['post_ID'])?$_REQUEST['post']:$_REQUEST['post_ID'];
      }
      if($post_id != 82){
          return;
      }
  $fields         = array(
      array(
        'name'      => 'title',                      
        'type'      => 'text',                         
        'label'     => __( 'Title', 'attachments' ),    
      )
      );
      $args = array(
          'label'         => 'Event Slider',
          'post_type'     => array( 'page' ),
          'filetype'      => array('image'),
          'note'          => 'Add Slider Images',
          'button_text'   => __( 'Attach Files', 'eventoo' ),
          'fields'        => $fields,
        );
        $attachments->register( 'event', $args );
}
add_action( 'attachments_register', 'eventoo_events_attachments' );
function eventoo_gallery_attachments($attachments ){
  $post_id = null;
      if(isset($_REQUEST['post'])||isset($_REQUEST['post_ID'])){
          $post_id = empty($_REQUEST['post_ID'])?$_REQUEST['post']:$_REQUEST['post_ID'];
      }
      if($post_id != 82){
          return;
      }
  $fields         = array(
      array(
        'name'      => 'title',                      
        'type'      => 'text',                         
        'label'     => __( 'Title', 'attachments' ),    
      )
      );
      $args = array(
          'label'         => 'Gallery Slider',
          'post_type'     => array( 'page' ),
          'filetype'      => array('image'),
          'note'          => 'Add Slider Images',
          'button_text'   => __( 'Attach Files', 'eventoo' ),
          'fields'        => $fields,
        );
        $attachments->register( 'gallery', $args );
}
add_action( 'attachments_register', 'eventoo_gallery_attachments' );
function eventoo_shedule_attachments($attachments ){
  $post_id = null;
      if(isset($_REQUEST['post'])||isset($_REQUEST['post_ID'])){
          $post_id = empty($_REQUEST['post_ID'])?$_REQUEST['post']:$_REQUEST['post_ID'];
      }
      if($post_id != 82){
          return;
      }
  $fields         = array(
      array(
        'name'      => 'time',                      
        'type'      => 'text',                         
        'label'     => __( 'Time', 'attachments' ),    
      ),
      array(
        'name'      => 'name',                      
        'type'      => 'text',                         
        'label'     => __( 'Name', 'attachments' ),    
      ),
      array(
        'name'      => 'designation',                      
        'type'      => 'text',                         
        'label'     => __( 'Designation', 'attachments' ),    
      ),
      array(
        'name'      => 'icon',                      
        'type'      => 'textarea',                         
        'label'     => __( 'Icon|Link', 'attachments' ),    
      )
      );
      $args = array(
          'label'         => 'Shedule and Speaker',
          'post_type'     => array( 'page' ),
          'filetype'      => array('image'),
          'note'          => 'Add Speaker Details',
          'button_text'   => __( 'Attach Files', 'eventoo' ),
          'fields'        => $fields,
        );
        $attachments->register( 'shedule', $args );
}
add_action( 'attachments_register', 'eventoo_shedule_attachments' );
function eventoo_upcomingevent_attachments($attachments ){
  $post_id = null;
      if(isset($_REQUEST['post'])||isset($_REQUEST['post_ID'])){
          $post_id = empty($_REQUEST['post_ID'])?$_REQUEST['post']:$_REQUEST['post_ID'];
      }
      if($post_id != 82){
          return;
      }
  $fields         = array(
      array(
        'name'      => 'eventname',                      
        'type'      => 'text',                         
        'label'     => __( 'Event Name', 'attachments' ),    
      ),
      array(
        'name'      => 'location',                      
        'type'      => 'text',                         
        'label'     => __( 'Location', 'attachments' ),    
      ),
      array(
        'name'      => 'phone',                      
        'type'      => 'text',                         
        'label'     => __( 'Phone', 'attachments' ),    
      ),
      array(
        'name'      => 'button',                      
        'type'      => 'text',                         
        'label'     => __( 'Button Text', 'attachments' ),    
      ),
      array(
        'name'      => 'buttonlink',                      
        'type'      => 'text',                         
        'label'     => __( 'Button URL', 'attachments' ),    
      ),
      );
      $args = array(
          'label'         => 'Upcoming Event',
          'post_type'     => array( 'page' ),
          'filetype'      => array('image'),
          'note'          => 'Add Event Details',
          'button_text'   => __( 'Attach Files', 'eventoo' ),
          'fields'        => $fields,
        );
        $attachments->register( 'upcomingevent', $args );
}
add_action( 'attachments_register', 'eventoo_upcomingevent_attachments' );
function eventoo_testimonial_attachments($attachments ){
  $post_id = null;
      if(isset($_REQUEST['post'])||isset($_REQUEST['post_ID'])){
          $post_id = empty($_REQUEST['post_ID'])?$_REQUEST['post']:$_REQUEST['post_ID'];
      }
      if($post_id != 82){
          return;
      }
  $fields         = array(
      array(
        'name'      => 'details',                      
        'type'      => 'textarea',                         
        'label'     => __( 'Details', 'attachments' ),    
      ),
      array(
        'name'      => 'name',                      
        'type'      => 'text',                         
        'label'     => __( 'Name', 'attachments' ),    
      ),
      array(
        'name'      => 'designation',                      
        'type'      => 'text',                         
        'label'     => __( 'Designation', 'attachments' ),    
      ),
      array(
        'name'      => 'rating',                      
        'type'      => 'select',                         
        'label'     => __( 'Rating', 'attachments' ),
        'meta'      => array(                                        
          'options'       => array(           
                '1'     => '1',
                '2'     => '2',
                '3'     => '3',
                '4'     => '4',
                '5'     => '5',
            )
        ),    
      ),
      );
      $args = array(
          'label'         => 'Feedback',
          'post_type'     => array( 'page' ),
          'filetype'      => array('image'),
          'note'          => 'Add Feedback',
          'button_text'   => __( 'Attach Files', 'eventoo' ),
          'fields'        => $fields,
        );
        $attachments->register('testimonial', $args);
}
add_action( 'attachments_register', 'eventoo_testimonial_attachments' );
function eventoo_pricing_attachments($attachments ){
  $post_id = null;
      if(isset($_REQUEST['post'])||isset($_REQUEST['post_ID'])){
          $post_id = empty($_REQUEST['post_ID'])?$_REQUEST['post']:$_REQUEST['post_ID'];
      }
      if($post_id != 82){
          return;
      }
  $fields         = array(
      array(
        'name'      => 'name',                      
        'type'      => 'text',                         
        'label'     => __( 'Name', 'attachments' ),    
      ),
      array(
        'name'      => 'price',                      
        'type'      => 'text',                         
        'label'     => __( 'Price', 'attachments' ),    
      ),
      array(
        'name'      => 'facilities',                      
        'type'      => 'textarea',                         
        'label'     => __( 'Facilities', 'attachments' ),    
      ),
      );
      $args = array(
          'label'         => 'Pricing',
          'post_type'     => array( 'page' ),
          'filetype'      => array('image'),
          'note'          => 'Add Pricing',
          'button_text'   => __( 'Attach Files', 'eventoo' ),
          'fields'        => $fields,
      
        );
        $attachments->register('pricing', $args);
}
add_action( 'attachments_register', 'eventoo_pricing_attachments' );
function eventoo_sponsor_attachments($attachments ){
  $post_id = null;
      if(isset($_REQUEST['post'])||isset($_REQUEST['post_ID'])){
          $post_id = empty($_REQUEST['post_ID'])?$_REQUEST['post']:$_REQUEST['post_ID'];
      }
      if($post_id != 82){
          return;
      }
  $fields         = array(
      array(
        'name'      => 'title',                      
        'type'      => 'text',                         
        'label'     => __( 'Title', 'attachments' ),    
      ),
      );
      $args = array(
          'label'         => 'Sponsor',
          'post_type'     => array( 'page' ),
          'filetype'      => array('image'),
          'note'          => 'Add Sponsor',
          'button_text'   => __( 'Attach Files', 'eventoo' ),
          'fields'        => $fields,
        );
        $attachments->register('sponsor', $args);
}
add_action( 'attachments_register', 'eventoo_sponsor_attachments' );
?>