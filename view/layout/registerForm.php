
        <label for="userName">User name: </label>
        <input type="text" id="userName" name="userName" value="<?php echo $userName; ?>">
        <span style="color:red;"><?php echo $_SESSION["error_userNameReg"] ?? ""; ?></span>

        <label for="pass">Password: </label>
        <input type="password" id="pass" name="pass">
        <span style="color:red;"><?php echo $_SESSION["error_pass"] ?? ""; ?></span>

        <label for="pass2">Repeat password: </label>
        <input type="password" id="pass2" name="pass2">
        <span style="color:red;"><?php echo $_SESSION["error_pass2"] ?? ""; ?></span>

        <label for="email">Email: </label>
        <input type="text" id="email" name="email" value="<?php echo $email; ?>">
        <span style="color:red;"><?php echo $_SESSION["error_email"] ?? ""; ?></span>

        <label for="sex">Sex: </label>
        <select id="sex" name="sex">
            <option value="">Selecciona tu sexo</option>
            <option value="1" <?php echo ($sex == 1) ? 'selected' : ''; ?>>Hombre</option>
            <option value="2" <?php echo ($sex == 2) ? 'selected' : ''; ?>>Mujer</option>
            <option value="3" <?php echo ($sex == 3) ? 'selected' : ''; ?>>Otro</option>
        </select>
        <span style="color:red;"><?php echo $_SESSION["error_sex"] ?? ""; ?></span>

        <label for="birth">Birth date (dd/mm/AAAA): </label>
        <input type="text" id="birth" name="birth" value="<?php echo $birth; ?>">
        <span style="color:red;"><?php echo $_SESSION["error_birth"] ?? ""; ?></span>

        <label for="city">City: </label>
        <input type="text" id="city" name="city" value="<?php echo $city; ?>">
        <span style="color:red;"><?php echo $_SESSION["error_city"] ?? ""; ?></span>

        <label for="country">Country: </label>
        <select id="country" name="country">

        <?php
            foreach ($countrys as $countrysql) {
               echo '<option value="' . $countrysql["nombre"] . '" ' . ($country == $countrysql["nombre"] ? "selected" : "") . '>' . $countrysql["nombre"] . '</option>';
            }
        ?>
        </select>
        <span style="color:red;"><?php echo $_SESSION["error_country"] ?? ""; ?></span>


        <label for="photo">Photo: </label>
        <input type="file" id="photo" name="photo">

