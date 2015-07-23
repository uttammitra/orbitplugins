<?php
// {$setting_id}[$id] - Contains the setting id, this is what it will be stored in the db as.
// $class - optional class value
// $id - setting id
// $options[$id] value from the db

$option_values = array(
	'01'=>__('01-Jan','exitpopup'),
	'02'=>__('02-Feb','exitpopup'),
	'03'=>__('03-Mar','exitpopup'),
	'04'=>__('04-Apr','exitpopup'),
	'05'=>__('05-May','exitpopup'),
	'06'=>__('06-Jun','exitpopup'),
	'07'=>__('07-Jul','exitpopup'),
	'08'=>__('08-Aug','exitpopup'),
	'09'=>__('09-Sep','exitpopup'),
	'10'=>__('10-Oct','exitpopup'),
	'11'=>__('11-Nov','exitpopup'),
	'12'=>__('12-Dec','exitpopup'),
	);


echo "<select id='mm' name='{$setting_id}[$id][month]'>";
foreach ( $option_values as $k => $v ) {
    echo "<option value='$k' " . selected( $options[ $id ]['month'], $k, false ) . ">$v</option>";
}
echo "</select>";

echo "<input id='jj' class='small-text' name='{$setting_id}[$id][day]' placeholder='".__('day','exitpopup')."' type='text' value='" . esc_attr( $options[ $id ]['day'] ) . "' />";

echo ',';
echo "<input id='aa' class='small-text' name='{$setting_id}[$id][year]' placeholder='".__('year','exitpopup')."'  type='text' value='" . esc_attr( $options[ $id ]['year'] ) . "' /><br>";
