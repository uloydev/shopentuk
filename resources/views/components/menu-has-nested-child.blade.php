<span>{{ $text }}</span>
@if (Route::currentRouteName() === 'landing-page')
<box-icon name='chevron-down' type='solid' color="#fff" 
class="child-dropdown-icon ml-auto sm:ml-2"></box-icon>
@else
<box-icon name='chevron-down' type='solid' color="#718096" 
class="child-dropdown-icon ml-auto sm:ml-2"></box-icon>
@endif