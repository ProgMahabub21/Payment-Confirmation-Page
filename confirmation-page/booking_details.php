<!DOCTYPE html>
<html>

<head>
    <title>Booking Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        /* Custom styles specific to the booking details page */
        body {
            padding: 50px;
        }

        .card {
            margin-bottom: 10px;
        }

        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Apple Chancery', cursive;
            color: #063970;
            font-weight: bold;
        }

        .golden-euro {
            color: goldenrod;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php
                // Retrieve and display booking details
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Get the submitted form data
                    $name = isset($_POST['name']) ? $_POST['name'] : "name";
                    $surname = isset($_POST['surname']) ? $_POST['surname'] : "N/A";
                    $email = isset($_POST['email']) ? $_POST['email'] : "N/A";
                    // ... retrieve other form data as needed
                    $foodquantity = isset($_POST['food_quantity']) ? $_POST['food_quantity'] : 1;

                    // Simulated data for tour details
                    $boatName = isset($_POST['boatname']) ? $_POST['boatname'] : "Example Boat";
                    $departureDetails = isset($_POST['deptdetails']) ? $_POST['deptdetails'] : "June 10, 2023 - Miami, FL - 9:00 AM";

                    // Simulated data for ticket details
                    $purchaseDate = date('F j, Y');
                    $status = "Paid";
                    $ticketCategories = [
                        ["category" => "Adults(6-99)", "quantity" => isset($_POST['adult']) ? $_POST['adult'] : 0, "price" => isset($_POST['adultrate']) ? $_POST['adultrate'] : 40],
                        ["category" => "Kids(2-5)", "quantity" => isset($_POST['kids1']) ? $_POST['kids1'] : 1, "price" => isset($_POST['kidsrate']) ? $_POST['kidsrate'] : 25],
                        ["category" => "Kids(0-2)", "quantity" => isset($_POST['kids0']) ? $_POST['kids0'] : 1, "price" => "Free"],
                    ];
                    $totalTicketPrice = isset($_POST['totalprice']) ? $_POST['totalprice'] : 125; //default is 125 or actual price

                    // // Simulated data for meal selection
                    // $selectedMeals = [
                    //     ["type" => "Breakfast", "options" => ["Meat", "Fish"] , "quantity" => [$foodquantity]],
                    //     ["type" => "Lunch", "options" => ["Vegetarian"]],
                    //     ["type" => "Dinner", "options" => ["Fish"]]
                    // ];
                    $selectedMeals = [];

                    // Check if Breakfast is selected
                    if (isset($_POST['breakfast'])) {
                        $breakfastOptions = [];
                        // Check if Meat is selected
                        if (isset($_POST['meat']) && $_POST['meat_quantity'] > 0) {
                            $breakfastOptions[] = [
                                'option' => 'Meat',
                                'quantity' => $_POST['meat_quantity']
                            ];
                        }
                        // Check if Fish is selected
                        if (isset($_POST['fish']) && $_POST['fish_quantity'] > 0) {
                            $breakfastOptions[] = [
                                'option' => 'Fish',
                                'quantity' => $_POST['fish_quantity']
                            ];
                        }
                        if (!empty($breakfastOptions)) {
                            $selectedMeals[] = [
                                'type' => 'Breakfast',
                                'options' => $breakfastOptions
                            ];
                        }
                    }

                    // Check if Lunch is selected
                    if (isset($_POST['lunch'])) {
                        $selectedMeals[] = [
                            'type' => 'Lunch',
                            'options' => [['option' => 'Vegetarian']]
                        ];
                    }

                    // Check if Dinner is selected
                    if (isset($_POST['dinner']) && $_POST['fish_dinner_quantity'] > 0) {
                        $selectedMeals[] = [
                            'type' => 'Dinner',
                            'options' => [['option' => 'Fish', 'quantity' => $_POST['fish_dinner_quantity']]]
                        ];
                    }

                    // Simulated data for additional notes
                    $additionalNotes = isset($_POST['addNotes']) ? $_POST['addNotes'] : "Please arrive 30 minutes before the departure time.";

                    // echo "<h2 class='mt-4'>Booking Details</h2>";

                    echo "<div class='card'>";
                    echo "<div class='card-header'><h5>Tour Details</h5></div>";
                    echo "<div class='card-body'>";
                    echo "<p><strong>Boat or tour name:</strong> $boatName</p>";
                    echo "<p><strong>Departure details:</strong> $departureDetails</p>";
                    echo "</div>";
                    echo "</div>";

                    echo "<div class='card'>";
                    echo "<div class='card-header'><h5>Ticket Details</h5></div>";
                    echo "<div class='card-body'>";
                    echo "<p><strong>Purchase date:</strong> $purchaseDate</p>";
                    echo "<p class='color:  #063970  '><strong>Status:</strong> $status</p>";
                    echo "<ul>";
                    foreach ($ticketCategories as $ticketCategory) {
                        $category = $ticketCategory["category"];
                        $quantity = $ticketCategory["quantity"];
                        $price = $ticketCategory["price"];
                        echo "<li>$category - Quantity: $quantity x, Price: " . ($price == "Free" ? "Free" : "$price <span class='golden-euro'>€</span>") . "</li>";
                    }
                    echo "</ul>";
                    echo "<p><strong>Total ticket price:</strong> $totalTicketPrice <span class='golden-euro'>€</span> </p>";
                    echo "</div>";
                    echo "</div>";

                    echo "<div class='card'>";
                    echo "<div class='card-header'><h5>Selected Meals</h5></div>";
                    echo "<div class='card-body'>";
                    echo "<ul>";
                    if (!empty($selectedMeals)) {
                        echo "<ul>";
                        foreach ($selectedMeals as $meal) {
                            $mealType = $meal['type'];
                            echo "<li>$mealType:</li>";
                            echo "<ul>";
                            foreach ($meal['options'] as $option) {
                                $mealOption = $option['option'];
                                $quantity = isset($option['quantity']) ? 'Quantity: ' . $option['quantity'] : '';
                                echo "<li>$mealOption ($quantity)</li>";
                            }
                            echo "</ul>";
                        }
                        echo "</ul>";
                    } else {
                        echo "N/A";
                    }
                    echo "</ul>";
                    echo "</div>";
                    echo "</div>";
                    echo "";
                }
                ?>
            </div>
            <div class="col-md-6">
                <?php
                // Retrieve and display buyer details
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Get the submitted form data
                    $name = isset($_POST['name']) ? $_POST['name'] : "name";
                    $surname = isset($_POST['surname']) ? $_POST['surname'] : "N/A";
                    $email = isset($_POST['email']) ? $_POST['email'] : "N/A";
                    // ... retrieve other form data as needed

                    echo "<div class='card'>";
                    echo "<div class='card-header'><h5>Buyer Information</h5></div>";
                    echo "<div class='card-body'>";
                    echo "<p><strong>Name:</strong> $name</p>";
                    echo "<p><strong>Surname:</strong> $surname</p>";
                    echo "<p><strong>Email:</strong> $email</p>";
                    echo "</div>";
                    echo "</div>";

                    echo "<div class='card'>";
                    echo "<div class='card-header'><h5>Additional Notes</h5></div>";
                    echo "<div class='card-body'>";
                    echo "<p class= 'text-color: 	#ff0000 ' ><strong>$additionalNotes</strong> </p>";

                    echo "</div>";
                    echo "</div>";

                    //echo "<div class= 'card'>";
                    echo " <div class='text-center mt-4'>";
                    echo "<button type='button' class='btn btn-primary btn-md mr-2'>Print the Ticket</button>";
                    echo '<button type="button" class="btn btn-secondary btn-md">Send to Mail</button>"';
                    echo " </div>";

                    // echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="script.js"></script>
</body>

</html>