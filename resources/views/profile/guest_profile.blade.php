@extends(layouts.app)

@section(content)

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="row">
                    <div class="co-4">
                        <!-- avatar -->
                        @if(Auth::user()->avatar)
                            <img src="{{ asset('storage/' . $user->avatar) }}" class="img-fluid rounded-circle" width="150">
                        @else
                            <i class="fa-solid fa-circle-user text-secondary d-block text-center icon-lg"></i>
                        @endif
                    </div>
                    <div class="col-8">
                        <div class="row md-8">
                            <div class="col-auto">
                                <h2>{{ Auth::user()->name }}</h2>
                            </div>
                        </div>
                        <div class="row md-8">
                            <div class="col-auto">
                                <h5>{{ Auth::user()->nationality->nationality ?? 'Not available' }}</h5>
                            </div>
                            <div class="col-auto">
                                <h5>My place of location</h5>
                            </div>
                            <div class="col-auto">
                                <h5>Hobby</h5>
                            </div>
                        </div>
                        <!-- If host display -->
                        <!-- <div class="row md-8">
                            <div class="col-auto">
                                <h5>Star</h5>
                            </div>
                            <div class="col-auto">
                                <h5>Hosting experience</h5>
                            </div>
                        </div> -->
                    </div>
                </div>
                
                <h5>Reviews</h5>
                <p>Reviews lists</p>

            </div>
        </div>
    </div>
</div>
@endsection