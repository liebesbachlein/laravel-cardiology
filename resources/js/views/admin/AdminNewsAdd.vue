<template>
    <div class="site-content admin">
          <div class="site-content-in">
              <div class="breadcrumbs-box">
                      <div class="breadcrumb-past">
                          <router-link to="/admin/dashboard">Панель администратора</router-link>
                      </div>
                      <ChevronRight color="grey"/>
                      <div class="breadcrumb-now">
                          <router-link to="/admin/dashboard/news-list">Новости</router-link>
                      </div>
                      <ChevronRight color="grey"/>
                </div>
          
        <form method="POST" @submit.prevent="handleSubmit" :class="{'success-form' : successSubmit}" autocomplete="off" >
          
          <div class="subpage-title" style="text-align: center;">Добавить новость</div>
          <label>ID (konferenziya-almaty-2024-3) <span>*</span></label>
            <input  :readonly="successSubmit" type="text" v-model="id" id="id" name="id" :class="{'invalid' : errorId}" required>
  
            <label>Заголовок <span>*</span></label>
            <input  :readonly="successSubmit" type="text" v-model="title" id="title" name="title" :class="{'invalid' : errorTitle}" required>
  
            <label>Тип события (Конференция, конгресс, т.д.) <span>*</span></label>
            <input :readonly="successSubmit" type="text" v-model="phrase" id="phrase" name="phrase"  :class="{'invalid' : errorPhrase}" required>

            <label>Дата публикации <span>*</span></label>
            <input :readonly="successSubmit"  :class="{'invalid' : errorDate_published}" type="date" v-model="date_published" id="date_published" name="date_published" required>

            <label>Краткое описание <span>*</span></label>
            <textarea :readonly="successSubmit" rows = "5" :class="{'invalid' : errorSummary}"  v-model="summary" name="summary" id="summary"  required/>
    
            <label>Содержание новости (HTML) <span>*</span></label>
            <textarea :readonly="successSubmit" rows = "20" :class="{'invalid' : errorContent}" v-model="content" name="content" id="content"  required/>
      
            <div class="submit" style="display: flex; justify-content: center;">
            <LoaderCircle style="position: absolute;" v-if="loader"/>
            <input type="submit" :disabled="!enableSubmit" class="long-blue-button" value="Добавить новость" v-if="!successSubmit && !errorSubmit ">
          </div>
          <div class="success-blue-button" style="background-color: #FFF; border: 1px solid var(--component-accent-color2); color: var(--component-accent-color2)" 
          v-if="successSubmit || errorSubmit" v-text="errorSubmit? errorSubmit : 'Новость добавлена!'"/>
    
        </form>
            </div>
          </div>
    
    
    
    </template>
    
  <script>
  import ChevronRight from '@/components/ChevronRight.vue';
  import axios from 'axios'
  import LoaderCircle from '@/components/LoaderCircle.vue';
  import { useRoute } from 'vue-router';
  import { ref} from 'vue';
  
  export default {
      name: 'MembershipRequest',
      components: {ChevronRight, LoaderCircle}, 
    computed: {
      enableSubmit: function() {
        if(this.title && this.phrase && this.date_published &&
         this.summary && this.content && !this.errorTitle && !this.errorPhrase && !this.errorDate_published 
          && !this.errorSummary && !this.errorContent ) {
            return true;
         }
        return false
      },
      errorTitle: function() {
        if(this.title != null) {
          return this.title.length == 0
        } else {
          return false
        }
      },
      errorPhrase: function() {
        if(this.phrase != null) {
          return this.phrase.length == 0
        } else {
          return false
        }
      }, 
      errorDate_published: function() {
        if(this.date_published != null) {
          return this.date_published.length == 0
        } else {
          return false
        }
      }, 
      errorSummary: function() {
        if(this.summary != null) {
          return this.summary.length == 0
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
      errorId: function() {
        if(this.id != null) {
          return !this.validateId()
        } else {
          return false
        }
      },
    },
      methods: {
        validateId: function() {
          if (/^([a-zA-Z\-0-9]+)$/.test(this.id)) {
            return true
          } else {
            return false
          }
        },
        
        handleSubmit: async function () {
          if(this.successSubmit) {
          return
         } 
          if(this.id && this.title && this.phrase && this.date_published && this.summary && this.content) {
            this.loader = ' '
            
          const data = {
            id: this.id,
            title: this.title,
            phrase: this.phrase,
            date_published: this.date_published,
            summary: this.summary,
            content: this.content,
          }

          axios.post('/api/news-items/' + this.id, data).then((response) => {
            if(response.status != 200) {
              throw Error('Произошла ошибка 100')
            }
            this.successSubmit = true 
          }).catch((err) => {          
            this.errorSubmit = err.message
          })
            this.loader = null
          }
      
          if(!this.id) {
            this.id = ''
          }
  
          if(!this.title) {
            this.title = ''
          }
  
          if(!this.phrase) {
            this.phrase = ''
          }
  
          if(!this.date_published) {
            this.date_published = ''
          }
  
          if(!this.summary) {
            this.summary = ''
          }
  
          if(!this.content) {
            this.content = ''
          }
          
      }, 
      download: function () {
              axios.get('/policy.pdf', { responseType: 'blob' })
                  .then(response => {
                  const blob = new Blob([response.data], { type: 'application/pdf' });
                  const link = document.createElement('a');
                  link.href = URL.createObjectURL(blob);
                  link.download = 'policy.pdf';
                  link.click();
                  URL.revokeObjectURL(link.href);
              }).catch(console.error);
          }
  },
    setup() { 
    const id = ref(null)
    const title = ref(null)
    const phrase = ref(null)
    const date_published = ref(null)
    const summary = ref(null)
    const content = ref(null)
    const successSubmit = ref(null)
    const loader = ref(null)
    const errorSubmit = ref(null)

    return { id, title, phrase, date_published, summary, content, successSubmit, loader, errorSubmit}
  }
  }
  
  </script>

  <style>

.admin {
    background-color: var(--component-grey-color);
    top: 0;
}


@media only screen and (min-width: 1024px) {

    .admin .multi-page-content {
        width: 100%;
    
    }
}
</style>