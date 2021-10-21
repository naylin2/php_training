<?php
// Include config file
require_once "includes/dbh.php";

// Define variables and initialize with empty values
$name = $address = $salary = $budget = "";
$name_err = $address_err = $salary_err = $budget_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    $input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $name_err = "Please enter a name.";
    } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $name_err = "Please enter a valid name.";
    } else {
        $name = $input_name;
    }

    // Validate address
    $input_address = trim($_POST["address"]);
    if (empty($input_address)) {
        $address_err = "Please enter an address.";
    } else {
        $address = $input_address;
    }

    // Validate salary
    $input_salary = trim($_POST["salary"]);
    if (empty($input_salary)) {
        $salary_err = "Please enter the salary amount.";
    } elseif (!ctype_digit($input_salary)) {
        $salary_err = "Please enter a positive integer value.";
    } else {
        $salary = $input_salary;
    }

    // Validate budget
    $input_budget = trim($_POST["budget"]);
    if (empty($input_budget)) {
        $budget_err = "Please enter the salary amount.";
    } elseif (!ctype_digit($input_budget)) {
        $budget_err = "Please enter a positive integer value.";
    } else {
        $budget = $input_budget;
    }

    // Check input errors before inserting in database
    if (empty($name_err) && empty($address_err) && empty($salary_err) && empty($budget_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO people (name, address, salary, budget) VALUES (?, ?, ?,?)";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssss", $param_name, $param_address, $param_salary, $param_budget);

            // Set parameters
            $param_name = $name;
            $param_address = $address;
            $param_salary = $salary;
            $param_budget = $budget;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        $stmt->close();
    }

    // Close connection
    $mysqli->close();
}
?>

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        body{
            background: #f7e2d1;
        }
        .btn{
            background: #d3685e;
            border-color: #d3685e;
            color: #fff;
        }
        .btn:hover{
            background: #d3685e;
            opacity: 0.7;
            color: #fff;
        }
        .btn:focus{
            box-shadow: none;
            outline: none;
            border-color: #d3685e;
        }
        .form-control{
            background: #fff2e8;
            border-color: #fff2e8;
        }
        .form-control:focus{
            box-shadow: none;
            outline: none;
            border-color: #d3685e;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>"><?php echo $address; ?></textarea>
                            <span class="invalid-feedback"><?php echo $address_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Salary</label>
                            <input type="text" name="salary" class="form-control <?php echo (!empty($salary_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $salary; ?>">
                            <span class="invalid-feedback"><?php echo $salary_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Budget</label>
                            <input type="text" name="budget" class="form-control <?php echo (!empty($budget_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $budget; ?>">
                            <span class="invalid-feedback"><?php echo $budget_err; ?></span>
                        </div>
                        <input type="submit" class="btn" value="Submit">
                        <a href="index.php" class="btn ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>