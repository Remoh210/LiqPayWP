<?php

/*
Plugin Name: Privat Liq
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: A brief description of the Plugin.
Version: 1.0
Author: ahaha
Author URI: http://URI_Of_The_Plugin_Author
License: A "Slug" license name e.g. GPL2
*/

/*  Copyright ГОД  ИМЯ_АВТОРА_ПЛАГИНА  (email: E-MAIL_АВТОРА)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/*Variebles
*/





//defines shortcode
add_shortcode('xml', 'clicknsend');

//defines menu
add_action('admin_menu', 'privat_liq_menu');

function privat_liq_menu() 
{
    add_options_page('Privat settings', 'Privat settings', 1, __FILE__, 'privat_liq_options');
}

function privat_liq_options()
{
    include('privat-liq-options.php');
}
//Initialize options
function privat_liq_install()
{
    
    add_option('merchant_id', 'Не задано');
    add_option('merchant_key', 'Не задано');
    add_option('price', '0');
    add_option('currency', 'UAH');
    add_option('server_url', 'Не задано');
    add_option('result_url', 'Не задано');


}

/*
//update options 

function take_post()
{
    if( isset( $_POST['privat_save_btn'] ) ) 
    {
        $merchant_id = get_option('merchant_id');
        $merchant_key = get_option('merchant_key');
        $price = get_option('price');
        $currency = get_option('currency');
        $server_url = get_option('server_url');
        $result_url = get_option('result_url');

/*      update_option('merchant_id', $merchant_id);
        update_option('merchant_key', $merchant_key);
        update_option('price', $price);
        update_option('currency', $currency);
        update_option('server_url', $servers_url);
        update_option('result_url', $result_url);

    }

}

*/

//send xml request func
function clicknsend()
{

$merc_sign = get_option('merchant_key');

$xml = '<request>
    <version>1.2</version>
    <merchant_id>' . get_option('merchant_id') . '</merchant_id>
    <result_url>' . get_option('result_url') . '</result_url>
    <server_url>' . get_option('server_url') . '</server_url>
    <order_id>' . time() . '</order_id>
    <amount>' . get_option('price') . '</amount>
    <currency>'. get_option('currency') .'</currency>
    <description>test</description>
    <default_phone></default_phone>
    <pay_way>card,liqpay,delayed</pay_way>
    <goods_id>1234</goods_id>
</request>';





$sign = base64_encode(sha1($merc_sign . $xml . $merc_sign, true));
$xml_encoded = base64_encode($xml);

    echo "<form action=\"https://www.liqpay.com/?do=clickNbuy\" method=\"POST\">";
    echo "<input type=\"hidden\" name=\"operation_xml\" value=\"$xml_encoded\">";
    echo "<input type=\"hidden\" name=\"signature\" value=\"$sign\">";
    echo "<input type=\"submit\" value=\"Submit\"/>";
    echo "</form>";

}



function square($num)
{
    return $num * $num;
}





function lol( $atts, $content = "" ) {
    return $xml;
}


//function makeform()
//{
  /*  
    echo '<form action="https://www.liqpay.com/?do=clickNbuy" method="POST">';
    echo '<input type="hidden" name="operation_xml" value="<?= $xml_encoded ?>';
    echo '<input type="hidden" name="signature" value="<?= $sign ?>">';
    echo '<input type="submit" value="Submit"/>';
    echo '</form>';
*/
  //  echo "$xml";
//}



//hooks
register_activation_hook( __FILE__, 'privat_liq_install');
//add_action('init', 'pop');

?>