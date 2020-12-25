<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Search</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <!-- Start::Navbar -->
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand">Navbar</a>
            <form class="form-inline with-live-preview">
                <input class="form-control w-100" type="search" id="search" placeholder="Cari User" aria-label="Cari User">
                <div class="w-100 d-none preview">
                    Good luck learning, Mul.
                </div>
            </form>
        </div>
    </nav>
    <!-- End::Navbar -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $("#search").on('keyup', function(e) {
                let name = $(this).val();
                let destination = "{{ url('/user_data/search') . '/' }}" + name;

                name != ''
                    ? $(".preview").removeClass('d-none')
                    : $(".preview").addClass('d-none');

                $.ajax({
                    url: destination,
                    success: function(response) {
                        if(response.length > 0) {
                            var result = response.map((a) => {
                                return `
                                    <a class="user" href="{{ url('/user_data') . '/' }}${a.id}">
                                        <img src="${a.profile_picture_path}">
                                        <span>${a.full_name}</span>
                                    </a>`;
                            });
                            
                            $(".preview").html(result);
                        }
                    },
                    error: function(response) {
                        alert('Error: ' + response);
                    }
                })
            });
        });
    </script>
</body>
</html>