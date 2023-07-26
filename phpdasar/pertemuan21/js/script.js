
    $(document).ready(function() {
        // Hide tombol cari
        $('#tombol-cari').hide();

        // Event when keyword is typed
        $('#keyword').on('keyup', function() {
            // Show loading icon
            $('#loader').show();

            // Clear the previous data after 1 second (1000 milliseconds)
            $('#tabel').html('');
            setTimeout(function() {
                // AJAX using $.get()
                $.get('ajax/showroom.php?keyword=' + $('#keyword').val(), function(data) {
                    $('#tabel').html(data);
                    $('#loader').hide();
                });
            }, 100);
        });
    });

