$(".delete-confirm").click(function (event) {
    var form = $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    Swal.fire({
        title: "Apakah anda yakin?",
        text: "kamu tidak bisa mengembalikan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya,Hapus itu!",
        cancelButtonText: "Nggak ah!",

    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
});