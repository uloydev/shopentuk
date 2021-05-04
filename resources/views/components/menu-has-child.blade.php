<box-icon name='chevron-right'></box-icon>
<span>{{ $text }}</span>
@if (Route::currentRouteName() === 'landing-page')
<box-icon name='chevron-down' type='solid' color="#fff" class="child-dropdown-icon ml-auto sm:hidden"></box-icon>
@else
<box-icon name='chevron-down' type='solid' color="#718096" class="child-dropdown-icon ml-auto sm:hidden"></box-icon>
@endif