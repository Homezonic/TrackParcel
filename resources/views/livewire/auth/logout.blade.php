<div>
    <i class="fa fa-user me-sm-1 {{ in_array(request()->route()->getName(),['settings', 'settings']) ? 'text-red' : '' }}"></i>
    <span class="d-sm-inline d-none {{ in_array(request()->route()->getName(),['settings', 'settings']) ? 'text-red' : '' }}" wire:click="logout">Sign Out</span>
</div>
