@extends('layouts.master')
@section('title', 'Fatura Ekle')
@section('content')

    <h4 class="py-1 mb-2">
        <span class="text-muted fw-light">
            <a href="{{ route('invoice.index') }}">Faturalar</a>
            /</span>
        Fatura ekle
    </h4>

    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-body">
                    <form
                        action="{{ route('invoice.create') }}"
                        method="post">
                        @csrf

                        <div class="container mt-5">
                            <div class="row">
                                <div class="col">
                                    <h2>New Invoice</h2>
                                    <button type="button" class="btn btn-primary float-right ml-2">Save and continue</button>
                                    <button type="button" class="btn btn-secondary float-right">Preview</button>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="border p-3 text-center">
                                                        <p>Add a customer</p>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <form>
                                                        <div class="form-group">
                                                            <label for="invoiceNumber">Invoice number</label>
                                                            <input type="text" class="form-control form-control-sm" id="invoiceNumber" value="2">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="poNumber">P.O./S.O. number</label>
                                                            <input type="text" class="form-control form-control-sm" id="poNumber">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="invoiceDate">Invoice date</label>
                                                            <input type="date" class="form-control form-control-sm" id="invoiceDate" value="2021-01-26">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="paymentDue">Payment due</label>
                                                            <input type="date" class="form-control form-control-sm" id="paymentDue" value="2021-01-26">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-link mt-3">Edit columns</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12">
                                    <table class="table table-bordered" style="margin:0px;padding:0px;">
                                        <thead>
                                        <tr>
                                            <th>Items</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><input type="text" class="form-control form-control-sm"  placeholder="Item name"></td>
                                            <td><input type="number" class="form-control form-control-sm" placeholder="Quantity"></td>
                                            <td><input type="number" class="form-control form-control-sm" placeholder="Price"></td>
                                            <td><input type="number" class="form-control form-control-sm" placeholder="Amount" readonly></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-center">
                                                <button type="button" class="btn btn-link">Add an item</button>
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
                                            <th class="text-right">Subtotal:</th>
                                            <td class="text-right">$0.00</td>
                                        </tr>
                                        <tr>
                                            <th class="text-right">Total:</th>
                                            <td class="text-right"><select class="form-control form-control-sm d-inline-block w-auto"><option>USD ($) - U.S. dollar</option></select> $0.00</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12">
                                    <textarea class="form-control" rows="3" placeholder="Notes / Terms"></textarea>
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
