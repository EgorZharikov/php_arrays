<?php
define('MAIN_ROOT', __DIR__);
include_once(MAIN_ROOT . "/app/project-functions.php");
include_once(MAIN_ROOT . "/app/example-persons-array.php");
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task_12.6</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        .project-card {
            height: 100vh;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row project-card align-items-center">
            <div class="col col-md-6 offset-md-3">
                <div class="mt-5">
                    <h5>getFullnameFromParts()</h5>
                </div>
                <form name="form1" action="" method="post">
                    <div class="mb-1">
                        <label for="InputSurname" class="form-label">Фамилия:</label>
                        <input type="text" name="Surname" class="form-control" id="InputSurname" placeholder="">
                    </div>
                    <div class="mb-1">
                        <label for="InputName" class="form-label">Имя:</label>
                        <input type="text" name="Name" class="form-control" id="InputName" placeholder="">
                    </div>
                    <div class="mb-2">
                        <label for="InputPatronomyc" class="form-label">Отчество:</label>
                        <input type="text" name="Patronomyc" class="form-control" id="InputPatronomyc"" placeholder="">
                    </div>
                    <button type=" submit" name="btn1" class="btn btn-primary">Отправить</button>
                </form>
                <div class="alert alert-primary mt-3" role="alert">
                    <?php
                    if (isset($_POST['btn1'])) {
                        echo getFullnameFromParts($_POST['Surname'], $_POST['Name'], $_POST['Patronomyc']);
                    }
                    ?>
                </div>
                <hr>  
                <div class="mt-4">
                    <h5>getPartFromFullName()</h5>
                </div>
                <form name="form2" action="" method="post">
                    <div class="mt-4 mb-2">
                        <label for="InputFullName class=" form-label">Ф.И.О:</label>
                        <input type="text" name="fullName" class="form-control" id="InputFullName" placeholder="">
                    </div>
                    <button type="submit" name="btn2" class="btn btn-primary">Отправить</button>
                </form>
                <div class="alert alert-primary mt-3" role="alert">
                    <?php
                    if (isset($_POST['btn2'])) {
                        print_r(getPartsFromFullname($_POST['fullName']));
                    }
                    ?>
                </div>
                <hr>
                <div class="mt-4">
                    <h5>getShortName()</h5>
                </div>
                <form name="form3" action="" method="post">
                    <div class="mt-4 mb-2">
                        <label for="InputFullName2 class=" form-label">Ф.И.О:</label>
                        <input type="text" name="fullName" class="form-control" id="InputFullName2" placeholder="">
                    </div>
                    <button type="submit" name="btn3" class="btn btn-primary">Отправить</button>
                </form>
                <div class="alert alert-primary mt-3" role="alert">
                    <?php
                    if (isset($_POST['btn3'])) {
                        echo getShortName($_POST['fullName']);
                    }
                    ?>
                </div>
                <hr>
                <div class="mt-4">
                    <h5>getGenderFromName()</h5>
                    <p>1 = man / -1 = woman / 0 = undefined </p>
                </div>
                <form name="form4" action="" method="post">
                    <div class="mt-4 mb-2">
                        <label for="InputFullName3 class=" form-label">Ф.И.О:</label>
                        <input type="text" name="fullName" class="form-control" id="InputFullName3" placeholder="">
                    </div>
                    <button type="submit" name="btn4" class="btn btn-primary">Отправить</button>
                </form>
                <div class="alert alert-primary mt-3" role="alert">
                    <?php
                    if (isset($_POST['btn4'])) {
                        echo getGenderFromName($_POST['fullName']);
                    }
                    ?>
                </div>
                <hr>
                <div class="mt-4">
                    <h5>getGenderDescription()</h5>
                </div>
                <div class="alert alert-primary mt-3" role="alert">
                    <pre><?php if (isset($_POST['btn5'])) {
                                echo getGenderDescription($example_persons_array);
                            } ?></pre>
                </div>
                <form name="form5" action="" method="post">
                    <button type="submit" name="btn5" class="btn btn-primary">Отправить</button>
                </form>
                <hr>
                <div class="mt-4">
                    <h5>getPerfectPartner()</h5>
                </div>
                <form name="form6" action="" method="post">
                    <div class="mb-1">
                        <label for="InputSurname2" class="form-label">Фамилия:</label>
                        <input type="text" name="Surname" class="form-control" id="InputSurname2" placeholder="">
                    </div>
                    <div class="mb-1">
                        <label for="InputName2" class="form-label">Имя:</label>
                        <input type="text" name="Name" class="form-control" id="InputName2" placeholder="">
                    </div>
                    <div class="mb-2">
                        <label for="InputPatronomyc2" class="form-label">Отчество:</label>
                        <input type="text" name="Patronomyc" class="form-control" id="InputPatronomyc2"" placeholder="">
                    </div>
                    <button type=" submit" name="btn6" class="btn btn-primary">Отправить</button>
                </form>
                <div class="alert alert-primary mt-3" role="alert">
                    <pre><?php if (isset($_POST['btn6'])) {
                                echo getPerfectPartner($_POST['Surname'], $_POST['Name'], $_POST['Patronymic'], $example_persons_array);
                            } ?></pre>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>