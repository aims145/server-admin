<?php 
//echo "<table border='1'>";
$row = 0;
//if (($handle = fopen("newoneamrit.csv", "r")) !== FALSE) {
//  while (($data = fgetcsv($handle, 10000, ",")) !== FALSE) {
//    $num = count($data);
//    //echo "<p> $num fields in line $row: <br /></p>\n";
//    echo "<tr>";
//    $row++;
//    for ($c=0; $c < $num; $c++) {
//        echo "<td>".$data[$c]."</td>";
//        $
//    }
//    echo "</tr>";
//  }
//  fclose($handle);
//}
//
//echo "</table>";

if (($handle = fopen("newoneamrit.csv", "r")) !== FALSE) {
    while(($data = fgetcsv($handle, 10000, ',')) !== FALSE ){
    $num = count($data);

    $row++;
       
       $entry_id[] = $data[0];
       $order_item[] = $data[1];
       $order_total[] = $data[2];
       $order_subtotal[] = $data[3];
       $order_subtotal_tax[] = $data[4];
       $order_shipping[] = $data[5];
       $order_shipping_tax[] = $data[6];
       $order_tax = $data[7];
       $coupon_code[] = $data[8];
       $order_shipping_method[] = $data[9];
       $order_discount[] = $data[10];
       $customer_fullname[] = $data[11];
       $custom_phone[] = $data[12];
       $customer_email[] = $data[13];
       $customer_lang_code[] = $data[14];
       $full_billing_address[] = $data[15];
       $full_shipping_address[] = $data[16];
       $billing_fname[] = $data[17];
       $billing_address[] = $data[18];
       $billing_address2[] = $data[19];
       $billing_state[] = $data[20];
       $billing_zip[] = $data[21];
       $billing_city[] = $data[22];
       $billing_lname[] = $data[23];
       $billing_company[] = $data[24];
       $billing_country[] = $data[25];
       $billing_country_code[] = $data[26];
       $shipping_fname[] = $data[27];
       $shipping_lname[] = $data[28];
       $shipping_address[] = $data[29];
       $shipping_address2 = $data[30];
       $shipping_city[] = $data[31];
       $shipping_state[] = $data[32];
       $shipping_zip = $data[33];
       $shipping_company[] = $data[34];
       $shipping_country[] = $data[35];
       $shipping_country_code[] = $data[36];
       $payment_error[] = $data[37];
       $payment_transaction_id[] = $data[38];
       $payment_last4[] = $data[39];
       $payment_ip[] = $data[40];
       $payment_gayeway[] = $data[41];
       $shipping_tracking[] = $data[42];
       $shipping_note[] = $data[43];
       $order_number[] = $data[44];
       $status[] = $data[45];
       $entry_date[] = $data[46];
       $year[] = $data[47];
       $month[] = $data[48];
       $day[] = $data[49];
       
    
    }
    

}

//$seperate = explode(":", $order_item[1]);
//
//print_r($seperate);
$firstelement = array_shift($order_item);
$count = count($order_item);
//echo $count;
    for($i=0;$i<$count;$i++){
        $seperate = explode(":", $order_item[$i]);
        //print_r($seperate);
    $product_id[] = $seperate[0];
    $product[] = $seperate[1];
    $qty[] = $seperate[2];
    $rate[]= str_replace("|", "", $seperate[3]);
    
    echo $product_id[$i]." - ".$product[$i]." - ".$qty[$i]." - ".$rate[$i]."<br />";
    }
    
    

?>
