<template>
    <div class="site-content admin">
          <div class="site-content-in">
                <div class="breadcrumbs-box">
                    <div class="breadcrumb-past">
                        <router-link to="/admin/dashboard">Панель администратора</router-link>
                    </div>
                    <ChevronRight color="grey"/>
                    <div class="breadcrumb-now">
                        <router-link to="/admin/dashboard/membership-list">Список кандидатов</router-link>
                    </div>
                    <ChevronRight color="grey"/>
                </div>
          
        <form>
          
          <div class="subpage-title" style="text-align: center;">Заяка на членство</div>
            <label>Фамилия</label>
            <input :readonly="true"  type="text" v-model="last_name" id="last_name" name="last_name">
  
            <label>Имя</label>
            <input :readonly="true" type="text" v-model="first_name" id="first_name" name="first_name">
      
  
            <label>Отчество</label>
            <input :readonly="true" type="text" v-model="patro_name" id="patro_name" name="patro_name">
    
    
            <label>Email</label>
            <input :readonly="true" type="email" id="email"  name="email"  v-model="email">
        
  
            <label>Контактный телефон</label>
            <input id="phone_number" name="phone_number"  type="tel" v-model="phone_number" >
  
            <label>Дата рождения</label>
            <input :readonly="true"  type="date" v-model="date_birth" id="date_birth" name="date_birth" >
    
            <label>Место рождения</label>
            <input :readonly="true" type="text" v-model="place_birth" id="place_birth" name="place_birth">
    
            <label>Адрес места жительства</label>
            <input :readonly="true"  type="text" v-model="address" id="address" name="address">
    
            <label>Номер/серия удостоверения личности</label>
            <input placeholder="123456789" :readonly="true" type="text" v-model="id_doc" id="id_doc"  name="id_doc">
    
            <label>Дата выдачи удостоверения личности</label>
            <input :readonly="true" type="date" v-model="date_doc" id="date_doc"  name="date_doc">
    
            <label>Орган выдачи удостоверения личности</label>
            <input :readonly="true" type="text" v-model="place_doc"  id="place_doc"  name="place_doc">
    
            <label>Образование (учебное заведение, специальность, дата окончания)</label>
            <textarea :readonly="true" rows = "10" v-model="education" name="education"/>
    
            <label>Дополнительное образование</label>
            <textarea :readonly="true" rows = "10" v-model="add_education" name="add_education"/>
       
            <label>Интересы и увлечения</label>
            <textarea :readonly="true" rows = "10" v-model="interests" name="interests"/>
       
            <label>Опыт работы</label>
            <textarea :readonly="true" rows = "10" v-model="experience" name="experience"/>
       
            <label>Прошу принять в члены ОО «Общество специалистов по артериальной гипертонии и кардиоваскулярной профилактике» на добровольной основе с</label>
            <input :readonly="true" type="date" v-model="date_member" name="date_member" id="date_member">
    
            <div class="consent">
              <label class="checkbox-container">
                <input :checked="terms" :disabled="true" type="checkbox" v-model="terms" name="terms">
                <span class="checkmark"></span>
              </label>
              <label class="consent-label">Принимаю Условия политики конфиденциальности</label>
            </div>
        </form>
            </div>
          </div>
    
    
    
    </template>

<script>
import ChevronRight from '@/components/ChevronRight.vue';
import { useRoute } from 'vue-router';
import { ref } from 'vue';
import axios from 'axios'


export default {
    name: 'AdminMembershipAbout',
    components: { ChevronRight },
setup() { 
    const item = ref([null])
    const error = ref(null)    
    const route = useRoute()

    const first_name = ref(null)
    const last_name = ref(null)
    const patro_name = ref(null)
    const email = ref(null)
    const phone_number = ref(null)
    const id_doc = ref(null)
    const date_doc = ref(null)
    const place_doc = ref(null)
    const date_birth = ref(null)
    const place_birth = ref(null)
    const address = ref(null)
    const terms = ref(null)
    const education = ref(null)
    const add_education = ref(null)
    const interests = ref(null)
    const experience = ref(null)
    const date_member = ref(null)

    const load = async () => {
        const id = route.params.id
        axios.get('/api/membership-items/' + id).then((response) => {
            item.value = response.data
            first_name.value = item.value.first_name
            last_name.value = item.value.last_name
            patro_name.value = item.value.patro_name
            email.value = item.value.email
            phone_number.value = item.value.phone_number
            id_doc.value = item.value.id_doc
            date_doc.value = item.value.date_doc
            place_doc.value = item.value.place_doc
            date_birth.value = item.value.date_birth
            place_birth.value = item.value.place_birth
            address.value = item.value.address
            terms.value = item.value.terms
            education.value = item.value.education
            add_education.value = item.value.add_education
            interests.value = item.value.interests
            experience.value = item.value.experience
            date_member.value = item.value.date_member

        }).catch((err) => {
            error.value = err.message
            console.log(error.value)
        })
        
    }
    
    load()

    return {item, error, first_name, last_name, patro_name, email, phone_number, id_doc, date_doc, place_doc, date_birth, place_birth, address, terms, education, add_education, interests, experience, date_member}
  }
}

</script>
    