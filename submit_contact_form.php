<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if it's a Smashcard form submission
    if (isset($_POST['name']) && isset($_POST['hp']) && isset($_POST['cardPower'])) {
        // Get form data for Smashcard submission
        $name = htmlspecialchars($_POST['name']);
        $hp = htmlspecialchars($_POST['hp']);
        $cardPower = htmlspecialchars($_POST['cardPower']);
        $abilityName = htmlspecialchars($_POST['abilityName']);
        $abilityText = htmlspecialchars($_POST['abilityText']);

        $attack1Name = htmlspecialchars($_POST['attack1Name']);
        $attack1Text = htmlspecialchars($_POST['attack1Text']);
        $attack1Damage = htmlspecialchars($_POST['attack1Damage']);
        $attack1Priority = htmlspecialchars($_POST['attack1Priority']);
        $attack1Type = htmlspecialchars($_POST['attack1Type']);

        $attack2Name = htmlspecialchars($_POST['attack2Name']);
        $attack2Text = htmlspecialchars($_POST['attack2Text']);
        $attack2Damage = htmlspecialchars($_POST['attack2Damage']);
        $attack2Priority = htmlspecialchars($_POST['attack2Priority']);
        $attack2Type = htmlspecialchars($_POST['attack2Type']);

        $weakness = htmlspecialchars($_POST['weakness']);

        // Encoded Data (for reference or future use)
        $encodedData = "$name|$hp|$cardPower|$abilityName|$abilityText|$attack1Name|$attack1Text|$attack1Damage|$attack1Priority|$attack1Type|$attack2Name|$attack2Text|$attack2Damage|$attack2Priority|$attack2Type|$weakness";

        // Email Setup for Smashcard Submission
        $to = "Levijder@gmail.com";
        $subject = "New Smashcard Submission - $name";
        $message = "
        Smashcard Submitted Successfully!

        Name: $name
        HP: $hp
        Card Power: $cardPower

        Ability Name: $abilityName
        Ability Text: $abilityText

        Attack 1: $attack1Name
        Attack 1 Text: $attack1Text
        Attack 1 Damage: $attack1Damage
        Attack 1 Priority: $attack1Priority
        Attack 1 Type: $attack1Type

        Attack 2: $attack2Name
        Attack 2 Text: $attack2Text
        Attack 2 Damage: $attack2Damage
        Attack 2 Priority: $attack2Priority
        Attack 2 Type: $attack2Type

        Weakness: $weakness

        Encoded Data:
        $encodedData
        ";

        $headers = "From: no-reply@yourwebsite.com\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        if (mail($to, $subject, $message, $headers)) {
            echo "<h3>Smashcard Form Submitted Successfully!</h3>";
        } else {
            echo "<p>Sorry, there was an issue sending your message. Please try again later.</p>";
        }
    }

    // Check if it's an order form submission
    if (isset($_POST['email']) && isset($_POST['item']) && isset($_POST['quantity'])) {
        // Get order form data
        $email = htmlspecialchars($_POST['email']);
        $item = htmlspecialchars($_POST['item']);
        $quantity = htmlspecialchars($_POST['quantity']);

        // Email Setup for Order Submission
        $orderTo = "Levijder@gmail.com";
        $orderSubject = "New Smashcards Order - $item";
        $orderMessage = "
        New Order Received!

        Customer Email: $email
        Item: $item
        Quantity: $quantity

        Please confirm the order with the customer and arrange for in-person payment.
        ";

        $orderHeaders = "From: no-reply@yourwebsite.com\r\n";
        $orderHeaders .= "Content-Type: text/plain; charset=UTF-8\r\n";

        if (mail($orderTo, $orderSubject, $orderMessage, $orderHeaders)) {
            echo "<h3>Order Submitted Successfully! We will confirm your order via email.</h3>";
        } else {
            echo "<p>Sorry, there was an issue submitting your order. Please try again later.</p>";
        }
    }
}
?>
