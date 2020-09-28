<nav class="navbar navbar-light bg-light">
    <form method="get" action="/importFile" class="form-inline">
        @csrf

        <div class="form-check-inline">
            <label for="exampleFormControlFile1"><span class="uploadFont">Select your import columns:</span></label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" value="id" name="products[]">ID number
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" value="product_name" name="products[]">Product name
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" value="order_date" name="products[]">Order date
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" value="subtotal" name="products[]">subtotal
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" value="vat_value" name="products[]">VAT
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" value="vat_percentage" name="products[]">VAT percentage
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" value="total" name="products[]">Total
            </label>
        </div></br>
        <div class="form-group"><button class="btn btn-primary submit-btn" disabled>Import Data</button></div>
    </form>
</nav>
<script>
    /* validate the checkboxes on client side */
    var checkboxes = $(".form-check-input");
    var submitButt = $(".submit-btn");
    $(document).ready(function(){
        checkboxes.click(function() {
            submitButt.attr("disabled", !checkboxes.is(":checked"));
        });
    });
</script>
