<template>

    <div class="row" id="repeater">

        <div class="col-lg-12">
            <div class="row" v-for="index in count">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="control-label">Papel</label>
                        <select id="roles[0]" name="roles[]" class="form-control" >
                            <option value="" selected="selected">Selecione</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-8">
                    <div class="form-group">
                        <label>Nome Completo <small>(obrigatório)</small></label>
                        <vue-bootstrap-typeahead
                                class="mb-4"
                                v-model="query"
                                :data="users"
                                :serializer="item => item.codinome"
                                @hit="selectedUser = $event"
                        />
                    </div>
                </div>
            </div>

            <button class="btn btn-success btn-xs" type="button"
                    @click="adicionar">
                Adicionar
            </button>
        </div>
    </div>

</template>

<script>

    import VueBootstrapTypeahead from 'vue-bootstrap-typeahead'

    // Global registration
    Vue.component('vue-bootstrap-typeahead', VueBootstrapTypeahead)

    export default {

        data () {
            return {
                query: "",
                users: [],
                count: 1,
                selectedUser: null
            }
        },

        components: {
            VueBootstrapTypeahead
        },

        methods: {
            adicionar () {
                const {global} = window;

                if (this.count < parseInt(global.max_authors))
                    this.count = this.count + 1;
            }
        },

        watch: {
            // When the query value changes, fetch new results from
            // the API - in practice this action should be debounced
            query(newQuery) {
                axios.get(`api/procurar-autor?q=${newQuery}`)
                    .then((res) => {
                        this.users = res.data;
                    })
            }
        },

        filters: {
            stringify(value) {
                return JSON.stringify(value, null, 2)
            }
        }

    }

</script>

<style scoped>

</style>
