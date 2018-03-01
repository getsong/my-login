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
        th, td {
            width: 100px;
        }
    </style>
</head>
<body>
    <h1>Build your schedule</h1>
    <h3>Enter your schedule below</h3>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <div>
            <select name="day">
                <?php
                $days = ["Mon", "Tue", "Wed", "Thurs", "Fri", "Sat"];
                for ($day = 0; $day < 6; $day++) {
                    echo "<option value='$day'>" . $days[$day] . "</option>";
                }
                ?>
            </select>
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
            <select name="endTime">
                <?php
                for ($slot = 1; $slot < 21; $slot++) {
                    if ($slot % 2 === 0) {
                        echo "<option value='$slot'>" . (9 + intdiv($slot, 2)) . ":00";
                    }
                    else {
                        echo "<option value='$slot'>" . (9 + intdiv($slot, 2)) . ":30";
                    }
                }
                ?>
            </select>
            <!--textarea rows="8" cols="70" name="scheduleData"></textarea-->
        </div>
        <div>
            <button type="submit">submit</button>
        </div>
    </form>
    <?php
    $duration = array_fill(0, 6, array_fill(0, 20, 1));
    print_r($duration);
    echo "<br>";
    $input = array_fill(0, 6, array_fill(0, 20, 0));
    $input[0][1] = 2;
    $input[0][2] = -1;
    $input[0][3] = -1;
    for ($day = 0; $day < 6; $day++) {
        for ($slot = 0; $slot < 20; $slot++) {
            $duration[$day][$slot] += $input[$day][$slot];
        }
    }
    print_r($duration);
    echo "<br>";
    ?>
    <table>
        <tr>
            <th>Time/Day</th>
            <th>Mon</th>
            <th>Tue</th>
            <th>Wed</th>
            <th>Thurs</th>
            <th>Fri</th>
            <th>Sat</th>
        </tr>
        <?php
        for ($slot = 0; $slot < 20; $slot++) {
            echo "<tr>";
            for ($day = 0; $day < 7; $day++) {
                if ($day == 0) {
                    if ($slot % 2 == 0) {
                        echo "<th>" . (8 + intdiv($slot, 2)) . ":30-" . (9 + intdiv($slot, 2)) . ":00</th>";
                    }
                    else {
                        echo "<th>" . (9 + intdiv($slot, 2)) . ":00-" . (9 + intdiv($slot, 2)) . ":30</th>";
                    }
                }
                else if ($duration[$day - 1][$slot] > 0) {
                    echo "<td rowspan=\"{$duration[$day - 1][$slot]}\">" . $duration[$day - 1][$slot] . "</td>";
                }
            }
            echo "</tr>";
        }
        //echo "schedule data: $_POST[scheduleData]";
        ?>
    </table>
    <?php
    echo "_POST: ";
    print_r($_POST);
    ?>
    <!--<table>
        <tr>
            <th>Time/Day</th>
            <th>Mon</th>
            <th>Tue</th>
            <th>Wed</th>
            <th>Thurs</th>
            <th>Fri</th>
            <th>Sat</th>
        </tr>
        <tr>
            <th>0830-0930</th>
            <td>a</td>
            <td>a</td>
            <td>a</td>
            <td>a</td>
            <td>a</td>
            <td>a</td>
        </tr>
        <tr>
            <th>0930-1030</th>
            <td rowspan="0">a</td>
            <td>a</td>
            <td>a</td>
            <td>a</td>
            <td>a</td>
            <td>a</td>
        </tr>
        <tr>
            <th>1030-1130</th>

            <td>b</td>
            <td>c</td>
            <td>a</td>
            <td>a</td>
            <td>a</td>
        </tr>
        <tr>
            <th>1130-1230</th>

            <td>a</td>
            <td>a</td>
            <td>a</td>
            <td>a</td>
            <td>a</td>
        </tr>
        <tr>
            <th>1230-1330</th>
            <td colspan="3">colspan</td>
            <td>a</td>
            <td>a</td>
            <td>a</td>
        </tr>
        <tr>
            <th>1330-1430</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th>1430-1530</th>
            <td>a</td>
            <td>a</td>
            <td>a</td>
            <td>a</td>
            <td>a</td>
            <td>a</td>
        </tr>
    </table>-->
</body>
</html>