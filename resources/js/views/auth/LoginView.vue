<template>

  <div class="site-content greyback login">
      <div class="site-content-in">
          
        <form method="POST" @submit.prevent="handleSubmit" :class="{'success-form' : successSubmit}" >
          <div class="subpage-title" style="text-align: center;">Панель администратора</div>
          <label>Email</label>
          <input  :class="{'invalid' : errorEmail}" type="email" id="email"  name="email"  v-model="email" @blur="validateEmail" required>
        
          <label>Пароль</label>
          <input  :class="{'invalid' : errorPassword}" type="password" v-model="password" id="password" name="password"  required>
    
          <div class="submit" style="display: flex; justify-content: center;">
              <LoaderCircle style="position: absolute;" v-if="loader"/>
              <input type="submit" :disabled="!enableSubmit" class="long-blue-button" value="Войти">
          </div>
          <label v-if="errorSubmit" style="color: var(--bright-red)">{{ errorSubmit }}</label>

    
        </form>
      </div>
  </div>
  
  </template>
  
  
  <script>
  import axios from 'axios';
  import LoaderCircle from '@/components/LoaderCircle.vue'
  
  export default {
      name: 'LoginView',
      components: {LoaderCircle}, 
      data() {
        return {
          password: null,
          email: null,
          successSubmit: null, 
          loader: null,
          errorSubmit: null
      }
    },
    computed: {
      enableSubmit: function() {
        return this.email && this.password && this.email  
           && !this.errorPassword && !this.errorEmail
      },
      errorPassword: function() {
        if(this.password != null) {
          return this.password.length == 0
        } else {
          return false
        }
      },
      errorEmail: function() {
        if(this.email != null) {
          return !this.validateEmail()
        } else {
          return false
        }
      }
    },
      methods: {
        validateEmail: function() {
          
          if (/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(this.email)) {
            return true
          } else {
            return false
          }
        },
        handleSubmit: async function () {
          if(this.successSubmit) {
          return
         } 
          if(this.email && this.password) {
            this.loader = ' '
            
          const data = {
            email: this.email,
            password: this.password,
            name: 'Admin',
            user_type: 'admin'
          }
          //console.log(data);
          axios.post('/users/login', data).then((response) => {
            if(response.status != 200) {
              throw Error('Произошла ошибка')
            }
            this.successSubmit = true 
            this.loader = null
            this.$router.push({ path: '/admin/dashboard/' }) 
          }).catch((err) => {          
            this.errorSubmit = err.message
            this.loader = null
          })
            
          }
      
  
          if(!this.email) {
            this.email = ''
          }
  
          if(!this.password) {
            this.password = ''
          }
          
      }
  }
  }
  
  </script>
  
  
  
  <style>
  
    .login {
      top: 0;
      height: 100%;
    }
  
    .login  .subpage-title {
      font-size: 1.5rem;
      color: #434655; 
    }
  
    .login .site-content-in {
      width: 100%;
      height: 80%;
      display: flex;
      align-items: center;
    }
  
  @media only screen and (min-width: 1024px) {
  
    .login .site-content-in {
      height: 100%;
      width: 50%;
    }
  }
  
  </style>
  