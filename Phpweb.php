<?php
// This is the PHP script that saves the user input data into an excel file

// Include the PhpSpreadsheet library
require_once 'vendor/autoload.php';

// Use the namespace of the library
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Get the user input data from the AJAX request
$name = $_POST['name'];
$hall = $_POST['hall'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];

// Create a new spreadsheet object
$spreadsheet = new Spreadsheet();

// Get the active sheet
$sheet = $spreadsheet->getActiveSheet();

// Set the column names
$sheet->setCellValue('A1', 'Name');
$sheet->setCellValue('B1', 'Hall Ticket Number');
$sheet->setCellValue('C1', 'Email ID');
$sheet->setCellValue('D1', 'Mobile Number');

// Get the last row number
$lastRow = $sheet->getHighestRow();

// Insert the user input data into the next row
$sheet->setCellValue('A' . ($lastRow + 1), $name);
$sheet->setCellValue('B' . ($lastRow + 1), $hall);
$sheet->setCellValue('C' . ($lastRow + 1), $email);
$sheet->setCellValue('D' . ($lastRow + 1), $mobile);

// Create a new writer object
$writer = new Xlsx($spreadsheet);

// Save the excel file
$writer->save('data.xlsx');

// Send a confirmation message to the user
echo "Your data has been saved successfully in data.xlsx";
?>
