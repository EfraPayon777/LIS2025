<?php
// Definición de la clase
class auto {
    // Propiedades de la clase auto
    private $marca;
    private $modelo;
    private $color;
    private $image;

    // Método constructor
    function __construct($marca = 'Honda', $modelo = 'Civic', $color = 'Gris', $image = 'img/hondacivic.jpg') {
        // El constructor inicializa los valores de las propiedades
        // del objeto con los valores recibidos en los argumentos.
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->color = $color;
        $this->image = $image;
    }

    // Métodos de la clase

    // Getter para la propiedad $marca
    public function getMarca() {
        return $this->marca;
    }

    // Getter para la propiedad $modelo
    public function getModelo() {
        return $this->modelo;
    }

    // Método para mostrar la información del auto
    function mostrar() {
        // El método mostrar() crea una tabla HTML donde se muestran
        // los detalles del objeto auto, como la marca, una imagen,
        // el modelo y el color del auto.
        $tabla = "<div class='col-4 mb-3'>";
        $tabla .= "<div class='card'>";
        $tabla .= "<div class='card-header'>" . $this->marca . "</div>";
        $tabla .= "<img class='card-img-top' src='" . $this->image . "' alt='Card image cap'>";
        $tabla .= "<div class='card-body'>";
        $tabla .= "<h5 class='card-title'>" . $this->marca . " " . $this->modelo . "</h5>";
        $tabla .= "<p class='card-text'> MODELO: " . $this->modelo . "<br>";
        $tabla .= "COLOR: " . $this->color . "</p>";
        $tabla .= "</div>";
        $tabla .= "</div>";
        $tabla .= "</div>";
        echo $tabla;
    }
}
?>