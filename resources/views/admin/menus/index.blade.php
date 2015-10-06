@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    menus List
    @parent
@stop

{{-- Page content --}}
@section('content')


    <meta name="_token" content="{!! csrf_token() !!}"/>
    <section class="content-header">
        <h1>Menus</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                    Dashboard
                </a>
            </li>
            <li>menus</li>
            <li class="active">menus</li>
        </ol>
    </section>

    <section class="content paddingleft_right15">
        <div class="row">
            <div class="panel panel-primary ">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title pull-left"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Menus List
                    </h4>
                    <div class="pull-right">
                        <a href="{{ route('admin.menus.create') }}" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>
                    </div>
                </div>
                <br />
                <div class="panel-body">
                    <div class="container">
                        <div class="dd" id="nestable">
                            {!! $menus !!}

                        </div>
                        @if($menus === null)
                            <div class="alert alert-danger">No results found</div>
                        @endif
                    </div>

                </div>
            </div>
        </div>    <!-- row-->
    </section>



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



@stop

{{-- Body Bottom confirm modal --}}
@section('footer_scripts')
    <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>
    <script>$(function () {$('body').on('hidden.bs.modal', '.modal', function () {$(this).removeData('bs.modal');});});</script>
@stop
