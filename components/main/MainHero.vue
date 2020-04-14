<template>
  <section class="s-main fullpage-section active fp-auto-height-responsive">
    <div class="wrapper-container bg-wrapper">
      <div class="bg-small"></div>
      <div class="bg-big"></div>

      <div class="container container-app section">
        <div class="app-wrapper">
          <svg-appelsin-hero/>
        </div>
        <div class="desc-wrapper">
          <h1 class="visually-hidden">{{$t('title-main')}}</h1>
          <p class="desc-caption">
            <span class="symbol">{{$t('title-main--1')}} </span>
            <br>
            <span class="symbol">{{$t('title-main--2')}}</span>
            <span class="underscore"></span>
          </p>
          <ul class="servises-list">
            <li class="item">
              <svg-check-mark class="svg" />
              <p class="item-link">{{$t('hero-desс-1')}}</p>
            </li>
            <li class="item">
              <svg-check-mark class="svg" />
              <p class="item-link">{{$t('hero-desс-2--1')}} <br> {{$t('hero-desс-2--2')}}</p>
            </li>
            <li class="item">
              <svg-check-mark class="svg" />
              <p class="item-link">{{$t('hero-desс-3')}}</p>
            </li>
            <li class="item">
              <svg-check-mark class="svg" />
              <p class="item-link">{{$t('hero-desс-4')}}</p>
            </li>
            <li class="item">
              <svg-check-mark class="svg" />
              <p class="item-link">{{$t('hero-desс-5')}}</p>
            </li>
          </ul>
          <a href="#contacts" class="btn-hero">
            <span>{{$t('mail-form.order-project')}}</span>
          </a>
        </div>
      </div>

    </div>
    <a class="phone" href="tel:+79644952929">+7 (964) 495-29-29</a>
  </section>
</template>

<script>
  import SvgAppelsinHero from "~/assets/img/appelsin/app.svg?inline"
  import SvgCheckMark from "~/assets/img/icon/check-mark.svg?inline"
  export default {
    name: 'main-block',
    components: {
      SvgAppelsinHero,
      SvgCheckMark

    }
  }
</script>

<style scoped lang="less">
  @import "../../assets/less/_variables";

  .s-main {
    background: #ffba00;
    box-shadow: inset 0px 0px 300px 50px rgb(245, 151, 16);
    .sm-max-height({ padding-top: 0px; });
    .sm-block({ padding-top: 0px;});
    &.fullpage-section {
      .sm-max-height({ padding-bottom: 0px;});
      .sm-block({ padding-bottom: 0px;});
    }
    .wrapper-container {
      position: relative;
      display: flex;
      width: 100%;
      align-items: center;
      justify-content: flex-start;
      background-image: url("../../assets/img/appelsin-small-11.png"),
      url("../../assets/img/appelsin-small-2.png") ;
      background-repeat: no-repeat;
      background-position: 0% 0%, 95% 10%;
      box-sizing: border-box;
      .sm-max-height({ padding-top: 60px;});
      .sm-block({ padding-top: 60px; padding-bottom: 60px; min-height: 100vh;});
      .xs-block({background-position: 0% 0%, 95% 80%; height: 100%;});
      .bg-small {
        position: absolute;
        top: 85%;
        left: 10%;
        box-shadow: 0px 0px 50px 20px rgb(243, 117, 14);
      }
      .bg-big {
        position: absolute;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
        background-image: url("../../assets/img/appelsin.png");
        background-repeat: no-repeat;
        background-position: 45% 105%;
        z-index: 9;
        @media (min-width: 1170px) and (max-height: 1080px){
          background-position: 55% 130%;
        }
        @media (min-width: 990px) and (max-height: 1080px){
          background-position: 55% 140%;
        }
        .lg-max-height({background-position: 45% 250px;});
        .md-max-height({ display: none;});
        .xs-block({ display: none;});
      }
      .container-app {
        max-width: 1210px;
        z-index: 8;
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        width: 100%;
        box-sizing: border-box;
        .lg-block({ align-items: center;});
        .md-block({ width: auto; margin: 0;});
        .sm-block({position: relative;
          z-index: 12;});
        .app-wrapper {
          height: 100%;
          max-height: 100%;
          box-sizing: border-box;
          flex-shrink: 0;
          .lg-block({max-width: 35%;});
          .md-block({ display: none;});
          svg {
            max-width: 100%;
            max-height: 100%;
            height: 100%;
          }
        }
      }
      .desc-wrapper {
        z-index: 10;
        padding-top: 80px;
        margin-left: 10vw;
        flex-shrink: 0;
        .lg-block({ padding-top: 0px;});
        .xs-block({margin-top: -50px;});
        @media (max-width: 425px) and (max-height: 500px){
          margin-top: 0;
        }
        .desc-caption {
          display: inline-block;
          margin-bottom: 40px;
          font-family: @fontBebas;
          font-weight: bold;
          font-size: 4.5rem;
          text-transform: uppercase;
          .md-max-height({ font-size: 4rem; letter-spacing: 1rem; margin-bottom: 30px;});
          .lg-block({font-size: 4rem; letter-spacing: 1rem; margin-bottom: 30px;});
          .sm-block({ font-size: 4rem; letter-spacing: 0.6rem; margin-bottom: 20px;});
          .symbol {
            letter-spacing: 1.1rem;
            .md-max-height({letter-spacing: 1rem; });
            .lg-block({letter-spacing: 1rem;});
            .sm-block({letter-spacing: 0.5rem;});
          }
          .dash {
            margin-left: 15px;
            margin-right: 25px;
            letter-spacing: 0;
            .md-max-height({margin-left: 8px; margin-right: 19px;});
            .lg-block({ margin-left: 8px; margin-right: 19px;});
            .sm-block({ margin-left: 5px; margin-right: 9px;});
          }
          .underscore {
            display: inline-block;
            margin-left: 15px;
            width: 20px;
            height: 6px;
            background: #fff;
            letter-spacing: 0;
            .md-max-height({ width: 16px; height: 4px; margin-left: 6px;});
            .lg-block({width: 16px; height: 4px; margin-left: 6px;});
            .sm-block({ width: 11px; height: 3px; });
          }
        }
        .servises-list {
          max-width: 430px;
          .lg-block({ max-width: 380px;});
          .sm-block({max-width: 300px;
            margin-bottom: 40px;});
          .xs-block({max-width: 280px;});
          .item {
            margin-bottom: 22px;
            display: flex;
            .svg {
              width: 15px;
              height: 15px;
              margin-right: 10px;
              margin-top: 5px;
              .lg-block({margin-top: 3px});
              .sm-block({width: 12px; height: 12px; margin-top: 2px;});
              path {
                fill: #fff;
              }
            }
            &:last-child {
              margin-bottom: 0;
            }
            .item-link {
              position: relative;
              font-size: 2.1rem;
              font-weight: 600;
              text-transform: uppercase;
              color: #fff;
              .sm-block({ font-size: 1.8rem;})
            }
          }
        }
      }
      .btn-hero {
        display: none;
        width: 100%;
        height: 85px;
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
        .sm-block({
          display: flex;});
        .md-block({ height: 70px; });
        .xs-block({ height: 55px; });
      }
    }
    .phone {
      display: none;
      position: absolute;
      bottom: 50px;
      right: 50%;
      transform: translateX(50%);
      font-size: 2rem;
      color: #fff;
    }
  }
</style>
