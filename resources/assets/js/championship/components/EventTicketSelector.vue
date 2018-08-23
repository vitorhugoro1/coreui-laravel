<template>
    <div>
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active show" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">
                    <i class="icon-calculator"></i> Subscription Values</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false" v-if="is_free == 'false' && hasBankCash()">
                    <i class="icon-basket-loaded"></i> Bank Accounts</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active show" id="home3" role="tabpanel">
                <div class="form-group">
                    <label class="col-md-1 p-0">Is Free?</label>
                    <div class="form-check form-check-inline">
                        <input v-model="is_free" class="form-check-input" id="input-is_free-1" value="true" name="is_free" type="radio" checked>
                        <label class="form-check-label" for="input-is_free-1">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input v-model="is_free" class="form-check-input" id="input-is_free-2" value="false" name="is_free" type="radio">
                        <label class="form-check-label" for="input-is_free-2">No</label>
                    </div>
                </div>
                <div class="form-group" v-if="is_free == 'false'">
                    <label for="amount">Amount</label>
                    <div class="controls">
                        <div class="input-prepend input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input id="amount" name="amount" class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group" v-if="is_free == 'false'">
                    <label for="additional_amount">Additional Amount</label>
                    <div class="controls">
                        <div class="input-prepend input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input id="additional_amount" name="additional_amount" class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group" v-if="is_free == 'false'">
                    <label for="payment_method">Payment Methods</label>
                    <v-select v-model="payment_method" inputId="payment_method" :options="payment_options" multiple></v-select>
                    <input type="hidden" v-for="option in payment_method" :key="option.value" name="payment_method[]" :value="option.value">
                </div>
            </div>
            <div class="tab-pane" id="profile3" role="tabpanel">
                <table class="table-responsive table table-striped">
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox">
                            </th>
                            <th>#ID</th>
                            <th>Name</th>
                            <th>Account Owner</th>
                            <th>Owner Document</th>
                            <th>Bank</th>
                            <th>Agency</th>
                            <th>Account Nº</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="account in bank_accounts" :key="account.id">
                            <td>
                                <input type="checkbox" name="bank_account_action[]" :value="account.id">
                            </td>
                            <th>#{{ account.id }}</th>
                            <td>{{ account.name }}</td>
                            <td>{{ account.account_owner }}</td>
                            <td class="text-center">{{ account.owner_document }}</td>
                            <td>{{ account.bank }}</td>
                            <td>{{ account.agency }}</td>
                            <td>{{ account.account_number }}</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>
                                <input type="checkbox">
                            </th>
                            <th>#ID</th>
                            <th>Name</th>
                            <th>Account Owner</th>
                            <th>Owner Document</th>
                            <th>Bank</th>
                            <th>Agency</th>
                            <th>Account Nº</th>
                        </tr>
                    </tfoot>
                </table>
                <button type="button" class="btn btn-outline-secondary">Add Account</button>
            </div>
        </div>
    </div>
</template>

<script>
import { find } from 'lodash';

export default {
    name: 'event-ticket-selector',
    data() {
        return {
            is_free: 'false',
            payment_options: [
                {
                    label: 'PayPal',
                    value: 'paypal'
                },
                {
                    label: 'PagSeguro',
                    value: 'pagseguro'
                },
                {
                    label: 'Bank Cash',
                    value: 'bank_cash'
                }
            ],
            payment_method: [],
            bank_accounts: []
        };
    },
    methods: {
        loadAccount: function () {
            const accounts = [
                {
                    id: 1,
                    name: 'My Bradesco',
                    account_owner: 'Vitor Hugo Rodrigues',
                    owner_document: '425.239.728-67',
                    bank: 'Bradesco',
                    agency: '1628',
                    account_number: '75296-7'
                },
                {
                    id: 2,
                    name: 'My Teste',
                    account_owner: 'Vitor Hugo Rodrigues',
                    owner_document: '-',
                    bank: 'Teste',
                    agency: '1628',
                    account_number: '75296-7'
                }
            ];

            this.bank_accounts = accounts;
        },
        hasBankCash: function () {
            let option = find(this.payment_method, ['value', 'bank_cash']);

            return option !== undefined;
        }
    },
    created() {
        this.loadAccount();
    }
}
</script>

<style scoped></style>