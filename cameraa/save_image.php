<?php
$data = json_decode(file_get_contents("php://input"));

if(isset($data->image)) {
    $image = $data->image;
    $image = str_replace('data:image/png;base64,', '', $image);
    $image = str_replace(' ', '+', $image);
    $decoded = base64_decode($image);

    if (!file_exists('images')) {
        mkdir('images', 0777, true);
    }

    $filename = 'images/photo_' . time() . '.png';
    file_put_contents($filename, $decoded);
    echo "Ifoto yabitswe: $filename";
} else {
    echo "Nta shusho yoherejwe.";
}
?>
