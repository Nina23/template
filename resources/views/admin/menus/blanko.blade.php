<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="_token" content="{!! csrf_token() !!}" />
    <title>FullyCMS | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
</head>
<body>

<script src="{!! url('assets/jQuery/jQuery-2.1.3.min.js') !!}"></script>
<link href="{!! url('assets/css/menu-managment.css') !!}" rel="stylesheet" type="text/css"/>
<script src="{!! url('assets/js/jquery.nestable.js') !!}"></script>

<section class="content-header">
    <h1>
        Menu
    </h1>
</section>

<br>

<div class="container">
    {{--<br> <a href="{!! URL::route('admin.menu.create') !!}" class="btn btn-primary">--}}
        <span class="glyphicon glyphicon-plus"></span>&nbsp;New Menu Item </a> <br>
    <hr>
    <div class="dd" id="nestable">
        {!! $menus !!}


    </div>
    @if($menus === null)
        <div class="alert alert-danger">No results found</div>
    @endif
</div>




<script type="text/javascript">
    $(document).ready(function () {
        var updateOutput = function (e) {
            var list = e.length ? e : $(e.target),
                    output = list.data('output');
            if (window.JSON) {

                var jsonData = window.JSON.stringify(list.nestable('serialize'));

                //console.log(window.JSON.stringify(list.nestable('serialize')));

                $.ajax({
                    type: "POST",
                    url: "{!! URL::route('admin.menu.save') !!}",
                    data: {'json': jsonData},

                    headers: {
                        'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                    },
                    success: function (response) {

                        //$("#msg").append('<div class="alert alert-success msg-save">Saved!</div>');
                        $("#msg").append('<div class="msg-save" style="float:right; color:red;">Saving!</div>');
                        $('.msg-save').delay(1000).fadeOut(500);
                    },
                    error: function () {
                        alert("error");
                    }
                });

            } else {
                alert('error');
            }
        };

        $('#nestable').nestable({
            group: 1
        }).on('change', updateOutput);
    });
</script>

</body>
</html>