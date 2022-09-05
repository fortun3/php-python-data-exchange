<?php 
ob_start();

if(isset($_POST['submit'])){
    $fruit = $_POST['search'];
    #shell execute main.py and send $fruit
    $output = shell_exec("python main.py " .$fruit);
    $result = json_decode($output, true);
}

ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruits</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .container {
            display: block;
            width: 95%;
            margin: auto;

        }

        label {
            display: block;
            font-size: 2rem;
            text-align: center;
            font-weight: bold;
        }

        input {
            width: 100%;
            border: 2px solid black;
            font-size: 1.5rem;

        }

        button {
            display: block;
            width: 8rem;
            margin: auto;
            margin-top: .3rem;
            padding: .3em;
            font-size: 1.5rem;
            cursor: pointer;
        }

        p {
            text-align: center;
            font-size: 1.5rem;
            margin: .3rem;
        }

        .img {
            display: grid;
            place-items: center;
        }

        img {
            border: 1px solid gray;
            width: 20rem;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="search">
            <form method="POST">
                <label for="search">Enter the name of the fruit: </label>
                <input type="text" placeholder="Search.." name="search" id="search">
                <div>
                    <button type="submit" name="submit">Check</button>
                </div>
            </form>
        </div>

        <P><?= isset($result)? $result['description'] : "" ?></P>
        <div class="img">
            <?php if(isset($result)){ ?>
                <?php foreach($result['pic'] as $image){ ?>
                    <img src="<?= $image ?>.jpg">
                <?php } ?>
            <?php } ?>
        </div>

    </div>
</body>

</html>