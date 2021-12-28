import Vue from 'vue'

require('./bootstrap');

window.Vue = require('vue')

Vue.component('queue-messages', require('./components/QueueMessages.vue').default)

const app = new Vue({
    el: '#app',
    data: {
        messages: [],
    },
    created() {
        window.Echo.channel('live-queue-management-system')
            .listen('CallNext', (e) => {
                console.log(e)
                this.messages.unshift({
                    counter: e.queue.counter,
                    gate: e.user.gate
                });
            });
    }
})
