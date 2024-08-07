$(document).ready(function () {
    var rowTemplate = `
    <div class="form-row item-row">
    <div class="form-group col-md-3"  >
        <label for="item_name">Item/Product Name</label>
        <input type="text" class="form-control" name="item_name[]" id="item_name" required>
      </div>
      <div class="form-group col-md-3">
        <label for="item_description">Item Description</label>
        <textarea name="item_description[]" id="item_description" class="form-control" required></textarea>
      </div>
      <div class="form-group col-md-2">
        <label for="unit_price">Unit Price</label>
        <input type="text" class="form-control InputAmount" id="unit_price" name="unit_price[]" required>
      </div>
      <div class="form-group col-md-2">
        <label for="quantity">Quantity</label>
        <input type="text" min="1" class="form-control InputAmount" id="quantity" name="quantity[]" required>
      </div>

      <div class="form-ds col-md-1 float-right">
        <br>

        <button class="btn btn-sm btn-danger removeRow" type="button"> <i class="fas fa-times-circle" title="Remove Item"></i> Remove</button>
      </div>
    </div>
    `;

    // Add new row
    $('#addRow').on('click', function () {
        $('#items-container').append(rowTemplate);
    });

    // Remove row
    $('#items-container').on('click', '.removeRow', function () {
        $(this).closest('.item-row').remove();
    });

    // Event delegation for keyup event to format number with commas
    $('#items-container').on('keyup', '.InputAmount', function (event) {
        // Skip for arrow keys
        if (event.which >= 37 && event.which <= 40) return;
        // Format number
        $(this).val(function (index, value) {
            return value
                .replace(/\D/g, "")
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
    });
});


// Capture Actual Delivery and person
$(document).ready(function() {
    $('#actual_delivery_date_div').hide();
    $('#received_by_div').hide();

    $('#delivery_status').change(function() {
        var selectedValue = $(this).val();

        if (selectedValue == 1) {
            $('#actual_delivery_date_div').show();
            $('#received_by_div').show();
        } else {
            $('#actual_delivery_date_div').hide();
            $('#received_by_div').hide();
        }
    });
});

