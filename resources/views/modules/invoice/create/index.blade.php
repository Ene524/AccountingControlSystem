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
                    <form
                        action="{{ route('invoice.create') }}"
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

                                                <div class="col-4 cursor-pointer">
                                                    <div class="card"
                                                         id="cariCard">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Cari Seçimi</h5>
                                                            <div id="cariInfo">
                                                                <p class="text-muted">Cari seçmek için tıklayınız.</p>
                                                            </div>
                                                            <div id="cariSelectContainer"
                                                                 style="display: none;">
                                                                <select id="cariSelect"></select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4"></div>
                                                <div class="col-4">
                                                    <form>
                                                        <div class="form-group">
                                                            <label for="invoiceNumber">Invoice number</label>
                                                            <input type="text"
                                                                   class="form-control form-control-sm"
                                                                   id="invoiceNumber"
                                                                   value="2">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="poNumber">P.O./S.O. number</label>
                                                            <input type="text"
                                                                   class="form-control form-control-sm"
                                                                   id="poNumber">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="invoiceDate">Invoice date</label>
                                                            <input type="date"
                                                                   class="form-control form-control-sm"
                                                                   id="invoiceDate"
                                                                   value="2021-01-26">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="paymentDue">Payment due</label>
                                                            <input type="date"
                                                                   class="form-control form-control-sm"
                                                                   id="paymentDue"
                                                                   value="2021-01-26">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12">
                                    <table class="table table-bordered"
                                           style="margin:0px;padding:0px;">
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
                                            <td>
                                                <select class="form-control form-control-sm">
                                                    <option value="1">Test1</option>
                                                    <option value="1">Test1</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number"
                                                       class="form-control form-control-sm"
                                                       placeholder="Quantity">
                                            </td>
                                            <td>
                                                <input type="number"
                                                       class="form-control form-control-sm"
                                                       placeholder="Price">
                                            </td>
                                            <td>
                                                <input type="number"
                                                       class="form-control form-control-sm"
                                                       placeholder="Amount"
                                                       readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4"
                                                class="text-center">
                                                <button type="button"
                                                        class="btn btn-link">Add an item
                                                </button>
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
                                            <td class="text-right">
                                                <select class="form-control form-control-sm d-inline-block w-auto">
                                                    <option>USD ($) - U.S. dollar</option>
                                                </select>
                                                $0.00
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
