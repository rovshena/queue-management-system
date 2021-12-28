<template>
    <div>
        <div class="alert alert-success" v-for="message in lastMessages" :key="message.counter">
            <h1>
                <strong>
                    {{ message.counter }}
                </strong>
                <i class="fas fa-angle-double-right fa-fw mx-2"></i>
                {{ message.gate }}
            </h1>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'QueueMessages',
        props: ['messages'],
        computed: {
            lastMessages() {
                return this.messages.slice(0, 5)
            }
        }
    }
</script>
