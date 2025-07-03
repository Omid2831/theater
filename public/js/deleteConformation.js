function confirmDeletion(id) {
    if (confirm('Weet u zeker dat u dit ticket wilt verwijderen?')) {
        window.location.href = urlroot + '/tickets/delete/' + id;
    }
}
