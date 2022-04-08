<nav class="collapse">
	<ul class="nav nav-pills" id="mainNav">
	@guest
	@else
		<li class="nav-item">
			<a class="nav-link" href="{{ route('qrcode.manage') }}">
				{{ __('Dashboard') }}
			</a>
		</li>
	@endguest

		<li class="dropdown">
			<a class="dropdown-item dropdown-toggle" href="{{ url('/') }}">
				Home
			</a>
		</li>


	</ul>
</nav>

