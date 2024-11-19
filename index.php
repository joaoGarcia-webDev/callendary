<?php

require_once 'calendar.php';

$calendar = new Calendar(new CurrentDate(), new CalendarDate());

$calendar->create();


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container-md mt-4">
        <h1><?php echo $calendar->getCalendarMonth();?></h1>
        <hr>
        <table class="table table-bordered mt-4">
            <thead>
                <?php foreach ($calendar->getDayLabels() as $dayLabel): ?>
                <th>
                    <?php echo $dayLabel; ?>
                </th>
                <?php endforeach; ?>
            </thead>
            <tbody>
                <?php foreach ($calendar->getWeeks() as $week): ?>
                    <tr>
                        <?php foreach ($week as $day): ?>
                        <td <?php if (!$day['currentMonth']): ?>
                                class="text-secondary" 
                            <?php endif; ?>
                            <?php if ($calendar->isCurrentDate($day['dayNumber'])): ?>
                                class="text-primary"
                            <?php endif; ?>>
                            <span   >
                                <?php echo $day['dayNumber']; ?>
                            </span>
                        </td>
                    <?php endforeach; ?>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</body>
</html>