<?php
require_once 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'Name');
    $sheet->setCellValue('B1', 'Hall Ticket No');
    $sheet->setCellValue('C1', 'Email');
    $sheet->setCellValue('D1', 'Mobile No');

    $row = 2;
    $name = $_POST["name"];
    $hallTicketNo = $_POST["hallTicketNo"];
    $email = $_POST["email"];
    $mobileNo = $_POST["mobileNo"];

    $sheet->setCellValue('A' . $row, $name);
    $sheet->setCellValue('B' . $row, $hallTicketNo);
    $sheet->setCellValue('C' . $row, $email);
    $sheet->setCellValue('D' . $row, $mobileNo);

    $writer = new Xlsx($spreadsheet);
    $writer->save('data.xlsx');
}
?>
