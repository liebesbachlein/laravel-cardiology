<template>
    <div class="pt-ask">
        <div class="subpage-title">
            Обратиться к специалисту
        </div>

        <form ref="formAsk" @submit.prevent="handleSubmit" :class="{'success-form' : successSubmit}">
            
          <label>ФИО <span>*</span></label>
          <input  :readonly="successSubmit" type="text" v-model="name" id="name"  name="name" :class="{'invalid' : errorName}" required>

          <label>Email <span>*</span></label>
          <input :readonly="successSubmit" :class="{'invalid' : errorEmail}" type="email" id="email" name="email"   v-model="email" @blur="validateEmail" required>
      
          <label>Обращение <span>*</span></label>
          <textarea :readonly="successSubmit" rows = "10" :class="{'invalid' : errorContent}"  v-model="content" name="content" required/>
  
          <div class="submit" style="display: flex; justify-content: center;">
            <Loader style="position: absolute;" v-if="loader"/>
            <input type="submit" :disabled="!enableSubmit" class="long-blue-button" value="Отправить заявку" v-if="!successSubmit && !errorSubmit ">
          </div>
          <div class="success-blue-button" style="background-color: #FFF; border: 1px solid var(--component-accent-color2); color: var(--component-accent-color2)" v-if="successSubmit || errorSubmit " v-text="errorSubmit? errorSubmit : 'Заявка успешно отправлена!'"/>
        </form>
    </div>
</template>

<script>
import Loader from '@/components/Loader.vue'
//import { postAskItem} from '@/firebase/config.js'
import Axios from 'axios'
//import emailjs from 'emailjs-com' 

export default {
    data() {
      return {
        name: null,
        email: null,
        content: null,   
        successSubmit: null, 
        loader: null,
        errorSubmit: null
    }
  },
  components: {Loader},
  computed: {
    enableSubmit: function() {
      return this.name && this.email && this.content
    },
    
    errorName: function() {
      if(this.name != null) {
        return this.name.length == 0
      } else {
        return false
      }
    }, 

    errorContent: function() {
      if(this.content != null) {
        return this.content.length == 0
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
    }, 
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

        if(this.name && this.email && this.content) {
          this.loader = ' '
          try {
            /*postAskItem(this.name, this.email, this.content).then((res1) => emailjs
            .sendForm('service_kejad4f', 'template_1bb61ip', this.$refs.formAsk, '5rwZj5R_LOCI4FI6C')
              .then((result) => {
                this.successSubmit= true
                this.loader = null
              }))
            

            /*const config = {
                    responseType: 'text',
                };

            let responsePHP = await Axios.post('/post.php', {text : 'Hello, Aigerim'}, config)

            if (responsePHP) {
              console.log('success')
              console.log(responsePHP)
              console.log(responsePHP.data)
              console.log(responsePHP.data.message)
            }*/

          } catch (err) {
            this.loader = null
            this.errorSubmit = err.message
          }
        } else {
          console.log('Incomplete form!')
        }

        if(!this.content) {
          this.content = ''
        }

        if(!this.name) {
          this.name = ''
        }

        if(!this.email) {
          this.email = ''
        }
        
    }
}
}

</script>

<style>

.pt-ask form {

    width: 100%;
    margin: 3rem 0 6rem 0;
    padding: 0 3rem 0 0;
}

</style>