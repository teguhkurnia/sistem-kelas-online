<div class='row'>
    <div class='col'>
        <label for='route'>Route for This Menu Item</label>
        <select name="route" class="form-control">
            <option value="" disabled>Select Route</option>
            @foreach ($routes as $route)
                <option value="">{{ $route }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class='row mt-1'>
    <div class='col'>
        <label for='params'>Route Parameters (if any)</label>
        <textarea name='params'cols='30' rows='3' class='form-control' placeholder='{&#10;&#9"Key": "value"&#10;}'></textarea>
    </div>
</div>
