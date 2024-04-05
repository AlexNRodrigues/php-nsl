<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Calendário</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .today {
            background-color: #ffff99;
        }
    </style>
</head>
<body>

<?php
// Definindo o mês e o ano atuais
$month = date('n');
$year = date('Y');

// Obtendo o primeiro dia do mês atual
$first_day_timestamp = mktime(0, 0, 0, $month, 1, $year);

// Número de dias no mês atual
$num_days = date('t', $first_day_timestamp);

// Obtendo o dia da semana do primeiro dia do mês atual (1 = segunda-feira, ..., 7 = domingo)
$first_day_of_week = date('N', $first_day_timestamp);

// Array para os nomes dos dias da semana em português
$days_of_week = array('Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo');
?>

<h2>Calendário de <?= strftime('%B de %Y', $first_day_timestamp) ?></h2>
<table>
    <thead>
    <tr>
        <?php foreach ($days_of_week as $day): ?>
            <th><?= $day ?></th>
        <?php endforeach; ?>
    </tr>
    </thead>
    <tbody>
    <tr>
        <?php
        // Preenchendo os dias vazios no início do mês
        for ($i = 1; $i < $first_day_of_week; $i++): ?>
            <td></td>
        <?php endfor; ?>

        <?php
        $day_counter = 1;
        // Preenchendo os dias do mês
        for ($day = $first_day_of_week; $day <= 7; $day++):
            ?>
            <td <?= ($day_counter == date('j') && $month == date('n') && $year == date('Y')) ? 'class="today"' : '' ?>>
                <?= $day_counter++ ?>
            </td>
        <?php endfor; ?>
    </tr>

    <?php
    // Preenchendo as semanas completas do mês
    while ($day_counter <= $num_days):
        ?>
        <tr>
            <?php for ($day = 1; $day <= 7 && $day_counter <= $num_days; $day++): ?>
                <td <?= ($day_counter == date('j') && $month == date('n') && $year == date('Y')) ? 'class="today"' : '' ?>>
                    <?= $day_counter++ ?>
                </td>
            <?php endfor; ?>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>

</body>
</html>
