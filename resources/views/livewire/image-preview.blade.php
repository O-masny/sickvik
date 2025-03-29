@if ($get('slider_image'))
    <div>
        <p><strong>Slider Image Preview:</strong></p>
        <img src="{{ asset('storage/gallery/' . $get('slider_image')) }}" width="200">
    </div>
@endif

@if ($get('detail_image'))
    <div style="margin-top: 1rem;">
        <p><strong>Detail Image Preview:</strong></p>
        <img src="{{ asset('storage/gallery/' . $get('detail_image')) }}" width="400">
    </div>
@endif