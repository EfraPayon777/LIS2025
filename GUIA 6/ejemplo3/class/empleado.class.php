<?php
// Definición de la clase empleado
class empleado {
    // Estableciendo las propiedades de la clase
    private static $idEmpleado = 0;
    private $nombre;
    private $apellido;
    private $isss;
    private $renta;
    private $afp;
    private $sueldoNominal;
    private $sueldoLiquido;
    private $pagoxhoraextra;
    private $prestamo; // Nueva propiedad para el préstamo

    // Declaración de constantes para los descuentos del empleado
    const descISSS = 0.03;
    const descRENTA = 0.075;
    const descAFP = 0.0625;

    // Constructor de la clase
    function __construct() {
        self::$idEmpleado++;
        $this->nombre = "";
        $this->apellido = "";
        $this->sueldoLiquido = 0.0;
        $this->pagoxhoraextra = 0.0;
        $this->prestamo = 0.0; // Inicializar el préstamo en 0
    }

    // Destructor de la clase
    function __destruct() {
        echo "<p class=\"msg\">El salario y descuentos del empleado han sido calculados.</p>";
        $backlink = "<a class=\"a-btn\" href=\"sueldoneto.php\">";
        $backlink .= "<span class=\"a-btn-text\">Calcular salario </span>";
        $backlink .= "<span class=\"a-btn-slide-text\">a otro empleado</span>";
        $backlink .= "<span class=\"a-btn-slide-icon\"></span>";
        $backlink .= "</a>";
        echo $backlink;
    }

    // Métodos de la clase empleado
    function obtenerSalarioNeto($nombre, $apellido, $salario, $horasextras, $pagoxhoraextra = 0.0, $prestamo = 0.0) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->pagoxhoraextra = $horasextras * $pagoxhoraextra;
        $this->sueldoNominal = $salario;
        $this->prestamo = $prestamo; // Asignar el valor del préstamo

        if ($this->pagoxhoraextra > 0) {
            $this->isss = ($salario + $this->pagoxhoraextra) * self::descISSS;
            $this->afp = ($salario + $this->pagoxhoraextra) * self::descAFP;
        } else {
            $this->isss = $salario * self::descISSS;
            $this->afp = $salario * self::descAFP;
        }

        $salariocondescuento = $this->sueldoNominal - ($this->isss + $this->afp);

        // Cálculo del descuento de renta
        if ($salariocondescuento > 2038.10) {
            $this->renta = $salariocondescuento * 0.3;
        } elseif ($salariocondescuento > 895.24 && $salariocondescuento <= 2038.10) {
            $this->renta = $salariocondescuento * 0.2;
        } elseif ($salariocondescuento > 472.00 && $salariocondescuento <= 895.24) {
            $this->renta = $salariocondescuento * 0.1;
        } elseif ($salariocondescuento > 0 && $salariocondescuento <= 472.00) {
            $this->renta = 0.0;
        }

        // Calcular el sueldo líquido
        $this->sueldoLiquido = $this->sueldoNominal + $this->pagoxhoraextra - ($this->isss + $this->afp + $this->renta);

        // Aplicar el descuento por préstamo si existe
        if ($this->prestamo > 0) {
            $this->sueldoLiquido -= $this->prestamo;
        }

        $this->imprimirBoletaPago();
    }

    function imprimirBoletaPago() {
        $tabla = "<table class='table '><tr>";
        $tabla .= "<td>Id empleado: </td>";
        $tabla .= "<td>" . self::$idEmpleado . "</td></tr>";
        $tabla .= "<tr><td>Nombre empleado: </td>\n";
        $tabla .= "<td>" . $this->nombre . " " . $this->apellido . "</td></tr>";
        $tabla .= "<tr><td>Salario nominal: </td>";
        $tabla .= "<td>$ " . number_format($this->sueldoNominal, 2, '.', ',') . "</td></tr>";
        $tabla .= "<tr><td>Salario por horas extras: </td>";
        $tabla .= "<td>$ " . number_format($this->pagoxhoraextra, 2, '.', ',') . "</td></tr>";
        $tabla .= "<tr class='success'><td colspan=\"2\"><h4>Descuentos</h4></td></tr>";
        $tabla .= "<tr><td>Descuento seguro social: </td>";
        $tabla .= "<td>$ " . number_format($this->isss, 2, '.', ',') . "</td></tr>";
        $tabla .= "<tr><td>Descuento AFP: </td>";
        $tabla .= "<td>$ " . number_format($this->afp, 2, '.', ',') . "</td></tr>";
        $tabla .= "<tr><td>Descuento renta: </td>";
        $tabla .= "<td>$ " . number_format($this->renta, 2, '.', ',') . "</td></tr>";

        // Mostrar el descuento por préstamo si existe
        if ($this->prestamo > 0) {
            $tabla .= "<tr><td>Descuento por préstamo: </td>";
            $tabla .= "<td>$ " . number_format($this->prestamo, 2, '.', ',') . "</td></tr>";
        }

        $tabla .= "<tr><td>Total descuentos: </td>";
        $totalDescuentos = $this->isss + $this->afp + $this->renta + $this->prestamo;
        $tabla .= "<td>$ " . number_format($totalDescuentos, 2, '.', ',') . "</td></tr>";
        $tabla .= "<tr><td>Sueldo líquido a pagar: </td>";
        $tabla .= "<td> $" . number_format($this->sueldoLiquido, 2, '.', ',') . "</td></tr>";
        $tabla .= "</table>";
        echo $tabla;
    }
}
?>