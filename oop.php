<html>
	<head>
	    <title>message.php</title>
	    <!-- Optional theme -->
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link type='text/css' rel='stylesheet' href='style.css'/>
	</head>
	<body>
		<div class="oop">
		<div class="jumbotron">
		<h4><a href = "/home.php">Home</a></h4>
		<?php
		class vehicle{

			public $name = 'Thanh';
			public $age  = 21;
			public $a;
			public $b;
			public function run(){
				echo "Learning OOP";
			}
			public function __construct($name, $age) {
				$this->name = $name;
				$this->age 	= $age;
				// $this->a 	= $a;
				// $this->b 	= $b;
			}
			public function hello(){
				return "hello, my name is ". $this->name . ". I'm " . $this->age . " year old.";
			}
			public function sum($a,$b){
				return $a + $b;
			}
		}
		class vehicle2 extends vehicle{
			
			public function run(){
				echo "Learnning more OOP.";
			}
		}
		$vehicle = new vehicle();
		$vehicle2 = new vehicle2();
		if (is_a($vehicle, 'vehicle')){
			echo "<h1>Complete!</h1>";
		}
		if (property_exists($vehicle, 'a')){
			echo "Have number a <br />";
		}
		if (method_exists($vehicle, "sum")) {
			echo "Have a 'sum' object.<br />";
		}	
		echo $vehicle->run()."<br />";
		echo $vehicle2->run();
		echo "<h1> 3 + 4 = " . $vehicle->sum(3,4) . "</h1><br />";
		echo $vehicle->hello()."<br />";
			
		function height($height = 170) {
			echo 'My height is '  . $height . ' cm<br>';
		}
		height(); //default is 170
		height(175);
		height(165);
		height(140)	;
		?>
		</div>
		</div>
	</body>
</html>