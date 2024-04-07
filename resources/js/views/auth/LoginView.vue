<template>

<div class="site-content greyback login">
    <div class="site-content-in">
        
      <form method="POST" @submit.prevent="handleSubmit" :class="{'success-form' : successSubmit}" autocomplete="on" >
        <div class="subpage-title" style="text-align: center;">Панель администратора</div>
        <label>Email</label>
        <input  :class="{'invalid' : errorEmail}" type="email" id="email"  name="email"  v-model="email" @blur="validateEmail" required>
      
        <label>Пароль</label>
        <input  :class="{'invalid' : errorPassword}" type="password" v-model="password" id="password" name="password"  required>
  
        <div class="submit" style="display: flex; justify-content: center;">
            <Loader style="position: absolute;" v-if="loader"/>
            <input type="submit" :disabled="!enableSubmit" class="long-blue-button" value="Войти">
        </div>
  
      </form>
    </div>
</div>

</template>


<style>

  .login {
    top: 0;
  }

  .site-content-in {
    width: 100%;
  }

@media only screen and (min-width: 1024px) {

  .login {
    top: 0;
    height: 100%;
  }

  .login .site-content-in {
    width: 50%;
    display: flex;
    align-items: center;
    height: 100%;
  }
}

</style>
