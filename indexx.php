<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla con paginación</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        .pagination {
            display: inline-block;
        }
        .pagination a {
            text-decoration: none;
            font-weight: bold;
            padding: 8px 16px;
            background-color: #f2f2f2;
            color: black;
            border: 1px solid #ddd;
        }
        .pagination a.active {
            background-color: gray;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Tabla con Paginación</h1>
    <div id="table-container">
        <table id="my-table">
            <thead>
                <tr>
                    <th>Encabezado 1</th>
                    <th>Encabezado 2</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí puedes generar tus filas de datos dinámicamente -->
                <!-- Por simplicidad, aquí se crean 20 filas de ejemplo -->
                <!-- Puedes reemplazar esto con tu propia lógica de generación de filas -->
                <?php
                for ($i = 1; $i <= 25; $i++) {
                    echo "<tr><td>Dato $i-1</td><td>Dato $i-2</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="pagination" id="pagination-container"></div>
    <script>
        const table = document.getElementById('my-table');
        const rows = table.getElementsByTagName('tr');
        const rowsPerPage = 5;
        const totalPages = Math.ceil(rows.length / rowsPerPage);
        let currentPage = 1;

        function showPage(page) {
            for (let i = 0; i < rows.length; i++) {
                if (i < (page * rowsPerPage) && i >= ((page - 1) * rowsPerPage)) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        }

        function generatePagination() {
            const paginationContainer = document.getElementById('pagination-container');
            let paginationHTML = '';

            for (let i = 1; i <= totalPages; i++) {
                paginationHTML += `<a href="#" onclick="changePage(${i})" ${i === currentPage ? 'class="active"' : ''}>${i}</a>`;
            }

            paginationContainer.innerHTML = paginationHTML;
        }

        function changePage(page) {
            currentPage = page;
            showPage(page);
            generatePagination();
        }

        showPage(currentPage);
        generatePagination();
    </script>
</body>
</html>
