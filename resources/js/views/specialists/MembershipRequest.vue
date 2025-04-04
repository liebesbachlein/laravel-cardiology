<template>
  <div class="site-content greyback">
        <div class="site-content-in">
            <div class="breadcrumbs-box">
                    <div class="breadcrumb-past">
                        <router-link to="/">Главная</router-link>
                    </div>
                    <ChevronRight color="grey"/>
                    <div class="breadcrumb-now">
                        <router-link to="/specialists/">Специалистам</router-link>
                    </div>
                    <ChevronRight color="grey"/>
                    <div class="breadcrumb-now">
                      <router-link :to="/membership-request/">Членство</router-link>
                    </div>
              </div>
        
      <form method="POST" @submit.prevent="handleSubmit" :class="{'success-form' : successSubmit}" autocomplete="on" >
        
        <div class="subpage-title" style="text-align: center;">Заяка на членство</div>
          <label>Фамилия <span>*</span></label>
          <input  :readonly="successSubmit" type="text" v-model="last_name" id="last_name" name="last_name" :class="{'invalid' : errorLast_name}" required>

          <label>Имя <span>*</span></label>
          <input :readonly="successSubmit" type="text" v-model="first_name" id="first_name" name="first_name"  :class="{'invalid' : errorFirst_name}" required>
    

          <label>Отчество</label>
          <input :readonly="successSubmit" type="text" v-model="patro_name" id="patro_name" name="patro_name">
  
  
          <label>Email <span>*</span></label>
          <input :readonly="successSubmit" :class="{'invalid' : errorEmail}" type="email" id="email"  name="email"  v-model="email" @blur="validateEmail" required>
      

          <label>Контактный телефон <span>*</span></label>
          <input id="phone_number" name="phone_number" @paste="pasteNum($event)" @keydown="isNumber($event)" placeholder="+7 (___) ___ - __ - __" :readonly="successSubmit" :class="{'invalid' : errorPhone_number}" type="tel" v-model="phone_number" required>

          <label>Дата рождения <span>*</span></label>
          <input :readonly="successSubmit"  :class="{'invalid' : errorDate_birth}" type="date" v-model="date_birth" id="date_birth" name="date_birth"  required>
  
          <label>Место рождения <span>*</span></label>
          <input :readonly="successSubmit" type="text" v-model="place_birth" id="place_birth" name="place_birth" :class="{'invalid' : errorPlace_birth}" required>
  
          <label>Адрес места жительства <span>*</span></label>
          <input :readonly="successSubmit"  type="text" v-model="address" id="address" name="address" :class="{'invalid' : errorAddress}" required>
  
          <label>Номер/серия удостоверения личности <span>*</span></label>
          <input placeholder="123456789" :readonly="successSubmit" type="text" v-model="id_doc" id="id_doc"  name="id_doc"  :class="{'invalid' : errorId_doc}" required>
  
          <label>Дата выдачи удостоверения личности <span>*</span></label>
          <input :readonly="successSubmit" type="date" v-model="date_doc" id="date_doc"  name="date_doc" :class="{'invalid' : errorDate_doc}" required>
  
          <label>Орган выдачи удостоверения личности <span>*</span></label>
          <input :readonly="successSubmit" type="text" v-model="place_doc"  id="place_doc"  name="place_doc" :class="{'invalid' : errorPlace_doc}" required>
  
          <label>Образование (учебное заведение, специальность, дата окончания) <span>*</span></label>
          <textarea :readonly="successSubmit" rows = "10" :class="{'invalid' : errorEducation}"  v-model="education" name="education" required/>
  
          <label>Дополнительное образование</label>
          <textarea :readonly="successSubmit" rows = "10" v-model="add_education" name="add_education"/>
     
          <label>Интересы и увлечения</label>
          <textarea :readonly="successSubmit" rows = "10" v-model="interests" name="interests"/>
     
          <label>Опыт работы</label>
          <textarea :readonly="successSubmit" rows = "10" v-model="experience" name="experience"/>
     
          <label>Прошу принять в члены ОО «Общество специалистов по артериальной гипертонии и кардиоваскулярной профилактике» на добровольной основе с <span>*</span></label>
          <input :readonly="successSubmit" type="date" v-model="date_member" name="date_member" id="date_member" :class="{'invalid' : errorDate_member}" required>
  
          <div class="consent">
            <label class="checkbox-container">
              <input :disabled="successSubmit" type="checkbox" v-model="terms" name="terms" required>
              <span class="checkmark"></span>
            </label>
            <label class="consent-label" :style="{color: successSubmit? '#A7ACBC': ''}">Принимаю <span @click.prevent="download">Условия политики конфиденциальности</span></label>
          </div>
          
    
          <div class="submit" style="display: flex; justify-content: center;">
          <LoaderCircle style="position: absolute;" v-if="loader"/>
          <input type="submit" :disabled="!enableSubmit" class="long-blue-button" value="Отправить заявку" v-if="!successSubmit && !errorSubmit ">
        </div>
        <div class="success-blue-button" style="background-color: #FFF; border: 1px solid var(--component-accent-color2); color: var(--component-accent-color2)" 
        v-if="successSubmit || errorSubmit" v-text="errorSubmit? errorSubmit : 'Заявка успешно отправлена!'"/>
  
      </form>
          </div>
          <Footer/>
        </div>
  
  
  
  </template>
  
<script>
import ChevronRight from '@/components/ChevronRight.vue';
import Footer from '@/components/Footer.vue';
import axios from 'axios'
import LoaderCircle from '@/components/LoaderCircle.vue';

export default {
    name: 'MembershipRequest',
    components: {ChevronRight, Footer, LoaderCircle}, 
    data() {
      return {
        first_name: null,
        last_name: null,
        patro_name: null,
        email: null,
        phone_number: null,
        id_doc: null,
        date_doc: null,
        place_doc: null,
        date_birth: null,
        place_birth: null,
        address: null,
        terms: null,
        education: null,
        add_education: null,
        interests: null,
        experience: null, 
        date_member: null, 
        successSubmit: null, 
        loader: null,
        errorSubmit: null
    }
  },
  computed: {
    enableSubmit: function() {
      return this.first_name && this.last_name && this.email && this.phone_number && this.address && this.date_birth && this.place_birth && 
        this.id_doc && this.date_doc && this.place_doc && this.terms && this.education && !this.errorEducation
        && !this.errorPhone_number && !this.errorFirst_name && !this.errorLast_name && !this.errorEmail && !this.errorId_doc 
        && !this.errorPlace_doc && !this.errorDate_doc && !this.errorDate_birth &&  !this.errorPlace_birth && !this.errorAddress 
         && !this.errorTerms && !this.errorDate_member
    },
    errorEducation: function() {
      if(this.education != null) {
        return this.education.length == 0
      } else {
        return false
      }
    },
    errorPhone_number: function() {
      if(this.phone_number != null) {
        if (this.phone_number.length == 0) {
          return true
        } else if (this.phone_number.length < 18) {
          return true
        }
      } else {
        return false
      }
    }, 
    errorFirst_name: function() {
      if(this.first_name != null) {
        return this.first_name.length == 0
      } else {
        return false
      }
    }, 
    errorLast_name: function() {
      if(this.last_name != null) {
        return this.last_name.length == 0
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
    errorId_doc: function() {
      if(this.id_doc != null) {
        if(/^[0-9]{9}$/.test(this.id_doc)) {
          return false
        } else {
          return true
        }
      } else {
        return false
      }
    }, 
    errorPlace_doc: function() {
      if(this.place_doc != null) {
        return this.place_doc.length == 0
      } else {
        return false
      }
    }, 
    errorDate_doc: function() {
      if(this.date_doc != null) {
        return this.date_doc.length == 0
      } else {
        return false
      }
    }, 
    errorDate_birth: function() {
      if(this.date_birth != null) {
        return this.date_birth.length == 0
      } else {
        return false
      }
    }, 
    errorPlace_birth: function() {
      if(this.place_birth != null) {
        return this.place_birth.length == 0
      } else {
        return false
      }
    }, 
    errorAddress: function() {
      if(this.address != null) {
        return this.address.length == 0
      } else {
        return false
      }
    }, 
    errorTerms: function() {
      if(this.terms != null) {
        return this.terms.length == 0
      } else {
        return false
      }
    }, 
    errorDate_member: function() {
      if(this.date_member != null) {
        return this.date_member.length == 0
      } else {
        return false
      }
    }, 
  },
    methods: {
      formatNum: function(number) {
        if(!number) {
          return ''
        } else if (number === '+') {
          return '+'
        } else if (number === '7') {
          return '+7'
        } else if (number != '+' && number != '7' && number.length == 1) {
          return '+7 ( ' + number
        } else { 
        let chars = []
        const arr = ['+', '7', ' ', '(', '_', '_', '_', ')', ' ', '_', '_', '_', '–', '_', '_', '–', '_', '_']
        const pos = [1, 4, 5, 6, 9, 10, 11, 13, 14, 16, 17]
        for (let i = 0; i < number.length; i++) {
          if(chars.length == 11) {
            break
          } 
          if(/^[0-9]$/.test(number.charAt(i))) {
            chars.push(number.charAt(i))
          }
        }

        let output = []
        for (let i = 0; i < chars.length; i++) {
          arr[pos[i]] = chars[i]
        }
        for (let i = 0; i <= pos[chars.length - 1]; i++) {
          output.push(arr[i])
        }

        return output.join('')
      }
      },
      pasteNum: function(e) {
        let value = e.clipboardData.getData('text/plain')
        e.preventDefault()
        if(this.phone_number == null) {
          this.phone_number = this.formatNum(value)
        } else {
        let curPos = document.getElementById("phone_number").selectionStart; 
        this.phone_number = this.formatNum(this.phone_number.slice(0, curPos) + value + this.phone_number.slice(curPos))
        }

      },
      isNumber: function (e) {    
    
        if (e.key) {
          if(e.key.toLowerCase() === 'backspace' || e.key.toLowerCase() === 'delete') {
            this.eraseNum(e)
            return
          } 
        }
          let curPos = document.getElementById("phone_number").selectionStart;  
          let curPosEnd = document.getElementById("phone_number").selectionEnd;  
          let char = e.key
          if (/[0-9+]/.test(char)) {
            if (this.phone_number == null) {
              if(char == '7') {
                this.phone_number = '+'
              } else if (char != '+') {
                this.phone_number = '+7 ('
              }
            } else {
              if (char == '+') {
                //this.phone_number = this.formatNum(this.phone_number)
                this.phone_number = this.nextNum(this.phone_number)
                e.preventDefault()
              } else if (this.phone_number.length == 0) {
                  if (char == '7') {
                    this.phone_number = '+'
                  } else {
                    this.phone_number = '+7 ('
                  }
              } else if (this.phone_number == '+' && char != '7' ) {
                //let number = this.formatNum(this.phone_number.slice(0, curPos) + char + this.phone_number.slice(curPos))
                this.phone_number = '+7 ('
              } else if (this.phone_number == '+7' || this.phone_number == '+7 ' || this.phone_number == '+7 (' ) {
                this.phone_number = '+7 ('
              } else {
                if(curPos == curPosEnd) {
                  let lenStart = this.phone_number.length
                  this.phone_number = this.formatNum(this.phone_number.slice(0, curPos) + char + this.phone_number.slice(curPos))
                  
                  e.preventDefault()
                  let lenEnd = this.phone_number.length
                  let dif = lenEnd - lenStart
                  window.setTimeout(function() {
                    document.getElementById("phone_number").setSelectionRange(curPos + dif, curPos + dif);
                  }, 0)
                } else {
                  let lenStart = this.phone_number.length
                  this.phone_number = this.formatNum(this.phone_number.slice(0, curPos) + char + this.phone_number.slice(curPosEnd))
                
                  e.preventDefault()
                  let lenEnd = this.phone_number.length
                  let dif = lenEnd - lenStart
                  window.setTimeout(function() {
                    document.getElementById("phone_number").setSelectionRange(lenEnd, lenEnd);
                  }, 0)
                }
                
              }
            }
          } else {
              //let lenStart = this.phone_number? this.phone_number.length : 0
              if(e.key) {
                if(e.key.toLowerCase() === 'arrowright' || e.key.toLowerCase() === 'arrowleft') {
                  return
                } 
              }
              this.phone_number = this.nextNum(this.phone_number)
              e.preventDefault()
              let lenStart = this.phone_number? this.phone_number.length : 0
              /*let lenEnd = this.phone_number.length
              let dif = lenEnd - lenStart == 0 ? 1 : lenEnd - lenStart
              window.setTimeout(function() {
                document.getElementById("phone_number").setSelectionRange(curPos + dif, curPos + dif);
              }, 0)*/
              window.setTimeout(function() {
                document.getElementById("phone_number").setSelectionRange(lenStart, lenStart);
              }, 0)
          }
      },
      eraseNum: function(e) {
        const pos = [2, 3, 7, 8, 12, 15]
        let curPos = document.getElementById("phone_number").selectionStart; 
        let curPosEnd = document.getElementById("phone_number").selectionEnd;
        if (e.key) {
          if(e.key.toLowerCase() === 'backspace' && this.phone_number) {/////////////////
            if(curPos == curPosEnd) {
              
              let flag = false
              pos.forEach((x) => {
                if (curPos - 1 == x) {
                  e.preventDefault()
                  window.setTimeout(function() {
                    document.getElementById("phone_number").setSelectionRange(curPos - 1, curPos - 1);
                    }, 0)
                    flag=true
                }
              })
           
              if(flag) {
                return true
              }

              let lenStart = this.phone_number.length
              this.phone_number = this.formatNum(this.phone_number.slice(0, curPos - 1) + this.phone_number.slice(curPos))
              //this.phone_number = this.nextNum(this.phone_number)
              e.preventDefault()
              let lenEnd = this.phone_number.length
              let dif = lenEnd - lenStart
              window.setTimeout(function() {
                  document.getElementById("phone_number").setSelectionRange(curPos + dif, curPos + dif);
                }, 0)

            } else {
              this.phone_number = this.formatNum(this.phone_number.slice(0, curPos) + this.phone_number.slice(curPosEnd))
              //this.phone_number = this.nextNum(this.phone_number)
              e.preventDefault()
              let lenEnd = this.phone_number.length
              window.setTimeout(function() {
                document.getElementById("phone_number").setSelectionRange(lenEnd, lenEnd);
              }, 0)
            }
        } else if(e.key.toLowerCase() === 'delete' && this.phone_number) {///////////////
            if(curPos == curPosEnd) {
              let lenStart = this.phone_number.length
              this.phone_number = this.formatNum(this.phone_number.slice(0, curPos) + this.phone_number.slice(curPos + 1))
              //this.phone_number = this.nextNum(this.phone_number)
              e.preventDefault()
              let lenEnd = this.phone_number.length
              let dif = lenEnd - lenStart
              window.setTimeout(function() {
                document.getElementById("phone_number").setSelectionRange(curPos, curPos);
                }, 0) }
            else {
              this.phone_number = this.formatNum(this.phone_number.slice(0, curPos) + this.phone_number.slice(curPosEnd))
              //this.phone_number = this.nextNum(this.phone_number)
              e.preventDefault()
              let lenEnd = this.phone_number.length
              window.setTimeout(function() {
                document.getElementById("phone_number").setSelectionRange(lenEnd, lenEnd);
              }, 0)
            }
        } 
      }
      },
      nextNum: function(number) {
        if (!number) {
            return '+'
        } else if (number.length >= 18) {
          return number
        } else { 
        const arr = ['+', '7', ' ', '(', '_', '_', '_', ')', ' ', '_', '_', '_', '–', '_', '_', '–', '_', '_']
        const pos = [0, 1, 2, 3, 7, 8, 12, 15]
        
        for (let i = 0; i < pos.length; i++) {
          if(number.length == pos[i]) {
            return number + arr[pos[i]]
          }
        }

        return number
      }
      },
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
        if(this.first_name && this.last_name && this.email && this.phone_number && this.address && this.date_birth && this.place_birth && 
        this.id_doc && this.date_doc && this.place_doc && this.terms && this.education) {
          this.loader = ' '
          
        const data = {
          last_name: this.last_name,
          first_name: this.first_name,
          patro_name: this.patro_name,
          email: this.email,
          phone_number: this.phone_number,
          date_birth: this.date_birth,
          place_birth: this.place_birth,
          address: this.address,
          id_doc: this.id_doc,
          date_doc: this.date_doc,
          place_doc: this.place_doc,
          education: this.education,
          add_education: this.add_education,
          interests: this.interests,
          experience: this.experience,
          date_member: this.date_member,
          terms: this.terms,
          accepted: false
        }

        axios.post('/api/post/membership-items', data).then((response) => {
          if(response.status != 200) {
            throw Error('Произошла ошибка 100')
          }
          axios.post('/api/mail_membership/send_mail', data).then((mailRes) => {
            if(mailRes.status != 200) {
              throw Error('Произошла ошибка 101')
            }
          }).catch((err) => {          
          this.errorSubmit = err.message
          })
          this.successSubmit = true  
        }).catch((err) => {          
          this.errorSubmit = err.message
        })
          this.loader = null
        }
    

        if(!this.terms) {
          this.terms = ''
        }

        if(!this.education) {
          this.education = ''
        }

        if(!this.id_doc) {
          this.id_doc = ''
        }

        if(!this.place_doc) {
          this.place_doc = ''
        }

        if(!this.date_doc) {
          this.date_doc = ''
        }

        if(!this.first_name) {
          this.first_name = ''
        }

        if(!this.last_name) {
          this.last_name = ''
        }

        if(!this.email) {
          this.email = ''
        }

        if(!this.phone_number) {
          this.phone_number = ''
        }

        if(!this.address) {
          this.address = ''
        }

        if(!this.date_birth) {
          this.date_birth = ''
        }

        if(!this.place_birth) {
          this.place_birth = ''
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
}
}

</script>


<style>

.greyback {
  background-color: var(--component-grey-color);
 } 

form * {
  transition: all 0.1s ease;
}

form.success-form span, label, form.success-form input, form.success-form textarea{
  color: #818698;
}

form.success-forminput:focus {
  border: 1px solid #C4DAE5;
  outline: none;
}

form span {
  font-family: var(--plain-text-font);
  font-size: 0.875rem;
  font-weight: 500;
  color: var(--component-accent-color1);
}

label {
  display: inline-block;
  font-family: var(--plain-text-font);
  font-size: 0.875rem;
  font-weight: 400;
  margin-bottom: 0.5rem; 
}   

input:focus {
  border: 1px solid #FFF;
  outline: 1px solid #454545;
}

input, textarea {
  width: 100%;
  border: 1px solid #C4DAE5;
  border-radius: 0.25rem;
  color: #454545;
  margin-bottom: 1.5rem;
  font-family: var(--plain-text-font);
  padding: 14px 14px 12px 14px;
  font-weight: 400;
  display: block;
  font-size: 1rem;
}

input {
  height: 48px;
}

input[type="checkbox"] {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
  padding: 0;
}

input[type="checkbox"]:focus {
  border: none;
  outline: none
}

textarea {
  resize: none;
}

textarea:focus {
  border: 1px solid #454545;
  outline: 1px solid #454545;
}

.invalid {
  border: 1px solid var(--component-accent-color1);
  outline: none;
}

.consent {
  margin-top: 3rem;
  margin-bottom: 1.5rem;
}

.consent-label {
  margin: 0 0 0 2rem;
}

.consent-label span {
  cursor: pointer;
}

.checkbox-container {
  display: block;
  position: relative;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  padding: 0;
  margin: 0;
  cursor: pointer;
  font-size: 22px;
}

.checkmark {
  position: absolute;
  top: 0px;
  left: 0px;
  height: 20px;
  width: 20px;
  background-color: #FFF;
  border: 1px solid #C4DAE5;
  border-radius: 0.25rem;
}

.checkbox-container input:checked ~ .checkmark {
  background-color: var(--component-accent-color2);
  border: 1px solid var(--component-accent-color2);
}

.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

.checkbox-container input:checked ~ .checkmark:after {
  display: block;
}

.checkbox-container .checkmark:after {
  left: 6px;
  top: 2px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 2px 2px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}


form {
    display: block;
    width: 100%;
    margin: 4rem 0 6rem 0;
    background: #FFF;
    text-align: left;
    padding: 3rem 1rem;
    border-radius: 0.5rem;
}

.greyback .site-content-in {
  padding: 0 0.5rem;
} 

.greyback .breadcrumbs-box {
  display: none;
}


@media only screen and (min-width: 1024px) {
  .greyback .breadcrumbs-box {
  display: flex;
 }

  form {
    display: block;
    width: 75%;
    margin: 3rem auto 6rem auto;
    background: #FFF;
    text-align: left;
    padding: 3rem 10%;
    border-radius: 0.5rem;
}


}


</style>