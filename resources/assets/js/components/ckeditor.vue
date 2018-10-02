<template>
    <div>
        <vue-ckeditor v-model="contentEditor" :config="config" @blur="onBlur($event)" @focus="onFocus($event)" />
    </div>
</template>

<script>
    import VueCkeditor from 'vue-ckeditor2';

    export default {
        name: 'ckeditor',
        components: { VueCkeditor },
        props: ['content', 'name', 'id', 'readonlymode'],
        computed: {
            contentEditor: function () {
                return this.content;
            }
        },
        data() {
            return {
                config: {
                    height: 300
                }
            };
        },

        methods: {
            onBlur(editor) {
                console.log(editor);
            },
            onFocus(editor) {
                console.log(editor);
            }
        }
    };
</script>