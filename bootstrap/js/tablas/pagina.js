  const table = document.getElementById('my-table');
  const rows = table.getElementsByTagName('tr');
  const rowsPerPage = 5;//cantidad de filas a visualizar
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