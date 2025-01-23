@extends('layouts.app')

@section('title', 'accommodation_create')

<style>
html,body
    {
        overflow: hidden;
        height: 100vh;
    }

    .bg-gold {
        background-color: #DCBF7D;
    }

    .w-45 {
         width: 45%;
    }
</style>

@section('content')

<div class="corner-circle circle-left-1" style="z-index:-1;"></div>
<div class="corner-circle circle-left-2" style="z-index:-1;"></div>
<div class="corner-circle circle-right-1" style="z-index:-1;"></div>
<div class="corner-circle circle-right-2" style="z-index:-1;"></div>

<div class="card w-50 mx-auto box-shadow bg-white">
    <h2 class="mt-4">Register Accommodation!</h2>
    <form action="#" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label text-start w-100 ms-4 fw-bold">Accommodation Name</label>
            <input type="text" class="form-control mx-auto" id="name" placeholder="Accommodation Name" style="width: 95%; border-radius: 10px;">
        </div>

        <div class="mb-3">
            <label for="address" class="form-label text-start w-100 ms-4 fw-bold">Accommodation Address</label>
            <input type="text" class="form-control mx-auto" id="address" placeholder="Accommodation Address" style="width: 95%; border-radius: 10px;">
        </div>

        <div class="mb-3">
            <label for="city" class="form-label text-start w-100 ms-4 fw-bold">City Name</label>
            <input type="text" class="form-control mx-auto" id="city" placeholder="City Name" style="width: 95%; border-radius: 10px;">
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label text-start w-100 ms-4 fw-bold">Photo</label>
            <input type="file" class="form-control mx-auto" id="photo" style="width: 95%; border-radius: 10px;">
            <p class="m-0 ms-4 text-start">You can display your portrait or farm picture in our market.</p>
            <p class="m-0 ms-4 text-start">Acceptable formats are jpeg, jpg, png, and gif only.</p>
            <p class="m-0 ms-4 text-start">The file size is 1048Kb.</p>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label text-start w-100 ms-4 fw-bold">Description</label>
            <input type="text" class="form-control mx-auto" id="description" placeholder="Description (#hashtag)" style="width: 95%; border-radius: 10px;">
        </div>



        <div class="form-check form-check-inline d-flex justify-content-center align-items-center w-50 mx-auto">
            <input type="checkbox" name="category[]" id="" value="" class="form-check-input">
            <label for="category" class="form-check-label me-5">Category</label>
            <input type="checkbox" name="category[]" id="" value="" class="form-check-input">
            <label for="category" class="form-check-label me-5">Category</label>
            <input type="checkbox" name="category[]" id="" value="" class="form-check-input">
            <label for="category" class="form-check-label me-5">Category</label>
            <input type="checkbox" name="category[]" id="" value="" class="form-check-input">
            <label for="category" class="form-check-label me-5">Category</label>
            <input type="checkbox" name="category[]" id="" value="" class="form-check-input">
            <label for="category" class="form-check-label me-5">Category</label>
        </div>


        <button type="submit" class="bg-gold rounded border border-black text-white w-50 fs-2 my-4">Register</button>

    </form>
</div>

<script>
    let autocomplete;

    function initAutocomplete() {
        const input = document.getElementById('address');
        const options = {
            fields: ["address_components", "formatted_address"], // 必要なフィールドのみ
            types: ['geocode'],  // 住所に関連するタイプのみ
            language: 'en',  // 英語表記を優先
        };

        // Autocompleteのインスタンスを作成
        autocomplete = new google.maps.places.Autocomplete(input, options);

        // 住所が選択された後の処理
        autocomplete.addListener('place_changed', function() {
            const place = autocomplete.getPlace();
            const addressComponents = place.address_components;

            // 英語表記の住所を取得
            const formattedAddress = place.formatted_address;

            // フォームに英語表記の住所を設定
            document.getElementById('address').value = formattedAddress;

            // 市区町村と町名を設定
            let city = '';
            let street = '';
            addressComponents.forEach(component => {
                const types = component.types;

                if (types.includes('locality')) {
                    city = component.long_name; // 市区町村（町名を含む場合あり）
                } else if (types.includes('route')) {
                    street = component.long_name; // 通り名
                } else if (types.includes('street_number')) {
                    street += ' ' + component.long_name; // 番地を追加
                } else if (types.includes('neighborhood')) {
                    city = component.long_name; // 町名（場合によってはここに入ることも）
                }
            });

            // city と street を対応する入力フィールドに設定
            document.getElementById('city').value = city;
            document.getElementById('street').value = street;
        });
    }

</script>

<script>
    const apiKey = "{{ config('services.google_maps.api_key') }}";

    // Google Maps APIスクリプトを動的に作成して読み込む
    const script = document.createElement('script');
    script.src = `https://maps.googleapis.com/maps/api/js?key=${apiKey}&libraries=places`;
    script.async = true;
    script.defer = true;

    // スクリプトをHTMLに追加
    document.head.appendChild(script);

    script.onload = function () {
        console.log('Google Maps API loaded successfully.');
        // 必要ならここでGoogle Maps API関連の初期化を呼び出す
        initAutocomplete();
    };

    script.onerror = function () {
        console.error('Failed to load Google Maps API.');
    };
</script>

@endsection
