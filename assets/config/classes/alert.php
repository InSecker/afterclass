<?php

class Alert
{
    public function createAlert($message, $type) {
       $_SESSION['message'] = $message;
       $_SESSION['type'] = $type;
    }

    public function showAlert() {
       if(isset($_SESSION['message']) AND isset($_SESSION['type'])) {
           $sess_message = $_SESSION['message'];
           $sess_type = $_SESSION['type'];
           echo "<div class='$sess_type'>$sess_message</div>";}

           // une fois que l'alerte est affichée, on vide la session pour accueuilir la prochaine alerte

        unset($_SESSION['message']);
        unset($_SESSION['type']);
    }
}