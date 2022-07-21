@can('admin')
    <li class="nav-item">
        <a href="{{ route('data-kelurahan.index') }}" class="nav-link {{ Request::is('data-kelurahan*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-city"></i>
            <p>
                Data Kelurahan
            </p>
        </a>
    </li>
@endcan
@can('operator')
    <li class="nav-item">
        <a href="{{ route('data-pasien.index') }}" class="nav-link {{ Request::is('data-pasien*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user-md"></i>
            <p>
                Data Pasien
            </p>
        </a>
    </li>
@endcan

