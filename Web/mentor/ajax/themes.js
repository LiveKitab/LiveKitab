        $('#color').on('change', function() {
        var color = $('#color').val();
        $.ajax({
                url: "design/css/applycss.php",
                method: "POST",
                data: { color: color },
                success: function(data) {
                    setTimeout(function() {
                        location.reload(true);
                    }, 1000);
                }
            });
    });
   