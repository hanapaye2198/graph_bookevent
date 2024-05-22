<?php
if (isset($_POST['print'])) {
     require_once('../assets/tcpdf/tcpdf.php');
     $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
     $obj_pdf->SetCreator(PDF_CREATOR);
     $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");
     $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
     $obj_pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
     $obj_pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
     $obj_pdf->SetDefaultMonospacedFont('helvetica');
     $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

     $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
     $obj_pdf->setPrintHeader(false);
     $obj_pdf->setPrintFooter(false);
     $obj_pdf->SetAutoPageBreak(TRUE, 10);
     $obj_pdf->SetFont('helvetica', '', 12);
     $obj_pdf->AddPage();

     $content = '';
     $content .= ' <h1>Visitors Logs</h1>
                 <table border="1" cellpadding="5">
                     <thead>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Age Range</th>
                          <th>Gender</th>
                          <th>Address</th>
                     </thead>
                     <tbody>';
     if (is_array($fetch_data)) {
          $sn = 1;
          foreach ($fetch_data as $data) {
               $content .= '<tr>
                              <td>' . $sn . '</td>
                              <td>' . $data['name'] ?? '' . '</td>
                              <td>' . $data['age'] ?? '' . '</td>
                              <td>' . $data['gender'] ?? '' . '</td>
                              <td>' . $data['address'] ?? '' . '</td>
                          </tr>';
               $sn++;
          }
     } else {
          $content .= '<tr>
                          <td colspan="5">' . $fetch_data . '</td>
                      </tr>';
     }
     $content .= '</tbody></table>';
     $obj_pdf->writeHTML($content, true, false, true, false);
     $obj_pdf->Output('sample.pdf', 'I');
}
