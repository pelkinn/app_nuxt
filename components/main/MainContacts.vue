<template>
  <section class="s-contacts fullpage-section fp-auto-height-responsive">
    <div class="wrapper-container">
      <div class="container section">
        <div class="caption-wrapper default-margin-bottom">
          <div class="g-caption-block">
            <div class="wrapper-baseline">
              <h2 class="g-caption">Контакты</h2>
              <span class="underscore"></span>
            </div>
          </div>
        </div>
        <div class="content-wrapper">
          <main-form :formId="'contact'" :btnText="'Заказать проект'" :statusMail="statusMail"/>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
  import MainForm from '~/components/main/MainForm'

  export default {
    name: 'contacts-block',
    props: ['statusMail'],
    components: {
      MainForm
    },
    data() {
      return {
      }
    },
    methods: {
    },
    computed: {
    }
  }
</script>

<style scoped lang="less">
  @import "../../assets/less/_variables";
  .s-contacts {
    box-shadow: inset 0px 0px 300px 50px rgb(245, 151, 16);
    background-image: url("../../assets/img/appelsin-contacts.png"), url("../../assets/img/appelsin-contacts-small-1.png"), url("../../assets/img/appelsin-contacts-small-2.png");
    background-color: #ffba00;
    background-repeat: no-repeat;
    background-position: left bottom, right top, 10% 5%;
    .sm-block({ background-image: url("../../assets/img/appelsin-contacts.png"), url("../../assets/img/appelsin-contacts-small-2.png"); background-position: left bottom, 80% 10%; });
    .caption-wrapper {
      .text-wrapper {
        display: flex;
        flex-direction: column;
        .small {
          font-family: @fontBebas;
          font-weight: bold;
          font-size: 4.5rem;
          letter-spacing: 1.3rem;
          text-transform: uppercase;
          .md-block({ font-size: 3rem; letter-spacing: 1rem; });
          .sm-block({ font-size: 3rem; letter-spacing: 1rem; });
          .xs-block({ font-size: 2.4rem; letter-spacing: 0.75rem; });
        }
      }
    }
    .content-wrapper {
      flex-basis: 100%;
    }
  }
</style>
