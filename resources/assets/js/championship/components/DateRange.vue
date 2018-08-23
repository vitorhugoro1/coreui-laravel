<template>
    <v-date-picker :select-attribute="attributes" mode="range" v-model="selectDate" show-caps></v-date-picker>
</template>

<script>
    import VCalendar from 'v-calendar';
    import 'v-calendar/lib/v-calendar.min.css';

    export default {
        name: 'date-range',
        props: {
            initial: {
                type: Date,
                default: function () {
                    return new Date();
                }
            },
            last: {
                type: Date,
                default: function () {
                    return new Date();
                }
            },
            name: {
                type: String,
                default: 'date-range'
            },
            id: {
                type: String,
                default: 'date-range'
            },
            classField: {
                type: Array,
                default: function () {
                    return ['form-control'];
                }
            }
        },
        data() {
            return {
                selectDate: {
                    start: this.initial,
                    end: this.last
                },
                attributes: {
                   name: this.name,
                   id: this.id
                }
            };
        },
    };
</script>

<style scoped></style>