<!DOCTYPE html>
<html>
<head>
    <title>Your Schedule</title>
    <style>
        table, th, td {
            border: 2px blueviolet solid;
            text-align: center;
            color: #202020;
        }
        .column0 {
            width: 100px;
        }
        .column {
            width: 200px;
        }
    </style>
</head>
<body>
    <h1>Build your schedule</h1>
    <h3>Enter your schedule below</h3>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <div>
            Day:
            <select name="day">
                <?php
                $days = ["Mon", "Tue", "Wed", "Thurs", "Fri", "Sat"];
                for ($day = 0; $day < 6; $day++) {
                    echo "<option value='$day'>" . $days[$day] . "</option>";
                }
                ?>
            </select>
            Start time:
            <select name="startTime">
                <?php
                for ($slot = 0; $slot < 20; $slot++) {
                    if ($slot % 2 === 0) {
                        echo "<option value='$slot'>" . (8 + intdiv($slot, 2)) . ":30";
                    }
                    else {
                        echo "<option value='$slot'>" . (9 + intdiv($slot, 2)) . ":00";
                    }
                }
                ?>
            </select>
            End time:
            <select name="endTime">
                <?php
                for ($slot = 1; $slot < 21; $slot++) {
                    if ($slot % 2 === 1) {
                        echo "<option value='$slot'>" . (9 + intdiv($slot, 2)) . ":00";
                    }
                    else {
                        echo "<option value='$slot'>" . (8 + intdiv($slot, 2)) . ":30";
                    }
                }
                ?>
            </select>
            Task: <input name="task" width="40">
            Venue: <input name="venue" width="40">

            <button type="submit">submit</button>
        </div>
    </form>
    <br>
    <h3>Your schedule: </h3>
    <?php
    $duration = array_fill(0, 6, array_fill(0, 20, 1));
    $taskArr = array_fill(0, 6, array_fill(0, 20, ""));
    $inputDay = $_POST['day'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];
    $duration[$inputDay][$startTime] += $endTime - $startTime - 1;
    $taskArr[$inputDay][$startTime] = $_POST['task'] . "<br>" . $_POST['venue'];
    for ($slot = $startTime + 1; $slot < $endTime; $slot++) {
        $duration[$inputDay][$slot] -= 1;
    }
    ?>
    <table>
        <tr>
            <th class="column0">Time/Day</th>
            <th class="column">Mon</th>
            <th class="column">Tue</th>
            <th class="column">Wed</th>
            <th class="column">Thurs</th>
            <th class="column">Fri</th>
            <th class="column">Sat</th>
        </tr>
        <?php
        for ($slot = 0; $slot < 20; $slot++) {
            echo "<tr>";
            for ($day = 0; $day < 7; $day++) {
                if ($day == 0) {
                    if ($slot % 2 == 0) {
                        echo "<th class='column0'>" . (8 + intdiv($slot, 2)) . ":30-" . (9 + intdiv($slot, 2)) . ":00</th>";
                    }
                    else {
                        echo "<th class='column0'>" . (9 + intdiv($slot, 2)) . ":00-" . (9 + intdiv($slot, 2)) . ":30</th>";
                    }
                }
                else if ($duration[$day - 1][$slot] > 0) {
                    echo "<td class='column' rowspan='{$duration[$day - 1][$slot]}'><strong>" . $taskArr[$day - 1][$slot] . "</strong></td>";
                }
            }
            echo "</tr>";
        }
        ?>
    </table>
    <?php
    echo "<br>_POST: ";
    print_r($_POST);
    echo "<br><br>"
    ?>
</body>
</html>