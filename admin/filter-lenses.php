<?php

/*
  foreach( WC()->cart->get_cart() as $cart_item ){
      $product_id = $cart_item['product_id'];
      $single_pd_min = 35;
      $single_pd_max = 70;
      $dual_pd_min = -7;
      $dual_pd_max =  7;
      //$r = get_post_meta($product_id);
      $dual_pd_left_to = get_post_meta( $product_id, '_valid_dual_pd_range_left_to', true );
      if ( ! empty( get_post_meta( $product_id, '_valid_dual_pd_range_right_to', true ) ) ){
          $dual_pd_right_min = get_post_meta( $product_id, '_valid_dual_pd_range_right_to', true );
      }
      if ( ! empty( get_post_meta( $product_id, '_valid_dual_pd_range_right_from', true ) ) ){
          $dual_pd_right_max = get_post_meta( $product_id, '_valid_dual_pd_range_right_from', true );
      }
      if ( ! empty( get_post_meta( $product_id, '_valid_dual_pd_range_left_to', true ) ) ){
          $dual_pd_left_min = get_post_meta( $product_id, '_valid_dual_pd_range_left_to', true );
      }
      if ( ! empty( get_post_meta( $product_id, '_valid_dual_pd_range_left_from', true ) ) ){
          $dual_pd_left_max = get_post_meta( $product_id, '_valid_dual_pd_range_left_from', true );
      }
      if ( ! empty( get_post_meta( $product_id, '_valid_singe_pd_ranfe_to', true ) ) ){
          $singe_pd_min = get_post_meta( $product_id, '_valid_singe_pd_ranfe_to', true );
      }
      if ( ! empty( get_post_meta( $product_id, '_valid_singe_pd_ranfe_from', true ) ) ){
          $singe_pd_max = get_post_meta( $product_id, '_valid_singe_pd_ranfe_from', true );
      }

  //    print_r( $dual_pd_right_max );
    //  print_r( $dual_pd_right_min );
//      print_r( $dual_pd_left_max );
  //    print_r( $dual_pd_left_min );
      //print_r( $singe_pd_max );
      //print_r( $singe_pd_min );

  }

  $get_lense_fields = get_option('these_second_options');
  $show_lense_fields = json_decode( $get_lense_fields , TRUE);

  $lenses_type = get_option('lenses_type_settings');
  $leneses_array = json_decode( $lenses_type, TRUE);

  $right_od_pd = $show_lense_fields['right-od-pd'];
  $left_os_pd = $show_lense_fields['left-os-pd'];
  $single_pd = $show_lense_fields['single-pd'];
  $quest_single_pd = $show_lense_fields['quest-single-pd'];
  $quest_left_os_pd = $show_lense_fields['quest-left-os-pd'];
  $quest_right_od_pd = $show_lense_fields['quest-right-od-pd'];

  //print_r( $single_pd );
/*
// filter error for Dual right field and quest fields
  if( $left_os_pd < $dual_pd_left_max  or  $left_os_pd > $dual_pd_left_min ) {
    $filtered_quest_left_os_pd .= $left_os_pd;
    print 'This frame is recommended for prescriptions from '.$dual_pd_left_min.' to '.$dual_pd_left_max.' Our standard lens is too thick to accommodate your prescription. Contact us for more information, or keep shopping';
    return  $filtered_quest_left_os_pd;
  } else {
    $filtered_quest_left_os_pd .= $left_os_pd;
    return  $filtered_quest_left_os_pd;
  }


  if( $right_od_pd < $dual_pd_right_max  or  $right_od_pd > $dual_pd_right_min ) {
    $filtered_quest_right_od_pd .= $right_od_pd;
    print 'This frame is recommended for prescriptions from '.$dual_pd_left_min.' to '.$dual_pd_left_max.' Our standard lens is too thick to accommodate your prescription. Contact us for more information, or keep shopping';
    return $filtered_quest_right_od_pd;
  } else {
    $filtered_quest_right_od_pd .= $right_od_pd;
    return $filtered_quest_right_od_pd;
  }


  // filter error for Dual left field and quest fields
  if( $quest_left_os_pd < $dual_pd_left_max  or  $quest_left_os_pd > $dual_pd_left_min ) {
    $filtered_quest_left_os_pd .= $quest_left_os_pd;
    print 'This frame is recommended for prescriptions from '.$dual_pd_left_min.' to '.$dual_pd_left_max.' Our standard lens is too thick to accommodate your prescription. Contact us for more information, or keep shopping';
    return  $filtered_quest_left_os_pd;
  } else {
    $filtered_quest_left_os_pd .= $quest_left_os_pd;
    return  $filtered_quest_left_os_pd;
  }


 if( $quest_right_od_pd < $dual_pd_right_max  or  $quest_right_od_pd > $dual_pd_right_min ) {
    $filtered_quest_right_od_pd .= $quest_right_od_pd;
    print 'This frame is recommended for prescriptions from '.$dual_pd_right_min.' to '.$dual_pd_right_max.' Our standard lens is too thick to accommodate your prescription. Contact us for more information, or keep shopping';
    return $filtered_quest_right_od_pd;
  } else {
    $filtered_quest_right_od_pd .= $quest_right_od_pd;
    return $filtered_quest_right_od_pd;
  }

  // filter error for single left field and quest fields
  if( $single_pd < $singe_pd_max  or  $single_pd > $singe_pd_min ) {
    $filtered_single_pd .= $single_pd;
    $script .= '<script>';
      $script .= 'jQuery(document).ready(function($) {';
        $script .= '$("#display").html("<error-message>This frame is recommended for prescriptions from '.$singe_pd_min.' to '.$singe_pd_max.' Our standard lens is too thick to accommodate your prescription. Contact us for more information, or keep shopping</error-message>")';
      $script .= '});';
    $script .= '</script>';
    //print $script;
    return $filtered_single_pd;
  } else {
    $filtered_single_pd .= $single_pd;
    return $single_pd .= $filtered_single_pd;
  }


  if( $quest_single_pd < $singe_pd_max  or  $quest_single_pd > $singe_pd_min ) {
    $filtered_single_pd .= $quest_single_pd;
    print 'This frame is recommended for prescriptions from '.$singe_pd_min.' to '.$singe_pd_max.' Our standard lens is too thick to accommodate your prescription. Contact us for more information, or keep shopping';
    return $filtered_single_pd;
  } else {
    $filtered_single_pd .= $quest_single_pd;
    return $filtered_single_pd;
  }


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



       while ( $loop->have_posts() ) : $loop->the_post();
            global $product;
            $id = $product->get_id();
            if ( ! empty( get_post_meta( $id, '_valid_dual_pd_range_right_to', true ) ) ){
                $dual_pd_right_to = get_post_meta( $id, '_valid_dual_pd_range_right_to', true );
            }
            if ( ! empty( get_post_meta( $id, '_valid_dual_pd_range_right_from', true ) ) ){
                $dual_pd_right_from = get_post_meta( $id, '_valid_dual_pd_range_right_from', true );
            }
            if ( ! empty( get_post_meta( $id, '_valid_dual_pd_range_left_to', true ) ) ){
                $dual_pd_left_to = get_post_meta( $id, '_valid_dual_pd_range_left_to', true );
            }
            if ( ! empty( get_post_meta( $id, '_valid_dual_pd_range_left_from', true ) ) ){
                $dual_pd_left_from = get_post_meta( $id, '_valid_dual_pd_range_left_from', true );
            }
            if ( ! empty( get_post_meta( $id, '_valid_singe_pd_ranfe_to', true ) ) ){
                $singe_pd_to = get_post_meta( $id, '_valid_singe_pd_ranfe_to', true );
            }
            if ( ! empty( get_post_meta( $id, '_valid_singe_pd_ranfe_from', true ) ) ){
                $singe_pd_to = get_post_meta( $id, '_valid_singe_pd_ranfe_from', true );
            }
            //if ( ! empty( get_post_meta( $id, '_redeem_in_stores[]', true ) ) ){
                $single_pd_from = get_post_meta( $id, '_redeem_in_stores', true );
          //  }
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


        $favcolor = "red";

            switch ($favcolor) {
              case "red":
                  echo "Your favorite color is red!";
                  break;
              case "blue":
                  echo "Your favorite color is blue!";
                  break;
              case "green":
                  echo "Your favorite color is green!";
                  break;
              default:
                  echo "Your favorite color is neither red, blue, nor green!";
        }
*/
