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

var swalSend = function(){
    return Swal.fire({
        text: 'Pengiriman Berhasil',
        icon: 'success',
        allowOutsideClick: false,
        showCancelButton: true,
        confirmButtonText: 'Cetak surat jalan',
        cancelButtonText:'Tidak'
    });
}

var swalDelete = function(message){      
    return Swal.fire({
        text: message,
        icon: 'warning',
        allowOutsideClick: false,
        showCancelButton: true,
        focusConfirm : false,
        focusCancel : false,
        confirmButtonText: 'Ya',
        cancelButtonText: 'tidak',
    });
}
