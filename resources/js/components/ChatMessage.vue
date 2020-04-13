<template>
<div class="card">
    <ul class="chat">
        <li class="left clearfix" v-for="message in messages" v-bind:key="message.id">
            <div class="chat-body clearfix">
                <div class="header">
                    <strong class="primary-font">
                        {{ message.user.full_name }}
                    </strong>
                </div>
                <p>
                    {{ message.message }}
                </p>
            </div>
        </li>
    </ul>
    <div class="input-group">
        <input id="btn-input" type="text" name="message" class="form-control input-sm" placeholder="Type your message here..." v-model="newMessage" @keyup.enter="sendMessage">

        <span class="input-group-btn">
            <button class="btn btn-primary btn-sm" id="btn-chat" @click="sendMessage">
                Send
            </button>
        </span>
    </div>
</div>
</template>

<script>
  export default {
        props: ['user'],
    data(){
        return {
            messages:[],
             newMessage: '',
        }
    },
    created(){
        this.fetchMessages();

    },
    mounted(){
        Echo.channel('chat').listen('MessageSent',(e)=>{
            this.messages = e.messages;
            console.log(e);
        })
    },
    methods: {
        fetchMessages() {
            axios.get('/chat/messages').then(response => {
                this.messages = response.data;
            });
        },
         sendMessage() {
                this.$emit('messagesent', {
                    user: this.user,
                    message: this.newMessage
                });

                this.newMessage = ''
            },
        addMessage(message) {
            this.messages.push(message);
            axios.post('/chat/messages', message).then(response => {
              console.log(response.data);
            });
        }
    }
  };

</script>


