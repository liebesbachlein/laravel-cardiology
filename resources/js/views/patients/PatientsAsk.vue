<template>
    <div class="pt-ask">
        <div class="subpage-title">Обратиться к специалисту</div>

        <form
            ref="formAsk"
            @submit.prevent="handleSubmit"
            :class="{ 'success-form': successSubmit }"
        >
            <label>ФИО <span>*</span></label>
            <input
                :readonly="successSubmit"
                type="text"
                v-model="name"
                id="name"
                name="name"
                :class="{ invalid: errorName }"
                required
            />

            <label>Email <span>*</span></label>
            <input
                :readonly="successSubmit"
                :class="{ invalid: errorEmail }"
                type="email"
                id="email"
                name="email"
                v-model="email"
                @blur="validateEmail"
                required
            />

            <label>Обращение <span>*</span></label>
            <textarea
                :readonly="successSubmit"
                rows="10"
                :class="{ invalid: errorContent }"
                v-model="content"
                name="content"
                required
            />

            <div class="submit" style="display: flex; justify-content: center">
                <LoaderCircle style="position: absolute" v-if="loader" />
                <input
                    type="submit"
                    :disabled="!enableSubmit"
                    class="long-blue-button"
                    value="Отправить заявку"
                    v-if="!successSubmit && !errorSubmit"
                />
            </div>
            <div
                class="success-blue-button"
                style="
                    background-color: #fff;
                    border: 1px solid var(--component-accent-color2);
                    color: var(--component-accent-color2);
                "
                v-if="successSubmit || errorSubmit"
                v-text="
                    errorSubmit ? errorSubmit : 'Заявка успешно отправлена!'
                "
            />
        </form>
    </div>
</template>

<script>
import LoaderCircle from "@/components/LoaderCircle.vue";
import axios from "axios";

export default {
    data() {
        return {
            name: null,
            email: null,
            content: null,
            successSubmit: null,
            loader: null,
            errorSubmit: null,
        };
    },
    components: { LoaderCircle },
    computed: {
        enableSubmit: function () {
            return this.name && this.email && this.content;
        },

        errorName: function () {
            if (this.name != null) {
                return this.name.length == 0;
            } else {
                return false;
            }
        },

        errorContent: function () {
            if (this.content != null) {
                return this.content.length == 0;
            } else {
                return false;
            }
        },

        errorEmail: function () {
            if (this.email != null) {
                return !this.validateEmail();
            } else {
                return false;
            }
        },
    },
    methods: {
        validateEmail: function () {
            if (
                /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(
                    this.email
                )
            ) {
                return true;
            } else {
                return false;
            }
        },
        handleSubmit: async function () {
            if (this.name && this.email && this.content) {
                this.loader = " ";
                const data = {
                    name: this.name,
                    email: this.email,
                    content: this.content,
                    accepted: true,
                };
                axios
                    .post("/api/post/ask-items", data)
                    .then((response) => {
                        if (response.status != 200) {
                            throw Error("Произошла ошибка 100");
                        }
                        /*axios.post('/api/mail_ask/send_mail', data).then((mailRes) => {
              if(mailRes.status != 200) {
                throw Error('Произошла ошибка 101')
              }
            }).catch((err) => {          
            this.errorSubmit = err.message
            })*/
                        this.successSubmit = true;
                    })
                    .catch((err) => {
                        //this.errorSubmit = err.message;
                    });

                this.loader = null;
            }

            if (!this.content) {
                this.content = "";
            }

            if (!this.name) {
                this.name = "";
            }

            if (!this.email) {
                this.email = "";
            }
        },
    },
};
</script>

<style>
.pt-ask form {
    width: 100%;
    margin: 3rem 0 6rem 0;
    padding: 0 3rem 0 0;
}
</style>
