<div class="regform">
        <h1>Registro</h1>
    </div>
    <div class="main">
        <!-- <form> -->
        <?php
            echo form_open_multipart('administration/producto/agregarbd');
        ?>
            <div id="name">
                <h2 class="name">Name</h2>
                <input type="text" class="firstname" name="first_name"><br>
                <label class="firstlabel">First Name</label>
                <input type="text" name="last_name" class="lastname">
                <label class="lastlabel">Last Name</label>
            </div>

            <h2 class="name">Company</h2>
            <input class="company" type="text" name="company">

            <h2 class="name">Email</h2>
            <input type="text" class="email" name="email">

            <h2 class="name">Phone</h2>
            <input type="text" class="code" name="area_code">
            <label class="area-code">Area Code</label>
            <input type="text" class="number" name="phone">
            <label class="phone-number">Phone Number</label>

            <h2 class="name">Imagen</h2>
            <input type="file" class="foto" name="foto" multiple>

            <h2 id="coustomer">Are You Beginner ?</h2>

            <label class="radio">
                <input type="radio" class="radio-one" checked="checked" name="">
                <span class="checkmark"></span>YES
            </label>
            <label class="radio">
                <input type="radio" class="radio-two" name="">
                <span class="checkmark"></span>NO
            </label>
            <button type="submit">Registrar</button>
        <?php
            echo form_close();
        ?>
    <!-- 
        </form> -->
    </div>

