<template>
  <modal name='modal-response' transition="pop-out" :height="'auto'" width="100%" :maxWidth="1170" :maxHeight="680"
         :adaptive="true"
         :scrollable="true" @before-open="beforeOpen" @before-close="activeSrollFp" :pivotY="0.8">
    <div class="modal b-modal-response">
      <div class="close-modal" @click="$modal.hide('modal-response')" title="Закрыть">
        <svg-close/>
      </div>
      <div class="wrapper-overflow">
        <div class="title-wrapper">
          <h2 class="title">{{$t('brief.title')}}</h2>
        </div>
        <form class="form-response" @submit.prevent="onSubmit" :class="[{disabled: disabled}, hashClass]">
          <div class="status">
            <div class="status__success" v-if="status === 'success'">
              <span>{{$t('brief.status-success')}}!</span>
            </div>
            <div class="status__error" v-if="status === 'error'">
              <span>{{$t('brief.status-error')}}</span>
            </div>
          </div>
          <div class="wrapper-description">
            <strong class="wrapper-description__description">{{$t('brief.description')}}</strong>
          </div>
          <fieldset class="form-response__group group-item">
            <h3 class="group-item__title">1. {{$t('brief.contacts-info')}}</h3>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="contactsInfo-1">{{$t('brief.company')}}</label>
              <textarea-resize>
                <textarea class="g-item-form__field g-item-form__field--modals"
                          v-model="form.company" id="contactsInfo-1" rows="1"></textarea>
              </textarea-resize>

            </div>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="contactsInfo-2">{{$t('brief.contact-person')}}</label>
              <textarea-resize>
              <textarea class="g-item-form__field g-item-form__field--modals"
                        v-model="form.name" id="contactsInfo-2" rows="1"></textarea>
              </textarea-resize>
            </div>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="contactsInfo-3">{{$t('brief.phone')}}</label>
              <input class="g-item-form__field g-item-form__field--modals" type="tel"
                     v-model="form.phone" id="contactsInfo-3" @keypress.enter.prevent>
            </div>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="contactsInfo-4">{{$t('brief.site')}}</label>
              <textarea-resize>
              <textarea class="g-item-form__field g-item-form__field--modals"
                        v-model="form.site" id="contactsInfo-4" rows="1"></textarea>
              </textarea-resize>
            </div>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="contactsInfo-5">E-mail</label>
              <input class="g-item-form__field g-item-form__field--modals" type="email"
                     v-model="form.email" id="contactsInfo-5" @keypress.enter.prevent>
            </div>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="contactsInfo-6">{{$t('brief.other')}} <span class="g-item-form__label--gray">({{$t('brief.example')}} Skype)</span></label>
              <textarea-resize>
              <textarea class="g-item-form__field g-item-form__field--modals"
                        v-model="form.other_contacts" id="contactsInfo-6" rows="1"></textarea>
              </textarea-resize>
            </div>
          </fieldset>
          <fieldset class="form-response__group group-item">
            <h3 class="group-item__title">2. {{$t('brief.your-company')}}</h3>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="project-1">{{$t('brief.your-company-questions-1')}} <span class="g-item-form__label--gray">({{$t('brief.example')}}: {{$t('brief.your-company-questions-1-example')}})</span></label>
              <textarea-resize>
              <textarea class="g-item-form__field g-item-form__field--modals "
                        id="project-1" v-model="form.questions[0].answers" rows="1"></textarea>
              </textarea-resize>
            </div>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="project-2">{{$t('brief.your-company-questions-2')}} <span class="g-item-form__label--gray">({{$t('brief.example')}}: {{$t('brief.your-company-questions-2-example')}})</span></label>
              <textarea-resize>
              <textarea class="g-item-form__field g-item-form__field--modals"
                        id="project-2" v-model="form.questions[1].answers" rows="1"></textarea>
              </textarea-resize>
            </div>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="project-3">{{$t('brief.your-company-questions-3')}} <span class="g-item-form__label--gray">({{$t('brief.example')}}: {{$t('brief.your-company-questions-3-example')}})</span></label>
              <textarea-resize>
              <textarea class="g-item-form__field g-item-form__field--modals "
                        id="project-3" v-model="form.questions[2].answers" rows="1"></textarea>
              </textarea-resize>
            </div>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="project-4">{{$t('brief.your-company-questions-4')}}? <span class="g-item-form__label--gray">({{$t('brief.example')}}: {{$t('brief.your-company-questions-4-example')}})</span></label>
              <textarea-resize>
              <textarea class="g-item-form__field g-item-form__field--modals"
                        id="project-4" v-model="form.questions[3].answers" rows="1"></textarea>
              </textarea-resize>
            </div>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="project-5">{{$t('brief.your-company-questions-5')}} <span class="g-item-form__label--gray">({{$t('brief.your-company-questions-5-example')}})</span></label>
              <textarea-resize>
              <textarea class="g-item-form__field g-item-form__field--modals"
                        v-model="form.questions[4].answers" id="project-5" rows="1"></textarea>
              </textarea-resize>
            </div>
          </fieldset>
          <fieldset class="form-response__group group-item">
            <h3 class="group-item__title">3. {{$t('brief.target-audience')}}</h3>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="project-6">{{$t('brief.target-audience-questions-1')}} <span class="g-item-form__label--gray">({{$t('brief.example')}}: {{$t('brief.target-audience-questions-1-example')}})</span></label>
              <textarea-resize>
              <textarea class="g-item-form__field g-item-form__field--modals"
                        v-model="form.questions[5].answers" id="project-6" rows="1"></textarea>
              </textarea-resize>
            </div>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="project-7">{{$t('brief.target-audience-questions-2')}} <span class="g-item-form__label--gray">({{$t('brief.example')}}: {{$t('brief.target-audience-questions-2-example')}})</span></label>
              <textarea-resize>
              <textarea class="g-item-form__field g-item-form__field--modals"
                        id="project-7" v-model="form.questions[6].answers" rows="1"></textarea>
              </textarea-resize>
            </div>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="project-9">{{$t('brief.target-audience-questions-4')}} <span class="g-item-form__label--gray">({{$t('brief.target-audience-questions-4-example')}})</span></label>
              <textarea-resize>
              <textarea class="g-item-form__field g-item-form__field--modals"
                        v-model="form.questions[7].answers" id="project-9" rows="1"></textarea>
              </textarea-resize>
            </div>
          </fieldset>
          <fieldset class="form-response__group group-item">
            <h3 class="group-item__title">4. {{$t('brief.project')}}</h3>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="project-10">{{$t('brief.project-questions-1')}} <span class="g-item-form__label--gray">({{$t('brief.example')}}:  {{$t('brief.project-questions-1-example')}})</span></label>
              <textarea-resize>
              <textarea class="g-item-form__field g-item-form__field--modals"
                        id="project-10" v-model="form.questions[8].answers" rows="1"></textarea>
              </textarea-resize>
            </div>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="project-11">{{$t('brief.project-questions-2')}} <span class="g-item-form__label--gray">({{$t('brief.example')}}: {{$t('brief.project-questions-2-example')}})</span></label>
              <textarea-resize>
              <textarea class="g-item-form__field g-item-form__field--modals"
                        id="project-11" v-model="form.questions[9].answers" rows="1"></textarea>
              </textarea-resize>
            </div>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="project-12">{{$t('brief.project-questions-3')}} <span class="g-item-form__label--gray">({{$t('brief.example')}}: {{$t('brief.project-questions-3-example')}})</span></label>
              <textarea-resize>
              <textarea class="g-item-form__field g-item-form__field--modals"
                        id="project-12" v-model="form.questions[10].answers" rows="1"></textarea>
              </textarea-resize>
            </div>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="project-13">{{$t('brief.project-questions-4')}} <span class="g-item-form__label--gray">({{$t('brief.example')}}: {{$t('brief.project-questions-4-example')}})</span></label>
              <textarea-resize>
              <textarea class="g-item-form__field g-item-form__field--modals"
                        id="project-13" v-model="form.questions[11].answers" rows="1"></textarea>
              </textarea-resize>
            </div>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="project-14">{{$t('brief.project-questions-5')}}</label>
              <textarea-resize>
              <textarea class="g-item-form__field g-item-form__field--modals"
                        id="project-14" v-model="form.questions[12].answers" rows="1"></textarea>
              </textarea-resize>
            </div>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="project-15">{{$t('brief.project-questions-6')}} <span class="g-item-form__label--gray">({{$t('brief.example')}}: {{$t('brief.project-questions-6-example')}})</span></label>
              <textarea-resize>
              <textarea class="g-item-form__field g-item-form__field--modals"
                        id="project-15" v-model="form.questions[13].answers" rows="1"></textarea>
              </textarea-resize>
            </div>
          </fieldset>
          <fieldset class="form-response__group group-item">
            <h3 class="group-item__title">5. {{$t('brief.expectations')}}</h3>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="project-16">{{$t('brief.expectations-questions-1')}}</label>
              <textarea-resize>
              <textarea class="g-item-form__field g-item-form__field--modals"
                        id="project-16" v-model="form.questions[14].answers" rows="1"></textarea>
              </textarea-resize>
            </div>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="project-17">{{$t('brief.expectations-questions-2')}}</label>
              <textarea-resize>
              <textarea class="g-item-form__field g-item-form__field--modals"
                        id="project-17" v-model="form.questions[15].answers" rows="1"></textarea>
              </textarea-resize>
            </div>
          </fieldset>
          <div class="btn-wrapper">
            <button class="btn-wrapper__btn" type="submit">{{$t('mail-form.send')}}</button>
          </div>
        </form>
      </div>

    </div>
  </modal>
</template>

<script>
  import textareaResize from '~/components/helpers/textareaResize'
  import SvgClose from '~/assets/img/icon/delete.svg?inline'
  export default {
    name: "ModalBrief",
    props: ['classSection'],
    components: {
      textareaResize,
      SvgClose
    },
    data() {
      return {
        disabled: false,
        token: '',
        data: '',
        status: '',
        hashClass: '',
        form: {
          formId: 'brief',
          company: '',
          name: '',
          phone: '',
          site: '',
          email: '',
          other_contacts: '',
          questions: [
            {
              label: 'Основная информация - что представляет компания, что делает и что предлагает - услуги, товары',
              answers: ''
            },
            {
              label: 'Проблема, которую решает продукт/услуга компании, и как компания решает эту проблему',
              answers: ''
            },
            {
              label: 'Уникальное торговое предложение',
              answers: ''
            },
            {
              label: 'Какие преимущества у вашего проекта?',
              answers: ''
            },
            {
              label: 'Список конкурентов',
              answers: ''
            },
            {
              label: 'Какие регионы интересуют',
              answers: ''
            },
            {
              label: 'Сфера деятельности компании',
              answers: ''
            },
            {
              label: 'Аватар клиентов',
              answers: ''
            },
            {
              label: 'Опишите ваше видение проекта',
              answers: ''
            },
            {
              label: 'Цель - что должен донести/продать/показать разрабатавыемый продукт',
              answers: ''
            },
            {
              label: 'Список функций/задач, которые выполняет',
              answers: ''
            },
            {
              label: 'Разделы, которые хотелось бы видеть',
              answers: ''
            },
            {
              label: 'Потребуется ли функционал администратора для редактирования контента, управления пользователями и тд. Если да, то для чего именно',
              answers: ''
            },
            {
              label: 'Дополнительные услуги',
              answers: ''
            },
            {
              label: 'Ожидаемый бюджет на разработку',
              answers: ''
            },
            {
              label: 'Ожидаемые сроки разработки проекта',
              answers: ''
            }
          ],
        }
      }
    },
    methods: {
      activeSrollFp() {
        fullpage_api.setAllowScrolling(true);
      },
      beforeOpen(event) {
        fullpage_api.setAllowScrolling(false);
        this.status = event.params.status
        this.response = event.params.response
        this.form.name = event.params.data.name
        this.form.phone = event.params.data.phone
        this.form.email = event.params.data.email
        this.hashClass = event.params.hashClass
      },
      async onSubmit() {
        this.disabled = true
        const token = await this.$recaptcha.execute('login')
        this.questions()
        let formData = new FormData();
        formData.append('token', token);
        formData.append('formId', this.form.formId);
        formData.append('company', this.form.company);
        formData.append('name', this.form.name);
        formData.append('phone', this.form.phone);
        formData.append('site', this.form.site);
        formData.append('email', this.form.email);
        formData.append('other_contacts', this.form.other_contacts);
        formData.append('questions', this.questions());
        this.$axios.$post('/api/mail', formData, {
          headers: {
            'Content-Type': 'multipart/form-data'
          },
        }).then(response => {
          this.$modal.hide('modal-response')
        })
      },
      questions() {
        let newArr = ''
        this.form.questions.forEach(item => {
          newArr += `<li style='margin-bottom: 15px;'> <span style='font-size: 18px; font-weight: bold;'>${item.label}</span> <br> <span style='font-size: 18px;'>${item.answers}</span> </li>`
        })
        return newArr
      }
    },
  }
</script>

<style scoped>

</style>
