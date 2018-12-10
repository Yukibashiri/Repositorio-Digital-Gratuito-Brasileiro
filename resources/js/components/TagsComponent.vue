<template>

    <div class="col-sm-12">
        <div class="form-group">
            <tags-input element-id="tags"
                :existing-tags="this.tags"
                :typeahead="true">
            </tags-input>
        </div>
    </div>

</template>

<script>
    import axios from 'axios';
    import VoerroTagsInput from '@voerro/vue-tagsinput';

    Vue.component('tags-input', VoerroTagsInput);
    Vue.config.keyCodes.backspace = 8;

    export default {
        data () {
            //-> Inicio uma variável na classe chamada "tab" que inicia na "info"
            //-> as tabs estão alterando diretamente no evento vue "@click" "variável tab = 'nome da tab'"
            return {
                tags: []
            }
        },

        components: { VoerroTagsInput },

        methods: {
            loadTags () {
                axios.get('api/tags')
                    .then((r) => {
                        const {data} = r;
                        this.tags = data;
                    })
            },
        },
        beforeMount () {
            this.loadTags();
        }

    }
</script>

<style scoped>

</style>