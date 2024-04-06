<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


<h1>Here is a Calculator I Made in 30 minutes</h1>

<div class="calc-container">
    <form action="">
        <input type="text" name="num1" placeholder="Number 1">
        <input type="text" name="num2" placeholder="Number 2">
        <select name="operator">
            <option>None</option>
            <option>Add</option>
            <option>Subtract</option>
            <option>Multiply</option>
            <option>Divide</option>
        </select>
        <button type="submit" name="submit" value="submit">Calculate</button>
    </form>
    <p>The answer is: </p>
    <?php 
    if (isset($_GET["submit"])){
        $var1 = $_GET["num1"];
        $var2 = $_GET["num2"];
        $operator = $_GET["operator"];

        switch($operator){
            case "None":
                echo "You need to select an operator";
            break;
            case "Add":
                echo $var1 + $var2;
            break;
            case "Subtract":
                echo $var1 - $var2;
            break;
            case "Multiply":
                echo $var1 * $var2;
            break;
            case "Divide":
                echo $var1 / $var2;
            break;
        }

    }
    
    
    
    ?>
</div>





    
</body>
</html>