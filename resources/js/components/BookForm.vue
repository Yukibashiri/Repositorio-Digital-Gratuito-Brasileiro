<template>
    <!--   Big container   -->
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">

                <!--      Wizard container        -->
                <div class="wizard-container">
                    <div class="card wizard-card" data-color="orange" id="wizardProfile">
                        <form method="POST" enctype="multipart/form-data" action="">
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
                                                <label for="colecao_id" class="control-label">Área específica/Disciplina<small>(obrigatório)</small></label>
                                                <select id="colecao_id" name="colecao_id" class="form-control" >
                                                    <option value="" selected="selected">Selecione</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Titulo <small>(obrigatório)</small></label>
                                                <input name="title" type="text" class="form-control" placeholder="DESENVOLVIMENTO DE UMA PLATAFORMA DE REPOSITÓRIOS DIGITAIS OPEN SOURCE:...">
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
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="disciplina_id" class="control-label">Área específica/Disciplina</label>
                                                <select id="disciplina_id" name="disciplina_id" class="form-control" >
                                                    <option value="" selected="selected">Selecione</option>
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
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label>Nome Completo <small>(obrigatório)</small></label>
                                                <select id="authors[0]" name="authors[]" class="form-control" >
                                                    <option value="" selected="selected">Selecione</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="papel_id" class="control-label">Papel</label>
                                                <select id="papel_id" name="roles[1]" class="form-control" >
                                                    <option value="" selected="selected">Selecione</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label>Nome Completo <small>(obrigatório)</small></label>
                                                <select id="authors[]" name="authors[1]" class="form-control" >
                                                    <option value="" selected="selected">Selecione</option>
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
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <select name="tags" class="form-control" >
                                                    <option value="" selected="selected">Selecione</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <select name="tags" class="form-control" >
                                                    <option value="" selected="selected">Selecione</option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <select name="tags" class="form-control" >
                                                    <option value="" selected="selected">Selecione</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>


                            <div class="wizard-footer height-wizard">
                                <div class="pull-right">
                                    <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' name='next' value='Avançar' />
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
    export default {
        data () {
            //-> Inicio uma variável na classe chamada "tab" que inicia na "info"
            //-> as tabs estão alterando diretamente no evento vue "@click" "variável tab = 'nome da tab'"
            return {
                tab: "info"
            }
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