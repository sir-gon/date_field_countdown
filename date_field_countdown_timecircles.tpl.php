<?php
/**
 * Defined variables:
 *
 * $timestamp               timestamp in milliseconds
 * $formatted_date          formatted date/time
 * $timestamp
 * $show_countdown          show or hide countdown
 * $show_date               show or hide date
 * $note                    message (future or past)
 */

$key = md5(uniqid(rand(), true));
$key = substr($key, 0, 5);

$field_id = 'date-field-countdown-'.$key;
$field_id_note = $field_id.'-note';
$field_id_date = $field_id.'-countdown';
$field_id_countdown = $field_id.'-countdown';

//$timestamp *= 1000;
$date_time = date('Y-m-d h:i:s', $timestamp);
?>

<?php if ($show_date == '1'): ?>
    <div class="date-field-countdown-date">
        <?php echo $formatted_date; ?>
    </div>
<?php endif; ?>

<?php if ($show_countdown == '1'): ?>
  <div id="<?php echo $field_id_countdown; ?>" data-date="<?php echo $date_time; ?>"></div>

  <script type="text/javascript">
    (function($){

      function rgb2hex(rgb) {
          if (/^#[0-9A-F]{6}$/i.test(rgb)) return rgb;

          rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
          function hex(x) {
              return ("0" + parseInt(x).toString(16)).slice(-2);
          }
          return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
      }

      //create an element with this class and append it to the DOM
      var eleToGetColor = $('<div class="timeCirclesBackground" style="display: none;">').appendTo('body');
      //get the color of the element
      var timeCirclesBackgroundColor = rgb2hex(eleToGetColor.css('background-color'));
      //completly remove the element from the DOM
      eleToGetColor.remove();

      //create an element with this class and append it to the DOM
      var eleToGetColor = $('<div class="timeCirclesDays" style="display: none;">').appendTo('body');
      //get the color of the element
      var timeCirclesDaysColor = rgb2hex(eleToGetColor.css('color'));
      //completly remove the element from the DOM
      eleToGetColor.remove();

      //create an element with this class and append it to the DOM
      var eleToGetColor = $('<div class="timeCirclesHours" style="display: none;">').appendTo('body');
      //get the color of the element
      var timeCirclesHoursColor = rgb2hex(eleToGetColor.css('color'));
      //completly remove the element from the DOM
      eleToGetColor.remove();

      //create an element with this class and append it to the DOM
      var eleToGetColor = $('<div class="timeCirclesMinutes" style="display: none;">').appendTo('body');
      //get the color of the element
      var timeCirclesMinutesColor = rgb2hex(eleToGetColor.css('color'));
      //completly remove the element from the DOM
      eleToGetColor.remove();

      //create an element with this class and append it to the DOM
      var eleToGetColor = $('<div class="timeCirclesSeconds" style="display: none;">').appendTo('body');
      //get the color of the element
      var timeCirclesSecondsColor = rgb2hex(eleToGetColor.css('color'));
      //completly remove the element from the DOM
      eleToGetColor.remove();


      $('#<?php echo $field_id_countdown; ?>').TimeCircles();

      console.log(timeCirclesDaysColor);

      $('#<?php echo $field_id_countdown; ?>').TimeCircles({
        circle_bg_color: timeCirclesBackgroundColor,
        time: {
          Days: { color: timeCirclesDaysColor, text: "<?php echo t('Days'); ?>" },
          Hours: { color: timeCirclesHoursColor, text: "<?php echo t('Hours'); ?>" },
          Minutes: { color: timeCirclesMinutesColor, text: "<?php echo t('Minutes'); ?>" },
          Seconds: { color: timeCirclesSecondsColor, text: "<?php echo t('Seconds'); ?>" }
      }});

      $( window ).resize(function() {
        $('#<?php echo $field_id_countdown; ?>').TimeCircles().rebuild();
      });

    })(jQuery);
  </script>

<?php endif; ?>
