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
        <input type="text" class="form-control" id="unit_price" name="unit_price[]" required>
      </div>
      <div class="form-group col-md-2">
        <label for="quantity">Quantity</label>
        <input type="number" min="1" class="form-control" id="quantity" name="quantity[]" required>
      </div>

      <div class="form-ds col-md-1 float-right">
        <br>

        <button class="btn btn-sm btn-danger removeRow" type="button"> <i class="fas fa-times-circle" title="Remove Item"></i> Remove</button>
      </div>
</div>
    `;

    // var rowTemplate = document.getElementById('order_items');

    // Add new row
    $('#addRow').on('click', function () {
        $('#items-container').append(rowTemplate);
    });

    // Remove row
    $('#items-container').on('click', '.removeRow', function () {
        $(this).closest('.item-row').remove();
    });
});
