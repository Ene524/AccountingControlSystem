@extends('layouts.master')
@section('title', 'Fatura Ekle')
@section('content')

    <h4 class="py-1 mb-2">
        <span class="text-muted fw-light">
            <a href="{{ route('invoice.index') }}">Faturalar</a>
            /
        </span>
        Fatura ekle
    </h4>

    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('invoice.create') }}"
                          method="post">
                        @csrf

                        <div class="container">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2>New Invoice</h2>
                                <div>
                                    <button type="button"
                                            id="saveInvoice"
                                            class="btn btn-primary ml-2">Save and continue
                                    </button>
                                    <button type="button"
                                            id="previewInvoice"
                                            class="btn btn-secondary">Preview
                                    </button>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="customer_id">Customer</label>
                                                        <select class="form-control form-control-sm"
                                                                id="customer_id"
                                                                name="customer_id">

                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="invoiceNumber">Invoice Number</label>
                                                        <input type="text"
                                                               class="form-control form-control-sm"
                                                               id="invoice_number"
                                                               name="invoice_number">
                                                    </div>

                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="invoiceType">Invoice Type</label>
                                                        <select class="form-control form-control-sm"
                                                                id="invoice_type"
                                                                name="invoice_type">
                                                            <option value="1">Sales</option>
                                                            <option value="2">Purchase</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="invoiceDate">Invoice Date</label>
                                                        <input type="date"
                                                               class="form-control form-control-sm"
                                                               id="invoice_date"
                                                               name="invoice_date">
                                                    </div>
                                                    <div class="form-group"
                                                         style="display: none">
                                                        <label for="dueDate">Due Date</label>
                                                        <input type="date"
                                                               class="form-control form-control-sm"
                                                               id="due_date"
                                                               name="due_date">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">

                                                    <div class="form-group">
                                                        <label for="currency">Currency</label>
                                                        <select class="form-control form-control-sm"
                                                                id="currency_id"
                                                                name="currency_id">
                                                            <!-- Para birimi seçenekleri buraya eklenecek -->
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="category">Category</label>
                                                        <select class="form-control form-control-sm"
                                                                id="category_id"
                                                                name="category_id">
                                                            <!-- Kategori seçenekleri buraya eklenecek -->
                                                        </select>
                                                    </div>
                                                    <div class="form-group"
                                                         style="display: none">
                                                        <label for="exchangeRate">Exchange Rate</label>
                                                        <input type="number"
                                                               class="form-control form-control-sm"
                                                               id="exchange_rate"
                                                               name="exchange_rate"
                                                               step="0.0001"
                                                               value="1.0">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row mt-3">
                                <div class="col-12">
                                    <button type="button"
                                            class="btn btn-success btn-sm"
                                            onclick="addInvoiceLine()"
                                            style="float:right">Add an item
                                    </button>
                                    <table class="table table-bordered"
                                           id="invoiceLine">
                                        <thead>
                                        <tr>
                                            <th>Items</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Vat</th>
                                            <th>Description</th>
                                            <th>Total</th>
                                            <th>...</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <select class="form-control form-control-sm product_id">
                                                    <option value="1">Item 1</option>
                                                    <option value="2">Item 2</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number"
                                                       class="form-control form-control-sm quantity"
                                                       placeholder="Quantity"
                                                       name="quantity">
                                            </td>
                                            <td>
                                                <input type="number"
                                                       class="form-control form-control-sm price"
                                                       placeholder="Price"
                                                       name="price">
                                            </td>
                                            <td>
                                                <input type="number"
                                                       class="form-control form-control-sm vat"
                                                       placeholder="vat"
                                                       name="vat">
                                            </td>
                                            <td>
                                                <input type="text"
                                                       class="form-control form-control-sm description"
                                                       placeholder="Description"
                                                       name="Description">
                                            </td>
                                            <td>
                                                <input type="number"
                                                       class="form-control form-control-sm total"
                                                       placeholder="Total"
                                                       name="Total">
                                            </td>
                                            <td>
                                                <span style="text-align:center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <button class="btn btn-danger btn-sm"
                                                            onclick="deleteRow(this)"
                                                            type="button"><i class="fa-solid fa-trash"></i></button></span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <div class="row mt-3 justify-content-end">
                                <div class="col-4">
                                    <table class="table table-borderless">
                                        <tbody>
                                        <tr>
                                            <th class="text-right">Gross Total:</th>
                                            <td class="text-right">
                                                <input type="number"
                                                       class="form-control form-control-sm text-right"
                                                       name="gross_total"
                                                       id="gross_total">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-right">Discount Total:</th>
                                            <td class="text-right">
                                                <input type="number"
                                                       class="form-control form-control-sm text-right"
                                                       name="discount_total"
                                                       id="discount_total">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-right">VAT Total:</th>
                                            <td class="text-right">
                                                <input type="number"
                                                       class="form-control form-control-sm text-right"
                                                       name="vat_total"
                                                       id="vat_total">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-right">Charge Total:</th>
                                            <td class="text-right">
                                                <input type="number"
                                                       class="form-control form-control-sm text-right"
                                                       name="charge_total"
                                                       id="charge_total">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-right">Deduct Total:</th>
                                            <td class="text-right">
                                                <input type="number"
                                                       class="form-control form-control-sm text-right"
                                                       name="deduct_total"
                                                       id="deduct_total">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-right">Grand Total:</th>
                                            <td class="text-right">
                                                <input type="number"
                                                       class="form-control form-control-sm text-right"
                                                       name="grand_total"
                                                       id="grand_total">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-right">Net Total:</th>
                                            <td class="text-right">
                                                <input type="number"
                                                       class="form-control form-control-sm text-right"
                                                       name="net_total"
                                                       id="net_total">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12">
                                    <textarea class="form-control"
                                              rows="3"
                                              placeholder="Notes / Terms"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('customStyle')
    @include('modules.invoice.create.components.style')
@endsection

@section('customScript')
    @include('modules.invoice.create.components.script')
@endsection