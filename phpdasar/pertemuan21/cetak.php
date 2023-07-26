<?php 
require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';
$showroom = query("SELECT * FROM car");

// Create a new mPDF instance
$mpdf = new \Mpdf\Mpdf();

// HTML content for the PDF
$html = '
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Car Showroom List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        img {
            max-width: 80px;
            height: auto;
            display: block;
            margin: auto;
        }
    </style>
</head>
<body>
    <h1>Showroom List</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Type</th>
                <th>Sub</th>
                <th>Color</th>
                <th>Topspeed</th>
            </tr>
        </thead>
        <tbody>';

// Loop through the $showroom data and add rows to the table
foreach ($showroom as $car) {
    $html .= '
            <tr>
                <td>' . $car["id"] . '</td>
                <td><img src="img/' . $car["gambar"] . '" width="80" class="rounded"></td>
                <td>' . $car["tipe"] . '</td>
                <td>' . $car["jenis"] . '</td>
                <td>' . $car["warna"] . '</td>
                <td>' . $car["topspeed"] . '</td>
            </tr>';
}

// Closing tags for the HTML content
$html .= '
        </tbody>
    </table>
</body>
</html>';

// Write the HTML content to mPDF
$mpdf->WriteHTML($html);

// Output the PDF file
$mpdf->Output('car_showroom_list.pdf', \Mpdf\Output\Destination::INLINE);
?>
