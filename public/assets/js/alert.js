var swalLoading = function() {
    swal.fire({
        title: "Loading....",
        text: "Mohon Tunggu Sebentar",
        allowOutsideClick: false,
        onOpen: function() {
            Swal.showLoading()
        }
    })
}

var swalError = function(msg){
    swal.fire({
        text: msg,
        icon: "error",
        buttonsStyling: false,
        confirmButtonText: "Ok",
        customClass: {
            confirmButton: "btn font-weight-bold btn-light-primary"
        }
    });
}

var swalSuccess = function(messageSuccess){
    swal.fire({
        text: `${messageSuccess}, Mohon Tunggu Sebentar`,
        icon: "success",
        allowOutsideClick: false,
        onOpen: function() {
            Swal.showLoading()
        }
    })
}