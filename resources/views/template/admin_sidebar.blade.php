<div class="sidebar">
    <ul class="nav">
        <li><a href="/admin" class="{{ request()->is('admin') ? 'active' : '' }}">Data Admin</a></li>
        <li><a href="/admin/create" class="{{ request()->is('admin/create') ? 'active' : '' }}">Tambah Admin</a></li>
        <li><a href="/dashboard">Ke Dashboard</a></li>
    </ul>
</div>