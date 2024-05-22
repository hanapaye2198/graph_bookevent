<?php
require_once('../assets/tcpdf/tcpdf.php');
require_once('../conn.php');
// Connect to database
$db = $conn;
$tableName = "tbl_survey";
$col = ['id', 'name', 'age', 'gender', 'address', 'time_now'];
$data = fetch_data($db, $tableName, $col);

// Create PDF object
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Database Report');
$pdf->SetSubject('Database Report');
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont('helvetica');
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->setFooterData('', PDF_HEADER_LOGO_WIDTH, 'THIS IS THE FOOTER', '');
$pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
$pdf->setPrintHeader(true);
$pdf->setPrintFooter(true);
$pdf->SetAutoPageBreak(TRUE, 10);
$pdf->SetFont('helvetica', '', 12);
$pdf->AddPage();

// Set header
$pdf->Cell(0, 10, 'MIYAKI INLAND RESORT', 0, 1, 'C');

// Print data in a table
$html = '<table border="1" cellpadding="5" class="table table-hover table-striped">';
$html .= '<tr><th>ID</th>
          <th>Name</th>
          <th>Age</th>
          <th>Gender</th>
          <th>Address</th>
          <th>Date</th>
          </tr>';

foreach ($data as $row) {

     $html .= '<tr>';
     $html .= '<td>' . $row['id'] . '</td>';
     $html .= '<td>' . $row['name'] . '</td>';
     $html .= '<td>' . $row['age'] . '</td>';
     $html .= '<td>' . $row['gender'] . '</td>';
     $html .= '<td>' . $row['address'] . '</td>';
     $html .= '<td>' . $row['time_now'] . '</td>';
     $html .= '</tr>';
}

$html .= '</table>';
$pdf->SetMargins(0, 0, 20);
$pdf->writeHTML($html, true, false, true, false,);
$pdf->Output('database_report.pdf', 'D');

function fetch_data($db, $tableName, $col)
{
     if (empty($db)) {
          $msg = "database connection error";
     } elseif (empty($col) || !is_array($col)) { 
          $msg = "column name  must be defined as an indexed array";
     } elseif (empty($tableName)) {
          $msg = "table name must be defined";
     } else {
          $columnName = implode(", ", $col);
          $query = "SELECT " . $columnName . " FROM $tableName" . " ORDER BY time_now DESC";
          $result = $db->query($query);

          if ($result == true) {
               if ($result->num_rows > 0) {
                    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    $msg = $row;
               } else {
                    $msg = "no data found";
               }
          } else {
               $msg = mysqli_error($db);
          }
     }
     return $msg;
}
