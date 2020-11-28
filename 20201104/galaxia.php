<?php

echo'<form method="POST">
        <fieldset>
            <legend>Galáxias</legend>
            <label> Id da galáxia: </label>
            <input type="number" name="id_galaxia"  id="id_galaxia" readonly="readonly"/>
            <br />
            <label> Nome da Galáxia: </label>
            <input type="text" name="galaxia" id="galaxia" required="required"/>
        </fieldset>
    </form>';

?>