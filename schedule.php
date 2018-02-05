<!DOCTYPE html>
<html>
<head>
    <title>Your Schedule</title>
    <style>
        table, th, td {
            border: 2px solid;
        }
    </style>
</head>
<body>
    <h1>Build your schedule</h1>
    <h3>Enter your schedule below</h3>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <div>
            <textarea rows="8" cols="70" name="scheduleData"></textarea>
        </div>
        <div>
            <button type="submit">submit</button>
        </div>
    </form>
    <?php
        echo "schedule data: $_POST[scheduleData]";
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
            <td rowspan="3">a</td>
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
            <td>a</td>
            <td>a</td>
            <td>a</td>
            <td>a</td>
            <td>a</td>
            <td>a</td>
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
    </table>
</body>
</html>