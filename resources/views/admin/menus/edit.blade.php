@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Edit a menu
@parent
@stop


@section('content')
<section class="content-header">
    <h1>Menus</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>menus</li>
        <li class="active">Create New menu</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h4 class="panel-title"> <i class="livicon" data-name="edit" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Edit menu
                    </h4>
                </div>
                <div class="panel-body">
                     @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    {!! Form::model($menu, ['method' => 'PATCH', 'action' => ['MenusController@update', $menu->id]]) !!}

                    <div class="form-group">
                        {!! Form::label('title', 'Title: ') !!}
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    </div><div class="form-group">
                        {!! Form::label('title_lat', 'Title Lat: ') !!}
                        {!! Form::text('title_lat', null, ['class' => 'form-control']) !!}
                    </div><div class="form-group">
                        {!! Form::label('title_en', 'Title En: ') !!}
                        {!! Form::text('title_en', null, ['class' => 'form-control']) !!}
                    </div><div class="form-group">
                        {!! Form::label('url', 'Url: ') !!}
                        {!! Form::text('url', null, ['class' => 'form-control']) !!}
                    </div><div class="form-group">
                        {!! Form::label('order', 'Order: ') !!}
                        {!! Form::text('order', null, ['class' => 'form-control']) !!}
                    </div><div class="form-group">
                        {!! Form::label('parent_id', 'Parent Id: ') !!}
                        {!! Form::text('parent_id', null, ['class' => 'form-control']) !!}
                    </div><div class="form-group">
                        {!! Form::label('type', 'Type: ') !!}
                        {!! Form::text('type', null, ['class' => 'form-control']) !!}
                    </div><div class="form-group">
                        {!! Form::label('option', 'Option: ') !!}
                        {!! Form::text('option', null, ['class' => 'form-control']) !!}
                    </div><div class="form-group">
                        {!! Form::label('is_published', 'Is Published: ') !!}
                        {!! Form::text('is_published', null, ['class' => 'form-control']) !!}
                    </div><div class="form-group">
                        {!! Form::label('lang', 'Lang: ') !!}
                        {!! Form::text('lang', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</section>
@stop