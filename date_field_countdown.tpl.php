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

$timestamp *= 1000;
?>

<div class="date-field-countdown">

    <?php if ($show_date == '1'): ?>
        <div class="date-field-countdown-date">
            <?php echo $formatted_date; ?>
        </div>
    <?php endif; ?>

    <?php if(trim($note) != ''): ?>
        <div id="<?php echo $field_id_note; ?>" class="date-field-countdown-note"></div>
    <?php endif; ?>

</div>
