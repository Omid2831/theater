 document.getElementById('searchInput').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('table tbody tr');
        let found = false;

        rows.forEach(row => {
            let voorstelling = row.querySelector('td').textContent.toLowerCase();
            if (voorstelling.includes(filter)) {
                row.style.display = '';
                found = true;
            } else {
                row.style.display = 'none';
            }
        });

        document.getElementById('notFoundMsg').style.display = found ? 'none' : '';
    });