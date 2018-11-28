<template>
    <!--   Big container   -->
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">

                <!--      Wizard container        -->
                <div class="wizard-container">
                    <div class="card wizard-card" data-color="orange" id="wizardProfile">
                        <form @submit.prevent="proximaEtapa" @keydown="form.onKeydown($event)">
                            <div class="wizard-header">
                                <h3>
                                    <b>COMPARTILHE</b> SEU MATERIAL CIENTÍFICO <br>
                                    <small>Lembre-se você está concordando em disponibilizar seu material publicamente!</small>
                                </h3>
                            </div>

                            <div class="wizard-navigation">
                                <ul class="nav nav-pills">
                                    <li class="widthNav">
                                        <a href="javascript:void(0);" @click="tab = 'info'" :class="{'active show' : tab === 'info'}">
                                            Informações
                                        </a>
                                    </li>
                                    <li class="widthNav">
                                        <a href="javascript:void(0);" @click="tab = 'author'" :class="{'active show' : tab === 'author'}">
                                            Autores
                                        </a>
                                    </li>
                                    <li class="widthNav">
                                        <a href="javascript:void(0);" @click="tab = 'details'" :class="{'active show' : tab === 'details'}">
                                            Detalhes
                                        </a>
                                    </li>
                                </ul>

                            </div>


                            <div class="tab-content">

                                <div class="tab-pane" v-if="tab === 'info'" :class="{'active' : tab === 'info'}">
                                    <div class="row">
                                        <h4 class="info-text card-body align-items-center d-flex justify-content-center col-sm-12">  Informações do material</h4>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="colecao_id" class="control-label">Tipo de Produção<small>(obrigatório)</small></label>
                                                <select id="colecao_id" name="colecao_id" class="form-control" >
                                                    <option value="" selected="selected">Selecione</option>
                                                    <option v-for="(colecao, id) in colecoes" :value="id">
                                                        {{colecao}}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Titulo <small>(obrigatório)</small></label>
                                                <input v-model="form.titulo" type="text"
                                                       class="form-control"
                                                       placeholder="DESENVOLVIMENTO DE UMA PLATAFORMA DE REPOSITÓRIOS DIGITAIS OPEN SOURCE:...">
                                                <has-error :form="form" field="titulo"></has-error>
                                            </div>
                                            <div class="form-group">
                                                <label>Subtítulo</label>
                                                <input name="subtitle" type="text" class="form-control" placeholder="um estudo de caso com a UNDB - MA...">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="curso_id" class="control-label">Área/Curso<small>(obrigatório)</small></label>
                                                <select id="curso_id" name="curso_id" class="form-control" >
                                                    <option value="" selected="selected">Selecione</option>
                                                    <option v-for="(curso, id) in cursos" :value="id">
                                                        {{curso}}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="disciplina_id" class="control-label">Área específica/Disciplina</label>
                                                <select id="disciplina_id" name="disciplina_id" class="form-control" >
                                                    <option value="" selected="selected">Selecione</option>
                                                    <option v-for="(disciplina, id) in disciplinas" :value="id">
                                                        {{disciplina}}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="tab-pane" v-if="tab === 'author'" :class="{'active' : tab === 'author'}">
                                    <h4 class="info-text"> Informe quem são os envolvidos no projeto </h4>

                                    <div class="row" id="repeater">

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="papel_id" class="control-label">Papel</label>
                                                <select id="roles[0]" name="roles[]" class="form-control" >
                                                    <option value="" selected="selected">Selecione</option>
                                                    <option v-for="(papel, id) in papeis" :value="id">
                                                        {{papel}}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label>Nome Completo <small>(obrigatório)</small></label>
                                                <select id="authors[0]" name="authors[]" class="form-control" >
                                                    <option value="" selected="selected">Selecione</option>
                                                    <option v-for="usuario in usuarios" :value="usuario.id">
                                                        {{usuario.nome}}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="papel_id" class="control-label">Papel</label>
                                                <select id="papel_id" name="roles[1]" class="form-control" >
                                                    <option value="" selected="selected">Selecione</option>
                                                    <option v-for="(papel, id) in papeis" :value="id">
                                                        {{papel}}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label>Nome Completo <small>(obrigatório)</small></label>
                                                <select id="authors[]" name="authors[1]" class="form-control" >
                                                    <option value="" selected="selected">Selecione</option>
                                                    <option v-for="usuario in usuarios" :value="usuario.id">
                                                        {{usuario.nome}}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="tab-pane" v-if="tab === 'details'" :class="{'active' : tab === 'details'}">
                                    <h4 class="info-text"> Hora de mandar os detalhes do seu projeto </h4>
                                    <div class="row" >

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Resumo <small>(obrigatório)</small></label>
                                                <textarea name="resumo"  rows="4" cols="100" class="form-control" placeholder="Coloque o resumo do trabalhgo aqui..."> </textarea>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Palavras-chave <small>(obrigatório)</small></label>
                                            </div>
                                        </div>


                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <select id="tags" name="tags" class="form-control" >
                                                    <option value="" selected="selected">Selecione</option>
                                                    <option v-for="(tag, id) in tags" :value="id">
                                                        {{tag}}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <select name="tags" class="form-control" >
                                                    <option value="" selected="selected">Selecione</option>
                                                    <option v-for="(tag, id) in tags" :value="id">
                                                        {{tag}}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <select name="tags" class="form-control" >
                                                    <option value="" selected="selected">Selecione</option>
                                                    <option v-for="(tag, id) in tags" :value="id">
                                                        {{tag}}
                                                    </option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <select name="tags" class="form-control" >
                                                    <option value="" selected="selected">Selecione</option>
                                                    <option v-for="(tag, id) in tags" :value="id">
                                                        {{tag}}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>


                            <div class="wizard-footer height-wizard">
                                <div class="pull-right">
                                    <input type='submit'
                                           :disabled="form.busy"
                                           class='btn btn-next btn-fill btn-warning btn-wd btn-sm'
                                           value='Avançar' />
                                    <input type='submit' class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='finish' value='Cadastrar' />
                                </div>

                                <div class="pull-left">
                                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Voltar' />
                                </div>
                                <div class="clearfix"></div>
                            </div>

                        </form>
                    </div>
                </div> <!-- wizard container -->
            </div>
        </div><!-- end row -->
    </div> <!--  big container -->

</template>

<script>
    import axios from 'axios';
    import { Form, HasError } from 'vform';
    Vue.component(HasError.name, HasError);

    export default {
        data () {
            //-> Inicio uma variável na classe chamada "tab" que inicia na "info"
            //-> as tabs estão alterando diretamente no evento vue "@click" "variável tab = 'nome da tab'"
            return {
                tab: "info",
                disciplinas: [],
                cursos: [],
                colecoes: [],
                papeis: [],
                usuarios: [],
                tags: [],
                form: new Form({
                    colecao_id: "",
                    titulo: "",
                    subtitulo: "",
                    curso_id: "",
                    disciplina_id: ""
                })
            }
        },

        methods: {
            loadDisciplines () {
                axios.get('api/disciplinas')
                    .then((r) => {
                        const {data} = r;
                        this.disciplinas = data;
                    })
            },
            loadCourses () {
                axios.get('api/cursos')
                    .then((r) => {
                        const {data} = r;
                        this.cursos = data;
                    })
            },
            loadCollections () {
                axios.get('api/colecoes')
                    .then((r) => {
                        const {data} = r;
                        this.colecoes = data;
                    })
            },
            loadRoles () {
                axios.get('api/papeis')
                    .then((r) => {
                        const {data} = r;
                        this.papeis = data;
                    })
            },
            loadUsers () {
                axios.get('api/usuarios')
                    .then((r) => {
                        const {data} = r;
                        this.usuarios = data;
                    })
            },
            loadTags () {
                axios.get('api/tags')
                    .then((r) => {
                        const {data} = r;
                        this.tags = data;
                    })
            },

            info () {
                this.form.post('api/item/registrar/informacoes')
                    .then((r) => {
                        this.tab = 'author';
                    })
                    .catch((r) => {
                        console.log(r.response);
                    })
            },

            proximaEtapa (e) {
                this[this.tab]();
            },
        },
        mounted () {
            this.loadDisciplines();
            this.loadCollections();
            this.loadCourses();
            this.loadUsers();
            this.loadRoles();
            this.loadTags();
        }

    }
</script>

<style scoped>
    /* Aqui é css scoped "significa que só vai afetar tudo que tiver dentro da template desse componente vue" */
    .widthNav {
        width: calc(100% / 3);
    }

    .active.show {
        background-color: #8a28ff;
    }
</style>
