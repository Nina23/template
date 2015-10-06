@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
menu
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
        <li class="active">menus</li>
    </ol>
</section>

<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    menu {{ $menu->id }}'s details
                </h4>
            </div>
            <br />
            <div class="panel-body">
                <table class="table">
                    <tr><td>id</td><td>{{ $menu->id }}</td></tr>
                     <tr><td>title</td><td>{{ $menu['title'] }}</td></tr>
					<tr><td>title_lat</td><td>{{ $menu['title_lat'] }}</td></tr>
					<tr><td>title_en</td><td>{{ $menu['title_en'] }}</td></tr>
					<tr><td>url</td><td>{{ $menu['url'] }}</td></tr>
					<tr><td>order</td><td>{{ $menu['order'] }}</td></tr>
					<tr><td>parent_id</td><td>{{ $menu['parent_id'] }}</td></tr>
					<tr><td>type</td><td>{{ $menu['type'] }}</td></tr>
					<tr><td>option</td><td>{{ $menu['option'] }}</td></tr>
					<tr><td>is_published</td><td>{{ $menu['is_published'] }}</td></tr>
					<tr><td>lang</td><td>{{ $menu['lang'] }}</td></tr>
					
                </table>
            </div>
        </div>
    </div>
</div>
@stop