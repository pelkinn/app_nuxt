<template>
  <div>
    <section class="s-404">
      <div class="wrapper-container">
        <div class="container section">
          <div class="caption-wrapper default-margin-bottom">
            <div class="g-caption-block">
              <div class="wrapper-baseline">
                <h2 class="g-caption">404</h2>
                <span class="underscore"></span>
              </div>
            </div>
          </div>
          <div class="content-wrapper">
            <strong class="text text--strong">Страница не найдена</strong>
            <p class="text text--small">Похоже, нужная Вам страница была удалена/перенесена или никогда не существовала. Попробуйте найти ее в меню или вернитесь на главную страницу</p>
            <nuxt-link class="btn" to="/"><span>Вернуться на главную</span></nuxt-link>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
  export default {
    name: "error",
  }
</script>

<style scoped lang="less">
  @import "../assets/less/_variables";
  .s-404 {
    height: 100vh;
    box-shadow: inset 0px 0px 300px 50px rgb(245, 151, 16);
    background-image: url("../assets/img/appelsin-contacts.png"), url("../assets/img/appelsin-contacts-small-1.png"), url("../assets/img/appelsin-contacts-small-2.png");
    background-color: #ffba00;
    background-repeat: no-repeat;
    background-position: left bottom, right top, 10% 5%;
    .sm-block({
      background-image: url("../assets/img/appelsin-contacts.png"), url("../assets/img/appelsin-contacts-small-2.png");
      background-position: left bottom, 80% 10%;
    });
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
          .md-block({
            font-size: 3rem;
            letter-spacing: 1rem;
          });
          .sm-block({
            font-size: 3rem;
            letter-spacing: 1rem;
          });
          .xs-block({
            font-size: 2.4rem;
            letter-spacing: 0.75rem;
          });
        }
      }
    }
    .content-wrapper {
      flex-basis: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      background: #fff;
      .text {
        color: #000;
        display: block;
        &--strong {
          margin-bottom: 15px;
          font-family: @fontBebas;
          font-weight: bold;
          font-size: 4.5rem;
          letter-spacing: 1.2rem;
          text-transform: uppercase;
          .sm-block({
            font-size: 3rem;
            letter-spacing: 0.9rem;
          });
          .xs-block({
            font-size: 2.4rem;
            letter-spacing: 0.6rem;
          });
        }
        &--small {
          margin-bottom: 70px;
          max-width: 70%;
          font-size: 1.8rem;
          text-align: center;
          color: @colorSecFonts;
          .sm-block({
            font-size: 1.6rem;
            margin-bottom: 50px;
          });
          .xs-block({
            max-width: 90%;
          })
        }
      }
      .btn {
        display: flex;
        padding: 30px 40px;
        align-items: center;
        justify-content: center;
        font-family: @fontBebas;
        font-weight: bold;
        font-size: 2.4rem;
        letter-spacing: 0.6rem;
        color: #fff;
        background: #000;
        text-transform: uppercase;
        cursor: pointer;
        .md-block({
          padding: 25px 35px;
        });
        .sm-block({
          font-size: 2rem;
          letter-spacing: 0.4rem;
          padding: 20px 30px;
        });
        .xs-block({
          font-size: 1.8rem;
          letter-spacing: 0.3rem;
          padding: 15px 25px;
        });
      }
    }
  }
</style>
