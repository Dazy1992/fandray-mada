require('./bootstrap');
import Alpine from 'alpinejs'
window.Alpine = Alpine;
Alpine.start();
import { createApp } from 'vue'
import Messagerie from './components/MessagerieComponent.vue'
import { createRouter, createWebHistory  } from 'vue-router'
import store from './store/store'
import MessagesComponent from './components/MessagesComponent.vue'
//window.io = require('socket.io-client')



let $messagerie = document.querySelector('#messagerie')

if($messagerie){
    const router = createRouter({
        history: createWebHistory('conversations/'),
        base:$messagerie.getAttribute('data-base'),
        routes: [
            {
                path: '/',
                name:'coversations',
                component:MessagesComponent
            },
            {path: '/ :id',
             name:'conversation',
             component: MessagesComponent
            }
        ],
      })

    createApp(
    {
        components : {Messagerie},

    }
    ).use(store).use(router).mount("#messagerie");

}





