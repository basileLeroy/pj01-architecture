@extends('layout')

@section('reviews')
<div
    class="review-modal"
    x-data="{ show: false }"
    x-show="show"
    @hashchange.window="console.log($event)"
>
    <a href="#"><div class="review-background"></div></a>
    <form action="" method="post" class="review-form" id="ReviewModal">
        <header class="reaview-header">
            <h1>{!! __('pagination.thoughts') !!}</h1>
        </header>
        <main class="review-body">
            <label class="" for="usernameField">Email</label>
            <input class="review-email-input" type="email" placeholder="example@email.com">
            <label class="" for="passwordField">Message</label>
            <textarea rows="7" class="review-textarea-input"></textarea>
        </main>
        <footer class="review-footer">
            <button type="submit" name="submit" id="submit" class="review-form-button">Submit</button>
        </footer>
    </form>
</div>
@endsection
