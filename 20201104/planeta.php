<?php
echo'<form method="POST">
        <fieldset>
            <legend>Planetas</legend>
            <label> Id do planeta: </label>
            <input type="number" name="id_planeta" id="id_planeta" readonly="readonly"/>
            <br />
            <label> Nome do Planeta: </label>
            <input type="text" name="planeta" id="planeta" required="required"/>
            <select id="recebe2" name="recebe2">
                <option label="Galáxia" />
            </select>
        </fieldset>
    </form>';
?>