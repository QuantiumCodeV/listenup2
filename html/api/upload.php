<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $uploadDirectory = 'uploads/';
        $fileExtension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $newFileName = uniqid() . '_' . time() . '.' . $fileExtension;
        $filePath = $uploadDirectory . $newFileName;

        // Создаем папку, если не существует
        if (!is_dir($uploadDirectory)) {
            mkdir($uploadDirectory, 0755, true);
        }

        // Перемещаем загруженный файл в целевую папку
        if (move_uploaded_file($_FILES['file']['tmp_name'], $filePath)) {
            echo json_encode(['filePath' => 'api/'.$filePath]);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Не удалось загрузить файл.']);
        }
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'Некорректный файл.']);
    }
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Метод не разрешен.']);
}
?>
