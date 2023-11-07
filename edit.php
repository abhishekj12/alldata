<?php
include('connection.php');
$id = $_GET['id'];
$query = "SELECT * FROM data WHERE id= '$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$right = explode(",", $row['pernission']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>

    <div class="container">
        <h4>Edit From</h4>
        <form action="update.php" method="POST">
            <div class="form-group row">
                <div class="col-sm-10">
                    <input type="hidden" class="form-control" placeholder="name" name="id" value="<?php echo $row['id'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-1">Rights</div>
                <div class="col-sm-13">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck1" name="rights[]" value="Dashboard" <?php
                                                                                                                            if (in_array("Dashboard", $right)) {
                                                                                                                                echo "checked";
                                                                                                                            }
                                                                                                                            ?>>
                        <label class="form-check-label" for="gridCheck1">
                            Dashboard
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck1" name="rights[]" value="provide list" <?php
                                                                                                                                if (in_array("provide list", $right)) {
                                                                                                                                    echo "checked";
                                                                                                                                }
                                                                                                                                ?>>
                        <label class="form-check-label" for="gridCheck1">
                            provide list
                        </label>

                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck1" name="rights[]" value="customerlist" <?php
                                                                                                                                if (in_array("customerlist", $right)) {
                                                                                                                                    echo "checked";
                                                                                                                                }
                                                                                                                                ?>>
                        <label class="form-check-label" for="gridCheck1">
                            customer List
                        </label>

                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck1" name="rights[]" value="joblist" <?php
                                                                                                                        if (in_array("joblist", $right)) {
                                                                                                                            echo "checked";
                                                                                                                        }
                                                                                                                        ?>>
                        <label class="form-check-label" for="gridCheck1">
                            Job List
                        </label>

                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck1" name="rights[]" value="complainelist" <?php
                                                                                                                                if (in_array("complainelist", $right)) {
                                                                                                                                    echo "checked";
                                                                                                                                }
                                                                                                                                ?>>
                        <label class="form-check-label" for="gridCheck1">
                            Compalaine List
                        </label>

                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <input type="submit" value="Submit" name="submit" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
</body>

</html>