{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Catalogs" icon="la la-laptop" :link="backpack_url('catalog')" />
<x-backpack::menu-item title="Categories" icon="la la-list" :link="backpack_url('category')" />
<x-backpack::menu-item title="Book Publishers" icon="la la-leanpub" :link="backpack_url('book-publisher')" />
<x-backpack::menu-item title="Book Authors" icon="la la-user-edit" :link="backpack_url('book-author')" />
<x-backpack::menu-item title="Services" icon="la la-list-alt" :link="backpack_url('service')" />
<x-backpack::menu-item title="Users" icon="la la-users" :link="backpack_url('user')" />