$(document).ready(function(){
    const flashData = $('.flash-data').data('flashdata');
    // console.log(flashData);
    if (flashData) {
        Swal.fire({
            title: "Data!",
            text: "Berhasil " + flashData,
            icon: "success",
            confirmButtonText: 'Oke'
          });
    }

    $('.button-hapus').on('click', function(e){

        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin ?',
            text: "Data akan di hapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus data!'
          }).then((result) => {
            if (result.value) {
              document.location.href = href;
            }
          })
    })
    
});