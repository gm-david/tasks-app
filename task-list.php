<?php

include('conexion.php');
include('functions/functions.php');

$data = file_get_contents('php://input');
$_POST = json_decode($data, true);

$id = $_POST['id'] ?? '';
$title = $_POST['title'] ?? '';
$description = $_POST['description'] ?? '';
$column = $_POST['column'] ?? 'created';
$order = $_POST['order'] ?? 'DESC';
$limit = $_POST['limit'] ?? 100;

$query = "SELECT * FROM 
            (SELECT COUNT(*) AS tareas_totales FROM tasks) AS total,
            (SELECT COUNT(*) AS tareas_encontradas FROM tasks WHERE id LIKE '$id%' AND title LIKE '$title%' AND description LIKE '$description%') AS results,
            (SELECT * FROM tasks WHERE id LIKE '$id%' AND title LIKE '$title%' AND description LIKE '$description%' ORDER BY $column $order LIMIT $limit) AS tasks";
$results = mysqli_query($conn, $query);

$all = "SELECT COUNT(*) AS tareas_totales FROM tasks";
$all = mysqli_fetch_assoc(mysqli_query($conn, $all))["tareas_totales"];

while ($row = mysqli_fetch_array($results)) {
    $created = $row['created'];
    $day = date('d', strtotime($created));
    $month = spanishMonth(date('m', strtotime($created)));
    $year = date('Y', strtotime($created));
    $date = "$day/$month/$year";
    $message = $limit >= (int)$row['tareas_encontradas'] ? 'All Results' : 'Not All Results';
    $meta = ['total' => $row['tareas_totales'], 'results' => $row['tareas_encontradas'], 'message' => $message];

    $tasks[] = [
        'id' => $row['id'],
        'title' => $row['title'],
        'description' => $row['description'],
        'date' => $date,
        'meta' => $meta
    ];
}

$tasks_string = json_encode($tasks);
$all_string = json_encode(['message' => 'No Tasks', 'all' => $all]);
echo $tasks_string == 'null' ? $all_string : $tasks_string;
