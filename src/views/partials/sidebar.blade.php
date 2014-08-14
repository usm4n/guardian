<aside>
    <h3 class="heading">Users</h3>
    <ul class="nav nav-pills nav-stacked">
        <li class="{{ (strpos(URL::current(), URL::to('guardian/backend/user/list'))!== false) ? 'active' : '' }}">
            {{HTML::linkRoute('user.list','List Users')}}
        </li>
        <li class="{{ (strpos(URL::current(), URL::to('guardian/backend/user/add'))!== false) ? 'active' : '' }}">
            {{HTML::linkRoute('user.add','Add User')}}
        </li>
    </ul>
    <h3 class="heading">Roles</h3>
    <ul class="nav nav-pills nav-stacked">
        <li class="{{ (strpos(URL::current(), URL::to('guardian/backend/role/list'))!== false) ? 'active' : '' }}">
            {{HTML::linkRoute('role.list','List Roles')}}
        </li>
        <li class="{{ (strpos(URL::current(), URL::to('guardian/backend/role/add'))!== false) ? 'active' : '' }}">
            {{HTML::linkRoute('role.add','Add Role')}}
        </li>
    </ul>
    <h3 class="heading">Capabilities</h3>
    <ul class="nav nav-pills nav-stacked">
        <li class="{{ (strpos(URL::current(), URL::to('guardian/backend/capability/list'))!== false) ? 'active' : '' }}">
            {{HTML::linkRoute('capability.list','List Capabilities')}}
        </li>
        <li class="{{ (strpos(URL::current(), URL::to('guardian/backend/capability/add'))!== false) ? 'active' : '' }}">
            {{HTML::linkRoute('capability.add','Add Capability')}}
        </li>
    </ul>
    </ul>
</aside>