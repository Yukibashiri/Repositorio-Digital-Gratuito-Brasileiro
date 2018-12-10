<template>

    <div class="col-sm-12">
        <div class="form-group">
            <tags-input element-id="tags"
                :existing-tags="this.tags"
                :limit="this.maxlimit"
                placeholder="Informe as palavras-chave"
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
                tags: null,
                maxlimit: 0
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
            loadLimit() {
                axios.get('api/system/max-keywords')
                    .then((r) => {
                        const {data} = r;
                        this.maxlimit = data;
                    })

            },
        },
        beforeMount () {
            this.loadTags();
            this.loadLimit();
        }

    }
</script>

<style scoped>

</style>