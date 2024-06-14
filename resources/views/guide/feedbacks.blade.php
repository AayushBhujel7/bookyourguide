@extends('layouts.master.master')

@section('title')
    Admin Dashboard
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- Existing feedback display code -->

        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Submit Feedback</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('submit-feedback') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="4">
                    <input type="hidden" name="to" value="6">

                    <label for="rating">Rating:</label>
                    <input type="number" name="rating" id="rating" min="1" max="5" required>

                    <label for="feedback">Feedback:</label>
                    <textarea name="feedback" id="feedback" rows="4" required></textarea>

                    <button type="submit">Submit Feedback</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection