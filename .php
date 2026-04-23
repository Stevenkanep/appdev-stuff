<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Registration Fee Calculator</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Event Registration Fee Calculator</h1>

    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Assign variables from POST data
        $age = isset($_POST['age']) ? intval($_POST['age']) : 0;
        $is_student = isset($_POST['is_student']);

        // Determine the base fee based on age
        if ($age < 13) {
            $base_price = 0;   // children under 13
        } elseif ($age < 18) {
            $base_price = 50;  // teenagers
        } else {
            $base_price = 100; // adults
        }

        // Apply student discount if applicable
        if ($is_student) {
            $discount = $base_price * 0.20; // 20% discount
            $final_price = $base_price - $discount;
        } else {
            $final_price = $base_price;
        }

        // Output the final price
        echo "<p class='result'>The registration fee for the attendee is: <strong>$" 
             . number_format($final_price, 2) . "</strong></p>";
    }
    ?>

    <form action="" method="post" class="form-container">
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required>

        <label for="is_student">Are you a student?</label>
        <input type="checkbox" id="is_student" name="is_student">

        <input type="submit" value="Calculate Fee" class="btn">
    </form>
</body>
</html>
