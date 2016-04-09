
<div class="wrap">
<h2>Your Plugin Name</h2>

<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); 

?>

<table class="form-table">

    <tr valign="top">
        <th scope="row">Merchant ID</th>
        <td><input type="text" name="merchant_id" value="<?php echo get_option('merchant_id'); ?>" /></td>
    </tr>

    <tr valign="top">
        <th scope="row">Merchant key</th>
        <td><input type="text" name="merchant_key" value="<?php echo get_option('merchant_key'); ?>" /></td>
    </tr>

    <tr valign="top">
        <th scope="row">Price</th>
        <td><input type="text" name="price" value="<?php echo get_option('price'); ?>" /></td>
    </tr>

    <tr valign="top">
        <th scope="row">Currency</th>
        <td><input type="text" name="currency" value="<?php echo get_option('currency'); ?>" /></td>
    </tr>

    <tr valign="top">
        <th scope="row">ser url</th>
        <td><input type="text" name="server_url" value="<?php echo get_option('server_url'); ?>" /></td>
    </tr>

    <tr valign="top">
        <th scope="row">results_url url</th>
        <td><input type="text" name="result_url" value="<?php echo get_option('result_url'); ?>" /></td>
    </tr>


</table>

<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="merchant_id,merchant_key,price,currency,server_url,result_url" />

<p class="submit">
    <input type="submit" name="privat_save_btn" value="<?php _e('Save Changes') ?>"/>
</p>

</form>
</div>