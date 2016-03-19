<?php
$key = md5(uniqid(rand(), true));
$key = substr($key, 0, 5);

$field_id = 'date-field-countdown-'.$key;
$field_id_note = $field_id.'-note';
$field_id_countdown = $field_id.'-countdown';
?>

<div class="date-field-countdown">
	<!-- <?php echo $value; ?> -->
	<!-- <?php echo $url; ?> -->
	<!-- <?php echo $title; ?> -->
	<div id="<?php echo $field_id_countdown; ?>"></div>
	<p id="<?php echo $field_id_note; ?>"></p>
</div> 

<script type="text/javascript">
(function($){

    var note = $('#<?php echo $field_id_note; ?>'),
        ts = new Date(2012, 0, 1),
        newYear = true;

    if((new Date()) > ts){
        // The new year is here! Count towards something else.
        // Notice the *1000 at the end - time must be in milliseconds
        ts = <?php echo $value; ?>;

        newYear = false;

        console.log((new Date()).getTime());
        console.log('<?php echo $value; ?>' );
    }

    $('#<?php echo $field_id_countdown; ?>').countdown({
        timestamp   : ts,
        callback    : function(days, hours, minutes, seconds){

            var message = "";

            message += days + " day" + ( days==1 ? '':'s' ) + ", ";
            message += hours + " hour" + ( hours==1 ? '':'s' ) + ", ";
            message += minutes + " minute" + ( minutes==1 ? '':'s' ) + " and ";
            message += seconds + " second" + ( seconds==1 ? '':'s' ) + " <br />";

            if(newYear){
                message += "left until the new year!";
            }
            else {
                message += "left to 10 days from now!";
            }

            note.html(message);
        }
    });

})(jQuery);
</script>
