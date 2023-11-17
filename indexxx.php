<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Hash MD5</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>
</head>
<body>

<input type="password" id="password" oninput="generateHash()">
<input type="text" id="hashResult" readonly style="width: 100%;">


<script>
function generateHash() {
    // Obtener el valor de la contraseña desde el campo de entrada
    var password = document.getElementById("password").value;

    // Calcular el hash MD5 utilizando la biblioteca crypto-js
    var hash = CryptoJS.MD5(password).toString();

    // Mostrar el resultado en el segundo campo de entrada
    document.getElementById("hashResult").value = hash;
}
</script>

</body>
</html>
