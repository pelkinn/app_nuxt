<template>
  <form class="main-form" @submit.prevent="onSubmit" :class="{waiting: waiting, success: success || statusMail}">
    <div class="col col--desc">
      <div class="wrapper-secondary">
        <div class="steps-num" v-if="formId === 'calc'">
          <span class="arrow" @click="$emit('go-back-step')"></span>
          <span>Шаг </span>
          <span class="red">{{calcData.activeSteps + 1}} из {{calcData.steps.length + 1}}</span>
        </div>
        <p class="description">
          <template v-if="formId === 'cases'">Больше кейсов</template>
          <template v-else>Расскажите о вашем проекте</template>
        </p>
        <p v-if="formId === 'cases'" class="description--small">За 4 года существования компании сделано огромное
          количество работ. По запросу мы можем выслать весь список кейсов, которые мы имеем право демонстрировать в
          рамках договора о конфиденциальности</p>
        <ul v-else class="list-contacts" :class="formId">
          <li>
            <a class="link-contacts" href="tel:+79644952929">
              <svg-phone class="phone"/>
              <span>+7 (964) 495-29-29</span>
            </a>
          </li>
          <li>
            <a class="link-contacts" href="mailto:info@appelsin.tech">
              <svg-email/>
              <span>info@appelsin.tech</span>
            </a>
          </li>
        </ul>
      </div>
      <div class="btn-wrapper btn-wrapper--desktop" :class="{errorTooltip: error.server}">
        <button class="btn-wrapper__btn btn-wrapper__btn--default" type="submit">
          <span v-if="!this.statusMail">
            {{btnText}}
          </span>
          <span v-else class="success">Заявка отправлена</span>
        </button>
        <div class="error-tooltip error-tooltip--submit">
          <span>Ошибка</span>
        </div>
        <button class="btn-wrapper__btn btn-wrapper__btn--next" type="button" @click="showForm = !showForm">
          <span v-if="!this.statusMail">{{btnText}}</span>
          <span v-else class="success">Заявка отправлена</span>
        </button>
      </div>
    </div>
    <div class="col col--input" :class="{active : showForm}">
      <div class="input-wrapper">
        <div class="g-item-form" :class="{errorTooltip: error.name}">
          <input class="g-item-form__field" type="text" :placeholder="'Имя'" v-model="form.name">
          <div class="error-tooltip">
            <span>Введите имя</span>
          </div>
        </div>
        <div class="g-item-form" :class="{errorTooltip: error.phone}">
          <input class="g-item-form__field" type="tel" :placeholder="'Телефон'" v-model="form.phone">
          <div class="error-tooltip">
            <span>Введите телефон</span>
          </div>
        </div>
        <div class="g-item-form" :class="{errorTooltip: error.email}">
          <input class="g-item-form__field" type="email" placeholder="E-mail" v-model="form.email">
          <div class="error-tooltip">
            <span>Введите E-mail</span>
          </div>
        </div>
        <div class="g-item-form g-item-form--textarea" :class="{errorTooltip: error.message}">
          <textarea class="g-item-form__field g-item-form__field--textarea" :placeholder="'Текст сообщения'"
                    v-model="form.message"></textarea>
          <div class="error-tooltip">
            <span>Введите текст сообщения</span>
          </div>
        </div>
        <div class="file-wrapper" :class="{errorTooltip: error.file}">
          <input type="file" name="file" :id="`file_${this.formId}`" v-on:change="handleFile" class="visually-hidden"/>
          <label class="file-link" :class="formId" v-if="!showFileName" :for="`file_${this.formId}`">
            <span class="file-text--big">Прикрепить файл</span>
            <span class="file-text--small">(до 5 Мб)</span>
          </label>
          <div class="error-tooltip error-tooltip--submit">
            <span>Файл слишком большой</span>
          </div>
          <div class="file-progress" v-if="showFileName">
            <svg-file class="svg-file" :class="formId"/>
            <span class="file-name">{{form.file.name}}</span>
            <button class="file-delete" type="button" @click="deleteFile">
              <svg-file-delete/>
            </button>
          </div>
        </div>

      </div>
      <div class="checkbox-wrapper" :class="{errorTooltip: error.checked}">
        <div class="error-tooltip error-tooltip--top">
          <span>Подтвердите согласие</span>
        </div>
        <input type="checkbox" :id="`check_person_${this.formId}`" v-model="form.checkedPersonalData">
        <label class="label-person" :class="formId" :for="`check_person_${this.formId}`">
          <span>Я согласен на обработку </span>
          <a class="link-person" href="#" @click.prevent="$modal.show('modal-policy')">персональных данных</a>. Этот
          сайт защищен reCAPCHA при соблюдении <a class="link-person" href="https://policies.google.com/privacy"
                                                  target="_blank">политики конфиденциальности</a> Google и <a
          class="link-person" href="https://policies.google.com/terms" target="_blank">пользовательского соглашения</a>.
        </label>
      </div>
      <div class="btn-wrapper btn-wrapper--mobile" :class="{errorTooltip: error.server}">
        <button class="btn-wrapper__btn btn-wrapper__btn--back" type="button" @click="showForm = !showForm">
          <svg-arrow-slider/>
        </button>
        <button class="btn-wrapper__btn btn-wrapper__btn--mobile" type="submit">
          <span v-if="this.statusMail">Отправить</span>
          <span v-else class="success">Заявка отправлена</span>
        </button>
        <div class="error-tooltip error-tooltip--submit">
          <span>Ошибка</span>
        </div>
      </div>
    </div>
  </form>
</template>

<script>
  import SvgPhone from '~/assets/img/icon/phone.svg?inline'
  import SvgEmail from '~/assets/img/icon/email.svg?inline'
  import SvgArrowSlider from '~/assets/img/icon/arrow-slider.svg?inline'
  import SvgFile from '~/assets/img/icon/file.svg?inline'
  import SvgFileDelete from '~/assets/img/icon/delete.svg?inline'

  export default {
    name: "MainForm",
    props: ['formId', 'btnText', 'calcData', 'statusMail'],
    components: {
      SvgPhone,
      SvgEmail,
      SvgArrowSlider,
      SvgFile,
      SvgFileDelete
    },
    data() {
      return {
        showForm: false,
        waiting: false,
        disabled: false,
        error: {
          name: false,
          phone: false,
          email: false,
          message: false,
          checked: false,
          server: false,
          file: false
        },
        errorName: '',
        success: false,
        form: {
          formId: this.formId,
          name: '',
          phone: '',
          email: '',
          message: '',
          file: '',
          checkedPersonalData: false
        },
        token: '',
        percentCompleted: 0
      }
    },
    async mounted() {
      await this.$recaptcha.init()
    },
    methods: {
      async onSubmit() {
        if (this.statusMail) {
          return false
        } else {
          if (this.form.name.length < 1) {
            this.hideError('name')
          } else if (this.form.phone.length < 4) {
            this.hideError('phone')
          } else if (this.form.email.length < 4) {
            this.hideError('email')
          } else if (this.form.message.length < 4) {
            this.hideError('message')
          } else if (!this.form.checkedPersonalData) {
            this.hideError('checked')
          } else {
            try {
              const token = await this.$recaptcha.execute('login')
              this.waiting = true
              let formData = new FormData();
              formData.append('token', token);
              formData.append('formId', this.form.formId);
              formData.append('name', this.form.name);
              formData.append('phone', this.form.phone);
              formData.append('email', this.form.email);
              formData.append('message', this.form.message);
              formData.append('file', this.form.file);
              formData.append('checked', this.form.checkedPersonalData);
              if (this.formId === 'calc') {
                formData.append('questions', this.questionsName);
                formData.append('price', this.price);
              }
              this.$axios.$post('/api/mail', formData, {
                onUploadProgress: (progressEvent) => {
                  this.percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total)
                }
              }).then(response => {
                this.waiting = false
                this.$bus.$emit('email-send', true)
                this.$modal.show('modal-response', {
                  data: this.form,
                  status: 'success',
                  hashClass: 'orange'
                })
              }).catch(e => {
                this.waiting = false
              })
            } catch (error) {
              console.log('Login error:', error)
            }
          }
        }
      },
      handleFile(e) {
        if (e.target.files[0].size > 5000000) {
          this.errorName = 'file'
          this.hideError(this.errorName)
        } else {
          this.form.file = e.target.files[0];
          console.log(e.target.files)
        }
      },
      hideError(name) {
        this.error[name] = true
        setTimeout(() => {
          this.error[name] = false
        }, 2000)
      },
      deleteFile() {
        this.form.file = '';
        document.getElementById(`file_${this.formId}`).value = ''
      }
    },
    computed: {
      price() {
        let sum = 0;
        this.calcData.answers.forEach((item) => {
          if (item.price !== undefined) {
            sum += item.price
          }
          if (item.val === 'crossplatform-app' || item.val === '2d-game' || item.val === '3d-game') {
            let price = item.price
            let vars = this.calcData.answers.filter(a => {
              return a.val === 'ios' || a.val === 'android'
            })
            if (vars.length > 1) {
              sum += price * 0.5
            }
          }
        })
        return sum
      },
      questionsName() {
        let nameQuestions = '';
        let itemArr = '';
        this.calcData.answers.forEach((variant) => {
          this.calcData.questions.forEach(step => {
            if (variant.idQuestions === step.id) {
              itemArr = '<li>Вопрос: ' + step.stepCaption + ';  ' + 'Ответ: ' + variant.name + '</li>'
              nameQuestions += itemArr
            }
          })
        })
        return nameQuestions
      },
      iosAndroid() {
        this.calcData.answers.forEach((item) => {
          nameQuestions.push(item.name)
        })
      },
      showFileName() {
        let res;
        this.form.file !== '' ? res = true : res = false
        return res
      }
    }
  }
</script>

<style scoped lang="less">
  @import "../../assets/less/_variables";
  .main-form {
    display: flex;
    position: relative;
    height: 100%;
    background: #fff;
    color: #000;
    overflow: hidden;
    &.success,
    &.waiting {
      .col {
        .btn-wrapper__btn--default,
        .btn-wrapper__btn--mobile,
        .btn-wrapper__btn--next {
          pointer-events: none;
          opacity: 0.7;
        }
      }
    }
    .col {
      width: 50%;
      .sm-block({
        width: 100%;
      });
      &--desc {
        display: flex;
        flex-direction: column;

        font-weight: bold;
        z-index: 2;
        .steps-num {
          margin-bottom: 20px;
          font-family: @fontBebas;
          font-weight: bold;
          font-size: 2.5rem;
          letter-spacing: 0.4rem;
          color: #000;
          text-transform: uppercase;
          .md-block({
            margin-bottom: 15px;
          });
          .arrow {
            display: inline-block;
            transform: rotate(45deg);
            margin-right: 10px;
            width: 12px;
            height: 12px;
            border-left: 3px solid #dd4858;
            border-bottom: 3px solid #dd4858;
            cursor: pointer;
          }
          .red {
            color: #dd4858;
          }
        }
        .wrapper-secondary {
          position: relative;
          display: flex;
          flex-grow: 1;
          padding: 45px 50px 55px 50px;
          flex-direction: column;
          border-right: 1px solid @colorBorder;
          .md-block({
            padding: 40px;
          });
          .sm-block({
            border: none;
            padding: 30px;
          });
          .description {
            margin-bottom: 40px;
            max-width: 400px;
            font-size: 4.2rem;
            letter-spacing: 1.3rem;
            line-height: 4.5rem;
            font-family: @fontBebas;
            .md-block({
              font-size: 3.5rem;
              letter-spacing: 1rem;
              line-height: 4rem;
            });
            .sm-block({
              font-size: 3rem;
              letter-spacing: 0.8rem;
            });
            .xs-block({
              font-size: 2.4rem;
              letter-spacing: 0.5rem;
              line-height: 3rem;
            });
            &--small {
              font-size: 1.8rem;
              line-height: 2.3rem;
              font-weight: 300;
              color: #666666;
              .xs-block({
                font-size: 1.6rem;
                line-height: 2rem;
              });
            }
          }
          .list-contacts {
            display: flex;
            flex-direction: column;
            li:first-child {
              margin-bottom: 40px;
            }
            &.calc {
              .link-contacts {
                svg {
                  * {
                    fill: #db4954;
                  }
                  &.phone {
                    border-color: #db4954;
                  }
                }
              }
            }
            &.contact {
              .link-contacts {
                svg {
                  * {
                    fill: #f69b0e;
                  }
                  &.phone {
                    border-color: #f69b0e;
                  }
                }
              }
            }
            .link-contacts {
              display: flex;
              align-items: center;
              svg {
                margin-right: 25px;
                width: 47px;
                height: 47px;
                flex-shrink: 0;
                box-sizing: border-box;
                .md-block({
                  width: 38px;
                  height: 38px;
                  margin-right: 20px;
                });
                .xs-block({
                  width: 30px;
                  height: 30px;
                  margin-right: 15px;
                });
                &.phone {
                  padding: 8px;
                  border: 1px solid #db4954;
                  border-radius: 50%;
                  .xs-block({
                    padding: 6px;
                  });
                }
              }
              > span {
                font-family: @fontBebas;
                font-weight: bold;
                font-size: 3rem;
                letter-spacing: 0.5rem;
                color: #000;
                .md-block({
                  font-size: 2.8rem;
                });
                .xs-block({
                  font-size: 2.2rem;
                  letter-spacing: 0.4rem;
                });
              }
            }
          }
        }
        .price-wrapper {
          position: relative;
          display: flex;
          flex-grow: 1;
          padding: 45px 50px 55px 50px;
          flex-direction: column;
          border-right: 1px solid @colorBorder;
          .md-block({
            padding: 40px;
          });
          .sm-block({
            border: none;
            padding: 30px;
          });

        }
      }
      &--input {
        display: flex;
        flex-direction: column;
        transition: 0.3s;
        background: #fff;
        .sm-block({
          position: absolute;
          top: 100%;
          bottom: -100%;
          z-index: 9;
        });
        &.active {
          top: 0;
          bottom: 0;
          z-index: 9;
        }
        .input-wrapper {
          display: flex;
          flex-grow: 1;
          flex-direction: column;
        }
        .checkbox-wrapper {
          position: relative;
          display: flex;
          height: 85px;
          padding-left: 25px;
          padding-right: 15px;
          align-items: center;
          .md-block({
            height: 70px;
            padding-left: 10px;
            padding-right: 5px;
          });
          .sm-block({
            min-height: 50px;
            height: auto;
            padding-top: 8px;
            padding-bottom: 8px;
          });
          &.errorTooltip {
            .error-tooltip {
              display: block;
            }
          }
          input {
            display: none;
            &:checked + label::after {
              display: block;
            }
          }
          .label-person {
            position: relative;
            padding-left: 55px;
            font-size: 1.4rem;
            color: @colorSecFonts;
            .md-block({
              padding-left: 40px;
              font-size: 1.2rem;
            });
            &::before,
            &::after {
              position: absolute;
              content: '';
              left: 0;
            }
            &::before {
              top: -3px;
              width: 25px;
              height: 25px;
              background: #f8f5f5;
            }
            &::after {
              display: none;
              top: 0;
              left: 8px;
              transform: rotate(40deg);
              width: 6px;
              height: 12px;
              border-bottom: 2px solid #000;
              border-right: 2px solid #000;
            }
            &.cases {
              &::after {
                border-bottom-color: #672fda;
                border-right-color: #672fda;
              }
              .link-person {
                color: #672fda;
              }
            }
            &.calc {
              &::after {
                border-bottom-color: #db4954;
                border-right-color: #db4954;
              }
              .link-person {
                color: #db4954
              }
            }
            &.contact {
              &::after {
                border-bottom-color: #f69b0e;
                border-right-color: #f69b0e;
              }
              .link-person {
                color: #f69b0e;
              }
            }
            span {
              color: @colorSecFonts;
            }
            .link-person {
              color: #db4954;
              border-bottom: 1px solid #db4954;
              transition: 0.3s;
              &:hover {
                border-bottom: 1px solid transparent;
              }
            }
          }
        }
        .error {
          display: none;
          position: absolute;
          bottom: -40px;
          right: 30px;
          border: 1px solid #D94950;
          border-radius: 4px;
          background: #D94950;
          z-index: 99;
          .sm-block({
            bottom: -34px;
          });
          > span {
            position: relative;
            display: block;
            padding: 8px 12px;
            width: 100%;
            height: 100%;
            font-size: 2rem;
            color: #fff;
            font-weight: 400;
            box-sizing: border-box;
            .sm-block({
              font-size: 1.6rem;
            });
            &::after {
              content: " ";
              position: absolute;
              top: -6px;
              right: 15px;
              width: 11px;
              height: 11px;
              background: #d94950;
              transform: rotate(-45deg);
              box-sizing: border-box;
            }
          }
          &--top {
            bottom: auto;
            top: -40px;
            .sm-block({
              top: -34px;
            });
            > span {
              &::after {
                top: auto;
                bottom: -6px;
              }
            }
          }
        }
      }
      .file-wrapper {
        display: flex;
        position: relative;
        align-items: center;
        height: 60px;
        padding-left: 25px;
        padding-right: 25px;
        border-bottom: 1px solid #dadada;
        .md-block({
          padding-left: 10px;
        });
        .sm-block({
          height: 50px;
        });
        &.errorTooltip {
          .error-tooltip {
            display: block;
          }
        }
        .file-link {
          display: inline-flex;
          position: relative;
          align-items: center;
          padding-left: 55px;
          font-family: @fontBebas;
          color: #000;
          cursor: pointer;
          .md-block({
            padding-left: 40px;
          });
          &::after {
            position: absolute;
            content: '';
            left: 0;
            top: calc(~"50% - 14px");
            width: 28px;
            height: 28px;
            background-repeat: no-repeat;
            background-position: center;
            -webkit-background-size: contain;
            .md-block({
              width: 24px;
              height: 24px;
              top: calc(~"50% - 12px");
            });
            .xs-block({
              width: 20px;
              height: 20px;
              top: calc(~"50% - 10px");
            });
          }
          &.cases {
            &::after {
              background-image: url("../../assets/img/icon/clip-violet.png");
            }
          }
          &.calc {
            &::after {
              background-image: url("../../assets/img/icon/clip-pink.png");
            }
          }
          &.contact {
            &::after {
              background-image: url("../../assets/img/icon/clip-orange.png");
            }
          }
          .file-text--big {
            position: relative;
            margin-right: 20px;
            font-size: 2rem;
            letter-spacing: 0.5rem;
            .xs-block({
              font-size: 1.8rem;
              letter-spacing: 0.4rem;
            });
            &::after {
              position: absolute;
              content: '';
              bottom: -2px;
              left: 0;
              right: 4px;
              height: 2px;
              background-image: repeating-linear-gradient(90deg, transparent 2px 6px, #000 2px 10px);
            }
          }
          .file-text--small {
            font-family: @fontMain;
            font-weight: 200;
            font-size: 1.6rem;
          }
        }
        .file-progress {
          display: flex;
          justify-content: space-between;
          align-items: center;
          flex-grow: 1;
          min-width: 0;
          .file-name {
            font-size: 1.8rem;
            margin-right: auto;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
            max-width: 60%;
          }
          .svg-file {
            width: 25px;
            margin-right: 30px;
            .md-block({
              margin-right: 15px;
            });
            .sm-block({
              width: 20px;
              margin-right: 20px;
            });
            &.cases {
              * {
                fill: #672fda;
              }
            }
            &.contact {
              * {
                fill: #f69b0e;
              }
            }
            &.calc {
              * {
                fill: #D94950;
              }
            }
          }
          .file-delete {
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ccc;
            border-radius: 50%;
            transition: 0.3s;
            cursor: pointer;
            &:hover {
              background: #D94950;
              border-color: #fff;
              svg {
                path {
                  fill: #fff;
                }
              }
            }
            svg {
              width: 14px;
              height: 14px;
              path {
                fill: #ccc;
                transition: 0.3s;
              }
            }
          }
        }
      }
      .btn-wrapper {
        position: relative;
        width: 100%;
        height: 85px;
        .md-block({
          height: 70px;
        });
        .xs-block({
          height: 55px;
        });
        &--desktop {
          &.errorTooltip {
            .btn-wrapper__btn--default + .error-tooltip {
              .from(@break_sm; {
                display: block
              });
            }
          }
        }
        &--mobile {
          display: none;
          .sm-block({
            display: flex;
          });
          &.errorTooltip {
            .btn-wrapper__btn--mobile + .error-tooltip {
              .sm-block({
                display: block;
              });
            }
          }
        }
        &__btn {
          display: flex;
          width: 100%;
          height: 100%;
          align-items: center;
          font-family: @fontBebas;
          font-weight: bold;
          font-size: 2.4rem;
          letter-spacing: 0.6rem;
          color: #fff;
          background: #000;
          text-transform: uppercase;
          cursor: pointer;
          &--default,
          &--next,
          &--mobile {
            span.success {
              position: relative;
              &::before {
                content: '';
                display: inline-block;
                margin-right: 25px;
                transform: rotate(40deg);
                width: 8px;
                height: 18px;
                border-bottom: 2px solid #fff;
                border-right: 2px solid #fff;
              }
            }
          }
          &--default {
            padding-left: 50px;
            .sm-block({
              display: none;
            });
          }
          &--next {
            display: none;
            padding-left: 40px;
            .sm-block({
              display: flex;
            });
            .xs-block({
              padding: 0;
              text-align: center;
              justify-content: center;
            });
          }
          &--mobile {
            padding-left: 20px;
            flex-grow: 1;
            .sm-block({
              display: flex;
            });
          }
          &--back {
            display: none;
            width: 70px;
            height: 100%;
            align-items: center;
            justify-content: center;
            transform: scale(-1, 1);
            border-top: 1px solid @colorBorder;
            box-sizing: border-box;
            background: #fff;
            .sm-block({
              display: flex;
            });
            .xs-block({
              width: 55px;
            });
            svg {
              width: 30px;
              height: 30px;
              .xs-block({
                width: 25px;
                height: 25px;
              });
              * {
                fill: @colorBorder;
              }
            }
          }
        }
      }
    }
  }
</style>
