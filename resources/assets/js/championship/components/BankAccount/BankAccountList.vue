<template>
  <div>
    <table class="table table-striped">
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
    <button type="button" class="btn btn-outline-secondary" v-if="canAdd" data-toggle="modal" data-target="#account-modal">Add Account</button>
    <add-account-modal v-if="canAdd"></add-account-modal>
  </div>
</template>

<script>
import AddAccountModal from './Action/AddAccountModal';

export default {
    name: 'bank-account-list',
    components: { AddAccountModal },
    props: {
        user: {
            type: Number,
            default: 1
        },
        canAdd: {
            type: Boolean,
            default: true
        }
    },
    data() {
        return {
            bank_accounts: []
        };
    },
    methods: {
        loadAccount: function () {
            // @todo Criar metodo para pegar a lista de contas do usuario
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
        }
    },
    created() {
        this.loadAccount();
    }
}
</script>