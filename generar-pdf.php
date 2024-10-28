<?php
require 'conexion.php';
require 'fpdf/fpdf.php';

if (!isset($_GET['tabla'])) {
    die("No se ha especificado ninguna tabla.");
}

$tabla = $_GET['tabla'];

// Definir columnas y consultas según la tabla seleccionada
switch ($tabla) {
    case 'articulos':
        $columns = ['idarticulo', 'idcategoria', 'nominacion', 'pventa', 'pcompra', 'existencia', 'idstatus', 'idmedida'];
        $sql = "SELECT a.*, c.categoria, m.medida, m.abr 
                FROM articulos a 
                LEFT JOIN categorias c ON a.idcategoria = c.idcategoria 
                LEFT JOIN medidas m ON a.idmedida = m.idmedida";
        break;
    
    case 'medidas':
        $columns = ['idmedida', 'medida', 'abr'];
        $sql = "SELECT idmedida, medida, abr FROM medidas";
        break;
    
    case 'departamentos':
        $columns = ['iddepartamento', 'departamento'];
        $sql = "SELECT iddepartamento, departamento FROM departamentos";
        break;
    
    case 'categorias':
        $columns = ['idcategoria', 'iddepartamento', 'categoria'];
        $sql = "SELECT c.*, d.departamento 
                FROM categorias c 
                LEFT JOIN departamentos d ON c.iddepartamento = d.iddepartamento";
        break;
    
    default:
        die("Tabla no válida.");
}

// Configuración de la clase PDF
class PDF extends FPDF {
    private $tableHeader;
    
    function setTableHeader($header) {
        $this->tableHeader = $header;
    }
    
    function Header() {
        global $tabla;
        // Fondo blanco (por defecto)
        
        // Logo o título
        $this->SetFont('Arial', 'B', 24);
        $this->SetTextColor(0); // Negro
        $this->Cell(0, 20, 'Reporte de ' . ucfirst($tabla), 0, 1, 'C');
        
        // Línea decorativa
        $this->SetDrawColor(0); // Negro
        $this->SetLineWidth(0.5);
        $this->Line(10, 30, 200, 30);
        
        $this->Ln(15);
        
        // Encabezados de columnas
        $this->SetFont('Arial', 'B', 11);
        $this->SetFillColor(255); // Blanco
        $this->SetTextColor(0); // Negro
        
        foreach ($this->tableHeader as $header) {
            $this->Cell(40, 12, ucfirst($header), 1, 0, 'C', true);
        }
        $this->Ln();
    }

    function Footer() {
        $this->SetY(-20);
        $this->SetFont('Arial', 'I', 10);
        $this->SetTextColor(0); // Negro
        $this->Cell(0, 10, 'Página ' . $this->PageNo() . ' - Generado el ' . date('d/m/Y H:i:s'), 0, 0, 'C');
        
        // Línea decorativa
        $this->SetDrawColor(0); // Negro
        $this->SetLineWidth(0.5);
        $this->Line(10, 280, 200, 280);
    }
}

$pdf = new PDF();
$pdf->setTableHeader($columns);
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(0); // Negro para el texto principal

$result = $conn->query($sql);

// Filas de la tabla
$fill = false;
while ($row = $result->fetch_assoc()) {
    $pdf->SetFillColor(255); // Blanco para todas las filas
    foreach ($columns as $column) {
        $value = $row[$column];
        
        // Formateo especial según el tipo de dato
        if ($column == 'pventa' || $column == 'pcompra') {
            $value = '$ ' . number_format($value, 2);
        } elseif ($column == 'existencia') {
            $value = number_format($value, 3);
        } elseif ($column == 'idstatus') {
            $value = ($value == 1) ? 'Activo' : 'Inactivo';
        }
        
        $pdf->Cell(40, 10, $value, 1, 0, 'C', $fill);
    }
    $pdf->Ln();
    $fill = false; // Mantiene todas las filas en blanco
}

if (isset($_GET['accion']) && $_GET['accion'] === 'descargar') {
    $pdf->Output('D', "$tabla-" . date('Y-m-d') . ".pdf");
} else {
    $pdf->Output();
}

$conn->close();
?>