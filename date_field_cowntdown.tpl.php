<?php
/**
 * Defined variables:
 *
 * $value               timestamp in milliseconds
 * $timestamp               ,
 * $time_out_message        ,
 * $time_left_message       ,
 * $time_out_hide_timer     ,
 */

$key = md5(uniqid(rand(), true));
$key = substr($key, 0, 5);

$field_id = 'date-field-countdown-'.$key;
$field_id_note = $field_id.'-note';
$field_id_countdown = $field_id.'-countdown';
?>

<div class="date-field-countdown">
	<div id="<?php echo $field_id_countdown; ?>"></div>
	<p id="<?php echo $field_id_note; ?>"></p>
</div> 

<script type="text/javascript">
(function($){

    var note = $('#<?php echo $field_id_note; ?>');
    ts = <?php echo $timestamp; ?>;

    $('#<?php echo $field_id_countdown; ?>').countdown({
        timestamp   : ts,
        callback    : function(days, hours, minutes, seconds){

            var message = "<?php echo $time_left_message; ?>";
            message = message.replace('@days', days);
            message = message.replace('@hours', hours);
            message = message.replace('@minutes', minutes);
            message = message.replace('@seconds', seconds);

            note.html(message);
        }
    });

})(jQuery);
</script>
