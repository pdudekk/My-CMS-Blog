
<li class="{{Request::is('login') ? 'active' : ''}}">
    <a class="nav-link pull-right" href="#">
@if(Auth::guard('admin')->check())
    Welcome {{Auth::guard('admin')->user()->name}}
@elseif(Auth::guard('web')->check())
    Welcome {{Auth::guard('web')->user()->name}}
@endif</a>
</li>

<li class="">
    <a class="nav-link" href="/logout">Logout</a>
</li>
