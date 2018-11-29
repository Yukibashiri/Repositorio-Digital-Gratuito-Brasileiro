<template>

    <div class="col-sm-12">
        <div class="form-group">
            <vue-tags-input
                    name="tags"
                    v-model="tag"
                    :tags="tags"
                    :autocomplete-items="filteredItems"
                    @tags-changed="newTags => tags = newTags">
            </vue-tags-input>
        </div>
    </div>

</template>

<script>

    import VueTagsInput from '@johmun/vue-tags-input';


    export default {

        components: {
            VueTagsInput,
        },
        data() {
            return {
                tag: '',
                tags: [],
                autocompleteItems: []
            };
        },

        methods: {
            loadTags () {
                axios.get(`api/tags`)
                    .then((r) => {
                        this.autocompleteItems = r.data;
                    })
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