<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANIMAL</title>
</head>
<body>
    <?php 
        class Animal {
            private $name;
            function __construct($name){
                $this->name = $name;
            }
            public function get_name(){
                return $this->name;
            }

        }
        class Lion extends Animal {
            public function print(){
                echo $this->get_name();
            }
        }

        $lion = new Lion("Scar");
    ?>
    <button onclick="alertOfLion()">Lion Alert</button>
    <script>
        function alertOfLion(){
            alert("Be careful! <?php $lion->print() ?> is coming!")
        }
    </script>
</body>
</html>