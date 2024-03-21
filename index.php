<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Tasks</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .result {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<?php
function search(array $data, int $number): int
{
    $left = 0;
    $right = count($data) - 1;

    while ($left <= $right) {
        $mid = $left + (($right - $left) >> 1);

        if ($data[$mid] == $number) {
            return $mid;
        } elseif ($data[$mid] < $number) {
            $left = $mid + 1;
        } else {
            $right = $mid - 1;
        }
    }

    return -1;
}

function weekend(string $begin, string $end): int
{
    $beginTimestamp = strtotime($begin);
    $endTimestamp = strtotime($end);
    $weekends = 0;

    for ($i = $beginTimestamp; $i <= $endTimestamp; $i += 86400) {
        $dayOfWeek = date('N', $i);
        if ($dayOfWeek == 6 || $dayOfWeek == 7) {
            $weekends++;
        }
    }

    return $weekends;
}

function rgb(int $r, int $g, int $b): int
{
    return ($r << 16) + ($g << 8) + $b;
}

function fibonacci (int $limit): string
{
    $fibonacci = [0, 1];

    while ($fibonacci[count($fibonacci) - 1] <= $limit) {
        $next = end($fibonacci) + prev($fibonacci);
        if ($next <= $limit) {
            $fibonacci[] = $next;
        } else {
            break;
        }
    }

    return implode(' ', $fibonacci);
}

$data = [1, 3, 5, 7, 9, 11, 13, 15, 17, 19];
$number = 13;
echo '<div class="result">Index of ' . $number . ': ' . search($data, $number) . '</div>';

echo '<div class="result">Weekends between \'06.06.2020\' and \'06.20.2020\': ' . weekend('06.06.2020', '06.20.2020') . '</div>';

echo '<div class="result">RGB value of (255, 0, 255): ' . rgb(255, 0, 255) . '</div>';

echo '<div class="result">Fibonacci sequence up to 10: ' . fibonacci(10) . '</div>';
?>
</body>
</html>
