<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Invoice No.</label>
            <input type="text" class="form-control" v-model="form.invoice_no">
            <p v-if="errors.invoice_no" class="error">@{{errors.invoice_no[0]}}</p>
        </div>
        <div class="form-group">
            <label>Client</label>
            <input type="text" class="form-control" v-model="form.client">
            <p v-if="errors.client" class="error">@{{errors.client[0]}}</p>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Client Address</label>
            <textarea class="form-control" v-model="form.client_address"></textarea>
            <p v-if="errors.client_address" class="error">@{{errors.client_address[0]}}</p>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
             <select v-model="form.title">
                <option disabled value="">Work Title</option>
                <option>Design/Print</option>
                <option>IT</option>
                <option>Degital Marketing</option>
            </select>
        </div>
        <div class="form-group">
             <select v-model="form.work_status">
                <option disabled value="">Work Status</option>
                <option>Initial</option>
                <option>On going</option>
                <option>Finished</option>
            </select>
        </div>
        <div class="form-group">
            <select v-model="form.bill_status">
                <option disabled value="">Bill Status</option>
                <option>Unpaid</option>
                <option>Paid</option>
            </select>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <label>Invoice Date</label>
                <input type="date" class="form-control" v-model="form.invoice_date" placeholder="yyyy/mm/dd">
                <p v-if="errors.invoice_date" class="error">@{{errors.invoice_date[0]}}</p>
            </div>
            <div class="col-sm-6">
                <label>Due Date</label>
                <input type="date" class="form-control" v-model="form.due_date" placeholder="yyyy/mm/dd">
                <p v-if="errors.due_date" class="error">@{{errors.due_date[0]}}</p>
            </div>
        </div>
    </div>
</div>
<hr>
<div v-if="errors.items_empty">
    <p class="alert alert-danger">@{{errors.items_empty[0]}}</p>
    <hr>
</div>
<table class="table table-bordered table-form">
    <thead>
        <tr>
            <th>Item Description</th>
            <th>Unit Price(BDT)</th>
            <th>Qty</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="item in form.items">
            <td class="table-name" :class="{'table-error': errors['items.' + $index + '.name']}">
                <textarea class="table-control" v-model="item.name"></textarea>
            </td>
            <td class="table-price" :class="{'table-error': errors['items.' + $index + '.price']}">
                <input type="text" class="table-control"  v-model="item.price">
            </td>
            <td class="table-qty" :class="{'table-error': errors['items.' + $index + '.qty']}">
                <input type="text" class="table-control" v-model="item.qty">
            </td>
            <td class="table-total">
                <span class="table-text">@{{item.qty * item.price}}</span>
            </td>
            <td class="table-remove">
                <span @click="remove(item)" class="table-remove-btn">&times;</span>
            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td class="table-empty" colspan="2">
                <span @click="addLine" class="table-add_line">Add Item</span>
            </td>
            <td class="table-label">Sub Total</td>
            <td class="table-amount">@{{subTotal}}</td>
        </tr>
        <tr>
            <td class="table-empty" colspan="2"></td>
            <td class="table-label">Advance</td>
            <td class="table-advance" :class="{'table-error': errors.advance}">
                <input type="text" class="table-advance_input" v-model="form.advance">
            </td>
        </tr>
        <tr>
            <td class="table-empty" colspan="2"></td>
            <td class="table-label">Discount</td>
            <td class="table-discount" :class="{'table-error': errors.discount}">
                <input type="text" class="table-discount_input" v-model="form.discount">
            </td>
        </tr>
        <tr>
            <td class="table-empty" colspan="2"></td>
            <td class="table-label">Grand Total</td>
            <td class="table-amount">@{{grandTotal}}</td>
        </tr>
    </tfoot>
</table>