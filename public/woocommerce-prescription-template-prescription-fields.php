<?php
    function quest_prescription_frontend_user_field_two_pd() {
      $data_array = get_user_meta(get_current_user_id(), 'these_second_options', true);
      $field_info = json_decode($data_array, TRUE);
    //  if ( ! empty ( $field_info['quest-right-od-sph']) and  ! empty ( $field_info['quest-left-os-sph'] ) ) {

      $SPH_min_array = array();
      $SPH_max_array = array();
      $CYL_min_array = array();
      $CYL_max_array = array();
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
          $get_post_meta = get_post_meta( $product_id, '_redeem_in_stores', true  );

          $SPD_min = array();
          foreach ($get_post_meta as $key => $meta) {
                $get_field = get_post_meta($meta);
                $SPD_min[] = min($get_field['_lense_SPD_radius_min']);
                $SPD_max[] = min($get_field['_lense_SPD_radius_max']);
                $CYL_min[] = min($get_field['_lense_cylynder_radius_min']);
                $CYL_max[] = min($get_field['_lense_cylynder_radius_max']);

          }
          $SPH_min_array[] = $get_field['_lense_SPD_radius_min'][0];
          $SPH_max_array[] = $get_field['_lense_SPD_radius_max'][0];
          $CYL_min_array[] = $get_field['_lense_cylynder_radius_min'][0];
          $CYL_max_array[] = $get_field['_lense_cylynder_radius_max'][0];

      }
    //  print_r( min($CYL_min_array) );
      function quest_select_field_output($min, $max, $step, $class_name, $type, $name, $id, $style, $default, $value_min, $value_max) {
        $html_tag .= '<select data-max="'.$value_max.'" data-min="'.$value_min.'" name="'.$name.'" class=" select-input '.$class_name.'"  type="'.$type.'" id="'.$id.'" style="'.$style.'" >';
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


      $data_array = get_user_meta(get_current_user_id(), 'these_second_options', true);
      $field_info = json_decode($data_array, TRUE);
      //print_r( $field_info );


     $field .= '<div style="display:none;" class="quest-front-end-prescription-container" data-hash="start" >';

     $field .= '<span id="display" ></span>
      <div class="my-account-input-container">
        <label class="my-account-input-title" >Glasses prescription</label>

      </div>';

      $field .= '<label for="my-account-input-fields" >';

      $field .= '<div class="input-container" >
        <label class="my-account-input-field-text" >Right (OD)</label>
      </div>';
      $field .= '<div class="input-container" >
        <label class="field-label-text">SPH</label>
        <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="Sphere indicates the amount of lens power, measured in diopetrs(D), prescribed to correct nearsightedness or farsightedness"></a>
        '.quest_select_field_output(-16, 8, 0.25, 'postbox my-account-input-field field_classes', 'number', 'quest-right-od-sph', 'quest-right-od-sph', '', $field_info['quest-right-od-sph'], max($SPH_min_array),   min($SPH_max_array)).'
        </div>';

      $field .= '<div class="input-container" >
        <label class="field-label-text">CYL</label>
        <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="Cylinder indicates the amount of lens power for astigmatism, if nothing appears in this column, either you have no astigmatism is so slight that it is not necessary to correct it with your lenses"></a>
        '.quest_select_field_output(-7, 7, 0.25, 'postbox my-account-input-field field_classes', 'number', 'quest-right-od-cyl', 'quest-right-od-cyl', '', $field_info['quest-right-od-cyl'] , max($CYL_min_array),   min($CYL_max_array)).'
        </div>';

      $field .= '<div class="input-container" >
        <label class="field-label-text">AXIS</label>
        <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="The axis number on your prescription tells in which direction they must position any cylindrical power in your lenses (required for people with astigmatism)"></a>
        '.quest_select_field_output(0, 180, 1, 'postbox my-account-input-field field_classes', 'number', 'quest-right-od-axis', 'quest-right-od-axis', '', $field_info['quest-right-od-axis']  , '', '').'
        </div>';

      $field .= '  <div class="input-container" >
          <label class="field-label-text">ADD</label>
          <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="ADD, is the additional corrections required for reading. Sometimes NEAR is used instead of ADD. When you have one numbers, leave it to 0"></a>
          '.quest_select_field_output(-0, 3.5, 0.25, 'postbox my-account-input-field field_classes', 'number', 'quest-right-od-add', 'quest-right-od-add', '', $field_info['quest-right-od-add']  , '', '').'
        </div>';

      $field .= '</label>
      <label for="my-account-input-fields" >';

      $field .= '<div class="input-container" >
        <label class="my-account-input-field-text" >Left  (OS)</label>
      </div>';


      $field .= '<div class="input-container" >
        <label class="field-label-text">SPH</label>
        <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="Sphere indicates the amount of lens power, measured in diopetrs(D), prescribed to correct nearsightedness or farsightedness"></a>
        '.quest_select_field_output(-16, 8, 0.25, 'postbox my-account-input-field field_classes', 'select', 'quest-left-os-sph', 'quest-left-os-sph', '', $field_info['quest-left-os-sph'] , max($SPH_min_array),   min($SPH_max_array)).'
      </div>';

      $field .= '  <div class="input-container" >
          <label class="field-label-text">CYL</label>
          <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="Cylinder indicates the amount of lens power for astigmatism, if nothing appears in this column, either you have no astigmatism is so slight that it is not necessary to correct it with your lenses"></a>
          '.quest_select_field_output(-7, 7, 0.25, 'postbox my-account-input-field field_classes', 'select', 'quest-left-os-cyl', 'quest-left-os-cyl', '', $field_info['quest-left-os-cyl'] , max($CYL_min_array),   min($CYL_max_array)).'
          </div>';

      $field .= '<div class="input-container" >
        <label class="field-label-text">AXIS</label>
        <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="The axis number on your prescription tells in which direction they must position any cylindrical power in your lenses (required for people with astigmatism)"></a>
        '.quest_select_field_output(0, 180, 1, 'postbox my-account-input-field field_classes', 'select', 'quest-left-os-axis', 'quest-left-os-axis', '', $field_info['quest-left-os-axis']  , '', '').'
        </div>';

      $field .= '<div  class="input-container" >
        <label class="field-label-text">ADD</label>
        <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="ADD, is the additional corrections required for reading. Sometimes NEAR is used instead of ADD. When you have one numbers, leave it to 0"></a>
        '.quest_select_field_output(0, 3.5, 0.25, 'postbox my-account-input-field field_classes', 'select', 'quest-left-os-add', 'quest-left-os-add', '', $field_info['quest-left-os-add']  , '', '').'
        </div>';


      $field .=
      '<div id="field-2pd-hide" style="margin-top: 5%; margin-left: 10%; padding: 4%; background-color: #e7e8e8; margin-bottom: 5%;"  class="field-2pd-hide input-container" >
        <label  class="field-2pd-hide field-label-text-side">Dual PD</label>
        <a class="field-2pd-hide field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="Pupilar distance is the distance from the centre of one pupil to the centre of the other pupil measured in mm. If you have 2 PD numbers then make sure to add them to proper eye"></a>
        '.quest_select_field_output(-7, 7, 0.25, 'field-2pd-hide postbox my-account-input-field field_classes', 'select', 'quest-left-os-pd', 'quest-left-os-pd', '', $field_info['quest-left-os-pd'], $dual_pd_left_from, $dual_pd_left_to).'
        <label class="field-2pd-hide field-label-text-side"></label>
        <a class="field-2pd-hide field-label-info"  ></a>
        '.quest_select_field_output(-7, 7, 0.25, 'field-2pd-hide postbox my-account-input-field field_classes', 'number', 'quest-right-od-pd', 'quest-right-od-pd', '', $field_info['quest-right-od-pd'], $dual_pd_right_from, $dual_pd_right_to).'
        <div style="margin-top: 5%; margin-left: 5%;" class="field-2pd-hide field-2pd-second" >
          <p class="my-account-input-info" ><a > I have 1 PD number </a></p>
          <p class="my-account-input-info" ><a > How to find your PD </a></p>
        </div>
      </div>
      ';


      $field .=
      '<div style="display: none; margin-top: 5%; margin-left: 10%; padding: 4%; background-color: #e7e8e8; margin-bottom: 5%;" class="input-container  left-field-show" >
        <label style="display: none" class="left-field-show field-label-text-side">Single PD</label>
        <a style="display: none" class="field-label-info  left-field-show"  ></a>
        '.quest_select_field_output(35, 70, 0.5, 'postbox my-account-input-field field_classes left-field-show', 'number', 'quest-single-pd', 'quest-single-pd', 'display:none;', $field_info['quest-single-pd'], $singe_pd_from, $singe_pd_to).'
        <div style="display: none;"  style="margin-top: 5%; margin-left: 5%;" class="field-1pd-second" >
          <p  class="my-account-input-info" ><a> I have 2 PD number </a></p>
          <p class="my-account-input-info" ><a > How to find your PD </a></p>
        </div>
      </div>
      ';

      $field .= '</label>
      <p><a class="quest-prescription-button col-lg-offset-1" >Saved Prescription</a><a onclick="quest_save_cool_options()" class="filter-inputs-error front-end-lenses-next save-this-options"  >Next step</a></p>
      <p class="col-lg-offset-1 clear-all-fields" ><input type="checkbox"  class="clear-all-fields">I want glasses without prescription. Fashion lenses<br></p>
      </div>
      ';

      print $field;
      //}
    }


function prescription_frontend_user_field_two_pd() {

      //if ( ! empty ( $field_info['right-od-sph']) ) {
          $SPH_min_array = array();
          $SPH_max_array = array();
          $CYL_min_array = array();
          $CYL_max_array = array();
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
              $get_post_meta = get_post_meta( $product_id, '_redeem_in_stores', true  );

              $SPD_min = array();
              foreach ($get_post_meta as $key => $meta) {
                    $get_field = get_post_meta($meta);
                    $SPD_min[] = min($get_field['_lense_SPD_radius_min']);
                    $SPD_max[] = min($get_field['_lense_SPD_radius_max']);
                    $CYL_min[] = min($get_field['_lense_cylynder_radius_min']);
                    $CYL_max[] = min($get_field['_lense_cylynder_radius_max']);

              }
              $SPH_min_array[] = $get_field['_lense_SPD_radius_min'][0];
              $SPH_max_array[] = $get_field['_lense_SPD_radius_max'][0];
              $CYL_min_array[] = $get_field['_lense_cylynder_radius_min'][0];
              $CYL_max_array[] = $get_field['_lense_cylynder_radius_max'][0];

          }
        //  print_r( min($CYL_min_array) );
          function select_field_output($min, $max, $step, $class_name, $type, $name, $id, $style, $default, $value_min, $value_max) {
            $html_tag .= '<select data-max="'.$value_max.'" data-min="'.$value_min.'" name="'.$name.'" class=" select-input '.$class_name.'"  type="'.$type.'" id="'.$id.'" style="'.$style.'" >';
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


          $data_array = get_user_meta(get_current_user_id(), 'these_second_options', true);
          $field_info = json_decode($data_array, TRUE);
          //print_r( $field_info );
          $field .= '<div  class="front-end-prescription-container" data-hash="start" >';

          $field .= '<span id="display" ></span>
            <div class="my-account-input-container">
            <label class="my-account-input-title" >Glasses prescription</label>
          </div>';

          $field .= '<label for="my-account-input-fields" >';

          $field .= '<div class="input-container" >
            <label class="my-account-input-field-text" >Right (OD)</label>
          </div>';
          $field .= '<div class="input-container" >
            <label class="field-label-text">SPH</label>
            <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="Sphere indicates the amount of lens power, measured in diopetrs(D), prescribed to correct nearsightedness or farsightedness"></a>
            '.select_field_output(-16, 8, 0.25, 'postbox my-account-input-field field_classes', 'number', 'right-od-sph', 'right-od-sph', '', $field_info['right-od-sph'] , max($SPH_min_array),   min($SPH_max_array) ).'
            </div>';

          $field .= '<div class="input-container" >
            <label class="field-label-text">CYL</label>
            <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="Cylinder indicates the amount of lens power for astigmatism, if nothing appears in this column, either you have no astigmatism is so slight that it is not necessary to correct it with your lenses"></a>
            '.select_field_output(-7, 7, 0.25, 'postbox my-account-input-field field_classes', 'number', 'right-od-cyl', 'right-od-cyl', '', $field_info['right-od-cyl'] , max($CYL_min_array),   min($CYL_max_array)).'
            </div>';

          $field .= '<div class="input-container" >
            <label class="field-label-text">AXIS</label>
            <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="The axis number on your prescription tells in which direction they must position any cylindrical power in your lenses (required for people with astigmatism)"></a>
            '.select_field_output(0, 180, 1, 'postbox my-account-input-field field_classes', 'number', 'right-od-axis', 'right-od-axis', '', $field_info['right-od-axis'] , '', '').'
            </div>';

          $field .= '  <div class="input-container" >
              <label class="field-label-text">ADD</label>
              <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="ADD, is the additional corrections required for reading. Sometimes NEAR is used instead of ADD. When you have one numbers, leave it to 0"></a>
              '.select_field_output(0, 3.5, 0.25, 'postbox my-account-input-field field_classes', 'number', 'right-od-add', 'right-od-add', '', $field_info['right-od-add'] , '', '').'
            </div>';

          $field .= '</label>
          <label for="my-account-input-fields" >';

          $field .= '<div class="input-container" >
            <label class="my-account-input-field-text" >Left  (OS)</label>
          </div>';


          $field .= '<div class="input-container" >
            <label class="field-label-text">SPH</label>
            <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="Sphere indicates the amount of lens power, measured in diopetrs(D), prescribed to correct nearsightedness or farsightedness"></a>
            '.select_field_output(-16, 8, 0.25, 'postbox my-account-input-field field_classes', 'select', 'left-os-sph', 'left-os-sph', '', $field_info['left-os-sph'] , max($SPH_min_array),   min($SPH_max_array)).'
          </div>';

          $field .= '  <div class="input-container" >
              <label class="field-label-text">CYL</label>
              <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="Cylinder indicates the amount of lens power for astigmatism, if nothing appears in this column, either you have no astigmatism is so slight that it is not necessary to correct it with your lenses"></a>
              '.select_field_output(-7, 7, 0.25, 'postbox my-account-input-field field_classes', 'select', 'left-os-cyl', 'left-os-cyl', '', $field_info['left-os-cyl'] , max($CYL_min_array),   min($CYL_max_array)).'
              </div>';

          $field .= '<div class="input-container" >
            <label class="field-label-text">AXIS</label>
            <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="The axis number on your prescription tells in which direction they must position any cylindrical power in your lenses (required for people with astigmatism)"></a>
            '.select_field_output(0, 180, 1, 'postbox my-account-input-field field_classes', 'select', 'left-os-axis', 'left-os-axis', '', $field_info['left-os-axis'], '', '').'
            </div>';

          $field .= '<div  class="input-container" >
            <label class="field-label-text">ADD</label>
            <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="ADD, is the additional corrections required for reading. Sometimes NEAR is used instead of ADD. When you have one numbers, leave it to 0"></a>
            '.select_field_output(0, 3.5, 0.25, 'postbox my-account-input-field field_classes', 'select', 'left-os-add', 'left-os-add', '', $field_info['left-os-add'], '', '').'
            </div>';


          $field .=
          '<div id="field-2pd-hide" style="margin-top: 5%; margin-left: 10%; padding: 4%; background-color: #e7e8e8; margin-bottom: 5%;"  class="field-2pd-hide input-container" >
            <label  class="field-2pd-hide field-label-text-side">Dual PD</label>
            <a class="field-2pd-hide field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="Pupilar distance is the distance from the centre of one pupil to the centre of the other pupil measured in mm. If you have 2 PD numbers then make sure to add them to proper eye"></a>
            '.select_field_output(-7, 7, 0.25, 'field-2pd-hide postbox my-account-input-field field_classes', 'select', 'left-os-pd', 'left-os-pd', '', $field_info['left-os-pd'], $dual_pd_left_from, $dual_pd_left_to ).'
            <label class="field-2pd-hide field-label-text-side"></label>
            <a class="field-2pd-hide field-label-info"  ></a>
            '.select_field_output(-7, 7, 0.25, 'field-2pd-hide postbox my-account-input-field field_classes', 'number', 'right-od-pd', 'right-od-pd', '', $field_info['right-od-pd'], $dual_pd_right_from, $dual_pd_right_to ).'
            <div style="margin-top: 5%; margin-left: 5%;" class="field-2pd-hide field-2pd-second" >
              <p class="my-account-input-info" ><a > I have 1 PD number </a></p>
              <p class="my-account-input-info" ><a > How to find your PD </a></p>
            </div>
          </div>
          ';


          $field .=
          '<div style="display: none; margin-top: 5%; margin-left: 10%; padding: 4%; background-color: #e7e8e8; margin-bottom: 5%;" class="input-container  left-field-show" >
            <label style="display: none" class="left-field-show field-label-text-side">Single PD</label>
            <a style="display: none" class="field-label-info  left-field-show"  ></a>
            '.select_field_output(35 , 70 , 0.5, 'postbox my-account-input-field field_classes left-field-show', 'number', 'single-pd', 'single-pd', 'display:none;', $field_info['single-pd'], $singe_pd_from, $singe_pd_to).'
            <div style="display: none;"  style="margin-top: 5%; margin-left: 5%;" class="field-1pd-second" >
              <p  class="my-account-input-info" ><a> I have 2 PD number </a></p>
              <p class="my-account-input-info" ><a > How to find your PD </a></p>
            </div>
          </div>
          ';

          $field .= '</label>
            <p><a class="nbs-ajax-save prescription-button col-lg-offset-1" >New Prescription</a><a  class="filter-inputs-error front-end-lenses-next save-this-options"  >Next step</a></p>
            <p class="col-lg-offset-1 clear-all-fields" ><input type="checkbox" " >I want glasses without prescription. Fashion lenses<br></p>
          </div>
          ';

    print $field;
  //}
}
