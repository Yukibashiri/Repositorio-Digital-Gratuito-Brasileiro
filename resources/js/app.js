
/**
 * Aqui como eu te disse, ele carrega todos os arquivos JS dentro do bootstrap.
 *
 * Tudo que tiver dentro do app.js no comando "NPM RUN WATCH" ele vai ler automaticamente as alterações
 *
 * jQuery.js
 * bootstrap.js
 *
 * eles nomearam o arquivo /resources/bootstrap.js pq é o "ponta-pé" inicial, caso contrário pode nomear e alterar no require
 * que está ali embaixo
 *
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 *
 * Ele vai cadastrar todos os arquivos com extensão .vue e dar o nome para usar em tag de acordo com o fileName
 *
 * eles deram um exemplo
 *
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
const files = require.context('./', true, /\.vue$/i);

files.keys().map(key => {
    return Vue.component(_.last(key.split('/')).split('.')[0], files(key))
});

/**
 * A instância do teu VUE será criada em uma div que irá englobar tudo dentro do body,
 * necessário para o VUE criar uma VIRTUAL DOM do teu HTML
 *
 * <div id="app">
 *     ... faça o que quiser aqui, desde que não quebre tags HTML
 * </div>
 *
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
