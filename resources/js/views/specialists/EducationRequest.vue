<template>
  <div class="site-content greyback">
        <div class="site-content-in">
            <div class="breadcrumbs-box" style="margin-top: 3rem;">
                    <div class="breadcrumb-past">
                        <router-link to="/">Главная</router-link>
                    </div>
                    <ChevronRight color="grey"/>
                    <div class="breadcrumb-now">
                        <router-link to="/specialists/">Специалистам</router-link>
                    </div>
                    <ChevronRight color="grey"/>
                    <div class="breadcrumb-now">
                      <router-link to="/specialists/membership-request/">Обучение</router-link>
                    </div>
              </div>
        
      <form ref="formEdu" @submit.prevent="handleSubmit" :class="{'success-form' : successSubmit}" autocomplete="on">
        
        <div class="subpage-title" style="text-align: center;">Заяка на обучение</div>
          <label>Фамилия <span>*</span></label>
          <input  :readonly="successSubmit" type="text" v-model="last_name" name="last_name" id="last_name" :class="{'invalid' : errorLast_name}" required>

          <label>Имя <span>*</span></label>
          <input :readonly="successSubmit" type="text" v-model="first_name" id="first_name" name="first_name" :class="{'invalid' : errorFirst_name}" required>
    

          <label>Отчество</label>
          <input :readonly="successSubmit" type="text" v-model="patro_name" id="patro_name" name="patro_name">
  
  
          <label>Email <span>*</span></label>
          <input :readonly="successSubmit" :class="{'invalid' : errorEmail}" type="email" id="email" name="email"   v-model="email" @blur="validateEmail" required>
      
          <label>Контактный телефон <span>*</span></label>
          <input id="phone_number" name="phone_number" @paste="pasteNum($event)" @keydown="isNumber($event)" placeholder="+7 (___) ___ - __ - __" :readonly="successSubmit" :class="{'invalid' : errorPhone_number}" type="tel" v-model="phone_number" required>
  
          <label>Специальность <span>*</span></label>
          <input :readonly="successSubmit" type="text" v-model="speciality" id="speciality" name="speciality"  :class="{'invalid' : errorSpeciality}" required>
 
          <label>Адрес места жительства <span>*</span></label>
          <input :readonly="successSubmit"  type="text" v-model="address_home" id="address_home" name="address_home"   v-bind:name="address_home" :class="{'invalid' : errorAddress_home}" required>
  
          <label>Адрес места работы <span>*</span></label>
          <input :readonly="successSubmit" type="text" v-model="address_work" id="address_work" name="address_work"  :class="{'invalid' : errorAddress_work}" required>
          
          <div class="picks-box">
        
            <label>Выберете предпочтительный месяц для занятий <span>*</span></label>
            <div class="options">
              <div class="options-item">
                <div class="option-input">
                  <input :disabled="successSubmit" type="radio" value="Апрель" v-model="picked_month" name="picked_month" required>
                </div>
                <label>Апрель</label>
              </div>

              <div class="checkbox-adjust">
                <div class="option-input">
                <input :disabled="successSubmit" type="radio" id="may" value="Май" v-model="picked_month" name="picked_month" required>
                </div><label>Май</label>
              </div>
            </div>

            <label>Выберете предпочтительное время для занятий <span>*</span></label>
            <div class="options">
              <div class="checkbox-adjust">
                <div class="option-input">
                 <input :disabled="successSubmit" type="radio" id="first" value="В первой половине дня" v-model="picked_time" name="picked_time" required>          
              </div><label>1-я половина дня</label>
              </div>

              <div class="options-item">
                <div class="option-input">
                <input :disabled="successSubmit" type="radio" id="second" value="Во второй половине дня" v-model="picked_time" name="picked_time" required>
                </div><label >2-я половина дня</label><!--style="margin-left: 0.75rem;"-->
              </div>
            </div>
          </div>

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
        speciality: null,
        address_home: null,
        address_work: null,
        terms: null,
        picked_time: null,
        picked_month: null,
        successSubmit: null, 
        errorSubmit: null,
        loader: null
    }
  },
  computed: {
    enableSubmit: function() {
      return this.first_name && this.last_name && this.email && this.phone_number && this.speciality && this.address_home && this.address_work && 
        this.terms && this.picked_month && this.picked_time
        
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
    errorSpeciality: function() {
      if(this.speciality != null) {
        return this.speciality.length == 0
      } else {
        return false
      }
    }, 
    errorAddress_home: function() {
      if(this.address_home != null) {
        return this.address_home.length == 0
      } else {
        return false
      }
    }, 
    errorAddress_work: function() {
      if(this.address_work != null) {
        return this.address_work.length == 0
      } else {
        return false
      }
    }, 
    errorTime: function() {
      if(this.picked_time != null) {
        return this.picked_time.length == 0
      } else {
        return false
      }
    }, 
    errorMonth: function() {
      if(this.picked_month != null) {
        return this.picked_month.length == 0
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
    }
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
       if(this.first_name && this.last_name && this.email && this.phone_number && this.speciality && this.address_home && this.address_work && 
       this.terms && this.picked_month && this.picked_time) {
          
          const data = {
            last_name: this.last_name,
            first_name: this.first_name,
            patro_name: this.patro_name,
            email: this.email,
            phone_number: this.phone_number,
            speciality: this.speciality,
            address_home: this.address_home,
            address_work: this.address_work,
            picked_month: this.picked_month,
            picked_time: this.picked_time,
            terms: this.terms
          }
          console.log(data)
          axios.post('/api/post/education_items', data).then((response) => {
            console.log(response)
            if (response.status != 200) {
              throw Error('Not available')
            } 
            this.successSubmit = true
          }).catch((err) => {          
            this.errorSubmit = err.message
          })
            this.loader = null
        }        
       
       if(!this.terms) {
         this.terms = ''
         console.log(this.errorTerms)
       }

       if(!this.picked_month) {
         this.picked_month = ''
       }

       if(!this.picked_time) {
         this.picked_time = ''
       }

       if(!this.name) {
         this.name = ''
       }

       if(!this.email) {
         this.email = ''
       }

       if(!this.phone_number) {
         this.phone_number = ''
       }

       if(!this.address_home) {
         this.address_home = ''
       }

       if(!this.speciality) {
         this.speciality = ''
       }

       if(!this.address_work) {
         this.address_work = ''
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

.picks-box label {
  display: block;
  margin: 2rem 0 1rem 0;
  
  color: #818698;
}

.picks-box .options {
  display: flex;
  align-items: center;
}

.picks-box .options label {
  display: inline;
  margin: 0 0 0 1rem;
  padding: 0;
  color: #454545;

}

.picks-box .options>div {
  display: flex;
  width: 14rem;
  align-items: center;
}


.picks-box .options .option-input {
  display: inline-flex;
  
  align-items: center;
  justify-content: center;
}

.picks-box input {
  width: 0.875rem;
  height: 0.875rem;
  margin: 0;
  padding: 0;
}

.picks-box input:focus {
  outline: none;
  border: none;
}

.checkbox-adjust input {
  margin: 0;
  padding: 0;
  position: relative;
  right: 5px;
}

.options-item .option-input {
  margin-right: 5px;
}

@media only screen and (max-width: 768px) { 
  .picks-box .options {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
}

.picks-box .options>div {
  height: 2rem;
}
}


@media only screen and (max-width: 1023px) and (min-width: 769px) { 
  .picks-box .options {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
}

.picks-box .options>div {
  height: 2rem;
}
}

@media only screen and (min-width: 1024px) { 
  .picks-box .options {
  display: flex;
  flex-direction: row;
  align-items: center;
}

.picks-box .options>div {
  display: flex;
  width: 14rem;
  align-items: center;
}
}

</style>