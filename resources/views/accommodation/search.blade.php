@extends('layouts.app')

@section('title', 'Search')

@section('content')
<style>
    .card {
        border: 5px solid #6a6c6e26;
        box-shadow: inset;
        border-radius: 20px;
        width: 360px;
    }

    .card-header{
        font-size: 20px;
        color: #004aad;
    }

    textarea{
        background-color: #ffffff;
    }

    .btn{
        border-color:#004aad;
        color: #ffffff;
        background-color: #004aad;
        font-weight: bold;
    }

    .btn:hover{
        border-color:#004aad;
        color: #ffffff;
        background-color: #004aad;
    }
    .search-bar{
        display: flex;
        align-items: center;
        gap: 10px;
        margin-left: 40px;
        font-size: 18px;
    }

    ::placeholder{
        text-align: center;
    }

    .form-select option{
        text-align: center
    }

    .input-group{
        position: relative;
        display: flex;
        align-items: center;
    }

    .input-group .input-icon{
        position: absolute;
        left:280px;
        top: 50%;
        transform: translateY(-50%);
        color: #dcbf7d;
        background-color:transparent;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 100%;
    }

    .input-group .form-control{
        padding-left: 2.5rem;
        padding-right: 2.5rem;
        border-radius: 10px;
        background-color: #ffffff;
    }
    .input-group-text{
        position: absolute;
        transform: translateY(-50%);
        border: none;
    }
    img {
        width: 370px;
        height: 200px;
        border-radius: 10px;
        object-fit: cover;
    }

    .alert{
        font-size: 20px;
        text-align: center;
        margin-top: 200px;
    }

    .alert p{
        margin-top: 10px;
        font-size: 17px;
    }

    /* search_by_budget */
    :root{
        --blue-color: #004aad;
        --gray-color: #77889926;
    }
    .range-slider{
        display: flex;
        flex-wrap: wrap;
        align-items: flex-start;
        justify-content: space-between;
        gap: 10px;
        padding-block: 20px;
    }

    .range-slider .dragging{
        cursor: ew-resize;
    }
    .range{
        width: 100%;
        display: grid;
        position: relative;
        z-index: 5;
    }
    .range input {
        grid-row: 2;
        grid-column: 1;
        pointer-events: none;
        appearance: none;
        background: transparent;

    }
    .range input::-webkit-slider-thumb {
        pointer-events: auto;
        appearance: none;
        width: 24px;
        height: 24px;
        background: var(--blue-color);
        border-radius: 50%;
        cursor: pointer;
    }
    .slider{
        position: absolute;
        height: 10px;
        width: 100%;
        background: var(--gray-color);
        top: 50%;
        transform: translateY(-50%);
        border-radius: 5px;
        overflow: hidden;
        z-index: -1;
    }
    .progress{
        position: absolute;
        height: 100%;
        background: var(--blue-color);
        cursor: ew-resize;
    }

    /* loading animation */
    .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background-color: rgba(0, 0, 0, 0.01);
        backdrop-filter: blur(2px);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }
    .loader{
        margin:200px auto;
    }
    h1{
        color: #000;
        font-size:20px;
        letter-spacing:1px;
        font-weight:200;
        text-align:center;
    }
    #searching{
        color: #000;
        font-size:20px;
        letter-spacing:1px;
        font-weight: bold;
        text-align:center;
    }
    .loader span{
        width:24px;
        height:24px;
        border-radius:50%;
        display:inline-block;
        position:absolute;
        left:50%;
        margin-left:-20px;
        -webkit-animation:3s infinite linear;
        -moz-animation:3s infinite linear;
        -o-animation:3s infinite linear;
    }

    .loader span:nth-child(2){
        background:#004aad;
        -webkit-animation:kiri 1.2s infinite linear;
        -moz-animation:kiri 1.2s infinite linear;
        -o-animation:kiri 1.2s infinite linear;
    }
    .loader span:nth-child(3){
        background: #dcbf7d;
        z-index:100;
    }
    .loader span:nth-child(4){
        background: #6a6c6e26;
        -webkit-animation:kanan 1.2s infinite linear;
        -moz-animation:kanan 1.2s infinite linear;
        -o-animation:kanan 1.2s infinite linear;
    }

    @-webkit-keyframes kanan {
        0% {-webkit-transform:translateX(20px);
        }
        50%{-webkit-transform:translateX(-20px);
        }
        100%{-webkit-transform:translateX(20px);
            z-index:200;
        }
    }
    @-moz-keyframes kanan {
        0% {-moz-transform:translateX(20px);
        }
        50%{-moz-transform:translateX(-20px);
        }
        100%{-moz-transform:translateX(20px);
        z-index:200;
        }
    }
    @-o-keyframes kanan {
        0% {-o-transform:translateX(20px);
        }
        50%{-o-transform:translateX(-20px);
        }
        100%{-o-transform:translateX(20px);
        z-index:200;
        }
    }
    @-webkit-keyframes kiri {
        0% {-webkit-transform:translateX(-20px);
        z-index:200;
        }
        50%{-webkit-transform:translateX(20px);
        }
        100%{-webkit-transform:translateX(-20px);
        }
    }

    @-moz-keyframes kiri {
        0% {-moz-transform:translateX(-20px);
        z-index:200;
        }
        50%{-moz-transform:translateX(20px);
        }
        100%{-moz-transform:translateX(-20px);
        }
    }
    @-o-keyframes kiri {
        0% {-o-transform:translateX(-20px);
        z-index:200;
        }
        50%{-o-transform:translateX(20px);
        }
        100%{-o-transform:translateX(-20px);
        }
    }
</style>

<!-- loading animation -->
<div class="loading-overlay">
    <div class="loader">
        <h1 id="searching">Searching...</h1>
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>

<!-- seaching section -->
<div class="row gx-5 mx-3">
    <!-- search side -->
    <div class="col-4">
        <!-- address search -->
        <form action="{{ route('search_by_keyword')}}" method="get">
            @csrf
            @method("GET")

            <div class="card">
                <div class="card-header">Keyword Search</div>
                <div class="card-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" style="border-radius:15px; color: black" name="keyword" value="{{ request()->input('keyword') }}" placeholder="Type Keyword">
                        <button type="submit" class="btn input-icon input-group-text"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </div>
            </div>
        </form>

        <form action="{{ route('search_by_filters')}}" method="get">
            @csrf
            @method("GET")

            <!-- city -->
            <div class="card">
                <div class="card-header">City</div>
                <div class="card-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" style="border-radius:15px; color: black" name="city" value="{{ request()->input('city') }}" placeholder="Place you want to stay">
                    </div>
                </div>
            </div>

            <!-- capacity -->
            <div class="card">
                <div class="card-header">Capacity</div>
                <div class="card-body">
                    <div class="form-check search-bar">
                        <input type="radio" class="form-check-input" name="capacity" id="capa_1" value="capa_1" {{ request()->input('capacity') == 'capa_1' ? 'checked' : '' }}>
                        <label class="form-check-label" for="capa_1">1 ~ 2 people</label>
                    </div>

                    <div class="form-check search-bar">
                        <input type="radio" class="form-check-input" name="capacity" id="capa_2" value="capa_2" {{ request()->input('capacity') == 'capa_2' ? 'checked' : '' }}>
                        <label class="form-check-label" for="capa_2">3 ~ 5 people</label>
                    </div>

                    <div class="form-check search-bar">
                        <input type="radio" class="form-check-input" name="capacity" id="capa_3" value="capa_3" {{ request()->input('capacity') == 'capa_3' ? 'checked' : '' }}>
                        <label class="form-check-label" for="capa_3">6 ~ 10 people</label>
                    </div>

                    <div class="form-check search-bar">
                        <input type="radio" class="form-check-input" name="capacity" id="capa_4" value="capa_4" {{ request()->input('capacity') == 'capa_4' ? 'checked' : '' }}>
                        <label class="form-check-label" for="capa_4">More than 10 people</label>
                    </div>
                </div>
            </div>

            <!-- checkin/checkout -->
            <div class="card">
                <div class="card-header">Date</div>
                <div class="card-body">
                    <div class="search-bar" style="margin-left:0">
                        <label for="daterange" class="form-label text-start"></label>
                        <input type="text" id="daterange" class="form-control" name="daterange" value="{{ request()->input('daterange') }}" placeholder="Check In - Check Out" required>
                    </div>
                </div>
            </div>

            <!-- category -->
            <div class="card">
                <div class="card-header">Category</div>
                <div class="card-body">
                    @foreach($categories as $category)
                        <div class="search-bar">
                            <input type="checkbox" name="category[]" class="form-check-input" value="{{ $category->id }}" id="{{ $category->id }}" {{ in_array($category->id, request()->input('category', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="{{ $category->id }}">{{ $category->category_name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- price -->
            <div class="card">
                <div class="card-header">Budget Range</div>
                <div class="card-body">
                    <div class="container">
                        <div class="range-slider">
                            <div class="price-filed">
                                <div>Minimum:</div>
                                <input type="number" class="min-price form-control" name="min_price" value="{{ request()->input('min_price', 5000) }}" min="5000" max="100000">
                            </div>
                            <div class="price-field">
                                <div>Maximum:</div>
                                <input type="number" class="max-price form-control" name="max_price" value="{{ request()->input('max_price', 35000) }}" min="5000" max="100000" step="5000">
                            </div>

                            <div class="range">
                                <input type="range" class="min-input" name="min_price" value="{{ request()->input('min_price', 10000) }}" min="5000" max="100000" step="5000">
                                <input type="range" class="max-input" name="max_price" value="{{ request()->input('max_price', 35000) }}" min="5000" max="100000" step="5000">

                                <div class="slider">
                                    <div class="progress"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row my-4">
                <div class="col me-5">
                    <button type="submit" class="btn" style="width: 360px"><span class="fw-light">Search</span></button>
                </div>
            </div>
        </form>
    </div>

    <!-- show results -->
    <div class="col-8">
        <div class="header">
            @if(isset($all_accommodations) && $all_accommodations->count() > 0)
                <p>Hits: {{ $all_accommodations->count() }}</p>
            <hr>
                @foreach($all_accommodations as $accommodation)
                    <a href="{{ route('accommodation.show', $accommodation->id )}}" class="row" style="color:black">
                        <div class="col">
                            <img src="{{ $accommodation->photos[0]->image }}" alt="#">
                        </div>
                        <div class="col">
                            <h2 class="h4 fw-bold" style="color:#004aad">{{ Str::limit($accommodation->name, 70) }}</h2>

                            <div>
                                <p><span><i class="fa-solid fa-comment me-3"></i></span>{{ Str::limit($accommodation->description, 50) }}</span>
                            </div>

                            <div>
                                <p><span><i class="fa-solid fa-location-dot me-3"></i></span>{{ Str::limit($accommodation->address, 50) }}</p>
                            </div>

                            <div>
                                <p class="fw-bold"><span><i class="fa-solid fa-money-bill me-3"></i></span>￥{{ $accommodation->price }}</p>
                            </div>

                            <div>
                                <p class="fw-bold"><span><i class="fa-solid fa-users me-3"></i></span>{{ $accommodation->capacity }}</p>
                            </div>
                        </div>
                    </a>
                    <hr>
                @endforeach
            @else
                <div class="alert">
                    <h4>No Accommodations Found <i class="fa-regular fa-face-sad-tear"></i></h4>
                    <p>There are no accommodations that match your current filters. Try removing some of them to get better results.</p>
                </div>
            @endif
        </div>
    </div>


</div>

<script>
    // search_by_budget
    const slider        = document.querySelector('.range-slider');
    const progress      = slider.querySelector('.progress');
    const minPriceInput = slider.querySelector('.min-price');
    const maxPriceInput = slider.querySelector('.max-price');
    const minInput      = slider.querySelector('.min-input');
    const maxInput      = slider.querySelector('.max-input');

    const updateProgress = () => {
        const minValue = parseInt(minInput.value)
        const maxValue = parseInt(maxInput.value)

        // get the total range of the slider
        const range = maxInput.max - minInput.min;
        // get the selected value range of the progress
        const valueRange = maxValue - minValue;
        //calculate the width percentage
        const width = (valueRange / range) * 100;
        //calculate the min thumb offset
        const minOffset = ((minValue - minInput.min) / range) * 100;

        //update the progress width
        progress.style.width = width + "%";
        // update the progres left position
        progress.style.left = minOffset + "%";

        // update the number inputs
        minPriceInput.value = minValue;
        maxPriceInput.value = maxValue;

    };

    const updateRange = (event) => {

        const input = event.target;

        let min = parseInt(minPriceInput.value);
        let max = parseInt(maxPriceInput.value);

        if(input === minPriceInput && min > max){
            max = min;
            maxPriceInput.value = max;
        } else if(input === maxPriceInput && max < min){
            min = max;
            minPriceInput.value = min;
        }

        minInput.value = min;
        maxInput.value = max;

        updateProgress();
    };

    minPriceInput.addEventListener('input', updateRange)
    maxPriceInput.addEventListener('input', updateRange)

    minInput.addEventListener('input',() => {
        if(parseInt(minInput.value) >= parseInt(maxInput.value)){
            maxInput.value = minInput.value;
        }
        updateProgress()
    });

    maxInput.addEventListener('input',() => {
        if(parseInt(maxInput.value) <= parseInt(minInput.value)){
            minInput.value = maxInput.value;
        }
        updateProgress()
    });

    let isDragging = false;
    let startOffsetX;

    progress.addEventListener("mousedown", (e) => {
        e.preventDefault(); // prevent text salection

        isDragging = true;

        startOffsetX = e.clientX - progress.getBoundingClientRect().left;

        slider.classList.toggle('dragging', isDragging);
    });

    document.addEventListener("mousemove", (e) => {
        if(isDragging){
            //get the size and position of the slider
            const sliderRect = slider.getBoundingClientRect();
            const progressWidth = parseFloat(progress.style.width || 0);

            // calculate the new left position for the progress element
            let newLeft = ((e.clientX - sliderRect.left - startOffsetX) / sliderRect.width) * 100;

            //ensure the progress is not exceeding the sliderboundaries
            newLeft = Math.min(Math.max(newLeft, 0), 100 - progressWidth);

            // update the progress position
            progress.style.left = newLeft + "%";

            // calculate the new min thumb position
            const range = maxInput.max - minInput.min;
            const newMin = Math.round((newLeft / 100) * range) + parseInt(minInput.min);
            const newMax = newMin + parseInt(maxInput.value) - parseInt(minInput.value);

            // update the min input
            minInput.value = newMin;
            maxInput.value = newMax;

            // update the progress
            updateProgress();
        }

        slider.classList.toggle('dragging', isDragging);
    });

    // checkin/checkout
    document.addEventListener("mouseup", () => {
        if(isDragging){
            isDragging = false;
        }
        slider.classList.toggle('dragging', isDragging);

    });

    updateProgress();

    $(document).ready(function() {
        $('#daterange').daterangepicker({
            autoUpdateInput: false,
            minDate: moment().add(1, 'days').format('YYYY-MM-DD'),
            locale: {
                format: 'YYYY-MM-DD',
                cancelLabel: 'Clear'
            }
        });

        $('#daterange').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
        });

        $('#daterange').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
    });

    // loading animation
    document.addEventListener('DOMContentLoaded', function() {
    const forms = document.querySelectorAll('form');
    const overlay = document.querySelector('.loading-overlay');

    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            overlay.style.display = 'flex';

            setTimeout(() => {
                form.submit();
            }, 3000);
        });
    });
});
</script>
@endsection
