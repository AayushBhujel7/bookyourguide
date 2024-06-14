<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guide Recommendations</title>
    <!-- Include any CSS stylesheets here -->
</head>
<body>
    <h1>Guide Recommendations</h1>
    <div>
        <h2>Recommended Guides</h2>
        <ul>
            @foreach($recommendations as $guideId => $count)
                @php
                    // Assuming you have a Guide model
                    $guide = App\Guide::find($guideId);
                @endphp
                @if($guide)
                <li>{{ $guide->name }} ({{ $guide->rating }}) - Recommended {{ $count }} times</li>
                @endif
            @endforeach
        </ul>
    </div>
    <!-- Add any additional content or styling as needed -->
</body>
</html>