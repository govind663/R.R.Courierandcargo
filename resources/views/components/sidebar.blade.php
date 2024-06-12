<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul class="sidebar-vertical">

                <li class="{{ $currentRoute === 'home' ? 'active' : '' }}">
                    <a href="{{ route('home') }}">
                        <i class="fe fe-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="{{ ($currentRoute === 'customer.index') || ($currentRoute === 'customer.create') || ($currentRoute === 'customer.edit') ? 'active' : '' }}">
                    <a href="{{ route('customer.index') }}">
                        <i class="fe fe-users"></i>
                        <span>Manage Customers</span>
                    </a>
                </li>

                {{-- <li class="{{ ($currentRoute === 'unit.index') || ($currentRoute === 'unit.create') || ($currentRoute === 'unit.edit') ? 'active' : '' }}">
                    <a href="{{ route('unit.index') }}">
                        <i class="fe fe-grid"></i>
                        <span>Manage Unit</span>
                    </a>
                </li> --}}

                <li class="{{ ($currentRoute === 'weight.index') || ($currentRoute === 'weight.create') || ($currentRoute === 'weight.edit') ? 'active' : '' }}">
                    <a href="{{ route('weight.index') }}">
                        <i class="fe fe-settings"></i>
                        <span>Manage Weights</span>
                    </a>
                </li>

                <li class="{{ ($currentRoute === 'parcel.index') || ($currentRoute === 'parcel.create') || ($currentRoute === 'parcel.edit') ? 'active' : '' }}">
                    <a href="{{ route('parcel.index') }}">
                        <i class="fe fe-pie-chart"></i>
                        <span>Manage Parcel</span>
                    </a>
                </li>

                <li class="{{ ($currentRoute === 'invoice.index') || ($currentRoute === 'invoice.create') || ($currentRoute === 'invoice.edit') ? 'active' : '' }}">
                    <a href="{{ route('invoice.index') }}">
                        <i class="fe fe-file-text"></i>
                        <span>Manage Invoice</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
