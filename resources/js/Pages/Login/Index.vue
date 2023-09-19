<template>
    <div id="container">
        <img src="/img/logo.jpeg" alt="">
        <form @submit.prevent="this.login()">
            <div id="fields">
                <div class="field">
                    <input class="input" v-model="formLogin.user" required type="text" :placeholder="translate['user']">
                </div>
                <div class="field">
                    <input class="input" v-model="formLogin.password" required type="password" :placeholder="translate['password']">
                </div>
                <button class="button is-dark" v-text="translate['login']" :disabled="!statusButtonLogin"></button>
            </div>
        </form>
    </div>
</template>

<script>
import './../../../css/login.css'
import VueFeather from 'vue-feather';
import {reactive} from "vue";
import axios from "axios";
import NProgress from 'nprogress'

export default {
    name: 'Index Login',
    props: {
        translate: {
            type: Object,
            required: true
        }
    },
    data(){
        const formLogin = reactive({
            user: null,
            password: null
        })

        return{
            formLogin,
            statusButtonLogin: true
        }
    },
    methods:{
        login: async function(){
            NProgress.start();
            this.statusButtonLogin = false
            const url = route('login.post')
            await axios.post(url, this.formLogin).then((response) => {

            }).catch((err) => {
                this.$toast.error(this.translate['error_processing'])
            })

            this.statusButtonLogin = true
            NProgress.done()
        }
    }
}

</script>
