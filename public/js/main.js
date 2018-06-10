function deleteAddress(id) {
    var id = $('#deleteId').val();
    var deletePostUri = "http://addressbook.test:8080/api/address/" + id + "";
    var r = confirm("Are sure you want to delete?");
    if (r == true) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: deletePostUri,
            type: 'DELETE',
            dataType: 'JSON',
            success: function (data) {
                location.reload();
            }
        });
    }

}


