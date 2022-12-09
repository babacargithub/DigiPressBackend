{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
{{--<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>--}}
@php use App\Policies\PermissionNames;
use App\Policies\RoleNames;
@endphp

@can(PermissionNames::ACCESS_ADMIN_AREA)
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('journee') }}"><i
                class="nav-icon la la-calendar"></i> Journées</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('parution') }}"><i class="nav-icon la la-book"></i>
            Publications</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('abonne') }}"><i class="nav-icon la la-users"></i>
            Abonnés</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('journal') }}"><i
                class="nav-icon la la-newspaper"></i> Journaux</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('theme') }}"><i class="nav-icon la la-tags"></i>
            Thèmes</a></li>
    @hasrole(RoleNames::ROLE_SUPER_ADMIN)
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('partner') }}"><i
                class="nav-icon la la-handshake"></i> Partenaires</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('rapport.index') }}"><i
                class="nav-icon la la-chart-bar"></i> Rapports</a></li>
    <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Authentication</a>
        <ul class="nav-dropdown-items">
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i
                        class="nav-icon la la-user"></i> Utilisateurs</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i
                        class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i
                        class="nav-icon la la-key"></i> <span>Permissions</span></a></li>
        </ul>
    </li>
    @endhasrole
@endcan
