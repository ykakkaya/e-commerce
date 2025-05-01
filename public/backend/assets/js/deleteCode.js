$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Emin misiniz?',
                    text: "Data Silinecektir!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Evet sil!',
                    cancelButtonText: 'Vazgeç'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      // Swal.fire(
                      //   'Silindi!',
                      //   'Data Başarı ile silindi.',
                      //   'success'
                      // )
                    }
                  }) 


    });

  });