<?php
echo'<form method="POST">
        <fieldset>
            <legend>Planetas</legend>
            <label> Id da estrela: </label>
            <input type="number" name="id_estrela" id="id_estrela" readonly="readonly"/>
            <br />
            <label> Nome do Estrela: </label>
            <input type="text" name="estrela" id="estrela" required="required"/>
            <select id="recebe3" name="recebe3">
                <option label="Galáxia" />
            </select>
        </fieldset>
    </form>';
?>