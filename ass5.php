<!DOCTYPE html> 
 <html lang="en"> 
 <head> 
 <meta charset="UTF-8"> 
 <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
 <title>Shape Area Calculator</title> 
 <style> 
        body { 
            font-family: Arial, sans-serif; 
            margin: 0; 
            padding: 0; 
            background-color: #f2f2f2; 
        } 
        h1 { 
            text-align: center; 
        } 
        form { 
            max-width: 400px; 
            margin: 20px auto; 
            padding: 20px; 
            background-color: #fff; 
            border-radius: 8px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
        } 
        form input[type="radio"] { 
            margin-right: 10px; 
        } 
        input[type="submit"] { 
            display: block; 
            width: 100%; 
            padding: 10px; 
            margin-top: 10px; 
            background-color: #007bff; 
            color: #fff; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer; 
        } 
        input[type="submit"]:hover { 
            background-color: #0056b3; 
        } 
        p { 
            margin-top: 20px; 
        } 
    </style> 
 </head> 
 <body> 
 <h1>Shape Area Calculator</h1> 
 <form method="get"> 
 <input type="radio" name="shape" value="triangle"> Triangle 
 <input type="radio" name="shape" value="square"> Square 
 <input type="radio" name="shape" value="circle"> Circle 
 <br><br> 
 <input type="submit" value="Calculate Area"> 
 </form> 

 <?php 
 class Shape { 
 public function calculateArea() { 
 return 0; 
 } 
 } 

 class Triangle extends Shape { 
 private $base; 
 private $height; 
 public function __construct($base, $height) { 
 $this->base = $base; 
 $this->height = $height; 
} 
public function calculateArea() { 
return 0.5 * $this->base * $this->height; 
} 
public function getParameters() { 
return "Base: $this->base, Height: $this->height"; 
} 
} 

class Square extends Shape { 
private $side; 
public function __construct($side) { 
$this->side = $side; 
} 
public function calculateArea() { 
return $this->side * $this->side; 
} 
public function getParameters() { 
return "Side: $this->side"; 
} 
} 

class Circle extends Shape { 
private $radius; 
public function __construct($radius) { 
$this->radius = $radius; 
} 
public function calculateArea() { 
return M_PI * $this->radius * $this->radius; 
} 
public function getParameters() { 
return "Radius: $this->radius"; 
} 
}

if (isset($_GET["shape"])) { 
$selectedShape = $_GET["shape"]; 
switch ($selectedShape) { 
case "triangle": 
$shape = new Triangle(100, 50); 
break; 
case "square": 
$shape = new Square(18); 
break; 
case "circle": 
$shape = new Circle(40); 
break; 
default: 
$shape = new Shape(); 
break; 
} 
echo "<p>Selected Shape: $selectedShape</p>"; 
echo $shape->getParameters() . "</p>"; 
echo "<p>Area: " . $shape->calculateArea() . "</p>"; 
} 
?> 

</body> 
</html> 