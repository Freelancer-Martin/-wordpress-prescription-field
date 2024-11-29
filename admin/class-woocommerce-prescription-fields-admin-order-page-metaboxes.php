<?php
add_action( 'add_meta_boxes', 'add_meta_boxes' );

function add_meta_boxes()
{
    add_meta_box(
        'woocommerce-order-my-custom',
        __( 'Lenses Information' ),
        'order_my_custom',
        'shop_order',
        'side',
        'default'
    );
}
function order_my_custom()
{

  $field_info = get_user_meta(get_current_user_id(), 'these_second_options', true);
  $decode_field = json_decode($field_info, TRUE);
  $price_info = get_user_meta(get_current_user_id(), 'lenses_price_settings', true);
  $decode_price = json_decode($price_info, TRUE);
  $lenses_info = get_user_meta(get_current_user_id(), 'lenses_type_settings', true);
  $decode_lenses = json_decode($lenses_info, TRUE);
  //print_r($decode_field);
  //print_r($decode_price);
  print_r($decode_lenses);

  ?>

  <table class="table myTable" id="myTable">
            <thead>
                <tr>
                    <th>Field Name</th>
                    <th>Field Value</th>
                </tr>
            </thead>
            <tbody>


            <tr>
                <td>Lenses Name</td>
                <td><?php echo $decode_price['lenses-final-name']; ?></td>
            </tr>
            <tr>
                <td>Single Vision Lenses</td>
                <td><?php echo $decode_lenses['lense-style-new']; ?></td>
            </tr>
            <tr>
                <td>Lenses Type</td>
                <td><?php echo $decode_lenses['lenses-type']; ?></td>
            </tr>
            <tr>
                <td>Right (OD) SPH</td>
                <td><?php echo $decode_field['right-od-sph']; ?></td>
            </tr>
            <tr>
                <td>Right (OD) CYL</td>
                <td><?php echo $decode_field['right-od-cyl']; ?></td>
            </tr>
            <tr>
                <td>Right (OD) AXIS</td>
                <td><?php echo $decode_field['right-od-axis']; ?></td>
            </tr>
            <tr>
                <td>Right (OD) ADD</td>
                <td><?php echo $decode_field['right-od-add']; ?></td>
            </tr>
            <tr>
                <td>Right (OD) PD</td>
                <td><?php echo $decode_field['right-od-pd']; ?></td>
            </tr>
            <tr>
                <td>Left (OS) SPH</td>
                <td><?php echo $decode_field['left-os-sph']; ?></td>
            </tr>
            <tr>
                <td>Left (OS) CYL</td>
                <td><?php echo $decode_field['left-os-cyl']; ?></td>
            </tr>
            <tr>
                <td>Left (OS) AXIS</td>
                <td><?php echo $decode_field['left-os-axis']; ?></td>
            </tr>
            <tr>
                <td>Left (OS) ADD</td>
                <td><?php echo $decode_field['left-os-add']; ?></td>
            </tr>
            <tr>
                <td>Left (OS) PD</td>
                <td><?php echo $decode_field['left-os-pd']; ?></td>
            </tr>

            </tbody>
        </table>
        <table class="table myTable" id="myTable">
        <thead>
            <tr>
                <th>Field Name</th>
                <th>Field Value</th>
            </tr>
        </thead>
        <tbody>



        <tr>
            <td>Single Vision Lenses</td>
            <td><?php echo $decode_lenses['lense-style-new']; ?></td>
        </tr>
        <tr>
            <td>Quest Right (OD) SPH</td>
            <td><?php echo $decode_field['quest-right-od-sph']; ?></td>
        </tr>
        <tr>
            <td>Quest Right (OD) CYL</td>
            <td><?php echo $decode_field['quest-right-od-cyl']; ?></td>
        </tr>
        <tr>
            <td>Quest Right (OD) AXIS</td>
            <td><?php echo $decode_field['quest-right-od-axis']; ?></td>
        </tr>
        <tr>
            <td>Quest Right (OD) ADD</td>
            <td><?php echo $decode_field['quest-right-od-add']; ?></td>
        </tr>
        <tr>
            <td>Quest Right (OD) PD</td>
            <td><?php echo $decode_field['quest-right-od-pd']; ?></td>
        </tr>
        <tr>
            <td>Quest Left (OS) SPH</td>
            <td><?php echo $decode_field['quest-left-os-sph']; ?></td>
        </tr>
        <tr>
            <td>Quest Left (OS) CYL</td>
            <td><?php echo $decode_field['quest-left-os-cyl']; ?></td>
        </tr>
        <tr>
            <td>Quest Left (OS) AXIS</td>
            <td><?php echo $decode_field['quest-left-os-axis']; ?></td>
        </tr>
        <tr>
            <td>Quest Left (OS) ADD</td>
            <td><?php echo $decode_field['quest-left-os-add']; ?></td>
        </tr>
        <tr>
            <td>Quest Left (OS) PD</td>
            <td><?php echo $decode_field['quest-left-os-pd']; ?></td>
        </tr>

        </tbody>
    </table>


<?php }

 ?>
