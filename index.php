<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snail Algoritm</title>
    <style>
        table {
            border-collapse: collapse;
        }
        td {
            width: 30px;
            height: 30px;
        }
    </style>
</head>
<body>

<?php

function createSnailTable($rows, $cols) {
    $table = array_fill(0, $rows, array_fill(0, $cols, 0));

    $value = 1;
    $startRow = 0;
    $endRow = $rows - 1;
    $startCol = 0;
    $endCol = $cols - 1;

    while ($startRow <= $endRow && $startCol <= $endCol) {
        for ($i = $startCol; $i <= $endCol; ++$i) {
            $table[$startRow][$i] = $value++;
        }
        ++$startRow;

        for ($i = $startRow; $i <= $endRow; ++$i) {
            $table[$i][$endCol] = $value++;
        }
        --$endCol;

        if ($startRow <= $endRow) {
            for ($i = $endCol; $i >= $startCol; --$i) {
                $table[$endRow][$i] = $value++;
            }
            --$endRow;
        }

        if ($startCol <= $endCol) {
            for ($i = $endRow; $i >= $startRow; --$i) {
                $table[$i][$startCol] = $value++;
            }
            ++$startCol;
        }
    }

    return $table;
}

$rows = 50;
$cols = 50;
$tableData = createSnailTable($rows, $cols);

echo '<table>';
for ($i = 0; $i < $rows; ++$i) {
    echo '<tr>';
    for ($j = 0; $j < $cols; ++$j) {
        $brightness = 255 - ($tableData[$i][$j] - 1) * (255 / ($rows * $cols));
        $color = sprintf('#%02x%02x%02x', $brightness, $brightness, $brightness);
        echo '<td style="background-color:' . $color . ';">'.'</td>';
    }
    echo '</tr>';
}
echo '</table>';

?>
</body>
</html>
