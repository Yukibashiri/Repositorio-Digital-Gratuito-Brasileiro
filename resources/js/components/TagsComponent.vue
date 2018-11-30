<template>

    <div class="col-sm-12">
        <div class="form-group">

        </div>
    </div>

</template>

<script>

    import VueTagsInput from '@johmun/vue-tags-input'


    export default {

        data() {
            return {
                tag: '',
                tags: [],
                autocompleteItems: []
            };
        },

        components: {
            VueTagsInput,
        },

        methods: {
            loadTags () {
                axios.get(`api/tags`)
                    .then((r) => {
                        this.autocompleteItems = r.data
                    });
            }
        },

        computed: {
            filteredItems() {
                return this.autocompleteItems.filter(i => new RegExp(this.tag, 'i').test(i.text));
            }
        },

        beforeMount () {
            this.loadTags();
        }

    }
</script>

<style scoped>

</style>