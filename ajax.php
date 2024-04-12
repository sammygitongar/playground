<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <H2>Save Images In DB Then Beautifully Retrieve them</H2>

    <div class="save-form">
        <h3>Save Image Form</h3>
        <form action="file_handler.php" method='post' enctype='multipart/form-data'>
            <label for="adno">Adno:</label>
            <input type="text" name="adno" id="adno">
            <input type="file" name="image" id="image">
            <button type="submit">Submit</button>
        </form>
    </div>


    <script>
        $.ajax({
            url: "test_save.php",
            type: "POST",
            data: {
                adno: adno,
                imageData: imageData
            },
            success:function(response) {
                console.log(response);
            },
            error:function(xhr, status, error){
                console.error(error);
            }

        });
    </script>

    <?php 
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['adno']) && isset($_POST['imageData'])){
            $adno = $_POST['adno'];
            $imageData == $_POST['imageData'];
            echo 'Data retrieved successfully';
        } else {
            echo 'Data retrieval failed';
        }
    ?>

</body>
</html>



