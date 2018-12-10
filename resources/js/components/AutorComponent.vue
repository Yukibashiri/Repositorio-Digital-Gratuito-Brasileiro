<template>

    <div class="row" id="repeater">

        <div class="col-lg-12">
            <div class="row" v-for="index in count">

                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="control-label">Papel</label>
                        <select id="roles[index]" name="roles[index]" class="form-control" >
                            <option value="" selected="selected">Selecione</option>
                            <option :value="index" v-for="(papel, index) in papeis">
                                {{papel}}
                            </option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-7">
                    <div class="form-group">
                        <label class="control-label">Nome Completo <small>(obrigatório)</small></label>
                        <vue-bootstrap-typeahead
                                :data="users"
                                v-model="query"
                                placeholder="Informe o nome"
                                :serializer="item => item.nome"
                                @hit="selectedUser = $event"
                        />
                    </div>
                </div>

                <div class="col-sm-7">
                    <div class="form-group">
                        <label class="control-label">Nome Completo <small>(obrigatório)</small></label>
                        <select data-live-search="true" data-live-search-style="startsWith" class="form-control">
                            <option :value="index" v-for="(nome, index) in autores">
                                {{nome}}
                            </option>
                        </select>
                    </div>
                </div>

            </div>
                <button v-if="this.maxAuthors()" class="btn btn-success btn-xs" type="button"
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
                roles: [],
                count: 0,
                max_authors: 0,
                papeis: [],
                autores: [],
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
            },

            loadMinAuthors () {
                const {global} = window;

                this.count = parseInt(global.min_authors);
            },
            loadMaxAuthors () {
                const {global} = window;

                this.max_authors = parseInt(global.max_authors);
            },

           maxAuthors () {
               return this.count < this.max_authors;
            },

            loadPapeis () {
                axios.get(`api/papeis`)
                    .then((r) => {
                        this.papeis = r.data
                    });
            },
            loadAutores () {
                axios.get(`api/usuarios`)
                    .then((r) => {
                        this.autores = r.data
                    });
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
        },

        beforeMount () {
            this.loadMaxAuthors();
            this.loadMinAuthors();
        },        

        mounted () {
            this.loadPapeis();
            this.loadAutores();
        }

    }

</script>

<style scoped>

</style>
