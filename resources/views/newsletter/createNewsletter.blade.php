@extends('layouts.app')

@section('title', 'Write Newsletter')

@section('content')

<style>
.card {
  background-color: rgba(255, 255, 255, 0.8);
  padding: 20px;
}

h3{
  margin-top: 40px;
  font-weight: bold;
}

.Form {
  margin-top: 30px;
  margin-left: auto;
  margin-right: auto;
  max-width: 720px;
}
@media screen and (max-width: 480px) {
  .Form {
    margin-top: 40px;
  }
}
.Form-Item {
  border-top: 1px solid #ddd;
  padding-top: 24px;
  padding-bottom: 24px;
  width: 800px;
  display: flex;
  align-items: center;
}
@media screen and (max-width: 480px) {
  .Form-Item {
    padding-left: 14px;
    padding-right: 14px;
    padding-top: 16px;
    padding-bottom: 16px;
    flex-wrap: wrap;
  }
}
.Form-Item:nth-child(5) {
  border-bottom: 1px solid #ddd;
}
.Form-Item-Label {
  width: 100%;
  max-width: 248px;
  letter-spacing: 0.05em;
  font-weight: bold;
  font-size: 18px;
}
@media screen and (max-width: 480px) {
  .Form-Item-Label {
    max-width: inherit;
    display: flex;
    align-items: center;
    font-size: 15px;
  }
}
.mark{
    color: red;
    background-color: transparent;
}
.Form-Item-Label-Required {
  border-radius: 6px;
  margin-right: 8px;
  padding-top: 8px;
  padding-bottom: 8px;
  width: 90px;
  display: inline-block;
  text-align: center;
  background: #dcbf7d;
  color: #fff;
  font-size: 14px;
}
@media screen and (max-width: 480px) {
  .Form-Item-Label-Required {
    border-radius: 4px;
    padding-top: 4px;
    padding-bottom: 4px;
    width: 32px;
    font-size: 10px;
  }
}
.Form-Item-Input {
  border: 1px solid #ddd;
  border-radius: 6px;
  margin-left: 40px;
  padding-left: 1em;
  padding-right: 1em;
  height: 48px;
  flex: 1;
  width: 100%;
  /* max-width: 410px; */
  background: #eaedf2;
  font-size: 18px;
}
@media screen and (max-width: 480px) {
  .Form-Item-Input {
    margin-left: 0;
    margin-top: 18px;
    height: 40px;
    flex: inherit;
    font-size: 15px;
  }
}
.Form-Item-Textarea {
  border: 1px solid #ddd;
  border-radius: 6px;
  margin-left: 40px;
  padding-left: 1em;
  padding-right: 1em;
  height: 216px;
  flex: 1;
  width: 100%;
  /* max-width: 410px; */
  background: #eaedf2;
  font-size: 18px;
}
@media screen and (max-width: 480px) {
  .Form-Item-Textarea {
    margin-top: 18px;
    margin-left: 0;
    height: 200px;
    flex: inherit;
    font-size: 15px;
  }
}
.Form-Btn {
  border-radius: 6px;
  margin-top: 32px;
  margin-left: auto;
  margin-right: auto;
  margin-bottom: 20px;
  padding-top: 20px;
  padding-bottom: 20px;
  width: 280px;
  display: block;
  letter-spacing: 0.05em;
  background: #004aad;
  color: #fff;
  font-weight: bold;
  font-size: 20px;
  border: none;
}
@media screen and (max-width: 480px) {
  .Form-Btn {
    margin-top: 24px;
    padding-top: 8px;
    padding-bottom: 8px;
    width: 160px;
    font-size: 16px;
  }
}
</style>
<div class="container">
    <div class="card">
        <h3>MAIL FORM</h3>
        <div class="Form">
        <form action="{{ route('newsletter.store') }}" method="POST">
        <form action="{{ route('newsletter.store') }}" method="POST">
            @csrf
            <div class="Form-Item">
                <p class="Form-Item-Label">Title<span class="mark">*</span></p>
                <input type="text" name="title" class="Form-Item-Input" placeholder="Escape Awaits: Top Stays You'll Love!" required>
            </div>

            <div class="Form-Item">
                <p class="Form-Item-Label isMsg">Textarea<span class="mark">*</span></p>
                <textarea name="message" class="Form-Item-Textarea" required></textarea>
            </div>

            <input type="submit" class="Form-Btn" value="Send">
        </form>
        </div>
    </div>
</div>

@endsection