<template>
<div class="row">
    <div class="col-md-3">
    <div class="list-group">
        <template v-for="conversation in conversations">
           <router-link  :to="{ name:'conversation', params: { id: conversation.id }}"  class="list-group-item">
                {{ conversation.name }}
                 <span   span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" v-if="conversation.unread">
                     {{ conversation.unread }}
                <span class="visually-hidden">unread messages</span>
                </span>
        </router-link>
        </template>
    </div>
    </div>
    <div class="col-md-9">
    <router-view></router-view>
    </div>


</div>

</template>

<script>
import {mapGetters} from 'vuex'

export default{
    props :{
        user: Number
    },
    computed:{
        ...mapGetters(['conversations'])
    },
    mounted(){
        this.$store.dispatch('loadConversations')
        this.$store.dispatch('setUser', this.user)
    }
}
</script>
