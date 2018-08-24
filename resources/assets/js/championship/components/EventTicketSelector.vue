<template>
    <div>
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active show" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">
                    <i class="icon-calculator"></i> Subscription Values</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false" v-if="is_free == 'false' && hasBankCash()">
                    <i class="fa fa-money-check-alt"></i> Bank Accounts</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active show" id="home3" role="tabpanel">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Is Free?</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input v-model="is_free" class="form-check-input" id="input-is_free-1" value="true" name="is_free" type="radio" checked>
                                    <label class="form-check-label" for="input-is_free-1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input v-model="is_free" class="form-check-input" id="input-is_free-2" value="false" name="is_free" type="radio">
                                    <label class="form-check-label" for="input-is_free-2">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="subscription_period">Subscription Event Period</label>
                            <date-range id="subscription_period" name="subscription_period" :makerequired="true"></date-range>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group" v-if="is_free == 'false'">
                            <label for="amount">Subscription Amount</label>
                            <div class="controls">
                                <div class="input-prepend input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">R$</span>
                                    </div>
                                    <input id="amount" name="amount" v-model.lazy="amount" v-money='moneyRules' class="form-control" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group" v-if="is_free == 'false'">
                            <label for="additional_amount">Subscription Additional Amount</label>
                            <div class="controls">
                                <div class="input-prepend input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">R$</span>
                                    </div>
                                    <input id="additional_amount" name="additional_amount" class="form-control" v-model.lazy="additional_amount" v-money='moneyRules' type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group" v-if="is_free == 'false'">
                            <label for="payment_method">Payment Methods</label>
                            <v-select v-model="payment_method" inputId="payment_method" :options="payment_options" multiple placeholder="Select an Payment Method">
                                <template slot="option" slot-scope="option">
                                    <i :class="`pf pf-${option.icon}`"></i>
                                    {{ option.label }}
                                </template>
                            </v-select>
                            <input type="hidden" v-for="option in payment_method" :key="option.value" name="payment_method[]" :value="option.value">
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="profile3" role="tabpanel">
                <bank-account-list></bank-account-list>
            </div>
        </div>
    </div>
</template>

<script>
import { find } from 'lodash';
import { VMoney } from 'v-money';
import BankAccountList from './BankAccount/BankAccountList';

export default {
    name: 'event-ticket-selector',
    components: { BankAccountList },
    props: ['money'],
    directives: { money: VMoney },
    data() {
        return {
            is_free: 'false',
            payment_options: [
                {
                    label: 'PayPal',
                    value: 'paypal',
                    icon: 'paypal'
                },
                {
                    label: 'PagSeguro',
                    value: 'pagseguro',
                    icon: 'pagseguro'
                },
                {
                    label: 'Bank Cash',
                    value: 'bank_cash',
                    icon: 'cash'
                }
            ],
            amount: 0,
            additional_amount: 0,
            payment_method: [],
            moneyRules: this.money
        };
    },
    methods: {
        hasBankCash: function () {
            let option = find(this.payment_method, ['value', 'bank_cash']);

            return option !== undefined;
        }
    },
    created() {
        
    }
}
</script>

<style scoped></style>