@extends('layouts.app')

@section('title', 'News Letter')

@section('content')

<div class="container">
    <h2>News Letter</h2>
    <div class="my-5" style="justify-content: center; align-items: center; height: 100vh; text-align: center;">
        <h3>You can recieve special offers and the latest updates via newsletters <br>
            from the hosts of properties you have stayed at in the past. <br>
            <span style="display: inline-block; margin-top: 20px;">Would you like to receive newsletters?</span>
        </h3>
        <p style="margin-top: 20px; color: #cc0000;">If you choose to receive them, newsletters will be sent to your registered email address.</p>
        <div style="margin-top: 40px;">
            <a href="#" class="btn" style="margin-right: 200px; background-color: #004aad; color: white;">Recieve</a>
            <a href="#" class="btn" style="background-color: #dcbf7d; color: white;">Don't recieve</a>
        </div>
    </div>
</div>




@endsection