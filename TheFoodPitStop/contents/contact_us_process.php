<?php

//session_start();
$_SESSION['error'] = '';
require_once $_SERVER['DOCUMENT_ROOT'] . '/TheFoodPitStop/init.php';

$fsubmit = filter_input(INPUT_POST, 'submit');

//errir handlers
//check for empty fields
if (isset($fsubmit))
{
    $name = filter_input(INPUT_POST, 'name');
    $subject = filter_input(INPUT_POST, 'subject');
    $email = filter_input(INPUT_POST, 'email');
    $message = filter_input(INPUT_POST, 'message');

    if (empty($name) || empty($subject) || empty($email) || empty($message))
    {
        $error = "All fields are required. Please try again!";
        $erreur = "Tous les champs sont requis.<br/>Veuillez réessayer!";
        $_SESSION['isError'] = true;
        $_SESSION['error'] = $error;
        $_SESSION['erreur'] = $erreur;
    } elseif (!preg_match("/^[a-zA-Z]*$/", $name))
    {
        $error = "Invalid name!<br/>Only characters are accepted, with no space.";
        $erreur = "Nom incorrect!<br/>Seuls les caractères sont acceptés, sans espace.";
        $_SESSION['isError'] = true;
        $_SESSION['error'] = $error;
        $_SESSION['erreur'] = $erreur;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $error = "Enter a valid email address!";
        $erreur = "Entrez une adresse mail valide!";
        $_SESSION['isError'] = true;
        $_SESSION['error'] = $error;
        $_SESSION['erreur'] = $erreur;
    } else if (strlen($message) < 10 || strlen($message) > 140)
    {
        $error = "Message length should be<br/>greater than 10 & less than 140 characters!";
        $erreur = "La longueur du message doit être supérieure à 10 et inférieure à 140 caractères!";
        $_SESSION['isError'] = true;
        $_SESSION['error'] = $error;
        $_SESSION['erreur'] = $erreur;
    } else
    {
        $conn = connect_db();
        if ($conn === null)
        {
            return null;
        }

        //insert user into database
        $sql = "INSERT INTO contacts (name, subject, email, message)"
                . "VALUES('" . $name . "', '" . $subject . "', '" . $email . "', '" . $message . "');";

        $is_done = $conn->query($sql);
        logging(__FILE__, __LINE__, $sql);
        if ($is_done == TRUE)
        {
            $success = "Success!";
            $success_fr = "Succès!";
            $_SESSION['isSuccess'] = true;
            $_SESSION['success'] = $success;
            $_SESSION['success_fr'] = $success_fr;
            //header("Location: ../index.php?content=contact_us");
        }
    }
}
