
   @if (auth()->user()->type === 0 )
        {{-- user dashboard here --}}
             @include('user.mainDashboard')

        {{--end user dashboard here --}}
        @elseif (auth()->user()->type === 1 )
        {{-- admin dashboard here --}}
            @include('admin.mainDashboard')
        {{--end admin dashboard here --}}
    @endif
