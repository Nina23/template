<li {!! (Request::is('admin/menus') || Request::is('admin/menus/create') || Request::is('admin/menus/*') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="list-ul" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
        <span class="title">Menus</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/menus') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/menus') }}">
                <i class="fa fa-angle-double-right"></i>
                menus
            </a>
        </li>
        <li {!! (Request::is('admin/menus/create') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/menus/create') }}">
                <i class="fa fa-angle-double-right"></i>
                Add New Menu
            </a>
        </li>
    </ul>