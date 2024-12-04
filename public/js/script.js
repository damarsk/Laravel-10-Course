$(document).ready(function () {
    $("#confirmBtnRestore").on("click", function (event) {
        event.preventDefault(); // Hentikan submit form
        confirmAlertRestore($(this).closest("form")); // Kirim form setelah konfirmasi
    });

    $('#confirmBtnDelete').on('click', function (event) {
        event.preventDefault();
        confirmAlertDelete($(this).closest('form'));
    });
});

function confirmAlertRestore(form) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger",
        },
        buttonsStyling: false,
    });
    swalWithBootstrapButtons
        .fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, restore it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: true,
        })
        .then((result) => {
            if (result.isConfirmed) {
                form.submit(); // Submit form hanya jika dikonfirmasi
            } else {
                swalWithBootstrapButtons.fire({
                    title: "Cancelled",
                    text: "Your file is safe :)",
                    icon: "error",
                });
            }
        });
}

