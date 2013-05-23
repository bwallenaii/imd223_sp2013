<?php require_once("employee.php");
require_once("more_examples/element.php");

//set each item separately
$emp1 = new Employee();
$emp1->name = "fred flinstone";
$emp1->job = "CEO";
$emp1->salary = 2568742159.63;
//$emp1->wildBill = true;
//Use constructor arguments
$emp2 = new Employee("Barney Rubble", "Vice President", 5687196);

new Employee("Bambam Rubble", "Mail Deliverer", 30500);
new Employee("Wilma flintstone", "Receptionist", 45500);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Outputting the Employee</title>
</head>
<body>

<?php
	foreach(Employee::getAll() as $employee):
?>
	<p>
		<?php //echo "$employee->name makes $employee->salaryNice as the $employee->job"; ?>
		<?php echo $employee; //made possible by overriding __toString() ?>
	</p>
<?php
	endforeach;
	
	$div1 = new Element();
	$div1->attributes->class = "large";
	$div1->attributes->style = "background-color: #cc9999;";
	$div1->content = "This is a large div!!";
	
	echo $div1;
	
	echo new Element("p", "I am the great cheese!", array("id" => "cheese", "style" => "color: #e8b313"));
	
?>

</body>
</html>


