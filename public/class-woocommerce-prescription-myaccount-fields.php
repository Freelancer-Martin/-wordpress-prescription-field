<?php

function prescription_add_endpoint() {
    add_rewrite_endpoint( 'prescription', EP_ROOT | EP_PAGES );
}

add_action( 'init', 'prescription_add_endpoint' );


// ------------------
// 2. Add new query var

function prescription_query_vars( $vars ) {
    $vars[] = 'prescription';
    return $vars;
}

add_filter( 'query_vars', 'prescription_query_vars', 0 );


function prescription_link_my_account( $items ) {
    $items['prescription'] = 'Prescription Field';
    return $items;
}

add_filter( 'woocommerce_account_menu_items', 'prescription_link_my_account' );


function prescription_cool_options() {
    global $wpdb;

    $TheseOptionsItemArrays = array(

        'right-od-sph' => $_POST['right_od_sph'],
        'right-od-cyl' => $_POST['right_od_cyl'],
        'right-od-axis' => $_POST['right_od_axis'],
        'right-od-add' => $_POST['right_od_add'],
        'right-od-pd' => $_POST['right_od_pd'],
        'left-os-sph' => $_POST['left_os_sph'],
        'left-os-cyl' => $_POST['left_os_cyl'],
        'left-os-axis' => $_POST['left_os_axis'],
        'left-os-add' => $_POST['left_os_add'],
        'left-os-pd' => $_POST['left_os_pd'],
        'single-pd' => $_POST['single_pd'],
        'quest-right-od-sph' => $_POST['quest_right_od_sph'],
        'quest-right-od-cyl' => $_POST['quest_right_od_cyl'],
        'quest-right-od-axis' => $_POST['quest_right_od_axis'],
        'quest-right-od-add' => $_POST['quest_right_od_add'],
        'quest-right-od-pd' => $_POST['quest_right_od_pd'],
        'quest-left-os-sph' => $_POST['quest_left_os_sph'],
        'quest-left-os-cyl' => $_POST['quest_left_os_cyl'],
        'quest-left-os-axis' => $_POST['quest_left_os_axis'],
        'quest-left-os-add' => $_POST['quest_left_os_add'],
        'quest-left-os-pd' => $_POST['quest_left_os_pd'],
        'quest-single-pd' => $_POST['quest_single_pd'],


    );

      $TheseOptionsDatas = json_encode($TheseOptionsItemArrays);
      //update_option('these_second_options', $TheseOptionsDatas );
      update_user_meta( get_current_user_id(), 'these_second_options', $TheseOptionsDatas );

    //update_user_meta( get_current_user_id(), 'cool_json_option', $itemArray );

    echo 'true';

    die();
}


function lenses_price_options() {
    global $wpdb; // this is how you get access to the database

    $itemArray = array(

        'lense-price' => $_POST['lense_price'],
        'lenses-final-name' => $_POST['lenses_final_name'],


      );

      $saveData = json_encode($itemArray);
    //  update_option('lenses_type_settings', $saveData);
      update_user_meta( get_current_user_id(), 'lenses_price_settings', $saveData );
    //update_user_meta( get_current_user_id(), 'cool_json_option', $itemArray );

    echo 'true';

    die();
}


function lenses_type_options() {
    global $wpdb; // this is how you get access to the database

    $TypeArray = array(

        'lense-style-new' => $_POST['lense_style_new'],
        'lenses-type' => $_POST['lenses_type'],

      );

      $saveTypeData = json_encode($TypeArray);
    //  update_option('lenses_type_settings', $saveData);
      update_user_meta( get_current_user_id(), 'lenses_type_settings', $saveTypeData );
    //update_user_meta( get_current_user_id(), 'cool_json_option', $itemArray );

    echo 'true';

    die();
}

add_action('wp_ajax_nopriv_prescription_cool_options', 'prescription_cool_options');
add_action('wp_ajax_nopriv_lenses_type_options', 'lenses_type_options');
add_action('wp_ajax_nopriv_lenses_price_options', 'lenses_price_options');
add_action('wp_ajax_prescription_cool_options',  'prescription_cool_options');
add_action('wp_ajax_lenses_type_options',  'lenses_type_options');
add_action('wp_ajax_lenses_price_options',  'lenses_price_options');
add_action( 'show_user_profile', 'prescription_frontend_user_field' );
add_action( 'edit_user_profile', 'prescription_frontend_user_field' );
add_action( 'woocommerce_account_prescription_endpoint', 'prescription_frontend_user_field' );


function prescription_frontend_user_field() {
  /*
  $args = array(
     'post_type'      => 'product',
     'posts_per_page' => 11,
 );

 $loop = new WP_Query( $args );
 $dual_pd_right_to_array = array();
 $dual_pd_right_from_array = array();
 $dual_pd_left_to = array();
 $dual_pd_left_from = array();
 $singe_pd_to = array();
 $single_pd_from_array = array();
 $cool_options = get_option('these_second_options');
 $data_array = json_decode($cool_options, TRUE);
 if ( ! empty( get_post_meta( $data_array['product_id'], '_valid_dual_pd_range_right_to', true ) ) ){
     $dual_pd_right_to = get_post_meta( $data_array['product_id'], '_valid_dual_pd_range_right_to', true );
 }
 if ( ! empty( get_post_meta( $data_array['product_id'], '_valid_dual_pd_range_right_from', true ) ) ){

 }
 $dual_pd_right_from = get_post_meta( $data_array['product_id'], '_valid_dual_pd_range_right_from', true );


/*
       while ( $loop->have_posts() ) : $loop->the_post();
            global $product;
            $id = $product->get_id();

      $dual_pd_right_to_array[] = $dual_pd_right_to;
      $dual_pd_right_from_array[] = $dual_pd_right_to;
      $dual_pd_left_to_array[] = $dual_pd_left_to;
      $dual_pd_left_from_array[] = $dual_pd_left_from;
      $singe_pd_to_array[] = $singe_pd_to;
      $single_pd_from_array[] = $single_pd_from;
      $get_fields =
      //print_r(get_post_meta(38));
      endwhile;
      print_r( array_unique($dual_pd_right_to_array) );

      wp_reset_query();

    foreach( WC()->cart->get_cart() as $cart_item ){
        $product_id = $cart_item['product_id'];
        $r = get_post_meta($product_id);
        $dual_pd_left_to = get_post_meta( $product_id, '_valid_dual_pd_range_left_to', true );
        if ( ! empty( get_post_meta( $product_id, '_valid_dual_pd_range_right_to', true ) ) ){
            $dual_pd_right_to = get_post_meta( $product_id, '_valid_dual_pd_range_right_to', true );
        }
        if ( ! empty( get_post_meta( $product_id, '_valid_dual_pd_range_right_from', true ) ) ){
            $dual_pd_right_from = get_post_meta( $product_id, '_valid_dual_pd_range_right_from', true );
        }
        if ( ! empty( get_post_meta( $product_id, '_valid_dual_pd_range_left_to', true ) ) ){
            $dual_pd_left_to = get_post_meta( $product_id, '_valid_dual_pd_range_left_to', true );
        }
        if ( ! empty( get_post_meta( $product_id, '_valid_dual_pd_range_left_from', true ) ) ){
            $dual_pd_left_from = get_post_meta( $product_id, '_valid_dual_pd_range_left_from', true );
        }
        if ( ! empty( get_post_meta( $product_id, '_valid_singe_pd_ranfe_to', true ) ) ){
            $singe_pd_to = get_post_meta( $product_id, '_valid_singe_pd_ranfe_to', true );
        }
        if ( ! empty( get_post_meta( $product_id, '_valid_singe_pd_ranfe_from', true ) ) ){
            $singe_pd_from = get_post_meta( $product_id, '_valid_singe_pd_ranfe_from', true );
        }
        print_r($dual_pd_left_to);
        print_r($dual_pd_left_from);
    }
*/
function select_field_output($min, $max, $step, $class_name, $type, $name, $id, $default /*, $value_min, $value_max */) {

      $html_tag .= '<select name="'.$name.'" class=" select-input '.$class_name.'"  type="'.$type.'" id="'.$id.'" >';
        for ($x = $min; $x <= $max; $x += $step) {

          if ( $x == $default  )
            {
              $html_tag .= '<option value="'.$default.'" selected>'.$default.'</option>';

            }
            else {
              $html_tag .= '<option value="'.$x.'">'.$x.'</option>';
            }

          }


      $html_tag .= '</select>';
      return $html_tag;
    }

    //$data_array = get_option( 'these_second_options' );
    //$field_info = json_decode($data_array, TRUE);
    $decode_field = get_user_meta(get_current_user_id(), 'these_second_options', true);
    $field_info = json_decode($field_info, TRUE);
    $field .= '<div class="front-end-prescription-container"  >';

    $field .= '<span id="displays" ></span>
    <div class="my-account-input-container">
      <label class="my-account-input-title" >Glasses prescription</label>
      <a class="save-this-options" >Save</a>
    </div>';

    $field .= '<label for="my-account-input-fields" style="display: flex;">';

    $field .= '<div class="input-container" >
      <label class="my-account-input-field-text" >Right (OD)</label>
    </div>';
    $field .= '<div class="input-container" >
      <label class="field-label-text">SPH</label>
      <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="Sphere indicates the amount of lens power, measured in diopetrs(D), prescribed to correct nearsightedness or farsightedness"></a>
      '.select_field_output(-16, 8, 0.25, 'postbox my-account-input-field field_classes', 'number', 'right-od-sph', 'right-od-sph', $field_info['right-od-sph']).'
      </div>';

    $field .= '<div class="input-container" >
      <label class="field-label-text">CYL</label>
      <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="Cylinder indicates the amount of lens power for astigmatism, if nothing appears in this column, either you have no astigmatism is so slight that it is not necessary to correct it with your lenses"></a>
      '.select_field_output(-7, 7, 0.25, 'postbox my-account-input-field field_classes', 'number', 'right-od-cyl', 'right-od-cyl', $field_info['right-od-cyl']).'
      </div>';

    $field .= '<div class="input-container" >
      <label class="field-label-text">AXIS</label>
      <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="The axis number on your prescription tells in which direction they must position any cylindrical power in your lenses (required for people with astigmatism)"></a>
      '.select_field_output(0, 180, 1, 'postbox my-account-input-field field_classes', 'number', 'right-od-axis', 'right-od-axis', $field_info['right-od-axis']).'
      </div>';

    $field .= '  <div class="input-container" >
      <label class="field-label-text">ADD</label>
      <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="ADD, is the additional corrections required for reading. Sometimes NEAR is used instead of ADD. When you have one numbers, leave it to 0"></a>
      '.select_field_output(0, 3.5, 0.25, 'postbox my-account-input-field field_classes', 'number', 'right-od-add', 'right-od-add', $field_info['right-od-add']).'
      </div>';

    $field .= '<div style="margin-left: 5%" class="input-container hide-two-pd-field" >
      <label  class="field-label-text">PD</label>
      <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="Pupilar distance is the distance from the centre of one pupil to the centre of the other pupil measured in mm. If you have 2 PD numbers then make sure to add them to proper eye"></a>
      '.select_field_output(-7, 7, 0.25, 'postbox my-account-input-field field_classes', 'select', 'left-os-pd', 'left-os-pd', $field_info['left-os-pd']).'
      </div>';

    $field .= '<div class="input-container single-one-pd-show"  style="display: none; margin-left: 5%;">
        <label style="display: none" class="left-field-show field-label-text-side">Single PD</label>
        <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="Pupilar distance is the distance from the centre of one pupil to the centre of the other pupil measured in mm. If you have 2 PD numbers then make sure to add them to proper eye"></a>
        '.select_field_output(35, 70, 0.25, 'postbox my-account-input-field field_classes', 'number', 'single-pd', 'single-pd', $field_info['single-pd']).'
      </div>';


    $field .= '</label>
    <label for="my-account-input-fields" style="display: flex;">';

    $field .= '<div class="input-container" >
      <label class="my-account-input-field-text" >Left  (OS)</label>
    </div>';


    $field .= '<div class="input-container" >
      <label class="field-label-text">SPH</label>
      <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="Sphere indicates the amount of lens power, measured in diopetrs(D), prescribed to correct nearsightedness or farsightedness"></a>
      '.select_field_output(-16, 8, 0.25, 'postbox my-account-input-field field_classes', 'select', 'left-os-sph', 'left-os-sph', $field_info['left-os-sph']).'
    </div>';

    $field .= '  <div class="input-container" >
      <label class="field-label-text">CYL</label>
      <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="Cylinder indicates the amount of lens power for astigmatism, if nothing appears in this column, either you have no astigmatism is so slight that it is not necessary to correct it with your lenses"></a>
      '.select_field_output(-7, 7, 0.5, 'postbox my-account-input-field field_classes', 'select', 'left-os-cyl', 'left-os-cyl', $field_info['left-os-cyl']).'
      </div>';

    $field .= '<div class="input-container" >
      <label class="field-label-text">AXIS</label>
      <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="The axis number on your prescription tells in which direction they must position any cylindrical power in your lenses (required for people with astigmatism)"></a>
      '.select_field_output(0, 180, 1, 'postbox my-account-input-field field_classes', 'select', 'left-os-axis', 'left-os-axis', $field_info['left-os-axis']).'
      </div>';

    $field .= '<div  class="input-container" >
      <label class="field-label-text">ADD</label>
      <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="ADD, is the additional corrections required for reading. Sometimes NEAR is used instead of ADD. When you have one numbers, leave it to 0"></a>
      '.select_field_output(0, 3.5, 0.25, 'postbox my-account-input-field field_classes', 'select', 'left-os-add', 'left-os-add', $field_info['left-os-add']).'
      </div>';


    $field .= '<div class="input-container hide-two-pd-field"  style="margin-left: 5%;">
      <label class="field-label-text">PD</label>
      <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="Pupilar distance is the distance from the centre of one pupil to the centre of the other pupil measured in mm. If you have 2 PD numbers then make sure to add them to proper eye"></a>
      '.select_field_output(-7, 7, 0.25, 'postbox my-account-input-field field_classes', 'number', 'right-od-pd', 'right-od-pd', $field_info['right-od-pd']).'
      </div>';

    $field .= '<div class="input-container single-one-pd-show"  style=" visibility: hidden; display:none; margin-left: 5%;">
        <label style="display: none" class="left-field-show field-label-text-side">Single PD</label>
        <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="Pupilar distance is the distance from the centre of one pupil to the centre of the other pupil measured in mm. If you have 2 PD numbers then make sure to add them to proper eye"></a>
        '.select_field_output(-7, 7, 0.25, 'postbox my-account-input-field field_classes', 'number', 'single-pd', 'single-pd', $field_info['single-pd']).'
    </div>';


    $field .= '<div style="right: 0; position: absolute; margin-top: 6em; display: inline-block;margin-top: 5%; margin-left: 5%;" class="hide-two-pd-field field-2pd input-container" >
      <p class="my-account-input-info" ><a > I have 1 PD number </a></p>
      <p class="my-account-input-info" ><a > How to find your PD </a></p>
    </div>';

    $field .= '<div style="right: 0; position: absolute; margin-top: 6em; display: none; margin-top: 5%; margin-left: 5%;" class="field-1pd input-container" >
      <p  class="my-account-input-info" ><a> I have 2 PD number </a></p>
      <p class="my-account-input-info" ><a > How to find your PD </a></p>
    </div>';



    $field .= '</label>
    </div>';

    print $field;

}
